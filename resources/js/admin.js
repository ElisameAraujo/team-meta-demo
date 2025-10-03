import { mobileMenu } from "./admin/nav/mobile";
import { subMenu } from "./admin/nav/submenu";
import { updateClock } from "./admin/clock";
import { themeChange } from "theme-change";

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
