<?php

if(!isset($_SESSION['id']) || $_SESSION['is_admin'] != 1) {
    abort();
}

$db = new Database();
$sql = "SELECT * FROM products WHERE id = ?";
$product = $db->query($sql, [$_GET['id']])->findOrFail();
//var_dump($product);
if(!$product) {
    abort();
}

if($_SERVER['REQUEST_METHOD'] === "POST") {

    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = htmlspecialchars($_POST['price']);

    $errors = [];

    if(trim($name) === '') {
        $errors['name'] = 'Product name required';
    }

    if($price == 0 || trim($price) === '') {
        $errors['price'] = 'Price required';
    }

    if(empty($errors)) {
        $sql = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
        $db->query($sql, [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'id' => $_GET['id']
        ]);
        header('location: /admin');
    }
    
}

require_once(base_path('views/edit.view.php'));