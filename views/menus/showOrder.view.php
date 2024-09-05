<?php
//dd($menus);
require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>

<main class="show-order-main">
    <div class="order-detail">
        <div class="name">
            <p>Name </p>
            <p><?= $order['user_name'] ?></p>
        </div>
        <div class="phone">
            <p>Phone </p>
            <p><?= $order['user_phone'] ?></p>
        </div>
        <div class="address">
            <p>Address </p>
            <p><?= $order['address'] ?></p>
        </div>
        <div class="status">
            <p>Status: </p>
            <p><?= $order['completed'] ? 'Completed' : 'Pending' ?></p>
        </div>
        <div class="orders">
            <p>Orders: </p>
            <div class="cart-items">
                <?php foreach ($items as $item) : ?>
                <div class="cart-item">
                    <p>Item: <?= $item['name'] ?>,&nbsp;</p>
                    <p>Price: <?= $item['price'] ?>, &nbsp;</p>
                    <p>Quantity: <?= $item['quantity'] ?></p>
                </div>
                <?php endforeach; ?>
                <p>Total = <?= $total ?></p>
            </div>
        </div>
        <div class="ordered-on">
            <p>Ordered on: </p>
            <p><?= $order['order_date_time'] ?></p>
        </div>
        <p class="">
            <a href="/admin/orders" class="">go back...</a>
        </p>
    </div>
</main>
<style>
    .show-order-main{
        margin-top: 4rem;
        margin-left: 300px;
        width: calc(100% - 300px);
        padding-bottom: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .order-detail{
        border: 2px solid black;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 1rem;
    }
    .order-detail>div{
        display: flex;
        justify-content: center;
        gap: 2rem;
    }
    .cart-item{
        display: flex;
    }
</style>