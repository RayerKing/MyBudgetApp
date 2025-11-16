<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php

include "../app/partials/header.php";


?>

<div class="user_info">
    <h2 class="user_title">Informace o uživateli</h2>

    <div class="user_card">
        <table class="table_option">
            <tbody>
                <tr>
                    <th>Jméno</th>
                    <td><?= htmlspecialchars($_SESSION["firstName"]) ?></td>
                </tr>
                <tr>
                    <th>Příjmení</th>
                    <td><?= htmlspecialchars($_SESSION["lastName"]) ?></td>
                </tr>
                <tr>
                    <th>Přezdívka</th>
                    <td><?= htmlspecialchars($_SESSION["username"]) ?></td>
                </tr>
                <tr>
                    <th>Vytvořeno</th>
                    <td><?= htmlspecialchars($_SESSION["createdAt"]) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<?php

include "../app/partials/footer.php";

?>