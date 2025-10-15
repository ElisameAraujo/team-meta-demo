import { Rect } from "fabric";
import { getCurrentTool, toggleToolButtons } from "../ui/toolSelector";
import { updateCoordinateFields } from "../ui/formUpdater";

let rect = null;
let isDrawing = false;

export function setupRectangleTool(canvas) {
    canvas.on("mouse:down", (e) => {
        if (getCurrentTool() !== "rectangle" || rect) return;

        isDrawing = true;
        const pointer = canvas.getViewportPoint(e.e);
        rect = new Rect({
            left: pointer.x,
            top: pointer.y,
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
    });

    canvas.on("mouse:move", (e) => {
        if (!isDrawing || !rect || getCurrentTool() !== "rectangle") return;
        const pointer = canvas.getViewportPoint(e.e);
        rect.set({
            width: Math.abs(pointer.x - rect.left),
            height: Math.abs(pointer.y - rect.top),
        });
        canvas.renderAll();
    });

    canvas.on("mouse:up", () => {
        if (rect) {
            rect.setCoords();
            updateCoordinateFields(rect);
        }
        isDrawing = false;
    });
}
