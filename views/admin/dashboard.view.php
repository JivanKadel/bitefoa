<?php require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>
<div class="content" id="content">
    <h2>Welcome to the Dashboard</h2>
    <p>Select an option from the navigation menu</p>
</div>

<?php
//
//use Core\App;
//use Core\Database;
//
//$db = App::resolve(Database::class);
//
//$totalCategory = $db->query('select count(*) as \'total\' from category')->find();
//$totalItems = $db->query('select count(*) as \'total\' from menus')->find();
//
//$pendingOrders = $db->query('select count(*) as \'total\' from orders where completed is null')->find();
//$completedOrders = $db->query('select count(*) as \'total\' from orders where completed is not null')->find();
//
//$pendingReservations = $db->query('select count(*) as \'total\' from reservations where completed is null')->find();
//$completedReservations = $db->query('select count(*) as \'total\' from reservations where completed is not null')->find();
//
//?>

<main class="overview">
    <div class="card">
        <h2>Menu Summary</h2>
        <p class="summary">Total Category = <?= $totalCategory['total'] ?></p>
        <p class="summary">Total Items = <?= $totalItems['total'] ?></p>
    </div>
    <div class="card">
        <h2>Pending Orders</h2>
        <p class="summary">Total Orders = <?= $pendingOrders['total'] ?></p>
    </div>
    <div class="card">
        <h2>Completed Orders</h2>
        <p class="summary">Total Orders = <?= $completedOrders['total'] ?></p>
    </div>
    <div class="card">
        <h2>Pending Reservations</h2>
        <p class="summary">Total Reservations = <?= $pendingReservations['total'] ?></p>
    </div>
    <div class="card">
        <h2>Completed Reservations</h2>
        <p class="summary">Total Reservations = <?= $completedReservations['total'] ?></p>
    </div>
</main>
</body>

</html>