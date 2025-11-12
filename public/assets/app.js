// =================================
// === SCRIPT PRO MENU UŽIVATELE ===
// ==================================

const optionMenu = document.querySelector(".rozbalovaciOkno");
const btnOptionMenu = document.getElementById("option-menu");

// proměnná pro vizualizaci optionMenu
let visibleMenu = false;

// funkce pro manipulaci s optionMenu
const showOptionMenu = () => {
  optionMenu.style.opacity = 1;
  visibleMenu = true;
  // umožní kliky dovnitř
  optionMenu.style.pointerEvents = "auto";
  console.log("Show Option Menu");
};

// funkce pro schování menu při kliku mimo
const hideOptionMenu = (e) => {
  if (
    !optionMenu.contains(e.target) &&
    !btnOptionMenu.contains(e.target) &&
    visibleMenu == true
  ) {
    optionMenu.style.opacity = 0;
    optionMenu.style.pointerEvents = "none";
    visibleMenu = false;
    console.log("Hide Option Menu");
  }
};

window.addEventListener("click", hideOptionMenu);

const closeMenuBtn = document.getElementById("close-menu");

// funkce pro schování menu při kliku na křížek
closeMenuBtn.addEventListener("click", () => {
  console.log("klik");
  visibleMenu = false;
  optionMenu.style.opacity = 0;
  optionMenu.style.pointerEvents = "none";
});

btnOptionMenu.addEventListener("click", (e) => {
  showOptionMenu();
});

// ===========================
// ==== SCRIPT PRO TIMEBAR Na hlavní stránce===
// ===========================

// výběr měsíce + input
const btn_month_picker = document.querySelector(".month-picker__trigger");
const month_input = document.getElementById("month-input");

// proměnná pro vizualizaci Month Pickeru
let visibleMonthPicker = false;

// podmínka pro zobrazení month pickeru
btn_month_picker?.addEventListener("click", (e) => {
  const over_view_table = document.querySelector(".overview_table");
  if (over_view_table) {
    return;
  }
  e.preventDefault();
  visibleMonthPicker = true;
  console.log("Výběr měsíce");
  month_input.classList.remove("hidden");
  month_input.focus();
});

// když klikne mimo talčítko a div , zavře výběr měsíce
window.addEventListener("click", (e) => {
  const over_view_table = document.querySelector(".overview_table");
  if (over_view_table) {
    return;
  }
  if (
    !month_input.contains(e.target) &&
    !btn_month_picker.contains(e.target) &&
    visibleMonthPicker == true
  ) {
    month_input.classList.add("hidden");
    visibleMonthPicker = false;
    console.log("Schovej měsíc");
  }
});

// výběr od do
const btn_range = document.getElementById("range-toggle");
const range_div = document.getElementById("range-panel");
const btn_apply = document.getElementById("apply-range");
const btn_cancel = document.getElementById("reset-range");

// pomocná proměnná
let visibleOdDo = false;

// funkce pro otevření divu pro výběr od do
const open_range = (e) => {
  e.preventDefault();
  console.log("Ukaž výběr od do");
  range_div.classList.remove("hidden");

  visibleOdDo = true;
  console.log(visibleOdDo);
};

btn_range?.addEventListener("click", open_range);

// když klikne mimo talčítko a div , zavře výběr od do
window.addEventListener("click", (e) => {
  const over_view_table = document.querySelector(".overview_table");
  if (over_view_table) {
    return;
  }
  if (
    !range_div.contains(e.target) &&
    !btn_range.contains(e.target) &&
    visibleOdDo == true
  ) {
    range_div.classList.add("hidden");
    visibleOdDo = false;
    console.log("Schovej odDo");
    console.log(visibleOdDo);
  }
});

// === STRUKTURA PRO ŠIPKY A NAČÍTÁNÍ MĚSÍCŮ + ODESÍLÁNÍ DAT  ====

// řešení pro text měsíce a pro šipky
let current_date = new Date();

//console.log(current_date);

const months = [
  "Leden",
  "Únor",
  "Březen",
  "Duben",
  "Květen",
  "Červen",
  "Červenec",
  "Srpen",
  "Září",
  "Říjen",
  "Listopad",
  "Prosinec",
];

const month_text = document.getElementById("month-text");

// aktualizace textu roku a mesice
const updateMonth = () => {
  if (!month_text) return;
  month_text.textContent = `${
    months[current_date.getMonth()]
  } ${current_date.getFullYear()}`;
};

updateMonth();

// šipka doprava
const btn_next_month = document.getElementById("next-month");

// šipka doleva
const btn_prev_month = document.getElementById("prev-month");

// funkce pro volbu predchoziho mesice
const previousMonth = () => {
  // nastavi currentdate o -1
  current_date.setMonth(current_date.getMonth() - 1);
  console.log("Měsíc -1");
  updateMonth();

  //promenne pro konkretni mesic a rok
  let current_month = String(current_date.getMonth() + 1).padStart(2, "0");
  let current_year = current_date.getFullYear();

  // AJAX volání
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //let odpoved = this.responseText;
      //console.log(odpoved);
      document.getElementById("wrapper").innerHTML = this.responseText;
    }
  };

  let sending_date = current_year + "-" + current_month;

  // připravuje konkrétní hodnotu
  xmlhttp.open(
    "GET",
    "controller/tables_control.php?month=" + sending_date,
    true
  );
  // odesílá připravené hodnoty
  xmlhttp.send();

  load_sums(sending_date);
};

btn_prev_month?.addEventListener("click", previousMonth);

//funkce pro nasledujici mesic
const nextMonth = () => {
  // nastvauje current date o mesic napred
  current_date.setMonth(current_date.getMonth() + 1);
  console.log("Měsíc +1");
  updateMonth();

  // nastavuje promenne pro odeslani pro php
  let current_month = String(current_date.getMonth() + 1).padStart(2, "0");
  let current_year = current_date.getFullYear();

  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //let odpoved = this.responseText;
      //console.log(odpoved);
      document.getElementById("wrapper").innerHTML = this.responseText;
    }
  };

  let sending_date = current_year + "-" + current_month;

  // priprava dat k odeslani
  xmlhttp.open(
    "GET",
    "controller/tables_control.php?month=" + sending_date,
    true
  );
  xmlhttp.send();

  load_sums(sending_date);
};

btn_next_month?.addEventListener("click", nextMonth);

// funkce pro vyber konkretniho mesice
const vyber_mesice = () => {
  // nacteni value z inputu pro odeslani na server
  const year = month_input.value;
  //console.log(year);

  // rozbaleni inputu pro vlozeni textu do spanu
  const [rok, mesic] = month_input.value.split("-");
  //console.log([rok, mesic]);
  month_text.textContent = `${months[mesic - 1]} ${rok}`;
  current_date.setMonth(mesic - 1);
  current_date.setFullYear(rok);
  //console.log(current_date);

  //AJAX příprava
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("wrapper").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET", "controller/tables_control.php?month=" + year, true);

  xmlhttp.send();
  month_input.classList.add("hidden");

  load_sums(year);
};

// reaguj na výběr měsíce v pickeru
month_input?.addEventListener("change", vyber_mesice);

// ====================================
// === funkce pro přidání transakce ===
// ====================================

// funkce pro zobrazení okna

let add_wrap_visibility = false;
//console.log("Základ: " + add_wrap_visibility);

// pokud uživatel klikne na button přidat transakci
// funkce zobrazi modal okno pro přidání transakce
document.addEventListener("click", (e) => {
  if (e.target.closest(".add_button")) {
    const add_wrap = document.getElementById("add_wrapper");
    add_wrap_visibility = true;
    add_wrap.classList.remove("hidden");
    add_wrap.style.pointerEvents = "auto";
    console.log("Open: " + add_wrap_visibility);
  }
});

// když klikne mimo, modal okno zmizí
window.addEventListener("click", (e) => {
  const add_wrap = document.getElementById("add_wrapper");
  const add_button = document.querySelector(".add_button");
  const overview_table = document.querySelector(".overview_table");
  if (overview_table) {
    return;
  }
  if (
    !add_wrap.contains(e.target) &&
    !add_button.contains(e.target) &&
    add_wrap_visibility == true
  ) {
    add_wrap.classList.add("hidden");
    add_wrap.style.pointerEvents = "none";
    add_wrap_visibility = false;
    console.log("Zavření: " + add_wrap_visibility);
  }
});

//funkce pro tlačítko formuláře
// kontrola vstupů
// odesílání do php
document.addEventListener("click", (e) => {
  if (e.target.closest(".add_button_form")) {
    console.log("funkce pro načítání dat");

    // načítání hodnot z inputu
    const transaction_name = document.getElementById("transaction_name").value;
    const transaction_description = document.getElementById(
      "transaction_description"
    ).value;
    const transaction_value = document.getElementById("value").value;
    const transaction_category = document.getElementById(
      "transaction_category"
    ).value;
    const transaction_date = document.getElementById("transaction_date").value;

    // kontrola prázných a záporných vstupů
    if (
      transaction_name == "" ||
      transaction_date == "" ||
      transaction_value == ""
    ) {
      alert("Něco jsi zapomněl vyplnit. :)");
    } else if (transaction_value <= 0) {
      alert("Value musí být více než 0");
    } else {
      // příprava dat pro php
      const formattedFormData = new FormData();
      formattedFormData.append("transaction_name", transaction_name);
      formattedFormData.append(
        "transaction_description",
        transaction_description
      );
      formattedFormData.append("transaction_value", transaction_value);
      formattedFormData.append("transaction_category", transaction_category);
      formattedFormData.append("transaction_date", transaction_date);

      postData(formattedFormData);

      async function postData(formattedFormData) {
        try {
          const response = await fetch("../app/actions/add.php", {
            method: "POST",
            body: formattedFormData,
          });
          const data = await response.text();
          console.log("DATA jsou: " + data);
          window.location.reload();
        } catch (error) {
          alert("Něco se nepovedlo: " + error);
        }
      }
    }

    document.querySelector(".add_wrapper").classList.add("hidden");
  }
});

// ===============
// === Bubliny ===
// ===============

// proměnné pro uchování hodnot
let income_number;
let expense_number;
let balance_number;

let jiz_vycerpano;
let jeste_zbyva;
let podminka_velikosti;
let data;

// asynchornní funkce, načítá data z databáze a na základě toho mění bubliny
async function load_sums(yearMonth) {
  const response = await fetch("../app/actions/summary.php?month=" + yearMonth);
  data = await response.json();

  prehled_expense = true;
  prehled_balance = true;

  load_text();
}

// proměnná pro vstupní měsíc při prvním načtení
let first_month =
  current_date.getFullYear() +
  "-" +
  String(current_date.getMonth() + 1).padStart(2, "0");

let first_loading = true;

// asynchronní funkce, zařizuje první načtení stránky
async function first_load(first_month) {
  if (first_loading) {
    const response = await fetch(
      "../app/actions/summary.php?month=" + first_month
    );
    data = await response.json();

    load_text();

    first_loading = false;
    //console.log("First loading je: " + first_loading);
  } else {
    console.log("First loading je: " + first_loading);

    return;
  }
}

// funkce, která mění hodnoity v bublinách
const load_text = () => {
  let income_bubble = document.getElementById("income_bubble");
  if (!income_bubble) {
    return;
  }
  podminka_velikosti =
    Number(data.income) > Number(data.expense) ? true : false;

  jiz_vycerpano = ((data.expense * 100) / data.income).toFixed(1);

  let expense_bubble = document.getElementById("expense_bubble");
  let balance_bubble = document.getElementById("balance_bubble");

  // přepsání čísla do formátu
  const formatted = new Intl.NumberFormat("cs-CZ", {
    style: "currency",
    currency: "CZK",
  });

  income_number = formatted.format(data.income ?? 0);
  expense_number = formatted.format(data.expense ?? 0);
  balance_number = formatted.format(data.balance ?? 0);

  income_bubble.textContent = income_number;
  expense_bubble.textContent = expense_number;
  balance_bubble.textContent = balance_number;
};

const btn_expense = document.getElementById("btn_expense");
const btn_balance = document.getElementById("btn_balance");

let prehled_expense = true;
let prehled_balance = true;

// funkce pro klik na bublinu výdajů
const expense_function = () => {
  // kontrola podmínky, zda income je větší než expense
  if (podminka_velikosti) {
    // podmínka modu: vizuál číselné hodnoty, nebo procent
    if (prehled_expense) {
      expense_bubble.textContent = jiz_vycerpano + " %";
      prehled_expense = false;
    } else {
      expense_bubble.textContent = expense_number;
      prehled_expense = true;
    }
  } else {
    console.log("nesplněna podmínka");

    return;
  }
};

// funkce pro klik na bublinu výdajů
const balance_function = () => {
  // kontrola podmínky, zda income je větší než expense
  if (podminka_velikosti) {
    // podmínka modu: vizuál číselné hodnoty, nebo procent
    if (prehled_balance) {
      balance_bubble.textContent = (100 - jiz_vycerpano).toFixed(1) + " %";
      prehled_balance = false;
    } else {
      balance_bubble.textContent = balance_number;
      prehled_balance = true;
    }
  } else {
    return;
  }
};

btn_expense?.addEventListener("click", expense_function);
btn_balance?.addEventListener("click", balance_function);

first_load(first_month);

// =================================
// === Scripty pro overview page ===
// =================================

const overview_months = [
  "Leden",
  "Únor",
  "Březen",
  "Duben",
  "Květen",
  "Červen",
  "Červenec",
  "Srpen",
  "Září",
  "Říjen",
  "Listopad",
  "Prosinec",
];

// načtení dat z url pro zjištění, v jakém měsíci se uživatel nacházel
const params = new URLSearchParams(window.location.search);

const monthFromUrl = params.get("month");

// vytvoření proměnné do řádného tvaru
let [overview_year, overview_month] = (monthFromUrl || "").split("-");

overview_year = parseInt(overview_year);
overview_month = parseInt(overview_month) - 1;

// vytvoření nového datumu
let overview_current_date = new Date(overview_year, overview_month, 1);

const overview_month_text = document.getElementById("overiew_month-text");

if (overview_month_text) {
  overview_month_text.textContent = `${overview_months[overview_month]} ${overview_year}`;
}

const overview_prev_month = document.getElementById("overview_prev-month");

// funkce pro šipku, která načte předchozí měsíc
const over_view_previous_month = () => {
  overview_current_date.setMonth(overview_current_date.getMonth() - 1);

  overview_update_timebar();

  let current_month = String(overview_current_date.getMonth() + 1).padStart(
    2,
    "0"
  );
  let current_year = overview_current_date.getFullYear();

  let year = current_year + "-" + current_month;

  //AJAX příprava
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("overview_wrapper").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET", "controller/month_control.php?month=" + year, true);

  xmlhttp.send();
};

const overview_next_month = document.getElementById("overview_next-month");

// funkce, která načte následující měsíc
const over_view_next_month = () => {
  overview_current_date.setMonth(overview_current_date.getMonth() + 1);

  overview_update_timebar();

  let current_month = String(overview_current_date.getMonth() + 1).padStart(
    2,
    "0"
  );
  let current_year = overview_current_date.getFullYear();

  let year = current_year + "-" + current_month;

  //AJAX příprava
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("overview_wrapper").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET", "controller/month_control.php?month=" + year, true);

  xmlhttp.send();
};

// pro aktualizaci textu měsíce a roku
const overview_update_timebar = () => {
  overview_month_text.textContent = `${
    overview_months[overview_current_date.getMonth()]
  } ${overview_current_date.getFullYear()}`;
};

// listenery na šipkách
overview_next_month?.addEventListener("click", over_view_next_month);
overview_prev_month?.addEventListener("click", over_view_previous_month);

const btn_overview_month_picker = document.querySelector(
  ".overview_month-picker__trigger"
);
const overview_input_month = document.getElementById("overview_month-input");

let overview_visibleMonthPicker = false;

// pro zobrazení výběru měsíce
btn_overview_month_picker?.addEventListener("click", (e) => {
  const over_view_table = document.querySelector(".overview_table");
  if (!over_view_table) {
    return;
  }
  e.preventDefault();
  overview_visibleMonthPicker = true;
  console.log("Overview = Výběr měsíce");
  overview_input_month.classList.remove("hidden");
  overview_input_month.focus();
});

// zavření zobrazení měsíce
window.addEventListener("click", (e) => {
  const over_view_table = document.querySelector(".overview_table");
  if (!over_view_table) {
    return;
  }
  if (
    !overview_input_month.contains(e.target) &&
    !btn_overview_month_picker.contains(e.target) &&
    overview_visibleMonthPicker == true
  ) {
    overview_input_month.classList.add("hidden");
    overview_visibleMonthPicker = false;
    console.log("Schovej měsíc");
  }
});

// funkce pro vyber konkretniho mesice
const overview_vyber_mesice = () => {
  // nacteni value z inputu pro odeslani na server
  const year = overview_input_month.value;

  // rozbaleni inputu pro vlozeni textu do spanu
  const [rok, mesic] = overview_input_month.value.split("-");

  overview_month_text.textContent = `${overview_months[mesic - 1]} ${rok}`;
  overview_current_date.setMonth(mesic - 1);
  overview_current_date.setFullYear(rok);

  //AJAX příprava
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("overview_wrapper").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("GET", "controller/month_control.php?month=" + year, true);

  xmlhttp.send();
  overview_input_month.classList.add("hidden");
};

// reaguj na výběr měsíce v pickeru
overview_input_month?.addEventListener("change", overview_vyber_mesice);

// ====================================
// === Logika pro smazání transakce ===
// ====================================

const wrapper = document.getElementById("overview_wrapper");

// listener, když kliknu na tlačítko smazat
wrapper?.addEventListener("click", (e) => {
  // načtení tlačítka, na které jsme kliknuli
  const btn_delete = e.target.closest(".btn_delete");

  if (!btn_delete) {
    return;
  }

  // řádek, ve kterém je kliknuté tlačítko
  const tr = e.target.closest(".overview_tr");

  // tbody dané tabulky
  const tbody = tr.closest("tbody");

  // pokud není tlačítko, nic nedělej
  if (!btn_delete) {
    return;
  }

  // načtení id transakce přes data-id na tlačítku v tabulce
  const transaction_id = btn_delete.dataset.id;
  console.log("Transaction_id: " + transaction_id);

  // fetch transaction id do dotazu
  // příprava dat pro php
  const formData = new FormData();
  formData.append("transaction_data_id", transaction_id);

  postData(formData);

  async function postData(formData) {
    try {
      const response = await fetch("../app/actions/delete.php", {
        method: "POST",
        body: formData,
      });
      const data = await response.json();
      console.log(data);

      console.log("DATA.ok je: " + data.ok);

      // pokud vše ok, daný řádek se odstraní
      if (data.ok) {
        tr.remove();
      }

      // získání počtu řádků v tbody
      const length = tbody.rows.length;
      console.log("Velikost tbody je: " + length);

      // velikost == 0 => co se stane
      if (length == 0) {
        // vytvoří řádek s textem a parametry
        const empty_tr = document.createElement("tr");
        empty_tr.classList.add("overview_tr");
        empty_tr.innerHTML = `<td colspan = 6>V tabulce nejsou žádné transakce</td>`;
        tbody.append(empty_tr);
      }
    } catch (error) {
      alert("Něco se nepovedlo: " + error);
    }
  }
});

// ===================================
// === Logika pro úpravu transakce ===
// ===================================
let edit_wrap_visibility = false;

wrapper?.addEventListener("click", (e) => {
  // nalezení tlačítka pro edit pro zobrazení edit okna
  const edit_button = e.target.closest(".btn_edit");

  if (!edit_button) {
    return;
  }

  // zjištění id transakce pro její změnu
  const transaction_data_id = edit_button.dataset.id;

  // nalezení řádku, ve kterém se nacházíme
  const tr = e.target.closest(".overview_tr");

  // vytvoření proměnných pro hodnoty v řádku
  const name = tr.dataset.name;
  const description = tr.dataset.description;
  const category = tr.dataset.category;
  const value = tr.dataset.value;
  const date = tr.dataset.date;

  // načtení inputů z formuláře
  const input_name = document.getElementById("edit_transaction_name");
  const input_description = document.getElementById(
    "edit_transaction_description"
  );
  const input_value = document.getElementById("edit_value");
  const input_category = document.getElementById("edit_transaction_category");
  const input_date = document.getElementById("edit_transaction_date");

  // vložení hodnot do inputů
  input_name.value = name;
  input_description.value = description;
  input_value.value = value;
  input_category.value = category;
  input_date.value = date;

  console.log("ID transakce je: " + transaction_data_id);

  // načtení formuláře a jeho zobrazení
  const edit_wrapper = document.getElementById("edit_wrapper");
  edit_wrapper.classList.remove("hidden");
  edit_wrap_visibility = true;

  // načtení tlačítka pro potvrzení úpravy
  const btn_edit = document.querySelector(".edit_button_form");


  const update_transaction = () => {// kontrola vstupů, zda jsou všechny hodnoty nutné do Databáze vyplněny
    if (!input_name.value || !input_date.value || !input_value.value) {
      alert("Něco ti chybí vyplnit.");
      return;
    }

    edit_wrapper.classList.add("hidden");
    edit_wrap_visibility = false;
    //console.log("Schovávám edit okno");

    // změna dataset dle nových inputů
    tr.dataset.name = input_name.value.trim();
    tr.dataset.description = input_description.value.trim();
    tr.dataset.category = input_category.value.trim();
    tr.dataset.value = input_value.value.trim();
    tr.dataset.date = input_date.value.trim();

    // nalezení konkrétních td pro vložení hodnot
    const td_name = document.getElementById("td_name");
    const td_description = document.getElementById("td_description");
    const td_category = document.querySelector(".td_category");
    const td_value = document.querySelector(".td_value");
    const td_date = document.getElementById("td_date");

    const formData = new FormData();
    formData.append("transaction_name", input_name.value.trim());
    formData.append("transaction_description", input_description.value.trim());
    formData.append("transaction_value", input_value.value.trim());
    formData.append("transaction_category", input_category.value.trim());
    formData.append("transaction_date", input_date.value.trim());
    formData.append("transaction_id", transaction_data_id);

    postData(formData);

    async function postData(formData) {
      try {
        const response = await fetch("../app/actions/edit.php", {
          method: "POST",
          body: formData,
        });
        const data = await response.json();
        

        if (data.ok) {
          // vkládání hodnot do td
          td_name.textContent = input_name.value;
          td_description.textContent = input_description.value;

          // převedení textu kategorie do čitelnějšího tvaru
          if (input_category.value == "ostatni") {
            td_category.textContent = "Ostatní";
          } else if (input_category.value == "jidlo") {
            td_category.textContent = "Potraviny";
          } else if (input_category.value == "doprava") {
            td_category.textContent = "Doprava";
          } else if (input_category.value == "najem") {
            td_category.textContent = "Bydlení";
          } else if (input_category.value == "zabava") {
            td_category.textContent = "Zábava";
          } else if (input_category.value == "prijem") {
            td_category.textContent = "Příjem";
          } else if (input_category.value == "sporeni") {
            td_category.textContent = "Spoření";
          }

          // podmínka, když je value kladná, nebo záporná
          if (input_category.value == "prijem") {
            td_value.innerHTML = `<em class="green_number">+ ${input_value.value}</em>`;
          } else {
            td_value.innerHTML = `<em class="red_number">- ${input_value.value}</em>`;
          }

          td_date.textContent = input_date.value;
        }
      } catch (error) {
        alert("Něco se nepovedlo: " + error);
      }
    }


    // Podmínka, když je měsíc nebo rok jiný oproti původnímu datu, smaže tr

    const new_date_value = input_date.value;
    const old_date_value = date;

    console.log("Nový datum: " + new_date_value);
    console.log("Starý datum: " + old_date_value);

    const new_date = new_date_value.split("-");
    const old_date = old_date_value.split("-");

    if(new_date[0] == old_date[0]){
      console.log("Roky jsou stejné");
      if(new_date[1] == old_date[1]){
        console.log("Měsíce jsou stejné");
      } else {
        console.log("Měsíce nejsou stejné");
        tr.remove();
      }
    } else {
      console.log("Roky nejsou stejné");
      tr.remove();
    }}

  // funkce pro uložení změněných dat
  btn_edit?.addEventListener("click", update_transaction, { once: true });
});

