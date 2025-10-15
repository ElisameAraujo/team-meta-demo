import { setupCanvas } from "./canvas";
import { setupToolSelector } from "./ui/toolSelector";
import { setupRectangleTool } from "./tools/rectangleTool";
import { setupPolylineTool } from "./tools/polylineTool";
import { setupRemoveTool } from "./tools/removeTool";

const canvas = setupCanvas();
if (canvas) {
    setupToolSelector();
    setupRectangleTool(canvas);
    setupPolylineTool(canvas);
    setupRemoveTool(canvas);
}
