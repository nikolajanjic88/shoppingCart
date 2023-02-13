<?php include_once('inc/header.php'); ?>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
           <form action="" method="post">
                <div class="form-group mt-3">
                    <input class="form-control" placeholder="Email" type="email" value="<?= $email ?? '' ?>" name="email">
                    <?=  $errors['email'] ?? null ?>
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    <?=  $errors['password'] ?? null ?>
                </div>
                <button class="btn btn-primary mt-3">Login</button>
           </form>
        </div>
    </section>

