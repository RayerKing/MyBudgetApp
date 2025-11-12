<?php

// =================================
// === Edit transakce z databáze === 
// =================================

include "../../../config/database.php";

// kontrola session
if (!isset($_SESSION)) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // načtení id transakce z javascriptu
    $transaction_data_id = $_POST["transaction_id"];

    $name = $_POST["transaction_name"];
    $value = $_POST["transaction_value"];
    $category = $_POST["transaction_category"];
    $description = $_POST["transaction_description"];
    $date = $_POST["transaction_date"];
    $kind;

    if($category == "prijem"){
        $kind = "plus";
    } else {
        $kind = "minus";
    }

    

    // načtení id uživatele
    $user_id = $_SESSION["id"];

    // připravení delete dotazu pro sql
    $stmt = $connection->prepare("UPDATE transactions SET name = ?, description = ?, 
    kind = ?, value = ?, category = ?, transaction_date = ? WHERE user_id = ? AND id = ?");
    $stmt->bind_param(
        "sssdssii",
        $name,
        $description,
        $kind,
        $value,
        $category,
        $date,
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