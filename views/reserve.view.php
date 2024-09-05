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
            <form class="checkout-form" action="/invoice" method="POST" onsubmit="handleDateTime()">
                <input type="hidden" name="seats" value="true">
                <input id="date-time" type="hidden" name="datetime">
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
                <div>
                    <div>
                        <label for="seats" class="">Number of seats</label>
                    </div>
                    <div>
                        <input value="<?= Session::get('old')['seats'] ?? '' ?>" id="seats" name="seats" type="number" min="1" max="8" autocomplete="seats" required>
                    </div>
                    <?php if (isset($errors['seats'])) : ?>
                        <p class="error-message"><?= $errors['seats'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <div>
                        <label for="day" class="">Date: </label>
                    </div>
                    <div>
                        <input type="date" id="day" name="day" required/>
                    </div>
                    <?php if (isset($errors['day'])) : ?>
                        <p class="error-message"><?= $errors['day'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <div>
                        <label for="time" class="">Pick time: </label>
                    </div>
                    <div>
                        <select name="time" id="time">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
<!--                            <option value="6">06</option>-->
<!--                            <option value="7">07</option>-->
                        </select>
                    </div>
                    <?php if (isset($errors['time'])) : ?>
                        <p class="error-message"><?= $errors['time'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="btn-container">
                    <button  type="submit" class="continue-to-payment-btn">Continue to Payment</button>
                </div>
            </form>
        </fieldset>
        <aside class="discount-info-container hand-drawn-border">
            <p>Please enter correct info to claim discount in subsequent reservation</p>
            <ul class="discount-info">
                <li>2<sup>nd</sup> reservation this month : 10% off on all items</li>
                <li>3<sup>rd</sup> reservation this month : 20% off on all items</li>
                <li>4<sup>th</sup> or more reservation this month : 35% off on all items</li>
            </ul>
        </aside>
<!--        <button onclick="handleDateTime()">Check</button>-->
    </main>

<script>
    function  handleDateTime(){
        const dateTimeInput = document.getElementById('date-time');
        const day = document.getElementById('day').value;
        const time = document.getElementById('time').value;
        const dateTime = new Date(day + " " + time + ":00:00");
        dateTimeInput.setAttribute('value', dateTime.getTime());
        // console.log(dateTimeInput.value);
    }
</script>

<script>
    function addDays(date, days) {
        const result = new Date(date);
        result.setDate(date.getDate() + days);
        return result;
    }
    const date = new Date();
    const correctDate = addDays(date, 1);

    const today = date.toISOString().slice(0, 10);
    const weekLater = addDays(date, 6).toISOString().slice(0, 10);
    const dayInput = document.getElementById('day');
    dayInput.setAttribute('min', today);
    dayInput.setAttribute('max', weekLater);
    // console.log(today);
    // console.log(weekLater);
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
            min-width: 400px;
        }

        .checkout-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            padding: 1rem;
        }

        .checkout-form * {
            font-size: 1.4rem;
        }

        .btn-container>button {
            width: 90%;
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
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input[type='date']{
            cursor: pointer;
        }
        input[type='date'], select, input{
            width: 90%;
        }
        select{
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.7);
            border-radius: 2px;
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
