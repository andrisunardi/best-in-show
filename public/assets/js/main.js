const sideMenu = document.querySelector("#sidemenu");
const hamburgerButton = document.querySelector("#hamburger-button");
const sidemenuClose = document.querySelector("#sidemenu-close");
const overlay = document.querySelector("#overlay");

document.addEventListener("DOMContentLoaded", () => {
    hamburgerButton.addEventListener("click", toggleSideMenu);
    sidemenuClose.addEventListener("click", toggleSideMenu);
    overlay.addEventListener("click", toggleSideMenu);
});

function toggleSideMenu() {
    sideMenu.classList.toggle("show-menu");
    overlay.style.display = sideMenu.classList.contains("show-menu")
        ? "block"
        : "none";
    sideMenu.style.right = sideMenu.classList.contains("show-menu")
        ? "0"
        : "-100%";
}

function switchSection(section) {
    const target = document.getElementById(section);
    const targetButton = document.getElementById("btn-" + section);
    const siblings = document.getElementsByClassName("about-section");
    const siblingsButton = document.getElementsByClassName("btn-about-tab");

    for (let i = 0; i < siblings.length; i++) {
        siblings[i].style.display = "none";
        siblingsButton[i].classList.remove("active");
    }

    target.style.display = "block";
    targetButton.classList.add("active");
}
