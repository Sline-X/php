<?php
function simple(int $from = 0, int $to = 100)
{
    for ($i - $from; $i < $to; $i++) {
        echo "значение = $i \n";
        yield $i;
    }
}

$generator = simple();
echo gettype($generator);