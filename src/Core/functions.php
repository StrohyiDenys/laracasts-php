<?php
use Core\Response;
function dd($val){
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
    die();
}
function isUrl($url){
    return $_SERVER["REQUEST_URI"] == $url;
}

function authorize($condition, $status = Response::FORBIDDEN){
    if (!$condition) abort($status);
    return true;
}
function base_path($path){
    return BASE_PATH . $path;
}
function view($path, $attributes = []){
    extract($attributes);
    require base_path('views/' . $path);
}
function abort($code = 404)
{
    if ($code < 100 || $code > 599){
        $code = 500;
    }
    http_response_code($code);
    include base_path("views/$code.php");
    die();
}

function login($user){
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];
    session_regenerate_id(true);
}
function logout(){
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}