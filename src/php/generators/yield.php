<?php

function generator()
{
    echo "перед первым yield \n";
    yield 1;
    echo "перед вторым yield \n";
    yield 2;
    echo "перед третьим yield \n";
    yield 3;
}

foreach(generator() as $i) {
    echo "$i \n";
}