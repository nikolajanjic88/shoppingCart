<?php
if(!isset($_SESSION['id'])) {
    abort();
}

$db = new Database();
$sql = "SELECT carts.id, products.name, products.price, carts.qty, products.image FROM carts JOIN products ON carts.product_id = products.id JOIN users ON carts.user_id = users.id WHERE carts.user_id = ?";
$carts = $db->query($sql, [$_SESSION['id']])->get();
//var_dump($carts);

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $sql = "DELETE FROM carts WHERE id = ?";
    $db->query($sql, [$_POST['id']]);
    header("Refresh:0");
}

require_once(base_path('views/cart.view.php'));