
 <?php  require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>
<?php //dd(\Core\Session::get('old')); ?>

<main class="edit-forms-container">
    <div class="edit-forms-wrapper">
        <h2 class="edit-title">Add New Item</h2>
        <form method="POST" action="/admin/menu">
            <div>
                <label for="name" class="">Name</label>
                <div class="">
                    <input id="name" name="name" value="<?= \Core\Session::get('old')['name'] ?? '' ?>"/>
                    <?php if (isset($errors['name'])) : ?>
                        <p class="error-message"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
                <label for="category_id" class="">Category</label>
                <div class="">
                    <select name="category_id" id="category" class="categories">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>" >
                                <?= $category['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['category'])) : ?>
                        <p class=""><?= $errors['category'] ?></p>
                    <?php endif; ?>
                </div>
                <label for="price" class="">Price</label>
                <div class="">
                    <input id="price" name="price" value="<?= \Core\Session::get('old')['price'] ?? '' ?>"/>
                    <?php if (isset($errors['price'])) : ?>
                        <p class="error-message"><?= $errors['price'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="edit-links">
                <a href="/admin/menus" type="submit" class="edit-cancel">
                    Cancel
                </a>
                <button type="submit" class="menu-create-btn">
                    Add
                </button>
            </div>
        </form>
    </div>
</main>
    <style>

        .edit-forms-container{
                margin-left: 300px;
                width: calc(100% - 300px);
                height: 80vh;
                display: grid;
                place-content: center;
        }
        .edit-forms-wrapper{
            position: relative;
            border: 2px dashed #614126;
            padding: 1rem 2rem;
        }
        .edit-forms-wrapper *{
            font-size: 1.3rem;
            padding: 0.3rem;
        }
        .edit-title{
            margin-top: 0;
            text-align: center;
        }

        .categories{
            width: 100%;
            background-color: white;
            border: 1px solid black;
        }
        .edit-links{
            margin-top: 1rem;
            display: flex;
            justify-content: flex-start;
            gap: 0.6rem;
        }

        .edit-cancel{
            color: black;
            background: white;
            text-decoration: none;
            cursor: pointer;
        }
        .edit-cancel:hover{
            color: black;
            background: #cdc8c8;
        }
        .menu-create-btn{
            width: 5rem;
            background: #30397f;
            color: white;
            border: 2px solid blue;
            border-radius: 5px;
            cursor: pointer;
        }
        .menu-create-btn:hover{
            background: #293598;
            border-radius: 7px;
        }

        p.error-message{
            font-size: 0.7rem;
        }
    </style>
