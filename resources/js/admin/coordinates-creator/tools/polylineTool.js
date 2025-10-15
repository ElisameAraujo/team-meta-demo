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

            // Atualiza campos X/Y com bounding box
            updateCoordinateFields(polygon);

            // 🔹 Preenche campo de pontos
            const pointsField = document.getElementById("points");
            if (pointsField) {
                const svgPoints = polygon.points.map((p) => `${p.x.toFixed(2)},${p.y.toFixed(2)}`).join(" ");
                pointsField.value = svgPoints;
            }

            // 🔹 Define tipo como polygon
            const typeField = document.getElementById("coordinate_type");
            if (typeField) {
                typeField.value = "polygon";
            }

            // 🔹 Limpa width e height
            ["width", "height"].forEach((id) => {
                const field = document.getElementById(id);
                if (field) field.value = "";
            });

            polylinePoints = [];
            polylinePreview = null;
            toggleToolButtons(false);
        }
    });
}

export function resetPolylineTool() {
    polygon = null;
    polylinePoints = [];
    polylinePreview = null;
}
