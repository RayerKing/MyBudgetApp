<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../assets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Přihlášení</title>
</head>

<body>
    <header>
        <a href="../../index.php" class="logo">
            <h1><i class="fa-solid fa-sack-dollar"></i> MyBudgetApp</h1>
        </a>
        <nav>
            <a href="register.php">Registrace</a>
            <a href="login.php" class="active">Přihlášení</a>
        </nav>
    </header>
    <main>

        <section class="auth-wrap">
            <form action="../../../auth/login.php" method="post" class="card auth-card">
                <fieldset>
                    
                    <legend>Přihlášení</legend>

                    <div class="form-group">
                        <label for="userNameLog"><i class="fa-solid fa-circle-user"></i> Přihlašovací jméno</label>
                        <input type="text" id="userNameLog" name="userNameLog" autocomplete="username" required>
                    </div>



                    <div class="form-group">
                        <label for="passwordLog"><i class="fa-solid fa-lock"></i> Heslo</label>
                        <input type="password" id="passwordLog" name="passwordLog" autocomplete="current-password" required>
                    </div>



                    <button type="submit" class="btn primary">Přihlásit</button>
                    <p class="hint">Nemáte účet? <a href="register.php">Registrujte se</a></p>

                    <?php

                    if (isset($_SESSION["flashLogin"])): ?>
                        <p class="flashMessage"><?= htmlspecialchars($_SESSION["flashLogin"], ENT_QUOTES) ?></p>
                        <?php
                        unset($_SESSION["flashLogin"]); ?>

                    <?php endif; ?>

                </fieldset>
            </form>
        </section>



        <?php

        include "../../../partials/footer.php";

        ?>