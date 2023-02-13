<?php
if(isset($_SESSION['id'])) {
    header('location: /');
}
$db = new Database();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST);
    $errors = [];
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    if(trim($name) === '') {
        $errors['name'] = 'Name required';
    }

    if(trim($email) === '') {
        $errors['email'] = 'Email required';
    }

    if(trim($password) === '') {
        $errors['password'] = 'Password required';
    }

    if(!email($email)) {
        $errors['email'] = 'Not valid email';
    }

    if($password !== $rpassword) {
        $errors['rpassword'] = 'Password and repeat password do not match';
    }

    $sql = "SELECT * FROM users WHERE email = :email";
    $result = $db->query($sql, ['email' => $email])->find();
    if($result) {
        $errors['email'] = 'User with that email already exists';
    }


    if(empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db->query("INSERT INTO users (name, email, password) 
        VALUES (:name, :email, :password)", [
                "name" => $name,
                "email" => $email,
                "password" => $password,
            ]);  
        header('location: /login');
    }
    

}

require_once(base_path('views/register.view.php'));