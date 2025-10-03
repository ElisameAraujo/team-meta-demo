// Script para controlar o menu mobile off-canvas
// Abre e fecha o menu lateral, bloqueando o scroll do body e controlando backdrop

export function mobileMenu() {
    document.addEventListener("DOMContentLoaded", function () {
        const openBtn = document.getElementById("open-menu"); // Botão que abre o menu
        const closeBtn = document.getElementById("close-menu"); // Botão que fecha o menu (dentro do menu)
        const menu = document.querySelector(".mobile-navigation"); // Elemento do menu lateral (container principal)
        const backdrop = document.querySelector(".mobile-backdrop"); // Elemento do backdrop

        // Ao clicar para abrir, adiciona classe 'open' e bloqueia scroll do body
        openBtn.addEventListener("click", function () {
            menu.classList.add("open");
            document.body.classList.add("overflow-hidden");
        });

        // Ao clicar para fechar, remove classe 'open' e libera scroll do body
        closeBtn.addEventListener("click", function () {
            menu.classList.remove("open");
            document.body.classList.remove("overflow-hidden");
        });

        // Fecha o menu ao clicar no backdrop
        if (backdrop) {
            backdrop.addEventListener("click", function () {
                menu.classList.remove("open");
                document.body.classList.remove("overflow-hidden");
            });
        }

        // Fecha o menu ao clicar no container do menu (fallback, caso backdrop não cubra tudo)
        menu.addEventListener("click", function (e) {
            // Só fecha se o clique for exatamente no container do menu (não em elementos filhos)
            if (e.target === menu) {
                menu.classList.remove("open");
                document.body.classList.remove("overflow-hidden");
            }
        });

        // --- SUBMENU MOBILE --- //
        // Seleciona todos os links <a> dentro dos itens que têm submenu no mobile
        const menuLinks = document.querySelectorAll(".menu-item.has-sub > a");

        menuLinks.forEach((link) => {
            link.addEventListener("click", function (e) {
                e.preventDefault();

                const item = link.parentElement;
                const target = item.getAttribute("data-target");
                const submenu = document.querySelector(`.submenu-mobile[data-sub="${target}"]`);

                // Fecha todos os submenus abertos, exceto o do item clicado
                document.querySelectorAll(".submenu-mobile.open").forEach((sub) => {
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
