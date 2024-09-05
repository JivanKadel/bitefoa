<?php
//dd($menus);
require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>

<main class="show-reservation-main">
    <div class="reservation-detail">
        <div class="name">
            <p>Name </p>
            <p><?= $reservation['user_name'] ?></p>
        </div>
        <div class="phone">
            <p>Phone </p>
            <p><?= $reservation['user_phone'] ?></p>
        </div>
        <div class="address">
            <p>Address </p>
            <p><?= $reservation['address'] ?></p>
        </div>
        <div class="status">
            <p>Service Status: </p>
            <p><?= $reservation['completed'] ? 'Provided' : 'Pending' ?></p>
        </div>
        <div class="reservation">
            <p>No of seats: </p>
            <p><?= $reservation['seats'] ?></p>
        </div>
        <div class="reserved-on">
            <p>Reserved for: </p>
            <p><?= $reservation['reserve_date_time'] ?></p>
        </div>
        <p class="">
            <a href="/admin/reservations" class="">go back...</a>
        </p>
    </div>
</main>
<style>
    .show-reservation-main{
        margin-top: 4rem;
        margin-left: 300px;
        width: calc(100% - 300px);
        padding-bottom: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .reservation-detail{
        border: 2px solid black;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 1rem;
    }
    .reservation-detail>div{
        display: flex;
        justify-content: center;
        gap: 2rem;
    }
</style>
