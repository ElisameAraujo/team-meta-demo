import { mobileMenu } from "./admin/nav/mobile";
import { subMenu } from "./admin/nav/submenu";
import { updateClock } from "./admin/clock";
import { themeChange } from "theme-change";
import { fileUploadPreview } from "./admin/fileUploadImagePreview";
import { fileUploadUpdatePreview } from "./admin/fileUpdateImagePreview";
import { interactiveBuildingPolygon, interactiveBuildingRect } from "./admin/interactive-building";

/**
 * Axios
 */
import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * FontAwesome
 */
import "@fortawesome/fontawesome-free/js/all.js";
import "@fortawesome/fontawesome-free/css/all.css";

/**
 * Navigation
 */
new mobileMenu();
new subMenu();
new updateClock();

/**
 * Theme Change
 */

new themeChange();

/**
 * Global
 */
new fileUploadPreview();
new fileUploadUpdatePreview();
new interactiveBuildingPolygon();
new interactiveBuildingRect();

/**
 * Hide Notifications
 */
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
