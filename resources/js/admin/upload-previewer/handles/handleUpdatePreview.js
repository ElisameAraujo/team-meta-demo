import { renderPreview } from "../renders/renderPreview.js";
import { renderCurrentPreview } from "../renders/renderCurrentPreview.js";
import { buildHiddenInputs } from "../builders/buildHiddenInputs.js";

export function handleUpdatePreview(trigger) {
    const targetId = trigger.dataset.target;
    const container = document.getElementById(targetId);
    if (!container) return;

    const previewPlaceholder = container.querySelector("[data-preview-current]");
    const previewContainer = container.querySelector("[data-preview]");
    const uploadButtonContainer = container.querySelector(".upload-new-image");
    const fileInput = container.querySelector("input[type='file']");
    const hiddenInputsContainer = container.querySelector("#hidden-inputs");
    const changeTrigger = container.querySelector("[data-change-trigger]");

    let lastSelectedFile = null;

    trigger.addEventListener("click", () => {
        const details = JSON.parse(trigger.dataset.details || "{}");
        const imageUrl = details.image_url || null;

        // Recarrega os inputs e preview atual
        buildHiddenInputs(hiddenInputsContainer, trigger.dataset.details);

        if (lastSelectedFile) {
            const src = URL.createObjectURL(lastSelectedFile);
            renderPreview(previewContainer, src, lastSelectedFile);
            previewContainer.classList.remove("hidden");
            if (previewPlaceholder) previewPlaceholder.classList.add("hidden");
            if (uploadButtonContainer) uploadButtonContainer.classList.remove("hidden");
        } else {
            renderCurrentPreview(previewPlaceholder, imageUrl);
            previewContainer.classList.add("hidden");
            if (previewPlaceholder) previewPlaceholder.classList.remove("hidden");
            if (uploadButtonContainer) uploadButtonContainer.classList.add("hidden");
        }

        // Configura botão de seleção de arquivo
        if (changeTrigger && fileInput) {
            changeTrigger.onclick = () => fileInput.click();

            fileInput.onchange = (e) => {
                const file = e.target.files[0];
                if (!file) return;

                lastSelectedFile = file;

                const src = URL.createObjectURL(file);
                renderPreview(previewContainer, src, file);

                previewContainer.classList.remove("hidden");
                if (previewPlaceholder) previewPlaceholder.classList.add("hidden");
                if (uploadButtonContainer) uploadButtonContainer.classList.remove("hidden");
            };
        }
    });
}