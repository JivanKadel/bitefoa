<?php

use Core\Session;
?>
<div class="sidebar">
    <h2>Navigation</h2>
    <ul>
        <li><a href="/admin">Dashboard</a></li>
        <li><a href="/admin/menus">Menus</a></li>
        <li><a href="/admin/orders">Orders</a></li>
        <li><a href="/admin/reservations">Reservations</a></li>
        <li><a href="/admin/analytics">Analytics</a></li>
        <?php if($_SESSION['user']['email']=='admin@gmail.com'): ?>
            <li><a href="/register">Register Admin</a></li>
        <?php endif; ?>

<!--        <li><a href="/admin/settings">Settings</a></li>-->
        <form class="logout-form" action="/session" method="post">
            <input type="hidden" name="_method" value="DELETE" />
            <button class="logout-btn" title="logout">
                <svg fill="#000000" height="15px" width="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <circle cx="256" cy="114.526" r="114.526"></circle>
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M256,256c-111.619,0-202.105,90.487-202.105,202.105c0,29.765,24.13,53.895,53.895,53.895h296.421 c29.765,0,53.895-24.13,53.895-53.895C458.105,346.487,367.619,256,256,256z"></path>
                            </g>
                        </g>
                    </g>
                </svg>
            </button>
            <?= Session::get('user')['name'] ?>
            <br>
        </form>
    </ul>
</div>