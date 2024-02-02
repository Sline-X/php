<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\DependencyInjection;

class ObjectAssembler
{
    private array $components = [];
    
    public function __construct(string $conf)
    {
        $this->configure($conf);
    }
    
    private function configure(string $conf): void
    {
        // $data = simplexml_load_file($conf);
        $data = simplexml_load_string(file_get_contents($conf));
        

        foreach ($data->class as $class)
        {
            $args = [];
            $name = (string)$class['name'];
            $resolvednname = $name;
            
            foreach ($class->arg as $arg) {
                $argclass = (string)$arg['inst'];
                $args[(int)$arg['num']] = $argclass;
            }
            
            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst'])) {
                   $resolvednname = (string)$class->instance[0]['inst'];
                }
            }
            
            ksort($args);
            $this->components[$name] = function () use ($resolvednname, $args)
            {
                $expandedargs = [];
                
                foreach ($args as $arg) {
                    $expandedargs[] = $this->getComponent($arg);
                }
                $rclass = new \ReflectionClass($resolvednname);
                return $rclass->newInstanceArgs($expandedargs);
            };
        }
    }
    
    public function getComponent(string $class): object
    {
        // Создание $inst - экземпляр нашего объекта
        // и список объектов \ReflectionMethod
        if (isset($this->components[$class])) {
            // Экземпляр, найденный в конфигурационном файле
            $inst = $this->components[$class]();
            $rclass = new \ReflectionClass($inst::class);
            $methods = $rclass->getMethods();
        }
        else {
            $rclass = new \ReflectionClass($class);
            $methods = $rclass->getMethods();
            $injectconstructor = null;
            foreach ($methods as $method) {
                foreach ($method->getAttributes(
                    InjectConstructor::class
                ) as $attribute) {
                    $injectconstructor = $attribute;
                    break;
                }
            }
            if (is_null($injectconstructor)) {
                $inst = $rclass->newInstance();
            } else {
                $constructorargs = [];
                foreach ($injectconstructor->getArguments() as $arg)
                {
                    $constructorargs[] = $this->getComponent($arg);
                }
                $inst = $rclass->newInstanceArgs($constructorargs);
            }
        }
        $this->injectMethods($inst, $methods);
        
        return $inst;
    }
    
    private function injectMethods(object $inst, array $methods)
    {
        foreach ($methods as $method) {
            foreach ($method->getAttributes(Inject::class) as $attribute) {
                $args = [];
                
                foreach ($attribute->getArguments() as $argstring) {
                    $args[] = $this->getComponent($argstring);
                }
                $method->invokeArgs($inst, $args);
            }
        }
    }
}
