<?php
require base_path('views/partials/head.php');
?>
<?php
require base_path('views/partials/nav.php');
?>

<?php //dd($seats) ?>
<main class="invoice-container">
    <div class="name-invoice-number">
        <div class="menu-title">
            <h1>BITEFOA</h1>
            <h3>FIND YOUR TASTE</h3>
        </div>
        <div class="invoice-number">
            <h2>INVOICE</h2>
            <p>#12113<?= $orderId ?? $seats ?></p>
        </div>
    </div>
    <section class="user-details">
        <div class="issued-to">
            <h3>Issued to</h3>
            <div class="customer-name">
                <p>Name</p>
                <span><?= $name ?></span>
            </div>
            <div class="customer-phone">
                <p>Phone</p>
                <span><?= $phone ?></span>
            </div>
            <div class="customer-address">
                <p>Address</p>
                <span><?= $address ?></span>
            </div>
            <div class="issued-date">
                <p>Date issued</p>
                <span><?= date("jS F, Y ") ?></span>
            </div>
            <?php if(isset($_POST['day']) && isset($_POST['time'])): ?>
                <div class="reservation-date">
                    <p>Booked date-time</p>
                    <span><?= $_POST['day']. ' at '.  $_POST['time']. ':00' ?></span>
                </div>
            <?php endif; ?>

        </div>
        <div class="payable-to">
            <h3>Payable to</h3>
            <div class="acc-name">
                <p>A/C Name</p>
                <span>Bitefoa restaurant</span>
            </div>
            <div class="acc-number">
                <p>Phone</p>
                <span>+977 9826886678</span>
            </div>
            <div class="pan">
                <p>PAN</p>
                <span>ABCDE6868F</span>
            </div>
            <div class="address">
                <p>Address</p>
                <div class="addresses">
                    <span>Near Neighbourhood</span>
                    <span>Kathmandu - 11124 Nepal</span>
                </div>
            </div>
        </div>
    </section>
    <section class="charges">
        <h2>Charges</h2>
        <table class="cart-details-table">
            <?php if(isset($_POST['seats'])): ?>
                <tr class="cart-headings-reserve">
                    <th>S.N.</th>
                    <th>Seats</th>
                    <th>Price per seat</th>
                    <th>Amount</th>
                </tr>
            <?php else: ?>
                <tr class="cart-headings-orders">
                    <th>NO.</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Units</th>
                    <th>Amount</th>
                </tr>
            <?php endif; ?>
        </table>
    </section>
    <section class="company-contacts-container">
        <p>This is a computer generated invoice. No signature is necessary.</p>
        <div class="company-contacts">
            <div class="company-phone">
                <p>Phone</p>
                <p>+977 9826886678</p>
            </div>
            <div class="company-email">
                <p>Email</p>
                <p>bitefoa@contact.com</p>
            </div>
            <div class="company-website">
                <p>Website</p>
                <p>bitefoa.com</p>
            </div>
        </div>
    </section>
</main>
    <form action="/checkout" method="post" class="payment-form">
        <input type="hidden" name="name" value="<?= $name ?>">
        <input type="hidden" name="phone" value="<?= $phone ?>">
        <input type="hidden" name="address" value="<?= $address ?>">
        <?php if(isset($seats)): ?>
            <input type="hidden" name="seats" class="send-cart" value="<?= $seats ?>">
            <input type="hidden" name="datetime" class="send-cart" value="<?= $datetime ?>">
<!--            <input type="hidden" name="time" class="send-cart" value="--><?php //= $time ?><!--">-->
        <?php else: ?>
            <input type="hidden" name="orders" class="send-cart" value="">
        <?php endif; ?>
        <button type="submit" class="payment-btn">Pay Now</button>
    </form>

<?php if(!isset($seats)): ?>
    <script defer>
        const cart = localStorage.getItem('cart') || '';
        const input = document.querySelector('.send-cart');
        input.setAttribute('value', cart);
    </script>
<?php endif; ?>

    <script>
        console.log("<?= $datetime ?>");
    </script>

<?php if(isset($_POST['seats'])): ?>
    <script>
        const cartTable = document.querySelector('.cart-details-table');
        let seats = <?= $seats ?> ;
        const tr = document.createElement('tr');
        const td1 = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
        const td4 = document.createElement('td');
        td1.textContent = '01';
        td2.textContent = seats ;
        td3.textContent = '1000';
        td4.textContent = `${seats * 1000}`;
        tr.append(td1, td2, td3, td4);
        cartTable.append(tr);

        const amountRow = document.createElement('tr');
        amountRow.setAttribute('class', 'amount-row');
        const amountTd1 = document.createElement('td');
        const amountTd2 = document.createElement('td');
        const totalTd = document.createElement('td');
        const totalAmount = document.createElement('td');
        totalTd.textContent = `Total`;
        totalAmount.textContent = td4.textContent;
        amountRow.append(amountTd1, amountTd2, totalTd, totalAmount);
        cartTable.appendChild(amountRow);
    </script>
<?php else: ?>
<script defer>
    const carts = JSON.parse(localStorage.getItem('cart'));
    const cartTable = document.querySelector('.cart-details-table');
    carts.cart.forEach((item, index)=>{
        const tr = document.createElement('tr');
        const td1 = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
        const td4 = document.createElement('td');
        const td5 = document.createElement('td');
        td1.textContent = `0${index + 1}`;
        td2.textContent = item.name;
        td3.textContent = item.price;
        td4.textContent = item.quantity;
        td5.textContent = `${item.price * item.quantity}`;

        tr.append(td1, td2, td3, td4, td5);
        cartTable.append(tr);
    });
    const tr = document.createElement('tr');
    tr.setAttribute('class', 'amount-row');
    const td1 = document.createElement('td');
    const td2 = document.createElement('td');
    const td3 = document.createElement('td');
    const totalTd = document.createElement('td');
    const totalAmount = document.createElement('td');
    totalTd.textContent = `Total`;
    totalAmount.textContent = carts.total;
    tr.append(td1, td2, td3, totalTd, totalAmount);
    cartTable.appendChild(tr);
</script>
<?php endif; ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');

        .invoice-container{
            font-family: "Playfair Display", serif;*/
            font-optical-sizing: auto;
            font-style: normal;
            margin: 3rem auto;
            max-width: 700px;
            min-width: 600px;
            border-left: 2px solid #615d5d;
            border-right: 2px solid #615d5d;
            padding: 2rem;
            background-color: #EADDD0;
        }
        .name-invoice-number{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid gray;
        }
        .invoice-number>*{
            margin: 0;
        }
        .invoice-number>h2{
            font-size: 1rem;
        }
        .invoice-number>p{
            font-size: 1.1rem;
        }
        .menu-title>h1{
            margin-top: 0;
            font-style: italic;
        }
        .user-details{
            margin-top: 2rem;
            display: flex;
            justify-content: space-between;
        }
        .issued-to, .payable-to{
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        .issued-to>*, .payable-to>*{
            margin: 0;
            padding: 0;
        }
        .issued-to>h3, .payable-to>h3{
            width: 250px;
            margin-bottom: 0.5rem;
            padding-bottom: 0.3rem;
            border-bottom: 2px solid gray;
        }

        .issued-to>div, .payable-to>div{
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .issued-to>div>p, .payable-to>div>p{
            margin-top: 0.3rem;
            font-weight: bold;
        }
        .issued-to>div>span, .payable-to>div>span, .addresses{
            display: block;
            margin-top: -0.7rem;
        }
        .customer-name, .customer-address{
            text-transform: capitalize;
        }
        .payable-to>.address>.addresses{
            display: flex;
            padding-top: 1.3rem;
            flex-direction: column;
            justify-content: flex-end;
        }
        .cart-details-table{
            width: 100%;
            border-collapse: collapse;
        }
         .cart-headings-orders{
             border-bottom: 3px solid gray;
        }
        .cart-headings-reserve{
            border-bottom: 3px solid gray;
        }
        .cart-details-table td, .cart-details-table th{
            text-align: left;
        }
        .amount-row{
            margin-top: 0.5rem;
            border-top: 2px solid gray;
            border-bottom: 2px solid gray;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .company-contacts-container{
            margin-top: 4rem;
        }
        .company-contacts-container>p{
            margin: 0 0 1rem 0;
            font-size: 0.8rem;
        }
        .company-contacts{
            display: flex;
            justify-content: space-between;
            /*gap: 3rem;*/
        }
        .company-contacts>div{
            padding-top: 0;
            display: flex;
            gap: 3rem;
            border-top: 1px solid black;
            border-bottom: 3px solid black;
        }
        .company-contacts>div>p{
            margin-top: 0;
        }
        .company-contacts>div>p:first-child{
            font-weight: bold;
        }
        .payment-form{
            max-width: 600px;
            margin: 0.3rem auto;
            border: 2px solid #615d5d;
            border-radius: 5px;
        }
        .payment-btn{
            cursor: pointer;
            width: 100%;
            font-size: 1.3rem;
            background-color: #EADDD0;
        }
        .payment-btn:hover{
            background-color: #cdbfb0;
        }
    </style>

<?php require base_path('views/partials/footer.php') ?>