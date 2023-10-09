var hamburgerMenu = document.querySelector(".menu-hamburger");
var navbarLinks = document.querySelector(".links-navbar");

function volet() {
    navbarLinks.classList.toggle("mobile-menu");
    hamburgerMenu.classList.toggle("open");
}

hamburgerMenu.addEventListener("click", volet);
