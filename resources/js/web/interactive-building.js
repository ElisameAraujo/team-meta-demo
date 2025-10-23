export const interactiveSVGElements = ["rect", "polygon", "path", "circle", "ellipse", "line", "polyline"];

function buildTooltipContent(element) {
    const label = element.dataset.label;
    const tooltip = document.getElementById("apartment-tooltip");

    let html = "";

    if (label) {
        html += `<h3 class="label-tooltip">${label}</h3>`;
    }

    Object.entries(element.dataset).forEach(([key, value]) => {
        if (key === "label" || key === "tooltip") return;

        html += `
            <span class="flex gap-1 font-bold">
                ${capitalize(key)}: <p class="font-normal">${value}</p>
            </span>
        `;
    });

    tooltip.innerHTML = html;
}

function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

export function interactiveBuildingElements(selectors = interactiveSVGElements) {
    const tooltip = document.getElementById("apartment-tooltip");
    const wrapper = document.querySelector(".video-background");

    if (!tooltip || !wrapper) return;

    const container = document.querySelector(".interactive-building");
    if (!container) return;

    selectors.forEach((selector) => {
        container.querySelectorAll(selector).forEach((el) => {
            if (el.dataset.tooltip !== "true") return;

            el.addEventListener("mouseenter", () => {
                buildTooltipContent(el);
                tooltip.style.display = "block";
            });

            el.addEventListener("mousemove", (e) => {
                const bounds = wrapper.getBoundingClientRect();
                const x = e.clientX - bounds.left;
                const y = e.clientY - bounds.top;

                tooltip.style.left = `${x + 15}px`;
                tooltip.style.top = `${y + 15}px`;
            });

            el.addEventListener("mouseleave", () => {
                tooltip.style.display = "none";
            });
        });
    });
}

export function initInteractiveTooltips() {
    interactiveBuildingElements();
}
