<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <h2 class="login-title">Register New Admin</h2>
    <fieldset>
    <form class="register-form" action="/register" method="POST">
        <div>
            <label for="name" class="">Full Name</label>
            <div class="">
                <input value="<?= old('name') ?>" id="name" name="name" type="text" autocomplete="name" required >
            </div>
            <?php if (isset($errors['name'])) : ?>
                <p class="error-message"><?= $errors['name'] ?></p>
            <?php endif; ?>
        </div>
        <div>
            <label for="email" class="">Email address</label>
            <div class="mt-2">
                <input value="<?= old('email') ?>" id="email" name="email" type="email" autocomplete="email" required class="">
            </div>
            <?php if (isset($errors['email'])) : ?>
                <p class="error-message"><?= $errors['email'] ?></p>
            <?php endif; ?>
        </div>

        <div>
            <div class="">
                <label for="password" class="">Password</label>
            </div>
            <div class="">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="">
            </div>
            <?php if (isset($errors['password'])) : ?>
                <p class="error-message"><?= $errors['password'] ?></p>
            <?php endif; ?>
        </div>

        <div class="btn-container">
            <button type="submit" class="">Register</button>
        </div>
    </form>
    </fieldset>
</main>
    <style>
        main {
            margin-top: 2rem;
            padding-bottom: 1.3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-title {
            font-size: 2.4rem;
        }

        fieldset {
            border-radius: 0.4rem;
        }

        .register-form {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            padding: 1rem;
        }

        .register-form * {
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
    </style>
<?php require base_path('views/partials/footer.php') ?>