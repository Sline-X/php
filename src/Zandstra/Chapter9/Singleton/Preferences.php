<?php

namespace Main\Zandstra\Chapter9\Singleton;

class Preferences
{
    private array $props = [];

    private static Preferences $instance;

    private function __construct()
    {
    }

    public static function getInstance(): Preferences
    {
        if (empty(self::$instance)){
            self::$instance = new Preferences();
        }

        return self::$instance;
    }

    public function setProperty(string $key, string $val): void
    {
        $this->props[$key] = $val;
    }

    public function getProperty(string $key): string
    {
        return $this->props[$key];
    }

}