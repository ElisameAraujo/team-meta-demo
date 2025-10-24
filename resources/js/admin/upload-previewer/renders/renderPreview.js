export function renderPreview(container, src, file) {
    if (!container) return;

    // Se não houver src ou file, só renderiza placeholder se for o container de preview atual
    const isPreviewCurrent = container.hasAttribute("data-preview-current");

    if (!src || !file) {
        if (isPreviewCurrent) {
            container.innerHTML = `<div class="p-8 no-image">Image/Video Not Selected</div>`;
        } else {
            container.innerHTML = ""; // limpa sem adicionar placeholder
        }
        return;
    }

    const isVideo = file.type?.startsWith("video/") || file.type === "media";
    const tag = isVideo
        ? `<video src="${src}" data-preview></video>`
        : `<img src="${src}" data-preview/>`;

    container.innerHTML = tag;
}
