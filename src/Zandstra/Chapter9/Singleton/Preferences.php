<?php

namespace Main\Zandstra\Chapter9\Singleton;

class Preferences
{
    private array $props = [];

    private function __construct()
    {
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