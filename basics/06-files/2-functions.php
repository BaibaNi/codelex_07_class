<?php

function doSomething(int $input): int{
    return $input * 2;
}

function doSomethingElse(int $input1, int $input2): int{
    return ($input1 + $input2) * ($input1 - $input2);
}

?>