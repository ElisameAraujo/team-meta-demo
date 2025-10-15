import { toggleToolButtons } from "../ui/toolSelector";
import { resetRectangleTool } from "../tools/rectangleTool";
import { resetPolylineTool } from "../tools/polylineTool";

export function setupRemoveTool(canvas) {
    function removeActiveObject() {
        const active = canvas.getActiveObject();
        if (active) {
            canvas.remove(active);

            // 🔹 Resetar ferramentas
            resetRectangleTool();
            resetPolylineTool();

            toggleToolButtons(true);

            // 🔹 Limpar campos do formulário
            ["x_position", "y_position", "width", "height", "points", "coordinate_type"].forEach((id) => {
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
