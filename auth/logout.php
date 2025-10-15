<?php
session_start();

$_SESSION = [];

session_destroy();

header('Location: ../public/views/auth/login.php');
exit;