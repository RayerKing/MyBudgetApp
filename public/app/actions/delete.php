<?php

// ====================================
// === Smazání transakcí z databáze === 
// ====================================

include "../../../config/database.php";

// kontrola session
if (!isset($_SESSION)) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // načtení id transakce z javascriptu
    $transaction_data_id = $_POST["transaction_data_id"];

    // načtení id uživatele
    $user_id = $_SESSION["id"];

    // připravení delete dotazu pro sql
    $stmt = $connection->prepare("DELETE FROM transactions WHERE user_id = ? AND id = ?");
    $stmt->bind_param(
        "ii",
        $user_id,
        $transaction_data_id
    );
    $stmt->execute();

    

    $stmt->close();
    $connection->close();

    // vrácení stavu
    header("Content-Type: application/json");

    echo json_encode(["ok" => true]);
    exit;
}