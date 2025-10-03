export function updateClock() {
    const now = new Date();
    let hours = now.getHours();
    let minutes = now.getMinutes();

    hours = String(hours).padStart(2, "0");
    minutes = String(minutes).padStart(2, "0");

    const timeString = `${hours}h${minutes}`;
    document.getElementById("clock").textContent = timeString;
}
