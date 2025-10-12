export function setupGalleryModal() {
    const buttons = document.querySelectorAll(".open-gallery-modal");

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const targetId = button.dataset.target;
            const modal = document.getElementById(targetId);
            const mode = button.dataset.mode || "update"; // default para update

            if (!modal) return;

            const currentImageContainer = modal.querySelector(".current-image");
            const sectionIdInput = modal.querySelector("[data-field='section-id']");
            const sectionSlugInput = modal.querySelector("[data-field='section-slug']");
            const galleryIdInput = modal.querySelector("[data-field='gallery-id']");

            if (mode === "update") {
                const sectionId = button.dataset.sectionId;
                const sectionSlug = button.dataset.sectionSlug;
                const imageUrl = button.dataset.imageUrl;
                const galleryID = button.dataset.galleryId;

                currentImageContainer.innerHTML = imageUrl ? `<img src="${imageUrl}" data-preview>` : `<div class="p-8 no-image" data-preview>Image Not Selected</div>`;

                if (sectionIdInput) sectionIdInput.value = sectionId;
                if (sectionSlugInput) sectionSlugInput.value = sectionSlug;
                if (galleryIdInput) galleryIdInput.value = galleryID;
            } else if (mode === "add") {
                currentImageContainer.innerHTML = `<div class="p-8 no-image" data-preview>Image Not Selected</div>`;
                if (sectionIdInput) sectionIdInput.value = "";
                if (sectionSlugInput) sectionSlugInput.value = "";
                if (galleryIdInput) galleryIdInput.value = "";
            }
        });
    });
}
