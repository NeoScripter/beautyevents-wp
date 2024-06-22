

document.addEventListener("DOMContentLoaded", () => {
    const burgerMenuBtn = document.querySelector('.burger-menu');
    const closeBurgerMenuBtn = document.querySelector('.close-burger-menu');
    const popupMenu = document.querySelector('.popup-menu');
    const headerBtnGroup = document.querySelector('.header-btn-group');
    const primaryLogo = document.querySelector('.primary-logo');
    
    burgerMenuBtn.addEventListener("click", () => {
        requestAnimationFrame(() => {
            popupMenu.style.transform = "translateX(0%)";
            headerBtnGroup.style.opacity = "0";
            primaryLogo.style.opacity = "0";
        });
    });
    
    closeBurgerMenuBtn.addEventListener("click", () => {
        requestAnimationFrame(() => {
            popupMenu.style.transform = "translateX(100%)";
            headerBtnGroup.style.opacity = "1";
            primaryLogo.style.opacity = "1";
        });
    });
});

