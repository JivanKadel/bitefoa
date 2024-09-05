<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <form method="POST" action="/menus/create">

        <div class="">
            <div>
                <label for="name" class="">Name</label>

                <div class="">
                    <input id="name" name="name" class="" value="<?= $_POST['name'] ?? '' ?>" />
                    <?php if (isset($errors['name'])) : ?>
                        <p class=""><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <label for="category" class="">Category</label>

                <div class="">
                    <input id="category" name="category" class="" value="<?= $_POST['category'] ?? '' ?>" />

                    <?php if (isset($errors['category'])) : ?>
                        <p class=""><?= $errors['category'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <label for="price" class="">Price</label>

                <div class="">
                    <input id="price" name="price" class="" value="<?= $_POST['price'] ?? '' ?>"/>

                    <?php if (isset($errors['price'])) : ?>
                        <p class=""><?= $errors['price'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="">
                <button type="submit" class="">
                    Save
                </button>
            </div>
    </form>
</main>

<?php require base_path('views/partials/footer.php') ?>