// navbar
function navbar() {
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
}

export default navbar;
