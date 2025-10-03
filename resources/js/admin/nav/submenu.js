export function subMenu() {
    document.addEventListener("DOMContentLoaded", function () {
        // Seleciona todos os links <a> dentro dos itens que têm submenu
        const menuLinks = document.querySelectorAll(".menu-item.has-sub > a");

        menuLinks.forEach((link) => {
            link.addEventListener("click", function (e) {
                e.preventDefault();

                const item = link.parentElement;
                const target = item.getAttribute("data-target");
                const submenu = document.querySelector(`.submenu-container[data-sub="${target}"]`);

                // Fecha todos os submenus abertos, exceto o do item clicado
                document.querySelectorAll(".submenu-container.open").forEach((sub) => {
                    if (sub !== submenu) {
                        sub.classList.remove("open");
                    }
                });

                // Alterna o submenu
                if (submenu) {
                    submenu.classList.toggle("open");
                }
            });
        });
    });
}
