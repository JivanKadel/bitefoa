<?php
 //password_verify($password, $user['password'])
?>

<?php require base_path('views/admin/partials/head.view.php') ?>
<?php require base_path('views/admin/partials/sidebar.view.php') ?>


<main class="edit-forms-container">
    <div class="edit-forms-wrapper">
        <h2 class="edit-title">Hello, <?= $_SESSION['user']['name'] ?></h2>
        <h2 class="edit-review">You can review your account here!</h2>
        <h2 class="edit-message">(All valid changes apply!)</h2>
        <form method="POST" action="/admin/account/edit">
            <input type="hidden" name="_method" value="patch" />
            <input type="hidden" name="id" value="<?= $id?>" />
            <div>
                <label for="name" class="">Name</label>
                <div class="">
                    <input id="name" name="name" value="<?= $name ?? '' ?>" />
                    <?php if (isset($errors['name'])) : ?>
                        <p class="error-message"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
                <label for="email" class="">Email</label>
                <div class="">
                    <input name="email" id="email" value="<?= $email ?? '' ?>">
                    <?php if (isset($errors['email'])) : ?>
                        <p class="error-message"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                <label for="password" class="">Password</label>
                <div class="">
                    <input id="password" name="password" class=""  />
                    <?php if (isset($errors['password'])) : ?>
                        <p class="error-message"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>
                <label for="new-password" class="">New Password</label>
                <div class="">
                    <input id="new-password" name="new-password" class="new-password" placeholder="If you wish to change the old one!" />
                    <?php if (isset($errors['new-password'])) : ?>
                        <p class="error-message"><?= $errors['new-password'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="edit-links">
                <a href="/admin/" type="submit" class="edit-cancel">
                    Cancel
                </a>
                <button type="submit" class="account-update-btn">
                    Update
                </button>
            </div>
        </form>
        <form method="post" action="/admin/account/delete" class="account-delete-form">
            <input type="hidden" name="_method" value="delete" />
            <input type="hidden" name="id" value="<?= $menu['id'] ?>" />
            <button type="submit" class="account-delete-btn">
                <i class='bx bxs-trash-alt'></i>
                <span class="tooltiptext">DELETE ACCOUNT?</span>
            </button>
        </form>
    </div>
    <div class="settings-info">
        <h2 class="info-icon"><i class='bx bx-info-circle' ></i></h2>
        <p>All the changes you make apply.</p>
        <p> You can change <u>all account information</u> at the same time!</p>
    </div>
</main>
<style>
    p.error-message{
        font-size: 0.7rem;
    }
    .edit-forms-container{
        margin-left: 300px;
        width: calc(100% - 300px);
        height: 100vh;
        display: grid;
        place-content: center;
    }
    .edit-forms-wrapper{
        position: relative;
        border: 2px dashed #614126;
        padding: 1rem 2rem;
    }
    .edit-forms-wrapper *{
        font-size: 1.3rem;
        padding: 0.3rem;
    }
    .edit-title{
        margin-top: 0;
        text-align: center;
    }
    .edit-review{
        margin-top: 0;
        text-align: center;
        font-size: 1rem;
    }
    .edit-message{
        margin-top: 0;
        text-align: center;
        font-size: 0.7rem;
        color: firebrick;
    }

    /*.categories{*/
    /*    width: 100%;*/
    /*    background-color: white;*/
    /*    border: 1px solid black;*/
    /*}*/
    .edit-links{
        margin-top: 1rem;
        display: flex;
        justify-content: flex-start;
        gap: 0.6rem;
    }

    .new-password::placeholder{
        font-size: 0.7rem;
        color: red;
    }

    .edit-cancel{
        color: black;
        background: white;
        text-decoration: none;
        cursor: pointer;
    }
    .edit-cancel:hover{
        color: black;
        background: #cdc8c8;
    }
    .account-update-btn{
        background: #30397f;
        color: white;
        border: 2px solid blue;
        border-radius: 5px;
        cursor: pointer;
    }
    .account-update-btn:hover{
        background: #293598;
        border-radius: 7px;
    }

    .account-delete-form{
        position: absolute;
        bottom: 18px;
        right: 1.5rem;
    }

    .account-delete-btn{
        position: relative;
        background: transparent;
        color: #e50c0c;
        cursor: pointer;
        border: 2px solid red;
        border-radius: 50%;
    }
    .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: white;
        color: #b61717;
        border: red 2px solid;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        top: 150%;
        left: 50%;
        margin-left: -60px;
    }

    .tooltiptext::after {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent red transparent;
    }

    .account-delete-btn:hover .tooltiptext {
        visibility: visible;
    }
    .account-delete-btn>i{
        font-size: 1.5rem;
    }
    .account-delete-btn:hover{
        font-size: 1.6rem;
    }

    .settings-info{
        max-width: 200px;
        position: absolute;
        top: 6rem;
        right: 2rem;
        border: 2px solid darkred;
        border-radius: 5px;
        padding: 5px;
    }
    .settings-info>.info-icon{
        text-align: center;
    }
    .info-icon>i{
        color: #ca1010;
        font-size: 2rem;
    }
    u{
        color: red;
        text-decoration-color: firebrick;
    }
</style>
