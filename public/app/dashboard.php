<?php
session_start();
if (empty($_SESSION["username"])) {
    header("Location: ../views/auth/login.php");
    exit;
}

include "partials/header.php";

?>

<body>
    <form action="../../auth/logout.php" method="post">
        <button type="submit">Odhlásit</button>
        
    </form>
</body>

</html>