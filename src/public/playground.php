<?php
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "vendor/autoload.php";
$test = new \Illuminate\Support\Collection([1,2,3]);
var_dump($test->average());