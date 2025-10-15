import { showToolToast } from "./toolToast";

let currentTool = null;

export function getCurrentTool() {
    return currentTool;
}

export function setupToolSelector() {
    document.querySelectorAll("[data-tool]").forEach((el) => {
        el.addEventListener("click", (e) => {
            if (el.classList.contains("disabled")) {
                e.preventDefault();
                return;
            }
            currentTool = el.dataset.tool;
            showToolToast(currentTool);
        });
    });

    document.addEventListener("keydown", (e) => {
        if (e.target.tagName === "INPUT" || e.target.tagName === "TEXTAREA") return;

        if (e.key.toLowerCase() === "r") {
            const rectBtn = document.querySelector("[data-tool='rectangle']");
            if (rectBtn && !rectBtn.classList.contains("disabled")) {
                rectBtn.click();
            }
        }

        if (e.key.toLowerCase() === "l") {
            const lineBtn = document.querySelector("[data-tool='polyline']");
            if (lineBtn && !lineBtn.classList.contains("disabled")) {
                lineBtn.click();
            }
        }
    });
}

export function toggleToolButtons(enabled) {
    document.querySelectorAll("details ul li").forEach((li) => {
        if (li.querySelector("[data-tool='rectangle']") || li.querySelector("[data-tool='polyline']")) {
            li.classList.toggle("button-disable", !enabled);
        }
    });

    document.querySelectorAll("[data-tool='rectangle'], [data-tool='polyline']").forEach((el) => {
        el.classList.toggle("disabled", !enabled);
    });
}
