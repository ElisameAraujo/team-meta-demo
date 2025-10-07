function getBoundaryElement(element) {
    const selector = element.closest("svg")?.dataset.boundary;
    return selector ? document.querySelector(selector) : document.body;
}

export function interactiveBuildingRect() {
    const tooltip = document.getElementById("apartment-tooltip");
    const label = document.getElementById("tooltip-label");
    const price = document.getElementById("tooltip-price");
    const area = document.getElementById("tooltip-area");

    document.querySelectorAll("svg rect").forEach((rect) => {
        const shouldShowTooltip = rect.dataset.tooltip === "true";

        if (!shouldShowTooltip) return; // ignora se não for marcado como true

        rect.addEventListener("mouseenter", (e) => {
            label.textContent = rect.dataset.label || "";
            price.textContent = rect.dataset.price || "";
            area.textContent = rect.dataset.area || "";

            tooltip.style.display = "block";
        });

        rect.addEventListener("mousemove", (e) => {
            const container = getBoundaryElement(rect);
            const bounds = container.getBoundingClientRect();

            const x = e.clientX - bounds.left;
            const y = e.clientY - bounds.top;

            tooltip.style.left = x + 15 + "px";
            tooltip.style.top = y - 10 + "px";
        });

        rect.addEventListener("mouseleave", () => {
            tooltip.style.display = "none";
        });
    });
}

export function interactiveBuildingPolygon() {
    const tooltip = document.getElementById("apartment-tooltip");
    const label = document.getElementById("tooltip-label");
    const price = document.getElementById("tooltip-price");
    const area = document.getElementById("tooltip-area");

    document.querySelectorAll("svg polygon").forEach((polygon) => {
        const shouldShowTooltip = polygon.dataset.tooltip === "true";
        if (!shouldShowTooltip) return;

        polygon.addEventListener("mouseenter", () => {
            label.textContent = polygon.dataset.label || "";
            price.textContent = polygon.dataset.price || "";
            area.textContent = polygon.dataset.area || "";

            const bounds = polygon.getBoundingClientRect();
            const tooltipWidth = tooltip.offsetWidth;
            const tooltipHeight = tooltip.offsetHeight;

            tooltip.style.left = bounds.left + window.scrollX + bounds.width / 2 - tooltipWidth / 2 + "px";
            tooltip.style.top = bounds.top + window.scrollY - tooltipHeight - 12 + "px";

            tooltip.classList.add("show");
            tooltip.style.display = "block";
        });

        polygon.addEventListener("mousemove", (e) => {
            const containerBounds = container.getBoundingClientRect();

            const x = e.clientX - containerBounds.left;
            const y = e.clientY - containerBounds.top;

            tooltip.style.left = x + 15 + "px";
            tooltip.style.top = y - 10 + "px";
        });

        polygon.addEventListener("mouseleave", () => {
            tooltip.style.display = "none";
        });
    });
}
