import { Canvas } from "fabric";

const BASE_WIDTH = 1860;
const BASE_HEIGHT = 917;

export function setupCanvas() {
    const canvasElement = document.getElementById("draw-area");
    if (!canvasElement) return null;

    const container = canvasElement.parentElement;
    canvasElement.width = container.offsetWidth;
    canvasElement.height = container.offsetHeight;

    const canvas = new Canvas("draw-area", {
        selection: false,
        width: BASE_WIDTH,
        height: BASE_HEIGHT,
    });

    const scaleX = canvasElement.width / BASE_WIDTH;
    canvas.setZoom(scaleX);
    canvas.setDimensions({ width: canvasElement.width, height: canvasElement.height });

    window.addEventListener("resize", () => {
        const newWidth = container.offsetWidth;
        const zoom = newWidth / BASE_WIDTH;
        canvas.setZoom(zoom);
        canvas.setDimensions({ width: newWidth, height: BASE_HEIGHT * zoom });
    });

    return canvas;
}
