export function fileUploadPreview() {
    const triggers = document.querySelectorAll("[data-change-trigger]");

    triggers.forEach((trigger) => {
        const container = trigger.closest(".update-image-area");
        const input = container.querySelector("input[type='file']");

        const currentImageContainer = container.querySelector(".current-image");
        const imagePreview = container.querySelector("[data-preview-image]");
        const imagePreviewContainer = container.querySelector(".image-preview");
        const uploadButtonContainer = container.querySelector(".upload-new-image");

        // Abre seletor de arquivos ao clicar no botão
        trigger.addEventListener("click", (e) => {
            e.preventDefault();
            input.click();
        });

        // Atualiza preview ao selecionar arquivo
        input.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (!file) return;

            currentImageContainer.innerHTML = ""; // remove placeholder

            const src = URL.createObjectURL(file);
            imagePreview.src = src;
            imagePreview.style.display = "block";
            imagePreviewContainer.classList.remove("hidden");
            uploadButtonContainer.classList.remove("hidden");
        });
    });
}
