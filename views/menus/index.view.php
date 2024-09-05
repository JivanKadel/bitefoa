<?php
if(isset($_SESSION['success'])){
    $_SESSION['success'] = '';
}
?>
 <?php
    require base_path('views/partials/head.php');
    ?>
 <?php
    require base_path('views/partials/nav.php');
    ?>
 <?php $count = 0; ?>

 <main class="menu-overview">
     <h1 class="menu-title">Menus</h1>
     <div class="menu-container hand-drawn-border">
         <div class="info">
             <i class='bx bxs-info-circle'></i>
             <span class="tooltiptext">Click on the item to add to cart!</span>
         </div>
         <div>
             <?php foreach ($categories as $category) : ?>
                 <h2 class="category-name">
                     <?= htmlspecialchars($category['name']) ?>
                 </h2>
                 <?php foreach ($menus[$count] as $menu) : ?>
                     <div class="menu-items-container">
                             <button data-name="<?= $menu['name'] ?>" data-price="<?= $menu['price'] ?>" class="menu-item add-to-cart" >
                                 <span><?= $menu['name'] ?></span>
                                 <span><?= 'Rs.'. $menu['price'] ?></span>
                             </button>
                     </div>
                 <?php endforeach; ?>
                 <?php $count++ ?>
             <?php endforeach; ?>
         </div>
     </div>
    <div class="menu-info">
        <i class='bx bxs-info-circle'></i>
        <p>Click on the item to add it to cart</p>
    </div>
 </main>
 <aside class="cart">
     <h2 class="centered-text">Cart</h2>
     <ul class="cart-items">
     </ul>
     <p>Total: Rs. <span class="cart-total">0.00</span></p>
     <form action="/checkout" method="get" class="order-form no-display">
         <input type="submit" value="Order Now">
     </form>
     <button class="clear-cart">Clear Cart</button>
 </aside>
 <style>
     .menu-overview{
         position: relative;
         margin-top: 4rem;
         padding-bottom: 3rem;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
     }
     .menu-container{
         position: relative;
     }
     .info{
         position: absolute;
         top: 0.3rem;
         left: 0.3rem;
         cursor: pointer;
     }
     .info>i{
         font-size: 1.5rem;
     }
     .tooltiptext {
          visibility: hidden;
          width: 120px;
         background-color: #dfebf6;
          color: #4433ff;
          text-align: center;
          border-radius: 6px;
          padding: 5px 0;
          position: absolute;
          z-index: 1;
          top: 150%;
          left: 50%;
          margin-left: -60px;
         transition: border-color 2s ease;
     }

     .tooltiptext::after {
         content: "";
         position: absolute;
         bottom: 100%;
         left: 50%;
         margin-left: -5px;
         border-width: 5px;
         border-style: solid;
         border-color: transparent transparent #dfebf6 transparent;
     }

     .info:hover .tooltiptext {
         visibility: visible;
         border: #dfebf6 2px solid;
     }
     .menu-title, .category-name{
         text-align: center;
     }
     .menu-items-container{
         margin: 0.4rem;
         display: flex;
         flex-direction: column;
         gap: 0.4rem;
         background: transparent;
     }
     .menu-item{
         text-decoration: none;
         color: black;
         cursor: pointer;
         max-width: 600px;
         min-width: 400px;
         display: flex;
         justify-content: space-between;
         background: transparent;
         padding: 0.4rem;
         box-shadow: 2px 2px #ddd;
     }
     .menu-item:hover{
         box-shadow: 2px 2px #bbb;
         transform: scale(1.01);
     }
     .menu-item span{
         padding-left: 0.4rem;
         padding-right: 0.4rem;
     }

     .menu-info{
         position: relative;
         margin-top: 2rem;
         padding: 0.75rem;
         background-color: #dfebf6;
         border-left: 2px solid #4433ff;
     }
     .menu-info>i{
         color: #4433ff;
         font-size: 2rem;
         position: absolute;
         top: 0;
         left: 0;
     }
     .menu-info>p{
         margin-left: 1.5rem;
     }
     .cart {
         position: absolute;
         right: 5rem;
         top: 10rem;
         border-radius: 1rem;
         margin-top: 2rem;
         max-width: 600px;
         min-width: 200px;
         margin-left: auto;
         margin-right: auto;
         flex: 1;
         display: flex;
         flex-direction: column;
         padding: 20px;
         box-shadow: 5px 2px #ddd;
         border: 2px solid #ababab;
     }
     .cart-items {
         list-style-type: none;
         padding: 0;
         margin: 0;
     }

     .cart-items li {
         margin-bottom: 5px;
         min-width: 250px;
     }
     .cart-items li{
         display: flex;
         justify-content: space-between;
     }
     .wrap-name{
         display: flex;
         flex-wrap: wrap;
         max-width: 15ch;
     }
     .quantity{
         padding-right: 0.3rem;
     }
     .order-form{

         margin-top: 0.4rem;
         margin-bottom: 0.4rem;
     }
     .no-display{
         display: none;
     }
     .order-form, .order-form>input{
         width: 100%;
     }
     .order-form>input{
         background-color: #1DA1F2;
         border: none;
         border-radius: 5px;
         color: white;
     }
     .order-form>input:hover{
         background-color: #0e8cdb;
         border-radius: 7px;
     }
     .clear-cart, .order-form>input{
         padding: 0.3rem;
         cursor: pointer;
     }
 </style>
 <script defer>
     let cart = [];
     let total = 0;
         const addToCartButtons = document.querySelectorAll('.add-to-cart');
         const cartItemsList = document.querySelector('.cart-items');
         const cartTotal = document.querySelector('.cart-total');
         const clearCartButton = document.querySelector('.clear-cart');

         // Add item to cart
         addToCartButtons.forEach((button) => {
             button.addEventListener('click', function() {
                 const name = button.dataset.name;
                 const price = parseFloat(button.dataset.price);
                 addItemToCart(name, price);
                 updateCartUI();
                 if(cart.length===1){
                     document.querySelector('.order-form').classList.remove('no-display');
                 }
             });
         });

         // Clear cart
         clearCartButton.addEventListener('click', function() {
             cart = [];
             total = 0;
             updateCartUI();
             document.querySelector('.order-form').classList.add('no-display');
         });

         // Add item to cart array
         function addItemToCart(name, price) {
             for (let item of cart) {
                 if (item.name === name) {
                     item.quantity++;
                     return;
                 }
             }
             cart.push({
                 name,
                 price,
                 quantity: 1
             });
         }

         // Update cart UI
         function updateCartUI() {
             total = 0;
             cartItemsList.innerHTML = '';
             cart.forEach((item) => {
                 const li = document.createElement('li');
                 const span1 = document.createElement('span');
                 const span2 = document.createElement('span');
                 const span3 = document.createElement('span');
                 span1.textContent = `${item.name}`;
                 span1.className = 'wrap-name';
                 span2.textContent = `${item.quantity}` + String.fromCharCode(160)  ;
                 span2.className = 'quantity';
                 span3.textContent = String.fromCharCode(160) + `Rs. ${item.price.toFixed(2)}`;
                 li.append(span1, span2, span3);
                 cartItemsList.appendChild(li);
                 total += item.price * item.quantity;
             });
             cartTotal.textContent = total.toFixed(2);
             console.log(cart);
             console.log(total);
         }


     const orderForm = document.querySelector('.order-form');
     orderForm.addEventListener('submit', (e)=>handleOrder(e));
     function  handleOrder(){
         const cartDetails = {
                cart ,
                total
         }
         localStorage.setItem('cart', JSON.stringify(cartDetails));
     }

 </script>
 <?php require base_path('views/partials/footer.php') ?>