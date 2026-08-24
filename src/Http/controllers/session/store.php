<?php
// сделат чтобы выводились ошибки на соответствующей странице
use Core\App;
use Core\Validator;
use Http\LoginForm;

$db = App::resolve("Core\Database");
$email = $_POST['email'];
$password = $_POST['password'];
//validation:
$form = new LoginForm;
if(! $form->validate($email, $password)){
    return view('session/create.view.php',[
        'errors' => $form->errors()
    ]);
}
$user = $db->Query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if($user){
    if (password_verify($password, $user['password'])){
        login($user);
        header("Location: /");
        exit();
    }
}
$errors['password'] = "Incorrect email or password";
view('registration/create.view.php',[
    'errors' => $errors
]);