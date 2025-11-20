<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
if(!isset($_SESSION["id"])){
    header("Location: auth/login.php");
    exit;
}
}
?>

<?php

include "../app/partials/header.php";

?>

<div class="get_help">

    <div class="title_help">
        <h2>Nápověda</h2>
        <p class="subtitle_help">Základní přehled funkcí MyBudgetApp</p>
    </div>

    <div class="article_help">
        <h3>O čem je MyBudgetApp</h3>
        <div class="text_help">
            MyBudgetApp je jednoduchá a přehledná aplikace pro sledování osobních financí.
            Umožňuje zapisovat příjmy i výdaje, zobrazit přehled za konkrétní období
            a mít jasno ve svém finančním chování. Cílem je pomoci udržet pořádek v penězích a mít vše na jednom místě.
        </div>
    </div>

    <div class="article_help">
        <h3>Práce s transakcemi</h3>
        <div class="text_help">
            <ul class="help_list">
                <li>
                    <h4>Zobrazení všech transakcí</h4>
                    <div class="li_text">
                        <button class="all_button none_button help_btn"><i class="fa-solid fa-list"></i> Zobrazit všechny</button>
                        <p>Toto tlačítko zobrazí kompletní seznam všech transakcí bez ohledu na zvolený měsíc.</p>
                    </div>
                </li>

                <li>
                    <h4>Přidání transakce</h4>
                    <div class="li_text">
                        <button class="all_button none_button help_btn"><i class="fa-regular fa-square-plus"></i> Přidat transakci</button>
                        <p>Slouží k vytvoření nové transakce. Otevře formulář, kde doplníte název, částku, typ a datum.</p>
                    </div>
                </li>

                <li>
                    <h4>Úprava transakce</h4>
                    <div class="li_text">
                        <button class="overview_buttons btn_edit none_button help_icon_btn"><i class="fa-solid fa-pencil"></i></button>
                        <p>Upraví vybranou transakci. Lze změnit částku, název, popis, kategorii i datum.</p>
                    </div>
                </li>

                <li>
                    <h4>Smazání transakce</h4>
                    <div class="li_text">
                        <button class="overview_buttons btn_delete none_button help_icon_btn"><i class="fa-solid fa-xmark"></i></button>
                        <p>Trvale smaže transakci z databáze. Před smazáním vás aplikace požádá o potvrzení.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="article_help">
        <h3>Práce s časem</h3>
        <div class="text_help">
            <ul class="help_list">
                <li>
                    <h4>Výběr měsíce</h4>
                    <div class="li_text">
                        <p>V horním panelu můžete jednoduše přepínat mezi jednotlivými měsíci nebo si zvolit vlastní rozsah od–do.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="article_help">
        <h3>Bubliny</h3>
        <div class="text_help">
            <ul class="help_list">
                <li>
                    <h4>Příjem</h4>
                    <div class="li_text">
                        <p>Zelená bublina ukazuje celkový součet příjmů za vybrané období.</p>
                    </div>
                </li>

                <li>
                    <h4>Výdaje</h4>
                    <div class="li_text">
                        <p>Červená bublina zobrazuje celkový součet výdajů. Pokud na ni kliknete, zobrazí se procentuální využití příjmů.</p>
                    </div>
                </li>

                <li>
                    <h4>Rozdíl</h4>
                    <div class="li_text">
                        <p>Modrá bublina znázorňuje aktuální rozdíl mezi příjmy a výdaji. Kliknutí ukáže dostupný zůstatek k využití.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>


<?php

include "../app/partials/footer.php";

?>