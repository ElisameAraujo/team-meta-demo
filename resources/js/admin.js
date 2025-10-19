import { mobileMenu } from "./admin/nav/mobile";
import { subMenu } from "./admin/nav/submenu";
import { updateClock } from "./admin/clock";
import { themeChange } from "theme-change";
import { fileUploadPreview } from "./admin/fileUploadImagePreview";
import { interactiveBuildingPolygon, interactiveBuildingRect } from "./admin/interactive-building";
import { setupGalleryModal } from "./admin/dataFromGallery";
import { hideNotifications } from "./admin/hideNotifications.js";
import "./admin/coordinates-creator/index.js";

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
fileUploadPreview();
setupGalleryModal();
interactiveBuildingPolygon();
interactiveBuildingRect();
hideNotifications();

/**
 * Check if has support to ::view-transition API
 */
if (!document.startViewTransition) {
    document.body.classList.add("no-transitions");
}
