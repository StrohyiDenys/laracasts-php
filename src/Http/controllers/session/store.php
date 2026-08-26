<?php
// сделат чтобы выводились ошибки на соответствующей странице
use Core\App;
use Core\Authenticator;
use Core\Session;
use Core\Validator;
use Http\LoginForm;

$db = App::resolve("Core\Database");
$email = $_POST['email'];
$password = $_POST['password'];
//validation:
$form = new LoginForm;
if($form->validate($email, $password)){
    //authentication
    $auth = new Authenticator();
    if ($auth->attempt($email, $password)){
        redirect('/');
    }
    else $form->addError("password", "Authentication failed");
}
//if validation/authentication failed:

Session::flash("errors", $form->errors());
redirect("/login");