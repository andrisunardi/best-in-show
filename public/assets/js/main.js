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

document.addEventListener("DOMContentLoaded", function (event) {
    swiperArticles();
});

function swiperArticles() {
    const swiperArticles = new Swiper(".swiper-articles", {
        loop: false,
        rewind: true,
        keyboard: {
            enabled: true,
        },
        speed: 1500,
        autoHeight: true,
        breakpoints: {
            1280: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
        },
        navigation: {
            prevEl: ".articles-arrow-prev",
            nextEl: ".articles-arrow-next",
        },
    });
}

document.addEventListener("DOMContentLoaded", function (event) {
    swiperActivity();
});

function swiperActivity() {
    const swiperActivity = new Swiper(".swiper-activity", {
        loop: false,
        rewind: true,
        keyboard: {
            enabled: true,
        },
        speed: 1500,
        autoHeight: true,
        breakpoints: {
            1280: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
        },
        navigation: {
            prevEl: ".articles-arrow-prev",
            nextEl: ".articles-arrow-next",
        },
    });
}

document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("click", (event) => {
        const accordion = event.target.closest(".accordion");
        if (accordion) {
            accordion.classList.toggle("active");
            const panel = accordion.nextElementSibling;

            panel.style.display =
                panel.style.display === "block" ? "none" : "block";
            const arrow = accordion.querySelector(".arrow");
            arrow.innerHTML =
                panel.style.display === "block"
                    ? "arrow_drop_up"
                    : "arrow_drop_down";
        }
    });
});

function toggleModal() {
    const filterModal = document.querySelector("#filtermodal");
    const overlay = document.querySelector("#overlay");

    filterModal.classList.toggle("show-modal");
    overlay.style.display = filterModal.classList.contains("show-modal")
        ? "block"
        : "none";
    filterModal.style.display = filterModal.classList.contains("show-modal")
        ? "flex"
        : "none";
}
