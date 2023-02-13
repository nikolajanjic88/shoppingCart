<?php include_once('inc/header.php'); ?>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
           <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <input class="form-control" type="text" name="name" placeholder="Product name" value="<?= $name ?? '' ?>">
                    <?=  $errors['name'] ?? null ?>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="description" id="" cols="30" rows="10">
                        <?= $description ?? '' ?>
                    </textarea>
                    <?=  $errors['description'] ?? null ?>
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="number" value="<?= $price ?? 0 ?>" name="price" step=".01">
                    <?=  $errors['price'] ?? null ?>
                </div>
                <div class="form-group mt-3">
                    <select name="category" id="" class="form-control">
                        <option value="0">Chose Category</option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?=  $errors['category'] ?? null ?>
                </div>
                <input name="image" class="form-control mt-3" type="file">
                <button class="btn btn-primary mt-3 w-25">Add</button>
           </form>
        </div>
    </section>

