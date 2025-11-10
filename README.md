# 💰 MyBudgetApp

**MyBudgetApp** je osobní webová aplikace pro správu rozpočtu postavená na **PHP**, **MySQL** a **JavaScriptu (AJAX)**.  
Umožňuje uživateli sledovat příjmy, výdaje a filtrovat transakce podle měsíce nebo období – **bez přenačítání celé stránky**.

---

## 🚀 Funkce

- 🔐 **Registrace a přihlášení uživatele**
  - Hashování hesel pomocí `password_hash()`
  - Ověření přihlašovacích údajů pomocí `password_verify()`
  - Ošetření vstupů přes `filter_input()` a `trim()`
  - Flash zprávy při chybě nebo úspěchu
  - Přesměrování pomocí **PRG patternu**

- 📊 **Dashboard s přehledem transakcí**
  - Zobrazení všech transakcí přihlášeného uživatele
  - Přehled rozdělený podle kategorií (např. Doprava, Jídlo, Zábava…)
  - Automatické vypočítání časového rozsahu aktuálního měsíce
  - Zobrazení posledních 3 záznamů s možností rozbalit všechny
  - Možnost přidat novou transakci
  - Početní **Bubliny** pro výpočet peněz

- 📅 **Interaktivní výběr období**
  - Výběr konkrétního měsíce pomocí `input type="month"`
  - Přepínání mezi měsíci pomocí šipek ⬅️➡️
  - Výběr vlastního rozsahu dat ("Od – Do")
  - Asynchronní načítání tabulek přes **AJAX (XMLHttpRequest)**  
    → bez přenačítání celé stránky

- 🧱 **Modulární struktura**
  - Oddělení logiky (`actions/`, `controller/`) od zobrazení (`views/`)
  - Společné části stránky (`partials/`) – např. hlavička, patička
  - Databázové připojení v `config/database.php`
  - Reusable komponenty (např. `timebar.php`, `tables.php`)

- 🎨 **Moderní a responzivní design**
  - Flexbox + Grid layout
  - Flash zprávy jako plovoucí notifikace
  - Minimalistické UI s přehlednou navigací

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
7. Uprav přihlašovací údaje do databáze v `config/database.php`.
8. Spusť projekt na adrese:  
   👉 [http://localhost/MyBudgetApp/public/](http://localhost/MyBudgetApp/public/)

---

## 🧠 Co funguje

✅ Registrace a přihlášení uživatele  
✅ Přihlášení uchovává session (user ID, jméno, čas registrace)  
✅ Přehled transakcí načítaný z databáze podle měsíce  
✅ Výběr období (měsíc, Od–Do)  
✅ Dynamická změna dat přes **AJAX bez reloadu stránky**  
✅ Přehledné a čisté rozdělení kódu (MVC-like struktura)
✅ Přidání transakcí do databáze
✅ Vypsání všech transakcí v daném měsíci
✅ Smazání z volené transakce

---

## 🧪 Testovací data

Pro rychlé vyzkoušení aplikace můžeš použít připravený testovací účet:

| 🧍‍♂️ Uživatelské jméno | 🔑 Heslo         |
|--------------------------|------------------|
| `testovaci_data`         | `testovaciData`  |

> 🔹 Doporučení: Po přihlášení můžeš zkoušet přepínat měsíce, filtrovat období a sledovat načítání dat.

