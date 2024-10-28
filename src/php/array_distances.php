<?php
require_once('distance.php');

function distance(array $point): float
{
    return sqrt($point[0] ** 2 + $point[1] ** 2);
}

$points = [[3, 5], [5, 3], [5, 5], [5, 0]];
$objects = array_map('distance', $points);

echo "\n";
print_r($objects);
echo "\n";