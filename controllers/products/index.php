<?php
$db = new Database();
$sql = "SELECT * FROM products";
$products = $db->query($sql)->get();

require_once(base_path('views/index.view.php'));