document.addEventListener("DOMContentLoaded", () => {
    function initBurgerMenu() {
        const burgerMenuBtn = document.querySelector(".burger-menu");
        const closeBurgerMenuBtn = document.querySelector(".close-burger-menu");
        const popupMenu = document.querySelector(".popup-menu-overlay");
        const headerBtnGroup = document.querySelector(".header-btn-group");
        const primaryLogo = document.querySelector(".primary-logo");

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
    }
    initBurgerMenu();

    function initFilters() {
        const dropdownButtons = document.querySelectorAll(".custom-dropdown-button");
        const dropdownContents = document.querySelectorAll(".custom-dropdown-content");
        const doneButtons = document.querySelectorAll(".dropdown-done-button");
        const clearButtons = document.querySelectorAll(".dropdown-clear-button");
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const clearAllButtons = document.querySelectorAll(".clear-all-button");

        const originalTexts = Array.from(dropdownButtons).map((button) => button.textContent);

        dropdownButtons.forEach((button, index) => {
            button.addEventListener("click", function () {
                const content = dropdownContents[index];
                content.style.display = content.style.display === "block" ? "none" : "block";
            });
        });

        doneButtons.forEach((button, index) => {
            button.addEventListener("click", function () {
                const content = dropdownContents[index];
                content.style.display = "none";
            });
        });

        clearButtons.forEach((button, index) => {
            button.addEventListener("click", function () {
                const content = dropdownContents[index];
                const checkboxes = content.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                    checkbox.parentElement.classList.remove("checked");
                });
                dropdownButtons[index].textContent = originalTexts[index];
            });
        });

        clearAllButtons.forEach((clearAllButton) => {
            clearAllButton.addEventListener("click", function () {
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                    checkbox.parentElement.classList.remove("checked");
                });
                dropdownButtons.forEach((button, index) => {
                    button.textContent = originalTexts[index];
                });
            });
        });

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function () {
                if (this.checked) {
                    this.parentElement.classList.add("checked");
                } else {
                    this.parentElement.classList.remove("checked");
                }
            });
        });

        document.addEventListener("click", function (event) {
            dropdownContents.forEach((content, index) => {
                if (!dropdownButtons[index].contains(event.target) && !content.contains(event.target)) {
                    content.style.display = "none";
                }
            });
        });
    }

    initFilters();

    function showFilters() {
        const showFiltersBtn = document.getElementById("show-filters-btn");
        const filters = document.querySelector(".filter-container");

        showFiltersBtn.addEventListener("click", () => {
            filters.classList.toggle("visible-filters");
        });
    }

    showFilters();

    function initAjaxHandler() {
        const seeMoreButton = document.getElementById("see-more-button");

        seeMoreButton.addEventListener("click", function () {
            let currentCount = parseInt(seeMoreButton.getAttribute("data-count"));
            let newCount = currentCount * 2;

            // Make AJAX request to fetch more events
            fetch(`/wp-admin/admin-ajax.php?action=load_more_events&count=${newCount}`)
                .then((response) => response.text())
                .then((data) => {
                    document.querySelector(".event-grid-group").innerHTML = data;
                    seeMoreButton.setAttribute("data-count", newCount);
                })
                .catch((error) => console.error("Error:", error));
        });
    }
    initAjaxHandler();
});
