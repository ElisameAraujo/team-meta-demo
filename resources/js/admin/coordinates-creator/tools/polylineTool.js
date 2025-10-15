import { Polyline, Polygon } from "fabric";
import { getCurrentTool, toggleToolButtons } from "../ui/toolSelector";
import { updateCoordinateFields } from "../ui/formUpdater";

let polylinePoints = [];
let polylinePreview = null;
let polygon = null;

export function setupPolylineTool(canvas) {
    canvas.on("mouse:down", (e) => {
        if (getCurrentTool() !== "polyline" || polygon) return;

        const pointer = canvas.getViewportPoint(e.e);
        polylinePoints.push({ x: pointer.x, y: pointer.y });

        if (polylinePreview) canvas.remove(polylinePreview);

        polylinePreview = new Polyline(polylinePoints, {
            stroke: "red",
            strokeWidth: 2,
            fill: "",
            selectable: false,
            evented: false,
            lockRotation: true,
        });

        polylinePreview.setControlsVisibility({ mtr: false });
        canvas.add(polylinePreview);
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Enter" && polylinePoints.length > 2 && !polygon) {
            polygon = new Polygon(polylinePoints, {
                fill: "rgba(255,0,0,0.5)",
                stroke: "red",
                strokeWidth: 2,
                selectable: true,
                lockRotation: true,
            });

            polygon.setControlsVisibility({ mtr: false });

            if (polylinePreview) canvas.remove(polylinePreview);
            canvas.add(polygon);
            canvas.setActiveObject(polygon);
            polygon.setCoords();
            updateCoordinateFields(polygon);

            polylinePoints = [];
            polylinePreview = null;
            toggleToolButtons(false);
        }
    });
}
