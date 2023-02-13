<?php include_once('inc/header.php'); ?>
    <!-- Product section-->
    <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0" src="<?= $product['image']?>"/></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder"><?= $product['name'] ?></h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">€<?= $product['price'] ?></span>
                        <span>$<?= $product['price'] * 80 / 100 ?></span>
                    </div>
                    <p class="lead"><?= $product['description'] ?></p>
                    <div class="d-flex  w-100">
                        <form class="d-flex" action="" method="post">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input class="form-control text-center me-3" type="number" name="qty" style="max-width: 5rem" value="1" />
                            <?= $errors['qty'] ?? null ?>
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once('inc/footer.php'); ?>
