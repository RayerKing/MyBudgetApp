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
    <title>Registrace</title>
</head>

<body>
    <header>
        <a href="../../index.php" class="logo">
            <h1><i class="fa-solid fa-sack-dollar"></i> MyBudgetApp</h1>
        </a>
        <nav>
            <a href="register.php" class="active">Registrace</a>
            <a href="login.php">Přihlášení</a>
        </nav>
    </header>
    <main>

        <section class="auth-wrap">
            <form action="../../../auth/register.php" method="post" class="card auth-card">
                <fieldset>
                    <legend>Registrace</legend>

                    <div class="form-group">
                        <label for="userNameReg"><i class="fa-solid fa-circle-user"></i> Přihlašovací jméno</label>
                        <input type="text" id="userNameReg" name="userNameReg" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nameReg"><i class="fa-regular fa-user"></i> Jméno</label>
                            <input type="text" id="nameReg" name="nameReg" autocomplete="given-name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastNameReg"><i class="fa-regular fa-user"></i> Příjmení</label>
                            <input type="text" id="lastNameReg" name="lastNameReg" autocomplete="family-name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emailReg"><i class="fa-solid fa-envelope"></i> E-mail</label>
                        <input type="email" id="emailReg" name="emailReg" autocomplete="email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="passwordReg"><i class="fa-solid fa-lock"></i> Heslo</label>
                            <input type="password" id="passwordReg" name="passwordReg" minlength="8" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirmReg"><i class="fa-solid fa-lock"></i> Potvrdit heslo</label>
                            <input type="password" id="passwordConfirmReg" name="passwordConfirmReg" minlength="8" required>
                        </div>
                    </div>

                    <button type="submit" class="btn primary">Registrovat</button>
                    <p class="hint">Máte účet? <a href="login.php">Přihlaste se</a></p>
                    <?php

                    if (isset($_SESSION["flashRegister"])): ?>
                        <p class="flashMessage"><?= htmlspecialchars($_SESSION["flashRegister"], ENT_QUOTES) ?></p>
                        <?php
                        unset($_SESSION["flashRegister"]); ?>

                    <?php endif; ?>

                </fieldset>
            </form>
        </section>



        <?php

        include "../../../partials/footer.php";

        ?>