<?php
function simple(int $from = 0, int $to = 100)
{
    for ($i = $from; $i < $to; $i++) {
        yield $i;
    }
}

$obj = simple(1, 5);

while ($obj->valid()) {
    echo ($obj->current() * $obj->current()) . ' ';
    $obj->next();
}