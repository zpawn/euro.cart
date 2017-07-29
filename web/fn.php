<?php

function debug ($val, $fn = false) {
    echo '<pre>';
    $fn ? var_dump($val) : print_r($val);
    echo '</pre>';
}
