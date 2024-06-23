

document.addEventListener("DOMContentLoaded", () => {
    const burgerMenuBtn = document.querySelector('.burger-menu');
    const closeBurgerMenuBtn = document.querySelector('.close-burger-menu');
    const popupMenu = document.querySelector('.popup-menu-overlay');
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


/*     var svgObjects = document.querySelectorAll('.header-svg-link');

    svgObjects.forEach((svgObject) => {
        svgObject.addEventListener('load', function() {
            var svgDoc = svgObject.contentDocument;
            var svgElement = svgDoc.querySelector('svg');
    
            svgObject.parentElement.addEventListener('mouseover', function() {
              svgElement.style.backgroundColor = 'yellow';
            });
    
            svgObject.parentElement.addEventListener('mouseout', function() {
              svgElement.style.backgroundColor = 'transparent';
            });
          });
    }); */
});

