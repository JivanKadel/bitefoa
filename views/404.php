<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main class="error-container">
    <div>
        <p class="center"><i class='bx bxs-error'></i></p>
        <h1 class="center">Sorry. Page Not Found.</h1>
        <p class="center">
            <a href="/" class="">Go back home.</a>
        </p>
    </div>
    <style>
        .error-container{
            width: 100%;
            height: 80vh;
            display: grid;
            place-content: center;
        }
        .center{
            text-align: center;
        }
        p.center>i{
            font-size: 5rem;
        }
    </style>
</main>

<?php require('partials/footer.php') ?>