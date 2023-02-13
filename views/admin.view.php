<?php include_once('inc/header.php'); ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <a href="/create" class="btn btn-primary mt-3">Add product</a>
        </div>
    </div>
</section>
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">All Products</h1>
                                    </div>
                                    <hr class="my-4">
                                    <?php foreach($products as $product): ?>
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-3 col-lg-2 col-xl-2">
                                            <img src="<?= $product['image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-4 col-lg-3 col-xl-3">
                                            <h6 class="text-muted"><?= $product['name'] ?></h6>
                                        </div>
                                        <div class="col-md-4 col-lg-3 col-xl-3">
                                            <h6 class="text-muted">€<?= $product['price'] ?></h6>
                                        </div>
                                        <div class="col-md-2 d-flex">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                                <button onclick="return confirm('Are you sure?')" id="boot-icon" class="bi bi-trash  border-0" style="font-size: 28px; color: rgb(255, 0, 0);"></button>
                                            </form>
                                            <div class="mx-3">
                                                <a href="/edit?id=<?= $product['id'] ?>"><i class="bi bi-pen" style="font-size: 28px"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once('inc/footer.php'); ?>