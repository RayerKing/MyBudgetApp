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

const hideOptionMenu = (e) => {

  if (!optionMenu.contains(e.target) && !btnOptionMenu.contains(e.target) && visibleMenu == true) {
    optionMenu.style.opacity = 0;
    optionMenu.style.pointerEvents = "none"; 
    visibleMenu = false;
    console.log("Hide Option Menu");
  }
};

window.addEventListener("click", hideOptionMenu);

const closeMenuBtn = document.getElementById("close-menu");

closeMenuBtn.addEventListener("click", () => {
    console.log("klik");
    visibleMenu = false;
    optionMenu.style.opacity = 0;
    optionMenu.style.pointerEvents = "none"; 
  });




btnOptionMenu.addEventListener("click", (e) => {
  e.stopPropagation(); // zabrání tomu, aby window klik hned menu zavřel
  showOptionMenu();
});
