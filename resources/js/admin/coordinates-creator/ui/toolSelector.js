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
        });
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
