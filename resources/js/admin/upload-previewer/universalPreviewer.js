import { handleAddPreview } from "./handles/handleAddPreview.js";
import { handleUpdatePreview } from "./handles/handleUpdatePreview.js";

export function universalPreviewer() {
    const addContainers = document.querySelectorAll(".update-image-area[data-add]");
    const updateTriggers = document.querySelectorAll(".open-gallery-modal[data-mode='update']");

    addContainers.forEach((container) => handleAddPreview(container));
    updateTriggers.forEach((trigger) => handleUpdatePreview(trigger));
}