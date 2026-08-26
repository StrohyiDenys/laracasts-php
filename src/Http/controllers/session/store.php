<?php
// сделат чтобы выводились ошибки на соответствующей странице
use Core\App;
use Core\Authenticator;
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

return view('session/create.view.php',[
    'errors' => $form->errors()
]);
$errors['password'] = "Incorrect email or password";
view('registration/create.view.php',[
    'errors' => $errors
]);