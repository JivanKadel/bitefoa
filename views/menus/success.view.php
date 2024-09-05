<?php if(isset($_SESSION['success']) && $_SESSION['success']==='true'): ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="success">
        <h1>The transaction was successful</h1>
        <a href="/">Back to home</a>
    </div>
    <style>
        .success{
            margin: 4rem auto;
            max-width: 650px;
            background-color: #e5faf3;
            border-left: 2px solid #00cc88;
            padding: 2rem;
            font-size: 3rem;
            border-radius: 1rem;
            text-align: center;
        }
    </style>
    <script>
        localStorage.removeItem('cart');
    </script>
</body>
</html>
<?php else: header('location: /menus'); ?>
<?php endif; ?>