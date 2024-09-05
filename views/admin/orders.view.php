<?php require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>

<main class="orders-overview">

    <table class="all-orders">
        <caption>Pending Orders</caption>
        <tr class="each-order order-heading">
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Total</th>
            <th>Mark complete</th>
        </tr>
        <?php foreach ($pending as $order) : ?>
            <tr class="each-order">
                <td class="customer-name">
                    <?= $order['user_name'] ?>
                </td>
                <td>
                    <?= $order['user_phone'] ?>
                </td>
                <td>
                    <?= $order['address']  ?>
                </td>
                <td>
                    <?= json_decode($order['orders'])->total ?>
                </td>
                <td class="form">
                    <form action="/admin/order/complete" method="post">
                        <input type="hidden" name="id" value="<?= $order['id'] ?>">
                        <button type="submit" class="mark-complete-btn">
                            <i class='bx bx-check' ></i>
                        </button>
                    </form>
                </td>
                <td class="form">
                    <form action="/admin/order" method="get">
                        <input type="hidden" name="id" value="<?= $order['id'] ?>">
                        <button type="submit" class="order-details-btn">
                            <i class='bx bx-detail' ></i>
                        </button>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
    <table class="all-orders completed-orders">
        <caption>Completed Orders</caption>
        <tr class="each-order order-heading">
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Total</th>
        </tr>
        <?php foreach ($completed as $order) : ?>
            <tr class="each-order">
                <td class="customer-name">
                    <?= $order['user_name'] ?>
                </td>
                <td>
                    <?= $order['user_phone'] ?>
                </td>
                <td>
                    <?= $order['address']  ?>
                </td>
                <td>
                    <?= json_decode($order['orders'])->total ?>
                </td>
                <td class="form">
                    <form action="/admin/order" method="get">
                        <input type="hidden" name="id" value="<?= $order['id'] ?>">
                        <button type="submit" class="order-details-btn">
                            <i class='bx bx-detail' ></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<style>
    .orders-overview{
        margin-top: 4rem;
        margin-left: 300px;
        width: calc(100% - 300px);
        padding-bottom: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .all-orders{
        width: 80%;
        border-collapse: collapse;
    }
    .completed-orders{
        margin-top: 4rem;
    }
    .all-orders>caption{
        margin-bottom: 2rem;
        font-size: 2rem;
        font-weight: bolder;
    }
    .order-heading{
        border-top: 2px solid gray;
    }
    .each-order{
        border-bottom: 1px solid black;
    }
    .each-order>th{
        text-align: left;
    }
    .each-order>td, .each-order>th{
        font-size: 1.1rem;
        padding: 10px;
    }
    td.customer-name{
        text-transform: capitalize;
    }
    td.form{
        text-align: center;
    }
    td.form>form{
        display: inline;
    }

    .mark-complete-btn, .order-details-btn{
        cursor: pointer;
        border: none;
        background: transparent;
    }
    .mark-complete-btn>i{
        font-size: 2rem;
        font-weight: bolder;
    }
    .order-details-btn>i{
        font-size: 1.5rem;
        color: #3d3b3b;
    }
    .order-details-btn:hover  i.bx-detail{
        transform: scale(1.2);
        color: black;
    }
    .mark-complete-btn:hover  i.bx-check{
        transform: scale(1.5);
        color: green;
    }
</style>
</body>

</html>