<?php

function simple($from = 0, $to = 100)
{
    for ($i = $from; $i < $to; $i++) {
        echo "значение = $i \n";
        yield $i;
    }
}

foreach (simple() as $val) {
    echo 'квадрат = ' . ($val * $val) . "\n";
    if ($val >= 5) break;
}