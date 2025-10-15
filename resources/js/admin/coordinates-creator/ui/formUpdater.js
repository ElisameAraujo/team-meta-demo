export function updateCoordinateFields(obj) {
    const bounds = obj.getBoundingRect(true);
    const x = document.getElementById("x_position");
    const y = document.getElementById("y_position");
    const w = document.getElementById("width");
    const h = document.getElementById("height");

    if (x) x.value = bounds.left.toFixed(2);
    if (y) y.value = bounds.top.toFixed(2);
    if (w) w.value = (obj.width * obj.scaleX).toFixed(2);
    if (h) h.value = (obj.height * obj.scaleY).toFixed(2);
}
