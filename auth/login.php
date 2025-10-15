<?php

session_start();

include "../config/database.php";


?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim(filter_input(INPUT_POST, "userNameLog", FILTER_SANITIZE_SPECIAL_CHARS));
    $password = $_POST["passwordLog"];

    $stmt = $connection->prepare("SELECT id, firstName, lastName, password_hash, created_at, updated_at FROM users WHERE userName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $firstName, $lastName, $password_hash, $createdAt, $updatedAt);
        $stmt->fetch();

        if (password_verify($password, $password_hash)) {
            $_SESSION["id"] = $id;
            $_SESSION["firstName"] = $firstName;
            $_SESSION["lastName"] = $lastName;
            $_SESSION["username"] = $username;
            $_SESSION["createdAt"] = $createdAt;
            $_SESSION["updatedAt"] = $updatedAt;

            header("Location: ../public/app/dashboard.php");
            exit;
        }
    } else {
        $_SESSION["flashLogin"] = "Neplatné přihlašovací údaje.";
        header("Location: ../public/views/auth/login.php");
        exit;
    }

    $stmt->close();
    $connection->close();

}




?>