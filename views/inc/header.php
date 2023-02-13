<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <?php if(isset($_SESSION['id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="/logout">Logout (<?= $_SESSION['name'] ?>)</a></li>
                        <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                        <?php endif ?>
                        <?php if(isset($_SESSION['id']) && $_SESSION['is_admin'] == 1): ?>
                        <li class="nav-item"><a class="nav-link" href="/admin">Admin panel</a></li>
                        <?php endif ?>
                    </ul>
                    <?php if(isset($_SESSION['id'])): ?>
                    <div class="d-flex">
                        <a href="/cart" class="btn btn-outline-dark">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                <?php
                                    $db = new Database();
                                    $sql = "SELECT * FROM carts WHERE user_id = ?";
                                    $count = $db->query($sql, [$_SESSION['id']])->get();
                                    echo count($count);
                                ?>
                            </span>
                        </a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </nav>

        