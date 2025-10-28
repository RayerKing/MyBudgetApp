<?php

// === LOGIKA PRO TVORBU TABULEK ===

require_once __DIR__ . '/../../../config/database.php';


?>
<?php

// pro načtení dat timebaru do proměnných

$month = $_GET["month"] ?? date("Y-m");
$od = $_GET["od"] ?? null;
$do = $_GET["do"] ?? null;
$step = $_GET["step"] ?? null;
$apply  = isset($_GET['applyRange']);

$start = null;
$end = null;

// podminka pro dobu od-do
if ($apply && $od && $do) {
    $from = DateTime::createFromFormat("Y-m-d", $od);
    $to = DateTime::createFromFormat("Y-m-d", $do);

    $start = $from->format("Y-m-d");
    $end = $to->format("Y-m-d");
}

// zakladni vypocitani doby pro mesic
if ($start == null || $end == null) {
    $basicMonth = DateTime::createFromFormat("Y-m", $month);

    $start = $basicMonth->format("Y-m-01");
    $copy = clone $basicMonth;
    $end = $copy->modify("last day of this month")->format("Y-m-d");
}


// dotaz pro načtení všech dat uživatele v určitém rozsahu

$stmt = $connection->prepare("SELECT * FROM transactions WHERE user_id = ? 
AND transaction_date BETWEEN ? AND ?
ORDER BY transaction_date DESC");
$stmt->bind_param("iss", $_SESSION["id"], $start, $end);
$stmt->execute();

$result = $stmt->get_result();
$stmt->close();


$rows = $result->fetch_all(MYSQLI_ASSOC);
$count = count($rows);
?>

<?php

// proměnná pro user_id
$user_id = $_SESSION["id"];

// sloupec kategorie, kde je ENUM... pole představuje hodnoty v ENUM
$category = array("doprava", "jidlo", "zabava", "najem", "prijem", "sporeni", "ostatni");

// sem se uloží vytažená data z databáze
$categories = [];

// načtení dat, kde kategorie je doprava
$stmt = $connection->prepare("SELECT * FROM transactions WHERE user_id = ?
AND category = ? AND transaction_date BETWEEN ? AND ? ORDER BY transaction_date DESC");

// funkce foreach, ktera projde vsechny kategorie
foreach ($category as $x) {
    $stmt->bind_param("isss", $user_id, $x, $start, $end);
    $stmt->execute();
    $res = $stmt->get_result();
    $categories[$x] = $res->fetch_all(MYSQLI_ASSOC);
    $res->free();
}
$stmt->close();
?>

