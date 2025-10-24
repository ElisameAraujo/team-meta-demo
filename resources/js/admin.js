import { mobileMenu } from "./admin/nav/mobile";
import { subMenu } from "./admin/nav/submenu";
import { updateClock } from "./admin/clock";
import { themeChange } from "theme-change";
import { hideNotifications } from "./admin/hideNotifications.js";
import { interactiveBuildingAdminPolygon, interactiveBuildingAdminRect } from "./admin/apartments-limits.js";
import { universalPreviewer } from './admin/upload-previewer/universalPreviewer.js';
import "./admin/coordinates-creator/index.js";

/**
 * Axios
 */
import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * AlpineJS
 */
import { Alpine } from "../../vendor/livewire/livewire/dist/livewire.esm";
window.Alpine = Alpine;
Alpine.start();

/**
 * FontAwesome
 */
import "@fortawesome/fontawesome-free/js/all.js";
import "@fortawesome/fontawesome-free/css/all.css";

/**
 * Navigation
 */
mobileMenu();
subMenu();
updateClock();

/**
 * Theme Change
 */

themeChange();

/**
 * Global
 */
document.addEventListener('DOMContentLoaded', () => {
    universalPreviewer();
});
hideNotifications();

/**
 * Check if has support to ::view-transition API
 */
if (!document.startViewTransition) {
    document.body.classList.add("no-transitions");
}

/**
 * Tooltips for Interactive Buildings
 */
document.addEventListener("DOMContentLoaded", () => {
    interactiveBuildingAdminPolygon();
    interactiveBuildingAdminRect();
});
