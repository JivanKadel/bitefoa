<?php use Core\Session;

require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

    <main>
        <h2 class="login-title">Your Info</h2>
        <?php if(isset($errors['orders'])): ?>
            <div class="cart-error">
                <h1><?= $errors['orders'] ?></h1>
                <a href="/menus">Back to menus</a>
            </div>
        <?php endif; ?>
        <fieldset>
            <form class="checkout-form" action="/invoice" method="POST">
                <input type="hidden" name="orders" value="" class="send-cart">
                <div>
                    <label for="name" class="">Full Name</label>
                    <div>
                        <input value="<?= Session::get('old')['name'] ?? '' ?>" id="name" name="name" type="text" autocomplete="name" required>
                    </div>
                    <?php if (isset($errors['name'])) : ?>
                        <p class="error-message"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <div>
                        <label for="phone" class="">Mobile Number</label>
                    </div>
                    <div>
                        <input value="<?= Session::get('old')['phone'] ?? '' ?>" id="phone" name="phone" type="tel" autocomplete="phone" minlength="9" maxlength="14" required>
                    </div>
                    <?php if (isset($errors['phone'])) : ?>
                        <p class="error-message"><?= $errors['phone'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <div>
                        <label for="address" class="">Address</label>
                    </div>
                    <div>
                        <input value="<?= Session::get('old')['address'] ?? '' ?>" id="address" name="address" type="text" autocomplete="address" required>
                    </div>
                    <?php if (isset($errors['address'])) : ?>
                        <p class="error-message"><?= $errors['address'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="btn-container">
                    <button type="submit" class="continue-to-payment-btn">Continue to Payment</button>
                </div>
            </form>
        </fieldset>
        <aside class="discount-info-container hand-drawn-border">
            <p>Please enter correct info to claim discount in subsequent orders</p>
            <ul class="discount-info">
                <li>2<sup>nd</sup> order this month : 10% off on all items</li>
                <li>3<sup>rd</sup> order this month : 20% off on all items</li>
                <li>4<sup>th</sup> or more order this month : 35% off on all items</li>
            </ul>
        </aside>
    </main>
    <script defer>
        const cart = localStorage.getItem('cart') || '';
        const input = document.querySelector('.send-cart');
        input.setAttribute('value', cart);
    </script>
    <style>
        main {
            position: relative;
            margin-top: 2rem;
            padding-bottom: 1.3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .cart-error{
            position: fixed;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 3;
            width: 100vw;
            height: 100vh;
            background-color: white;
        }
        .cart-error>h1{
            text-align: center;
        }

        .login-title {
            font-size: 2.4rem;
        }

        fieldset {
            border-radius: 0.4rem;
        }

        .checkout-form {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            padding: 1rem;
        }

        .checkout-form * {
            font-size: 1.4rem;
        }

        .btn-container>button {
            width: 100%;
            margin-top: 1rem;
            margin-bottom: 0.75rem;
        }

        .error-message {
            color: hsl(19deg 100% 50%);
            font-size: 0.7rem;
            margin-top: 0;
        }
        .continue-to-payment-btn{
            padding: 0.4rem;
            background-color: #1DA1F2;
            border: none;
            border-radius: 5px;
            color: white;
        }
        .continue-to-payment-btn:hover{
            background-color: #0e8cdb;
            border-radius: 7px;
            cursor: pointer;
        }
        .discount-info-container{
            position: absolute;
            top: 7.5rem;
            right: 2rem;
            max-width: 375px;
        }
        .discount-info-container>p{
            text-align: center;
        }
        .discount-info {
            color: #614126;
            list-style: none;
            padding-left: 0;

        }
    </style>

<?php require base_path('views/partials/footer.php') ?>