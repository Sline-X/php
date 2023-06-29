<?php

namespace Main\Zandstra\Chapter4;

class StaticExample
{
    public static int $aNum = 0;
    public static function sayHello(): void
    {
        print "Здравствуй. Мир!";
    }
}

print StaticExample::$aNum;
StaticExample::sayHello();
