<?php
if(!isset($_GET['id'])) {
    abort();
}
$db = new Database();
$sql = "SELECT * FROM products WHERE id = :id";
$product = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

if(!$product) {
    abort();
}

if($_SERVER['REQUEST_METHOD'] === "POST") {
    //var_dump($_POST);
    if(!isset($_SESSION['id'])) {
        echo "<script>alert('You must login first')</script>";
    } else {

        $errors = [];

        if($_POST['qty'] < 1) {
            $errors['qty'] = "<script>alert('Please enter quantity')</script>";
        }

        $sql = "SELECT * FROM carts WHERE product_id = :product_id AND user_id = :user_id";
        $res = $db->query($sql, ['product_id' => $product['id'], 'user_id' => $_SESSION['id']])->find();
        if($res) {
            $errors['qty'] = "<script>alert('Product already added')</script>";
        }

        if(empty($errors)) {
            $sql = "INSERT INTO carts (product_id, qty, user_id) VALUES (?, ?, ?)";
            $cart = $db->query($sql, [$_POST['product_id'], $_POST['qty'], $_SESSION['id']]);
            echo "<script>alert('Product added to cart')</script>";
        }
        
    }
    
}

require_once(base_path('views/product.view.php'));