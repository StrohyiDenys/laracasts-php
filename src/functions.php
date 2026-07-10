<?php
function dd($val){
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
    die();
}
function isUrl($url){
    return $_SERVER["REQUEST_URI"] == $url;
}
