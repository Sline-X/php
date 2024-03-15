<?php

$list = [1, 3, 4, 9, 8, 5, 7, 6];
$item = 7;

function binarySearch($list, $item)
{
    $low = 0;
    $high = count($list) - 1;
    while ($low < $high) {
        $mid = ($low + $high) / 2;
        $guess = $list[$mid];
        
        if ($guess == $item) {
            return $mid;
        }
        elseif ($guess > $item) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
        
        return null;
    }
}

print binarySearch($list, $item);
