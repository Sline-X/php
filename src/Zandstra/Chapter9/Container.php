<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9;

class Container
{
    public Contained $contained;
    
    public function __construct()
    {
        $this->contained = new Contained();
    }
    
    public function __clone()
    {
        // Обеспечить, чтобы клонированный объект
        // содержал клон объекта, хранящегося в
        // свойстве self::$contained
        // а не ссылку на него
        $this->contained = clone $this->contained;
    }
}
