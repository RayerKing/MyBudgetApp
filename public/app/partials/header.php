<!-- HEADER PRO DASHBOARD -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBudgetApp</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/view.css">
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <header>
        <a href="../app/dashboard.php" class="logo">
            <h1><i class="fa-solid fa-sack-dollar"></i> MyBudgetApp</h1>
        </a>
        <!-- NAVIGACE PRO UŽIVATELE + ROZBALOVACÍ MENU -->
        <nav>
            

            <a href="../app/dashboard.php" class="nav-icon" id="nav_icon_home"><i class="fa-solid fa-house"></i></a>

            <div class="user-menu">
                <button id="option-menu" class="nav-icon"><i class="fa-solid fa-bars"></i></button>

                <div class="rozbalovaciOkno opacity">
                    <button type="button" id="close-menu" class="close-menu">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                    <div class="rozbalovaciOknoRows row-avatar">
                        <i class="fa-solid fa-circle-user"></i>
                    </div>
                    <div class="rozbalovaciOknoRows row-username">
                        <?= htmlspecialchars($_SESSION["firstName"]) ?> <?= htmlspecialchars($_SESSION["lastName"]) ?>
                    </div>
                    <div class="rozbalovaciOknoRows row-settings">
                        <a href="../views/option.php" class="help_nav">
                            <div class="flex_icons_text">
                                <i class="fa-solid fa-gear"></i> Nastavení
                            </div>
                        </a>
                    </div>
                    
                    <div class="rozbalovaciOknoRows row-help">
                        <a href="../views/help.php" class="help_nav">
                            <div class="flex_icons_text">
                                <i class="fa-solid fa-circle-question"></i>Nápověda
                            </div>
                            
                        </a>
                        
                    </div>
                    <div class="rozbalovaciOknoRows">
                        <form action="../../auth/logout.php" method="post">
                            <button type="submit" id="btn-logOut" class="btn-logout">Odhlásit</button>
                        </form>
                    </div>
                </div>
            </div>

        </nav>
    </header>
    <main>