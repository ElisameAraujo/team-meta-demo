import { renderPreview } from "../renders/renderPreview.js";

export function handleAddPreview(container) {
    const fileInput = container.querySelector("input[type='file']");
    const trigger = container.querySelector("[data-change-trigger]");
    const previewContainer = container.querySelector("[data-preview]");
    const previewContainerCurrent = container.querySelector("[data-preview-current]");
    const uploadButtonContainer = container.querySelector(".upload-new-image");

    if (!fileInput || !trigger || !previewContainer) return;

    trigger.addEventListener("click", (e) => {
        e.preventDefault();
        fileInput.click();
    });

    fileInput.addEventListener("change", (e) => {
        const file = e.target.files[0];
        if (!file) return;

        const src = URL.createObjectURL(file);
        renderPreview(previewContainer, src, file); // renderiza no lugar certo

        previewContainer.classList.remove("hidden");
        previewContainerCurrent.classList.add("hidden");
        if (uploadButtonContainer) uploadButtonContainer.classList.remove("hidden");
    });
}