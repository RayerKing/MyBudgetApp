// === SCRIPT PRO MENU UŽIVATELKE ===

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

// ==== SCRIPT PRO TIMEBAR === 

// výběr měsíce + input
const btn_month_picker = document.querySelector(".month-picker__trigger");
const month_input = document.getElementById("month-input");

// proměnná pro vizualizaci Month Pickeru
let visibleMonthPicker = false;

// podmínka pro zobrazení month pickeru
btn_month_picker.addEventListener("click", (e) => {
  e.preventDefault();
  visibleMonthPicker = true;
  console.log("Výběr měsíce");
  month_input.classList.remove("hidden");
  month_input.focus();
});

// když klikne mimo talčítko a div , zavře výběr měsíce
window.addEventListener("click", (e) => {
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

btn_range.addEventListener("click", open_range);

// když klikne mimo talčítko a div , zavře výběr od do
window.addEventListener("click", (e) => {
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
      let odpoved = this.responseText;
      console.log(odpoved);
      document.getElementById("wrapper").innerHTML = this.responseText;
    }
  };

  // připravuje konkrétní hodnotu
  xmlhttp.open(
    "GET",
    "controller/tables_control.php?month=" + current_year + "-" + current_month,
    true
  );
  // odesílá připravené hodnoty
  xmlhttp.send();
};

btn_prev_month.addEventListener("click", previousMonth);

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
      let odpoved = this.responseText;
      console.log(odpoved);
      document.getElementById("wrapper").innerHTML = this.responseText;
    }
  };

  // priprava dat k odeslani
  xmlhttp.open(
    "GET",
    "controller/tables_control.php?month=" + current_year + "-" + current_month,
    true
  );
  xmlhttp.send();
};

btn_next_month.addEventListener("click", nextMonth);

// funkce pro vyber konkretniho mesice
const vyber_mesice = () => {
  // nacteni value z inputu pro odeslani na server
  const year = month_input.value;
  console.log(year);

  // rozbaleni inputu pro vlozeni textu do spanu
  const [rok, mesic] = month_input.value.split("-");
  console.log([rok, mesic]);
  month_text.textContent = `${months[mesic - 1]} ${rok}`;
  current_date.setMonth(mesic - 1);
  current_date.setFullYear(rok);
  console.log(current_date);

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
};

// reaguj na výběr měsíce v pickeru
month_input.addEventListener("change", vyber_mesice);
