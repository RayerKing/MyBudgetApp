<?php
// === END POINT pro app.js pro změnu měsíců atd. ===

if (session_status() === PHP_SESSION_NONE) { session_start(); }


require_once __DIR__ . '/../actions/set_tables.php'; 
require_once __DIR__ . '/../views/tables.php';

?>