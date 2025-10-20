import { Canvas } from "fabric";

const BASE_WIDTH = 1920;
const BASE_HEIGHT = 1080;

export function setupCanvas() {
    const canvasElement = document.getElementById("draw-area");
    if (!canvasElement) return null;

    const container = canvasElement.parentElement;
    const wrapper = container.closest(".video-canvas-wrapper") || container;

    // Define tamanho inicial do canvas com base no wrapper
    const wrapperWidth = wrapper.offsetWidth;
    const scale = wrapperWidth / BASE_WIDTH;

    canvasElement.width = wrapperWidth;
    canvasElement.height = BASE_HEIGHT * scale;

    const canvas = new Canvas("draw-area", {
        selection: false,
        width: BASE_WIDTH,
        height: BASE_HEIGHT,
    });

    canvas.setZoom(scale);
    canvas.setDimensions({
        width: wrapperWidth,
        height: BASE_HEIGHT * scale,
    });

    // Atualiza ao redimensionar a janela
    window.addEventListener("resize", () => {
        const newWidth = wrapper.offsetWidth;
        const newScale = newWidth / BASE_WIDTH;

        canvas.setZoom(newScale);
        canvas.setDimensions({
            width: newWidth,
            height: BASE_HEIGHT * newScale,
        });

        canvasElement.width = newWidth;
        canvasElement.height = BASE_HEIGHT * newScale;
    });

    return canvas;
}
