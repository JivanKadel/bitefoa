<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main class="no-full-bleed main-content">
    <div class="handwritten about-container">
        <h1>About Bitefoa -- Find Your Taste</h1>
        <p>Welcome to <strong>Bitefoa -- Find Your Taste</strong>, where we believe in the power of food to bring people together. Our restaurant is more than just a place to eat. It's a community hub, a place where friends and family gather to enjoy delicious meals and create lasting memories.</p>
        <h2 class="about-heading">Opening Hours</h2>
        <ul class="opening-hours hand-drawn-border">
            <li>Monday to Friday: 11:00 AM - 10:00 PM</li>
            <li>Saturday: 9:00 AM - 11:00 PM</li>
            <li>Sunday: 9:00 AM - 9:00 PM</li>
        </ul>
        <h2 class="about-heading">Location</h2>
        <p>We are conveniently located at the heart of the city, Minbhawan Marg, Baneshwor making it easy for you to find us. Just follow the aroma of our delicious food!</p>
        <h2 class="about-heading">Special Offers</h2>
        <p>At <strong>Bitefoa -- Find Your Taste</strong>, we believe in giving back to our customers. That's why we have special offers every week. Be sure to check our website regularly for the latest deals!</p>
        <ul class="opening-hours hand-drawn-border">
            <li>2<sup>nd</sup> order this month : 10% off on all items</li>
            <li>3<sup>rd</sup> order this month : 20% off on all items</li>
            <li>4<sup>th</sup> or more order this month : 35% off on all items</li>
        </ul>
        <p class="terms-conditions">*Please order / reserve with correct info to claim discounts</p>
        <h2 class="about-heading">Attractions</h2>
        <div class="hand-drawn-border">
            <p>Our restaurant is not just about food. We also offer a unique dining experience with our hand-drawn decor and warm, welcoming atmosphere. Every corner of our restaurant tells a story, and we invite you to be a part of it.</p>
            <p>We look forward to serving you at <strong>Bitefoa -- Find Your Taste</strong>!</p>
        </div>
    </div>
</main>
<style>
    .about-container {
        margin-left: auto;
        margin-right: auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        padding: 3rem 3.75rem;
        max-width: 800px;
    }

    .about-heading {
        margin-bottom: 0.3rem;
    }

    .handwritten {
        font-family: 'Permanent Marker', cursive;
        font-size: 1.2em;
    }

    .opening-hours {
        color: #614126;
        list-style: none;
    }

    .terms-conditions {
        font-size: 0.8rem;
        margin-top: 0;
    }
</style>

<?php require('partials/footer.php') ?>