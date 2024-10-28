<?php
function block()
{
    while (true) {
        $string = yield;
        echo $string;
    }
}

$block = block();
$block->send("Hello, world! \n");
$block->send("Hello, PHP! \n");