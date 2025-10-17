/**
 * FontAwesome
 */
import "@fortawesome/fontawesome-free/js/all.js";
import "@fortawesome/fontawesome-free/css/all.css";

/**
 * Side Menu
 */
import { sideMenu } from "./web/side-menu";
new sideMenu();

if (!document.startViewTransition) {
    document.body.classList.add("no-transitions");
}
