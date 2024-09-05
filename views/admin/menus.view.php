<?php

require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>

<?php
 $count = 0;
?>

<main class="menu-overview">
    <h1 class="menu-title">Menus</h1>
    <div class="menu-container hand-drawn-border">
        <form class="add-new-item" method="get" action="/admin/menu/new" >
            <button title="Add new" type="submit" class="add-new-btn">
                <i class='bx bxs-plus-circle'></i>
            </button>
        </form>
        <div>
            <?php foreach ($categories as $category) : ?>
                <h2 class="category-name">
                    <?= htmlspecialchars($category['name']) ?>
                </h2>
                <?php foreach ($menus[$count] as $menu) : ?>
                    <div class="menu-items">
                        <form class="menu-edit-form" method="get" action="/admin/menu" >
                                <input type="hidden" name="id" value="<?= $menu['id'] ?>" />
                            <button title="Edit this item" type="submit" class="menu-item">
                                <span><?= $menu['id'] ?></span>
                                <span><?= $menu['name'] ?></span>
                                <span><?= 'Rs.'. $menu['price'] ?></span>
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php $count++ ?>
            <?php endforeach; ?>
        </div>
    </div>

</main>
    <style>
        .menu-overview{
            margin-top: 4rem;
            margin-left: 300px;
            width: calc(100% - 300px);
            padding-bottom: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .menu-container{
            position: relative;
        }
        .add-new-item{
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
        }
        .add-new-btn{
            color: black;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        .add-new-btn>i{
            font-size: 1.5rem;
        }

        .menu-title, .category-name{
            text-align: center;
        }
        .menu-items{
            margin: 0.4rem;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            background: transparent;
        }
        .menu-item{
            text-decoration: none;
            color: black;
            cursor: pointer;
            max-width: 600px;
            min-width: 400px;
            display: flex;
            justify-content: space-between;
            gap: 3rem;
            background: transparent;
            padding: 0.4rem;
            box-shadow: 2px 2px #ddd;
        }
        .menu-item:hover{
            box-shadow: 2px 2px #bbb;
            transform: scale(1.01);
        }
        .menu-item span{
            text-align: center;
        }
    </style>
</body>

</html>