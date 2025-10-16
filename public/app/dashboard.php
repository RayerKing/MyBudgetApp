<?php
session_start();
if (empty($_SESSION["username"])) {
    header("Location: ../views/auth/login.php");
    exit;
}

include "partials/header.php";

?>


    

    <?php

    include "partials/footer.php";

    ?>