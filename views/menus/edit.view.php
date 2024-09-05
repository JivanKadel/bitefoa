<?php  require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>

<main class="edit-forms-container">
    <div class="edit-forms-wrapper">
        <h2 class="edit-title">Edit Form</h2>
        <form method="POST" action="/admin/menu">
            <input type="hidden" name="_method" value="patch" />
            <input type="hidden" name="id" value="<?= $menu['id'] ?>" />
            <div>
                <label for="name" class="">Name</label>
                <div class="">
                    <input id="name" name="name" value="<?= $menu['name'] ?? '' ?>" />
                    <?php if (isset($errors['name'])) : ?>
                        <p class="error-message"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
                <label for="category" class="">Category</label>
                <div class="">
                    <select name="category_id" id="category" class="categories">
                        <?php foreach ($categories as $category): ?>
                            <option
                                    value="<?= $category['id'] ?>"
                                <?= $category['name'] === $menu['category'] ? 'selected' : ''?>
                                >
                                <?= $category['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['category'])) : ?>
                        <p class="error-message"><?= $errors['category'] ?></p>
                    <?php endif; ?>
                </div>
                <label for="price" class="">Price</label>
                <div class="">
                    <input id="price" name="price" class="" value="<?= $menu['price'] ?? '' ?>" />
                    <?php if (isset($errors['price'])) : ?>
                        <p class="error-message"><?= $errors['price'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="edit-links">
                <a href="/admin/menus" type="submit" class="edit-cancel">
                    Cancel
                </a>
                <button type="submit" class="menu-update-btn">
                    Update
                </button>
            </div>
        </form>
        <form method="post" action="/admin/menu" class="menu-delete-form">
            <input type="hidden" name="_method" value="delete" />
            <input type="hidden" name="id" value="<?= $menu['id'] ?>" />
            <button type="submit" class="menu-delete-btn">
                <i class='bx bxs-trash-alt'></i>
                <span class="tooltiptext">DELETE?</span>
            </button>
        </form>
    </div>
</main>
    <style>
        p.error-message{
            font-size: 0.7rem;
        }
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
        .menu-update-btn{
            background: #30397f;
            color: white;
            border: 2px solid blue;
            border-radius: 5px;
            cursor: pointer;
        }
        .menu-update-btn:hover{
            background: #293598;
            border-radius: 7px;
        }

        .menu-delete-form{
            position: absolute;
            bottom: 18px;
            right: 1.5rem;
        }

        .menu-delete-btn{
            position: relative;
            background: transparent;
            color: #e50c0c;
            cursor: pointer;
            border: 2px solid red;
            border-radius: 50%;
        }
        .tooltiptext {
             visibility: hidden;
             width: 120px;
             background-color: white;
             color: #b61717;
            border: red 2px solid;
             text-align: center;
             border-radius: 6px;
             padding: 5px 0;
             position: absolute;
             z-index: 1;
             top: 150%;
             left: 50%;
             margin-left: -60px;
         }

         .tooltiptext::after {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent red transparent;
        }

        .menu-delete-btn:hover .tooltiptext {
            visibility: visible;
        }
        .menu-delete-btn>i{
            font-size: 1.5rem;
        }
        .menu-delete-btn:hover{
            font-size: 1.6rem;
        }
    </style>
