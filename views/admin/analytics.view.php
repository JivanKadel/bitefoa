<?php
//dd($ordersCount[0]);
//dd($pending[0]['total'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <?php include base_path('views/admin/assets/styles.css.php') ?>
    <?php require base_path('views/partials/css.php') ?>
</head>
<body>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>

<main class="analytics-container">
    <h1>Your Analytics</h1>
    <div class="pie-charts">
        <div class="chart-container">
            <canvas id="pie-chart-orders"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="pie-chart-reservations"></canvas>
        </div>
    </div>
    <div style="margin-top: 5rem"></div>
    <div class="graph-container">
        <div class="line-graph">
            <canvas id="line-graph"></canvas>
        </div>
    </div>
</main>

<!--<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


<script defer>
    let pendingOrders = <?php echo $pendingOrders[0]['total']; ?> ;
    let completedOrders = <?php echo $completedOrders[0]['total']; ?> ;
    new Chart(document.getElementById("pie-chart-orders"), {
        type : 'pie',
        data : {
            labels : [ "Pending", "Completed" ],
            datasets : [ {
                backgroundColor : ["#FB3569", "#82CD47" ],
                data : [
                    pendingOrders,
                    completedOrders
                ]
            } ]
        },
        options: {
            title: {
                display: true,
                text: "Status of Orders"
            }
        }
    });

</script>

<script defer>
    let pendingReservations = <?php echo $pendingReservations[0]['total']; ?> ;
    let completedReservations = <?php echo $completedReservations[0]['total']; ?> ;
    new Chart(document.getElementById("pie-chart-reservations"), {
        type : 'pie',
        data : {
            labels : [ "Pending", "Completed" ],
            datasets : [ {
                backgroundColor : ["#FB3569", "#82CD47" ],
                data : [
                    pendingReservations,
                    completedReservations
                ]
            } ]
        },
        options: {
            title: {
                display: true,
                text: "Status of Reservations"
            }
        }
    });

</script>

// Line graph
<script>
    // Format days for the graph
    const today = new Date();
    const month = today.toLocaleString('default', { month: 'long' });
    const dayInNumber = today.getDate();
    console.log(month);
    console.log(dayInNumber);
    const dayValues = [`${month}-${dayInNumber-6}`, `${month}-${dayInNumber-5}`, `${month}-${dayInNumber-4}`, `${month}-${dayInNumber-3}`, `${month}-${dayInNumber-2}`, `${month}-${dayInNumber-1}`, "Today"];
    console.log(dayValues);
</script>

<script>
    const xValues = dayValues;
    const orderValues = [
        <?= $ordersCount[6] ?>,
        <?= $ordersCount[5] ?>,
        <?= $ordersCount[4] ?>,
        <?= $ordersCount[3] ?>,
        <?= $ordersCount[2] ?>,
        <?= $ordersCount[1] ?>,
        <?= $ordersCount[0] ?>
    ];
    const reservationValues = [
        <?= $reservationsCount[6] ?>,
        <?= $reservationsCount[5] ?>,
        <?= $reservationsCount[4] ?>,
        <?= $reservationsCount[3] ?>,
        <?= $reservationsCount[2] ?>,
        <?= $reservationsCount[1] ?>,
        <?= $reservationsCount[0] ?>
    ];

    new Chart("line-graph", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                label : 'Orders',
                fill: false,
                // lineTension: 0,
                backgroundColor: "green",
                borderColor: "#82CD47",
                data: orderValues
            },
                {
                label : 'Reservations',
                fill: false,
                // lineTension: 0,
                backgroundColor: "red",
                borderColor: "#FB3569",
                data: reservationValues
            }]
        },
        options: {
            responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: "This week's orders and reservations"
                }
        }
    });
</script>
<style>
    main.analytics-container{
        margin-top: 1rem;
        margin-left: 200px;
        width: calc(100% - 225px);
        padding-bottom: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .analytics-container>h1{
        margin-bottom: 3rem;
    }
    .chart-container{
        max-width: 45%;
        border: 2px solid gray;
        padding: 2rem;
    }
    .graph-container{
        margin-left: 6rem;
        display: flex;
        justify-content: center;
        max-width: 950px;
        border: 2px solid gray;
        padding: 2rem;
    }
    .line-graph{
        max-width: 100%;
    }
    .pie-charts{
        margin-left: 0;
        max-width: 950px;
        display: flex;
        gap: 2rem;
    }
</style>
</body>b
</html>