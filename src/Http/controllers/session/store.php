<?php
// сделат чтобы выводились ошибки на соответствующей странице
use Core\App;
use Core\Authenticator;
use Core\Session;
use Core\ValidationException;
use Core\Validator;
use Http\LoginForm;

$db = App::resolve("Core\Database");
//validation:
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);
//authentication
$signedIn = (new Authenticator)->attempt( $attributes['email'], $attributes['password']);

if (!$signedIn){
    $form->addError('password', 'Authentication failed')->throw();
}
redirect('/');

