<?php

require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <h2 class="login-title">Login</h2>

    <fieldset>
        <form class="login-form" action="/session" method="POST">
            <div>
                <label for="email" class="">Email address</label>
                <div>
                    <input value="<?= old('email') ?>" id="email" name="email" type="email" autocomplete="email" required>
                </div>
                <?php if (isset($errors['email'])) : ?>
                    <p class="error-message"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>

            <div>
                <div>
                    <label for="password" class="">Password</label>
                </div>
                <div>
                    <input id="password" name="password" type="password" autocomplete="current-password" required>
                </div>
                <?php if (isset($errors['password'])) : ?>
                    <p class="error-message"><?= $errors['password'] ?></p>
                <?php endif; ?>
            </div>

            <div class="btn-container">
                <button type="submit" class="">Login</button>
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

    .login-form {
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
        padding: 1rem;
    }

    .login-form * {
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