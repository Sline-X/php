<?php
require_once('algorithm_static.php');

$points = [[3, 5], [5, 3], [5, 5], [5, 0]];
$objects = array_map(['Algorithm', 'distance'], $points);

echo "\n";
print_r($objects);
echo "\n";