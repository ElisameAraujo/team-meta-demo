export function sideMenu() {
    const menu = document.querySelector("#side-menu-apartment");
    const toggleBtn = document.getElementById("menu-toggle");
    const toggleText = document.getElementById("menu-label");
    const arrowMenu = document.querySelector(".arrow-menu");

    if (menu && toggleBtn && toggleText && arrowMenu) {
        toggleBtn.addEventListener("click", () => {
            const isOpen = menu.classList.contains("show");

            menu.classList.toggle("show");
            menu.classList.toggle("hide");

            toggleText.textContent = isOpen ? "Show" : "Hide";

            arrowMenu.classList.remove(isOpen ? "left-arrow" : "right-arrow");
            arrowMenu.classList.add(isOpen ? "right-arrow" : "left-arrow");
        });
    }

    const filtersToggle = document.getElementById("filters-toggle");
    const filtersPanel = document.getElementById("filters-panel");
    const filtersIcon = document.getElementById("filters-icon");

    if (filtersToggle && filtersPanel && filtersIcon) {
        filtersToggle.addEventListener("click", () => {
            const isOpen = filtersPanel.classList.contains("open");
            filtersPanel.classList.toggle("open");
            filtersIcon.classList.toggle("rotate-180", !isOpen);
        });
    }
}