export function buildHiddenInputs(container, detailsJson) {
    if (!container || !detailsJson) return;

    container.innerHTML = "";

    try {
        const details = JSON.parse(detailsJson);
        Object.entries(details).forEach(([key, value]) => {
            const input = document.createElement("input");
            input.type = "hidden";
            input.name = key;
            input.setAttribute("data-field", key);
            input.value = value;
            container.appendChild(input);
        });
    } catch (e) {
        console.warn("Invalid JSON in data-details:", e);
    }
}