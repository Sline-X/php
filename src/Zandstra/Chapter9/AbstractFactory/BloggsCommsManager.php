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
        return "BloggsCal header\n";
    }
    
    public function getApptEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }
    
    public function getTtdEncoder(): TtdEncoder
    {
        return new BloggsTtdEncoder();
    }
    
    public function getContactEncoder(): ContactEncoder
    {
        return new BloggsContactEncoder();
    }
    
    public function getFooterText(): string
    {
        return "BloggsCal footer\n";
    }
}
