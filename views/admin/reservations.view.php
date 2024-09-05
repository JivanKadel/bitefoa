<?php require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>

<main class="reservations-overview">

    <table class="all-reservations">
        <caption>Pending Reservations</caption>
        <tr class="each-reservation reservation-heading">
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Total Seats</th>
            <th>Mark complete</th>
        </tr>
        <?php foreach ($pending as $reservation) : ?>
            <tr class="each-reservation">
                <td class="customer-name">
                    <?= $reservation['user_name'] ?>
                </td>
                <td>
                    <?= $reservation['user_phone'] ?>
                </td>
                <td>
                    <?= $reservation['address']  ?>
                </td>
                <td class="total-seats">
                    <?= $reservation['seats'] ?>
                </td>
                <td class="form">
                    <form action="/admin/reservation/complete" method="post">
                        <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                        <button type="submit" class="mark-complete-btn">
                            <i class='bx bx-check' ></i>
                        </button>
                    </form>
                </td>
                <td class="form">
                    <form action="/admin/reservation" method="get">
                        <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                        <button type="submit" class="reservation-details-btn">
                            <i class='bx bx-detail' ></i>
                        </button>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
    <table class="all-reservations completed-reservations">
        <caption>Completed Reservations</caption>
        <tr class="each-reservation reservation-heading">
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th class="total-seats-completed">Total seats</th>
        </tr>
        <?php foreach ($completed as $reservation) : ?>
            <tr class="each-reservation">
                <td class="customer-name">
                    <?= $reservation['user_name'] ?>
                </td>
                <td>
                    <?= $reservation['user_phone'] ?>
                </td>
                <td>
                    <?= $reservation['address']  ?>
                </td>
                <td class="total-seats-completed">
                    <?= $reservation['seats'] ?>
                </td>
                <td class="form">
                    <form action="/admin/reservation" method="get">
                        <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                        <button type="submit" class="reservation-details-btn">
                            <i class='bx bx-detail' ></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<style>
    .reservations-overview{
        margin-top: 4rem;
        margin-left: 300px;
        width: calc(100% - 300px);
        padding-bottom: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .all-reservations{
        width: 80%;
        border-collapse: collapse;
    }
    .completed-reservations{
        margin-top: 4rem;
    }
    .all-reservations>caption{
        margin-bottom: 2rem;
        font-size: 2rem;
        font-weight: bolder;
    }
    .reservation-heading{
        border-top: 2px solid gray;
    }
    .each-reservation{
        border-bottom: 1px solid black;
    }
    .each-reservation>th{
        text-align: left;
    }
    .each-reservation>td, .each-reservation>th{
        font-size: 1.1rem;
        padding: 10px;
    }
    td.customer-name{
        text-transform: capitalize;
    }
    td.total-seats{
        text-align: center;
    }
    th.total-seats-completed, td.total-seats-completed{
        text-align: center;
    }
    td.form{
        text-align: center;
    }
    td.form>form{
        display: inline;
    }

    .mark-complete-btn, .reservation-details-btn{
        cursor: pointer;
        border: none;
        background: transparent;
    }
    .mark-complete-btn>i{
        font-size: 2rem;
        font-weight: bolder;
    }
    .reservation-details-btn>i{
        font-size: 1.5rem;
        color: #3d3b3b;
    }
    .reservation-details-btn:hover  i.bx-detail{
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
