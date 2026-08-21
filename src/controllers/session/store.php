<?php
// сделат чтобы выводились ошибки на соответствующей странице
use Core\App;
use Core\Validator;
$db = App::resolve("Core\Database");
$email = $_POST['email'];
$password = $_POST['password'];
//validation:
$errors = [];
if(!VALIDATOR::email($email)){
    $errors['email'] = 'Use a valid email address';
};
if(!VALIDATOR::string($password)){
    $errors['password'] = 'Password is invalid';
}
if(!empty($errors)){
    return view('session/create.view.php',[
        'errors' => $errors
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