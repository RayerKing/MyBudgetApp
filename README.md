# 💰 MyBudgetApp

**MyBudgetApp** je osobní webová aplikace pro správu rozpočtu, postavená na **PHP** a **MySQL**.  
Projekt ukazuje bezpečnou registraci a přihlášení uživatele s moderním designem, ošetřením vstupů a přehlednou strukturou kódu.

---

## 🚀 Funkce

- 🔐 **Registrace a přihlášení uživatele**
  - Hashování hesel pomocí `password_hash()`
  - Ošetření vstupů (`filter_input`, `trim`, `htmlspecialchars`)
  - Flash zprávy a redirect podle **PRG patternu**  

- 📬 **Flash message systém**
  - Zobrazuje hlášky o úspěchu nebo chybě  
  - Automaticky mizí po několika sekundách animací  

- 🧱 **Modulární struktura**
  - Oddělení PHP logiky a HTML zobrazení  
  - Společné části stránky (`partials/`)
  - Připojení k databázi (`config/`)

- 🎨 **Moderní a responzivní design**
  - Flexbox + Grid layout  
  - Flash zprávy jako notifikace, které neovlivňují layout  

---

## ⚙️ Instalace a spuštění (XAMPP)

1. Nakopíruj složku projektu do `htdocs` (např. `C:\xampp\htdocs\MyBudgetApp`).
2. Spusť **Apache** a **MySQL** v XAMPP Control Panelu.
3. Otevři [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
4. Vytvoř novou databázi s názvem `budgetapp`.
5. Naimportuj strukturu databáze ze souboru:  
   👉 `config/rozpocet.sql`
6. Zkopíruj soubor `config/database-example.php`  
   a přejmenuj ho na `database.php`.
7. Otevři `config/database.php` a nastav vlastní přihlašovací údaje
8. Otevři: http://localhost/MyBudgetApp/public/


