import { Rect } from "fabric";
import { getCurrentTool, toggleToolButtons } from "../ui/toolSelector";
import { updateCoordinateFields } from "../ui/formUpdater";

let rect = null;
let isDrawing = false;
let startPoint = null;

export function setupRectangleTool(canvas) {
    canvas.on("mouse:down", (e) => {
        if (getCurrentTool() !== "rectangle" || rect) return;

        isDrawing = true;
        startPoint = canvas.getViewportPoint(e.e);
    });

    canvas.on("mouse:move", (e) => {
        if (!isDrawing || !startPoint || getCurrentTool() !== "rectangle") return;

        const pointer = canvas.getViewportPoint(e.e);
        const width = Math.abs(pointer.x - startPoint.x);
        const height = Math.abs(pointer.y - startPoint.y);

        // 🔹 Só cria o retângulo se houver movimento mínimo
        if (!rect && (width > 5 || height > 5)) {
            rect = new Rect({
                left: startPoint.x,
                top: startPoint.y,
                width: 0,
                height: 0,
                fill: "rgba(255,0,0,0.5)",
                stroke: "red",
                strokeWidth: 2,
                selectable: true,
                lockRotation: true,
            });
            rect.setControlsVisibility({ mtr: false });
            canvas.add(rect);
            toggleToolButtons(false);
        }

        if (rect) {
            rect.set({
                width,
                height,
            });
            canvas.renderAll();
        }
    });

    canvas.on("mouse:up", () => {
        if (rect) {
            rect.setCoords();
            updateCoordinateFields(rect);

            // 🔹 Preenche o tipo como "rect"
            const typeField = document.getElementById("coordinate_type");
            if (typeField) {
                typeField.value = "rect";
            }

            // 🔹 Limpa o campo de pontos (não usado em retângulo)
            const pointsField = document.getElementById("points");
            if (pointsField) {
                pointsField.value = "";
            }
        }

        isDrawing = false;
        startPoint = null;
    });
}

export function resetRectangleTool() {
    rect = null;
}
