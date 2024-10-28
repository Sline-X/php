<?php

class Page
{
    static $content = 'about' . "\n";

    public static function footer()
    {
        return 'footer' . "\n";
    }

    public static function header()
    {
        return 'header' . "\n";
    }

    public static function render()
    {
        echo self::header() . 
             self::$content . 
             self::footer();
    }
}