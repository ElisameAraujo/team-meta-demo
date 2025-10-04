export function fileUploadUpdatePreview() {
    document.addEventListener("DOMContentLoaded", function () {
        const changeButton = document.getElementById("change-image");
        const fileInput = document.getElementById("background");
        const currentPreview = document.getElementById("current-image-preview");
        const imagePreviewContainer = document.querySelector(".image-preview");
        const imagePreview = document.getElementById("preview");
        const uploadButtonContainer = document.querySelector(".upload-new-image");

        // Abrir seletor de arquivo ao clicar no botão
        changeButton.addEventListener("click", function (e) {
            e.preventDefault();
            fileInput.click();
        });

        // Quando um arquivo for selecionado
        fileInput.addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (!file) return;

            // Remover imagem atual
            if (currentPreview) {
                currentPreview.remove();
            }

            // Atualizar preview
            const src = URL.createObjectURL(file);
            imagePreview.src = src;
            imagePreview.style.display = "block";
            imagePreviewContainer.classList.remove("hidden");

            // Mostrar botão de upload
            uploadButtonContainer.classList.remove("hidden");
        });
    });
}
