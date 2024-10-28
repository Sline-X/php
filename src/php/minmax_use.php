<?php
require_once 'minmax_alter.php';

$obj = new MinMax();
echo $obj->min(43, 18, 5, 61, 23, 10, 56, 36);
echo "\n";
echo $obj->max(43, 18, 5, 61, 23);