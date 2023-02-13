<?php

if(!isset($_SESSION['id']) || $_SESSION['is_admin'] != 1) {
    abort();
}

$db = new Database();
$sql = "SELECT * FROM products";
$products = $db->query($sql)->get();

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $sql = "DELETE FROM products WHERE id = ?";
    $db->query($sql, [$_POST['id']]);
    header("Refresh:0");
}


require_once(base_path('views/admin.view.php'));