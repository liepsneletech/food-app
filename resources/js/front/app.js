// Alpine
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";

//Perfect scrollbar
import PerfectScrollbar from "perfect-scrollbar";

// Axios
import axios from "axios";
import { drop } from "lodash";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.PerfectScrollbar = PerfectScrollbar;

document.addEventListener("alpine:init", () => {
    Alpine.data("mainState", () => {
        let lastScrollTop = 0;
        const init = function () {
            window.addEventListener("scroll", () => {
                let st =
                    window.pageYOffset || document.documentElement.scrollTop;
                if (st > lastScrollTop) {
                    // downscroll
                    this.scrollingDown = true;
                    this.scrollingUp = false;
                } else {
                    // upscroll
                    this.scrollingDown = false;
                    this.scrollingUp = true;
                    if (st == 0) {
                        //  reset
                        this.scrollingDown = false;
                        this.scrollingUp = false;
                    }
                }
                lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
            });
        };

        const getTheme = () => {
            if (window.localStorage.getItem("dark")) {
                return JSON.parse(window.localStorage.getItem("dark"));
            }
            return (
                !!window.matchMedia &&
                window.matchMedia("(prefers-color-scheme: dark)").matches
            );
        };
        const setTheme = (value) => {
            window.localStorage.setItem("dark", value);
        };
        return {
            init,
            isDarkMode: getTheme(),
            toggleTheme() {
                this.isDarkMode = !this.isDarkMode;
                setTheme(this.isDarkMode);
            },
            isSidebarOpen: window.innerWidth > 1024,
            isSidebarHovered: false,
            handleSidebarHover(value) {
                if (window.innerWidth < 1024) {
                    return;
                }
                this.isSidebarHovered = value;
            },
            handleWindowResize() {
                if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false;
                } else {
                    this.isSidebarOpen = true;
                }
            },
            scrollingDown: false,
            scrollingUp: false,
        };
    });
});

Alpine.plugin(collapse);

Alpine.start();

// CUSTOM CODE STARTS HERE

// navbar
const navToggle = document.querySelector(".nav-toggle");
const navLinks = document.querySelector(".nav-links");

navToggle.addEventListener("click", function () {
    navLinks.classList.toggle("show-links");
    navToggle.classList.toggle("nav-toggle-rotate");
});

window.addEventListener("resize", function () {
    navLinks.classList.remove("show-links");
    navToggle.classList.remove("nav-toggle-rotate");
});

// navbar dropdown
const dropdownTrigger = document.querySelector(".dropdown-trigger");
const dropdownContent = document.querySelector(".dropdown-content");

dropdownTrigger.addEventListener("mouseover", function () {
    dropdownContent.classList.add("show");
});

dropdownTrigger.addEventListener("mouseleave", function () {
    dropdownContent.classList.remove("show");
});

dropdownContent.addEventListener("mouseleave", function () {
    dropdownContent.classList.remove("show");
});

// accordion
const cards = document.querySelectorAll(".card");

cards.forEach((card) => {
    const btn = card.querySelector(".accordion-btn");
    btn.addEventListener("click", () => {
        cards.forEach((item) => {
            if (item !== card) {
                item.classList.remove("show");
            }
        });
        card.classList.toggle("show");
    });
});

// order accordion
const orders = document.querySelectorAll(".order");

orders.forEach((order) => {
    const btn = order.querySelector(".order-btn");
    btn.addEventListener("click", () => {
        orders.forEach((item) => {
            if (item !== order) {
                item.classList.remove("show");
            }
        });
        order.classList.toggle("show");
    });
});

// slider
const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector(".prevBtn");
const nextBtn = document.querySelector(".nextBtn");

slides.forEach(function (slide, index) {
    slide.style.left = `${index * 100}%`;
});

let counter = 0;
nextBtn.addEventListener("click", function () {
    counter++;
    carousel();
});
prevBtn.addEventListener("click", function () {
    counter--;
    carousel();
});

function carousel() {
    if (counter === slides.length) {
        counter = 0;
    }
    if (counter < 0) {
        counter = slides.length - 1;
    }

    slides.forEach(function (slide) {
        slide.style.transform = `translateX(-${counter * 100}%)`;
    });
}
