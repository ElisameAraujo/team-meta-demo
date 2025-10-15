import { toggleToolButtons } from "../ui/toolSelector";

export function setupRemoveTool(canvas) {
    function removeActiveObject() {
        const active = canvas.getActiveObject();
        if (active) {
            canvas.remove(active);
            toggleToolButtons(true);

            ["x_position", "y_position", "width", "height"].forEach((id) => {
                const field = document.getElementById(id);
                if (field) field.value = "";
            });
        }
    }

    const removeBtn = document.querySelector('[data-tool="remove"]');
    if (removeBtn) {
        removeBtn.addEventListener("click", removeActiveObject);
    }

    document.addEventListener("keydown", (e) => {
        if (e.key === "Delete") removeActiveObject();
    });
}
