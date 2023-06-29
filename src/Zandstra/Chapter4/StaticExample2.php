<?php

namespace Main\Zandstra\Chapter4;

class StaticExample2
{
    public static int $aNum = 0;
    public static function sayHello(): void
    {
        self::$aNum++;
        print "Привет! (" . self::$aNum . ")\n";
    }
}
