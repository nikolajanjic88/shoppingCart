<?php include_once('inc/header.php'); ?>
<?php include_once('inc/banner.php'); ?>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach($products as $product): ?>
                <div class="col mb-5 product" onmouseenter="enter(this)" onmouseleave="leave(this)">
                    <a href="/product?id=<?= $product['id'] ?>" class="text-decoration-none">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">-20%</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= $product['image'] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $product['name'] ?></h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">€<?= $product['price'] ?></span>
                                    <?php $newPrice = $product['price'] - $product['price'] * 20 / 100; echo '€' . round($newPrice, 2); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php include_once('inc/footer.php'); ?>
