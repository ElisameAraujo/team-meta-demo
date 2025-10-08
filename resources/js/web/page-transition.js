function runPageTransition(href) {
    const overlay = document.getElementById("transition-overlay");

    // Fase 1: sobe e cobre a tela
    overlay
        .animate([{ transform: "translateY(100%)" }, { transform: "translateY(0%)" }], {
            duration: 600,
            easing: "ease-in-out",
            fill: "forwards",
        })
        .finished.then(() => {
            // Fase 2: continua subindo e revela a nova página
            overlay
                .animate([{ transform: "translateY(0%)" }, { transform: "translateY(-100%)" }], {
                    duration: 600,
                    easing: "ease-in-out",
                    fill: "forwards",
                })
                .finished.then(() => {
                    window.location.href = href;
                });
        });
}

export function pageTransition() {
    document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            runPageTransition(link.href);
        });
    });
}
