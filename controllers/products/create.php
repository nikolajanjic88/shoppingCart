<?php

$db = new Database();
$sql = "SELECT * FROM categories";
$categories = $db->query($sql)->get();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST);
    $errors = [];
    $name = htmlspecialchars($_POST['name']);
    $caregory = $_POST['category'];
    $description = htmlspecialchars($_POST['description']);
    $price = htmlspecialchars($_POST['price']);
    
    if($_FILES['image']['tmp_name'] !== '') {
        //dd($_FILES['image']);
        $image_name = 'images/'. microtime(true) . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
    
        if($size > 2000000) {
            $errors['image'] = 'File too big';
        } else move_uploaded_file($tmp_name, $image_name);

    }

    if(trim($name) === '') {
        $errors['name'] = 'Name required';
    }

    if(trim($description) === '') {
        $errors['description'] = 'Description required';
    }

    if($caregory === '0') {
        $errors['category'] = 'Category required';
    }

    if($price == '0' || trim($price) === '') {
        $errors['price'] = 'Price required';
    }


    if(empty($errors)) {
        $db->query("INSERT INTO products (name, description, price, image, category_id) 
        VALUES (:name, :description, :price, :image, :category_id)", [
                "name" => $name,
                "description" => $description,
                "price" => $_POST['price'],
                "image" => $image_name ?? null,
                "category_id" => $_POST['category']
            ]);  
        header('location: /admin');
    }
    

}

require_once(base_path('views/create.view.php'));