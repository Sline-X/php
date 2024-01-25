<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\AbstractFactory;

use Main\Zandstra\Chapter9\AbstractFactory\CommsManager;
use Main\Zandstra\Chapter9\FactoryMethod\ApptEncoder;
use Main\Zandstra\Chapter9\FactoryMethod\BloggsApptEncoder;

class BloggsCommsManager extends CommsManager
{
    
    public function getHeaderText(): string
    {
        
        return "Верхний колонтитул BloggsCal\n";
    }
    
    public function make(int $flag_int): Encoder
    {
       switch ($flag_int)
       {
           case self::APPT:
               return new BloggsApptEncoder();
               
           case self::CONTACT:
               return new BloggsContactEncoder();
               
           case self::TTD:
               return new BloggsTtdEncoder();
       }
    }
    
    public function getFooterText(): string
    {
        return "Нижний колонтитул BloggsCal\n";
    }
    

}
