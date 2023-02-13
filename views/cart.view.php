<?php include_once('inc/header.php'); ?>
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                        <h6 class="mb-0 text-muted">3 items</h6>
                                    </div>
                                    <hr class="my-4">
                                    <?php 
                                        $totals = 0; 
                                        foreach($carts as $cart): 
                                        $priceOff = round($cart['price'] * 80 / 100, 2);
                                    ?>
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="<?= $cart['image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted"><?= $cart['name'] ?></h6>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <span>Quantity (<?= $cart['qty'] ?>)</span>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-0">€ <?= $total = $priceOff * $cart['qty'] ?></h6>
                                        </div>
                                        <div class="col-md-1">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $cart['id'] ?>">
                                                <button onclick="return confirm('Are you sure?')" id="boot-icon" class="bi bi-trash border-0" style="font-size: 28px; color: rgb(255, 0, 0);"></button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <?php 
                                        $totals += $total;
                                        endforeach 
                                    ?>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="/" class="text-body"><i
                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">
                                    <h5 class="text-uppercase mb-3">Shipping</h5>
                                    <div class="mb-4 pb-2">
                                        <select class="select">
                                            <option value="0">Chose shipping</option>
                                            <option value="5">Standard-Delivery- €5.00</option>
                                            <option value="10">Have no idea - €10.00</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Shipping price</h5>
                                        <h5>€ <span class="total"></span></h5>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">items <?= count($carts) ?></h5>
                                        <h5>€ <?= $totals; ?></h5>
                                    </div>
                                    <h5 class="text-uppercase mb-3">Give code</h5>

                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea2">Enter your code</label>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <button type="button" class="btn btn-dark btn-block btn-lg">Register</button>
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