export function fileUploadPreview() {
    const uploadButtons = document.querySelectorAll("[data-label]");

    uploadButtons.forEach((uploadButton) => {
        uploadButton.addEventListener("change", (e) => {
            const currFiles = e.target.files;

            const text = document.getElementById("text");
            if (text) text.remove();

            if (currFiles.length > 0) {
                const src = URL.createObjectURL(currFiles[0]);

                const preview = document.getElementById("preview");
                const imagePreview = document.getElementById("file-preview");

                if (imagePreview) {
                    imagePreview.src = src;
                    imagePreview.style.display = "block";
                }

                if (preview) {
                    preview.classList.remove("hidden");
                }
            }
        });
    });
}
