export function interactiveBuildingAdminRect() {
    const tooltip = document.getElementById("apartment-tooltip");
    const label = document.getElementById("tooltip-label");
    const price = document.getElementById("tooltip-price");
    const area = document.getElementById("tooltip-area");

    const wrapper = document.querySelector(".video-canvas-wrapper");

    if (!tooltip || !label || !price || !area || !wrapper) return;

    document.querySelectorAll(".interactive-overlay rect").forEach((rect) => {
        if (rect.dataset.tooltip !== "true") return;

        rect.addEventListener("mouseenter", () => {
            label.textContent = rect.dataset.label || "";
            price.textContent = rect.dataset.price || "";
            area.textContent = rect.dataset.area || "";
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
    const label = document.getElementById("tooltip-label");
    const price = document.getElementById("tooltip-price");
    const area = document.getElementById("tooltip-area");

    const wrapper = document.querySelector(".video-canvas-wrapper");

    if (!tooltip || !label || !price || !area || !wrapper) return;

    document.querySelectorAll(".interactive-overlay polygon").forEach((polygon) => {
        if (polygon.dataset.tooltip !== "true") return;

        polygon.addEventListener("mouseenter", () => {
            label.textContent = polygon.dataset.label || "";
            price.textContent = polygon.dataset.price || "";
            area.textContent = polygon.dataset.area || "";
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
