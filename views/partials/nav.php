<header class="no-full-bleed">
    <div class="container">
        <div class="logo">
            <!-- C:\laragon\www\FourthProject\refactor\views\assets\images\logo-img.jpg -->
            <img id="logo-img" src="https://i.ibb.co/cCXLztq/logo-img.jpg" alt="Bitefoa Logo" />
        </div>
        <nav class="nav-links">
            <a href="/" class="nav-link <?= urlIs('/') ? 'active' : 'else-class-name' ?> ">Home</a>
            <a href="/about" class="nav-link <?= urlIs('/about') ? 'active' : 'else-class-name' ?>">About</a>
            <a href="/menus" class="nav-link <?= urlIs('/menus') ? 'active' : 'else-class-name'  ?> ">menus</a>
            <a href="/reserve" class="nav-link <?= urlIs('/reserve') ? 'active' : 'else-class-name'  ?> ">Reserve</a>
        </nav>
    </div>
</header>
<style>
    :root {
        font-size: 16px;
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'Comic Sans MS', cursive;
        background-color: #f4f4f4;
        color: #000;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.3rem 0.75rem;
        border-bottom: 3px #777 dashed;
    }

    #logo-img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 2px solid rebeccapurple;
        transition: transform 3.5s ease-in-out;
    }

    #logo-img:hover {
        transform: rotate(360deg);
    }

    nav {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    .nav-link {
        text-decoration: none;
        border-bottom: 2px solid black;
        padding: 0.3rem;
    }

    .nav-link:hover {
        color: navy;
        border-bottom: none;
    }

    .active{
        color: green;
        border: 1px solid green;
        text-decoration: none;
    }
</style>