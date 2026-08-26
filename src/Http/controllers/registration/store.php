<?php
use Core\App;
use Core\Authenticator;
use Core\Validator;
$email = $_POST['email'];
$password = $_POST['password'];
//validate the form input
$errors = [];
if(!VALIDATOR::email($email)){
    $errors['email'] = 'Use a correct email address';
};
if(!VALIDATOR::string($password, 7, 255)){
    $errors['password'] = 'Password is too short or too long';
}
$password = password_hash($password, PASSWORD_BCRYPT);
if(!empty($errors)){
    view('registration/create.view.php',[
        'errors' => $errors
    ]);
    return;
}
//check if account already exists
$db = App::resolve("Core\Database");
$user = $db->Query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

//if yes - redirect to the login page
if($user){
    header('Location: /'); // go to log in page
    exit();
} else{
    //if no - save account to db, log the user in, mark that the user logged in and redirect
$db->Query("INSERT INTO users (email, password) VALUES (:email, :password)", [
    'email' => $email,
    'password' => $password
]);

(new Authenticator())->login($user);
header("Location: /");
exit();
}