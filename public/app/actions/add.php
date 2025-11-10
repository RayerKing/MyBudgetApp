<?php

// === VLOŽENÍ NOVÝCH TRANSAKCÍ DO DATABÁZE === 

include "../../../config/database.php";

// kontrola session
if (!isset($_SESSION)) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // načtení dat z inputů z javascriptu
    $transaction_name = trim($_POST["transaction_name"]);
    $transaction_description = trim($_POST["transaction_description"]);
    $transaction_category = trim($_POST["transaction_category"]);
    $transaction_value = $_POST["transaction_value"];
    $transaction_date = trim($_POST["transaction_date"]);

    $user_id = $_SESSION["id"];

    // rozdělení příjmů a vyýdajů pro uložení do databáze, aby to nemusel dělat uživatel 
    $kind;

    if ($transaction_category == "prijem") {
        $kind = "plus";
    } else {
        $kind = "minus";
    }

    // připravení insertu
    $stmt = $connection->prepare("INSERT INTO transactions (user_id, name, description, kind, value, category, transaction_date) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param(
        "isssdss",
        $user_id,
        $transaction_name,
        $transaction_description,
        $kind,
        $transaction_value,
        $transaction_category,
        $transaction_date
    );
    $stmt->execute();



    $stmt->close();
    $connection->close();

    // redirect zpět na tables
    header("Location: ");
    exit;
}