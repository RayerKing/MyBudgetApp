<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION["id"])){
    header("Location: ../views/auth/login.php");
    exit;
}

?>


<?php
include "partials/header.php";






?>




<?php

include "views/overview_timebar.php";

?>

<?php



?>
<div id="overview_wrapper">

    <?php

        include "controller/month_control.php";

    ?>

</div>




<?php

include "partials/footer.php";

?>