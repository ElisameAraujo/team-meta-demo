export function setupGalleryModal() {
    const buttons = document.querySelectorAll(".open-gallery-modal");
    const modal = document.getElementById("building_gallery");

    const currentImageContainer = modal.querySelector(".current-image");
    const sectionIdInput = modal.querySelector("#modal-section-id");
    const sectionSlugInput = modal.querySelector("#modal-section-slug");
    const galleryIdInput = modal.querySelector("#modal-gallery-id");

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const sectionId = button.dataset.sectionId;
            const sectionSlug = button.dataset.sectionSlug;
            const imageUrl = button.dataset.imageUrl;
            const galleryID = button.dataset.galleryId;

            // Atualiza imagem atual
            if (imageUrl) {
                currentImageContainer.innerHTML = `<img src="${imageUrl}" id="current-image-preview">`;
            } else {
                currentImageContainer.innerHTML = `<div class="p-8 no-image" id="current-image-preview">Image Not Selected</div>`;
            }

            // Atualiza campos ocultos
            if (sectionIdInput) sectionIdInput.value = sectionId;
            if (sectionSlugInput) sectionSlugInput.value = sectionSlug;
            if (galleryIdInput) galleryIdInput.value = galleryID;

            // Atualiza action do form se necessário
        });
    });
}
