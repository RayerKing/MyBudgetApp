<?php

// === REGISTRACE UŽIVATELE === 

session_start();

include "../config/database.php";

?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $username = trim(filter_input(INPUT_POST, "userNameReg", FILTER_SANITIZE_SPECIAL_CHARS));
    $name = trim(filter_input(INPUT_POST, "nameReg", FILTER_SANITIZE_SPECIAL_CHARS));
    $lastname = trim(filter_input(INPUT_POST, "lastNameReg", FILTER_SANITIZE_SPECIAL_CHARS));
    $password = $_POST["passwordReg"];
    $confirmPassword = $_POST["passwordConfirmReg"];
    $email = trim(filter_input(INPUT_POST, "emailReg", FILTER_SANITIZE_EMAIL));


    $emailExists = $connection->prepare("SELECT email FROM users WHERE email = ?");

    $emailExists->bind_param("s", $email);

    $emailExists->execute();

    $emailExists->store_result();

    // porovnání emailu, zda jeste neni vyuzivan
    if ($emailExists->num_rows > 0) {
        $_SESSION["flashRegister"] = "E-mail už je používán!";
        header("Location: ../public/views/auth/register.php");
        exit;
    } else {
        // kontrrola delky hesla
        if (strlen($password) < 8) {
            $_SESSION["flashRegister"] = "Příliš krátké heslo! Vložte minimálně 8 znaků!";
            header("Location: ../public/views/auth/register.php");
            exit;
        }
        // kontrola shody u hesel
        else if ($password !== $confirmPassword) {
            $_SESSION["flashRegister"] = "Hesla se neshodují!";
            header("Location: ../public/views/auth/register.php");
            exit;
        } else {

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $connection->prepare("INSERT INTO users (userName, firstName, lastName, password_hash,
        email) VALUES (?,?,?,?,?) ");

            $stmt->bind_param("sssss", $username, $name, $lastname, $hash, $email);

            if ($stmt->execute()) {
                $_SESSION["flashRegister"] = "Registrace proběhla úspěšně. Nyní se můžete přihlásit.";


                header("Location: ../public/views/auth/register.php");
                exit;
            } else {

                $_SESSION["flashRegister"] = "Něco se nepovedlo.";
                header("Location: ../public/views/auth/register.php");
                exit;
            }

            $stmt->close();
        }
    }
    $emailExists->close();
    $connection->close();
}

?>