export function fileUploadPreview() {
    const overviewInputs = document.querySelectorAll("input[type='file'][data-overview]");
    const galleryInputs = document.querySelectorAll("input[type='file'][data-gallery]");

    const setupPreview = (input) => {
        const container = input.closest(".update-image-area");
        const changeButton = container.querySelector("#change-image");
        const currentImageContainer = container.querySelector(".current-image");
        const imagePreview = container.querySelector("#preview");
        const imagePreviewContainer = container.querySelector(".image-preview");
        const uploadButtonContainer = container.querySelector(".upload-new-image");

        changeButton.addEventListener("click", (e) => {
            e.preventDefault();
            input.click();
        });

        input.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (!file) return;

            // Limpa o conteúdo da área de imagem atual
            if (currentImageContainer) {
                currentImageContainer.innerHTML = "";
            }

            // Atualiza preview
            const src = URL.createObjectURL(file);
            imagePreview.src = src;
            imagePreview.style.display = "block";
            imagePreviewContainer.classList.remove("hidden");
            uploadButtonContainer.classList.remove("hidden");
        });
    };

    [...overviewInputs, ...galleryInputs].forEach(setupPreview);
}
