export function renderCurrentPreview(container, url) {
    if (!container || !url) return;

    const isVideo = /\.(mp4|webm|ogg)$/i.test(url);
    const tag = isVideo
        ? `<video src="${url}" class="w-full h-auto rounded-md"></video>`
        : `<img src="${url}" class="w-full h-auto rounded-md" />`;

    container.innerHTML = tag;
}