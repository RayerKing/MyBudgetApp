<?php

// ===========================================
// === endpoint pro AJAX pro změnu tabulek ===
// ===========================================

if (session_status() === PHP_SESSION_NONE) { session_start(); }


require_once __DIR__ . '/../actions/set_tables.php';
require_once __DIR__ . '/../views/overview_tables.php';





?>