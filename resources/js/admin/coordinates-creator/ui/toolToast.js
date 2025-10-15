export function showToolToast(type) {
    const container = document.getElementById("tool-toast-container");
    if (!container) return;

    let icon = "";
    let label = "";
    let alertClass = "alert-success"; // padrão

    if (type === "rectangle") {
        icon = '<i class="fa-solid fa-rectangle-xmark"></i>';
        label = "Rectangle tool selected.";
        alertClass = "bg-green-700 border border-green-600 text-white";
    } else if (type === "polyline") {
        icon = '<i class="fa-solid fa-bezier-curve"></i>';
        label = "Line tool selected.";
        alertClass = "bg-green-700 border border-green-600 text-white";
    } else if (type === "clear") {
        icon = '<i class="fa-solid fa-broom"></i>';
        label = "Canvas area cleaned successfully.";
        alertClass = "bg-red-700 border border-red-700 text-white";
    } else if (type === "empty") {
        icon = '<i class="fa-solid fa-circle-exclamation"></i>';
        label = "Nenhum objeto para limpar.";
        alertClass = "alert-warning";
    }

    // 🔹 Cria o toast individual
    const toast = document.createElement("div");
    toast.className = `alert ${alertClass} shadow-lg toast-animate-in mb-2 text-[18px] w-fit`;
    toast.innerHTML = `<span>${icon} ${label}</span>`;

    // 🔹 Adiciona ao container sem apagar os anteriores
    container.appendChild(toast);

    // 🔹 Animação de saída
    setTimeout(() => {
        toast.classList.remove("toast-animate-in");
        toast.classList.add("toast-animate-out");
    }, 2500);

    // 🔹 Remoção do DOM
    setTimeout(() => {
        toast.remove();
    }, 3000);
}
