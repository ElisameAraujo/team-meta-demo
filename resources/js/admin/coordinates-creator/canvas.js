import { Canvas } from "fabric";

const BASE_WIDTH = 1920;
const BASE_HEIGHT = 1080;

export function setupCanvas() {
    const canvasElement = document.getElementById("draw-area");
    if (!canvasElement) return null;

    const container = canvasElement.parentElement;
    const wrapper = container.closest(".video-canvas-wrapper") || container;

    // Função para calcular escala e aplicar no canvas
    const applyCanvasScale = () => {
        const wrapperWidth = wrapper.offsetWidth;
        const wrapperHeight = wrapper.offsetHeight;

        const scaleX = wrapperWidth / BASE_WIDTH;
        const scaleY = wrapperHeight / BASE_HEIGHT;
        const scale = Math.min(scaleX, scaleY); // mantém proporção

        const scaledWidth = BASE_WIDTH * scale;
        const scaledHeight = BASE_HEIGHT * scale;

        canvas.setZoom(scale);
        canvas.setDimensions({
            width: scaledWidth,
            height: scaledHeight,
        });

        canvasElement.width = scaledWidth;
        canvasElement.height = scaledHeight;
    };

    // Inicializa o canvas com base lógica fixa
    const canvas = new Canvas("draw-area", {
        selection: false,
        width: BASE_WIDTH,
        height: BASE_HEIGHT,
    });

    applyCanvasScale();

    // Atualiza ao redimensionar a janela
    window.addEventListener("resize", applyCanvasScale);

    return canvas;
}
