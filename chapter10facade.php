<?php
require __DIR__ .'/vendor/autoload.php';

use Main\Zandstra\Chapter10\Facade\ProductFacade;

function getProductFileLines(string $file): array
{
    return file($file);
}

function getProductObjectFromId(string $id, string $productName): Product
{
    //поиск в некоторой базе данных
    return new Product($id, $productName);
}

function getNameFromLine(string $line): string
{
    if (preg_match("/.*-(.*)\s\d+/", $line, $array))
    {
        return str_replace('_', ' ', $array[1]);
    }
    
    return '';
}

function getIDFromLine($line): int | string
{
    if (preg_match("/^(\d{1,3})-/", $line, $array))
    {
        return $array[1];
    }
    return -1;
}

class Product
{
    public string $id;
    public string $name;
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

$lines = getProductFileLines(__DIR__ . '/test1.txt');
$objects = [];

foreach ($lines as $line) {
    $id = getIDFromLine($line);
    $name = getNameFromLine($line);
    $objects[$id] = getProductObjectFromId($id, $name);
}

print_r($objects);


$facade = new ProductFacade(__DIR__ . '/test1.txt');
$objects = $facade->getProduct('234');

print_r($objects);
