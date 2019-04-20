const hambuger_button = document.querySelector("nav .hamburger-button");
const nav_menu = document.querySelector("nav .nav-menu");

if (hambuger_button && nav_menu) {
    hambuger_button.onclick = () => {
        nav_menu.classList.toggle("active");
    };
}
