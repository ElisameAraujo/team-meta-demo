import { toggleToolButtons } from "../ui/toolSelector";
import { resetRectangleTool } from "./rectangleTool";
import { resetPolylineTool } from "./polylineTool";
import { showToolToast } from "../ui/toolToast";

export function setupClearTool(canvas) {
    function clearCanvas() {
        const objects = canvas.getObjects();

        if (objects.length === 0) {
            showToolToast("empty"); // ✅ novo toast
            return;
        }

        objects.forEach((obj) => canvas.remove(obj));

        resetRectangleTool();
        resetPolylineTool();
        toggleToolButtons(true);

        showToolToast("clear");

        ["x_position", "y_position", "width", "height", "points", "coordinate_type"].forEach((id) => {
            const field = document.getElementById(id);
            if (field) field.value = "";
        });
    }

    // 🔹 Atalho de teclado: C
    document.addEventListener("keydown", (e) => {
        if (e.target.tagName === "INPUT" || e.target.tagName === "TEXTAREA") return;
        if (e.key.toLowerCase() === "c") {
            clearCanvas();
        }
    });

    // 🔹 Clique no botão do menu
    const clearBtn = document.querySelector('[data-tool="clear"]');
    if (clearBtn) {
        clearBtn.addEventListener("click", (e) => {
            e.preventDefault();
            clearCanvas();
        });
    }
}
