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
        $data = simplexml_load_string(file_get_contents($conf));

        foreach ($data->class as $class)
        {
            $name = (string)$class['name'];
            $resolvednname = $name;
            
            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst'])) {
                   $resolvednname = (string)$class->instance[0]['inst'];
                }
            }
            
            $this->components[$name] = function () use ($resolvednname)
            {
                $rclass = new \ReflectionClass($resolvednname);
                return $rclass->newInstance();
            };
        }
    }
    
    public function getComponent(string $class): object
    {
        if (isset($this->components[$class])) {
            $inst = $this->components[$class]();
        }
        else {
            $rclass = new \ReflectionClass($class);
            $inst = $rclass->newInstance();
        }
        
        return $inst;
    }
}
