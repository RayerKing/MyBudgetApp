<?php

// === základní struktura pro nepřihlášeného uživatele ===

include "../partials/header.php";

include "../config/database.php";


?>

<div class="guest_hero">
    <i class="fa-solid fa-piggy-bank hero_icon"></i>
    <h1>MyBudgetApp</h1>
    <p class="hero_text">
        Jednoduchá aplikace pro sledování příjmů a výdajů.
        Měj své finance pod kontrolou kdykoliv a kdekoliv.
    </p>

    <div class="hero_buttons">
        <a href="../views/register.php" class="hero_btn primary">Registrace</a>
        <a href="../views/login.php" class="hero_btn secondary">Přihlášení</a>
    </div>
</div>


<?php

include "../partials/footer.php";



?>

