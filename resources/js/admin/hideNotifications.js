export function hideNotifications() {
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(() => {
            const notifications = document.querySelectorAll(".notification");

            notifications.forEach((el) => {
                // Aplica transições
                el.style.transition = "opacity 0.5s ease, max-height 0.5s ease";
                el.style.opacity = "0";
                el.style.maxHeight = "0";

                // Remove após a transição
                setTimeout(() => {
                    el.remove();
                }, 500);
            });
        }, 5000);
    });
}
