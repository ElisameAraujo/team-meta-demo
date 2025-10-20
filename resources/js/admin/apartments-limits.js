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

export function interactiveBuildingAdminRect() {
    const tooltip = document.getElementById("apartment-tooltip");
    const wrapper = document.querySelector(".video-canvas-wrapper");

    if (!tooltip || !wrapper) return;

    document.querySelectorAll(".interactive-overlay rect").forEach((rect) => {
        if (rect.dataset.tooltip !== "true") return;

        rect.addEventListener("mouseenter", () => {
            buildTooltipContent(rect);
            tooltip.style.display = "block";
        });

        rect.addEventListener("mousemove", (e) => {
            const bounds = wrapper.getBoundingClientRect();
            const x = e.clientX - bounds.left;
            const y = e.clientY - bounds.top;

            tooltip.style.left = `${x + 15}px`;
            tooltip.style.top = `${y + 15}px`;
        });

        rect.addEventListener("mouseleave", () => {
            tooltip.style.display = "none";
        });
    });
}

export function interactiveBuildingAdminPolygon() {
    const tooltip = document.getElementById("apartment-tooltip");
    const wrapper = document.querySelector(".video-canvas-wrapper");

    if (!tooltip || !wrapper) return;

    document.querySelectorAll(".interactive-overlay polygon").forEach((polygon) => {
        if (polygon.dataset.tooltip !== "true") return;

        polygon.addEventListener("mouseenter", () => {
            buildTooltipContent(polygon);
            tooltip.style.display = "block";
        });

        polygon.addEventListener("mousemove", (e) => {
            const bounds = wrapper.getBoundingClientRect();
            const x = e.clientX - bounds.left;
            const y = e.clientY - bounds.top;

            tooltip.style.left = `${x + 15}px`;
            tooltip.style.top = `${y + 15}px`;
        });

        polygon.addEventListener("mouseleave", () => {
            tooltip.style.display = "none";
        });
    });
}

export function initInteractiveOverlayTooltips() {
    interactiveBuildingAdminRect();
    interactiveBuildingAdminPolygon();
}
