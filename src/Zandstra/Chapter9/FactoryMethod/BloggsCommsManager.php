<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\FactoryMethod;

use Main\Zandstra\Chapter9\FactoryMethod\CommsManager;

class BloggsCommsManager extends CommsManager
{
    
    public function getAppEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }
    
    public function getHeaderText(): string
    {
        return "Верхний колонтитул BloggsCal\n";
    }
    
    public function getFooterText(): string
    {
        return "Нижний колонтитул BloggsCal\n";
    }
    
}
