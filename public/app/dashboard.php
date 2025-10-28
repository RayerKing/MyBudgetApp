<?php

// hlavní stránka, dává vše dohromady

session_start();
if (empty($_SESSION["username"])) {
    header("Location: ../views/auth/login.php");
    exit;
}

include "partials/header.php";

?>



<?php include "views/timebar.php";

?>

<?php

include "actions/set_tables.php"

?>
<div id="wrapper">

    <?php

    include "controller/tables_control.php";

    ?>

</div>




<?php

include "partials/footer.php";

?>