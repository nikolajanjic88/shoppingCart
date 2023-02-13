<?php
if(isset($_SESSION['id'])) {
    header('location: /');
}

$db = new Database();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST);
    $errors = [];
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    if(trim($email) === '') {
        $errors['email'] = 'Email required';
    }

    if(trim($password) === '') {
        $errors['password'] = 'Password required';
    }

    if(!email($email) && trim($email)!== '') {
        $errors['email'] = 'Not valid email';
    }

    $sql = "SELECT * FROM users WHERE email = :email";
    $result = $db->query($sql, ['email' => $email])->find();

    if(!$result && trim($email)!== '') {
        $errors['email'] = 'Wrong credentials';
        $errors['password'] = 'Wrong credentials';
    }

    if($result && !password_verify($password, $result['password'])) {
        $errors['password'] = 'Password inccorect';
    }


    if(empty($errors)) {
        $_SESSION['id'] = $result['id'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['is_admin'] = $result['is_admin'];
        header('location: /');
        //var_dump($_SESSION);
    }
    

}

require_once(base_path('views/login.view.php'));