<?php
//dd($menus);
require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>


<main class="menu-show-main">
    <div class="">
        <p class="">
            <a href="/admin/menus" class="">go back...</a>
        </p>

        <p><?= htmlspecialchars($menu['name']) ?></p>

        <footer class="mt-6">
            <a class="" href="/menu/edit/?id=<?= $menu['id'] ?>">Edit</a>
        </footer>
    </div>
</main>
<style>
    .menu-show-main{
        margin-left: ;
    }
</style>