import "./bootstrap";

class App {
    constructor(el) {
        this.el = el;
        this.canvas = this.el.querySelector("#canvas");
        this.ctx = this.canvas.getContext("2d");

        this.setDefaults();
        this.initCanvas();
        this.setEvents();
        this.startRendering();
    }

    setDefaults() {
        this.state = {
            scale: 1,
            offset: { x: 0, y: 0 },
            images: [],
            draggingImage: null,
            isPanning: false,
            lastMouse: { x: 0, y: 0 },
            zoomLimits: { min: 0.1, max: 10 },
            zoomSpeed: 0.25,
            minImageSize: 300,
        };
    }

    initCanvas() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;

        window.addEventListener("resize", () => {
            this.canvas.width = window.innerWidth;
            this.canvas.height = window.innerHeight;
        });
    }

    setEvents() {
        this.canvas.addEventListener("dragover", (e) => this.handleDragOver(e));
        this.canvas.addEventListener("drop", (e) => this.handleDrop(e));
        this.canvas.addEventListener("mousedown", (e) => this.handleMouseDown(e));
        this.canvas.addEventListener("mousemove", (e) => this.handleMouseMove(e));
        this.canvas.addEventListener("mouseup", () => this.handleMouseUp());
        this.canvas.addEventListener("wheel", (e) => this.handleWheel(e));
    }

    handleDragOver(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = "copy";
    }

    handleDrop(e) {
        e.preventDefault();

        const files = e.dataTransfer.files;
        Array.from(files).forEach((file) => {
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = () => {
                        const originalWidth = img.naturalWidth;
                        const originalHeight = img.naturalHeight;
                        const minDimension = Math.min(originalWidth, originalHeight);
                        const scaleFactor = this.state.minImageSize / minDimension;
                        const width = originalWidth * scaleFactor;
                        const height = originalHeight * scaleFactor;
                        const pos = this.screenToCanvas(e.clientX, e.clientY);

                        this.state.images.push({
                            img,
                            x: pos.x - width / 2,
                            y: pos.y - height / 2,
                            width,
                            height,
                        });
                    };
                };

                reader.readAsDataURL(file);
            }
        });
    }

    handleMouseDown(e) {
        if (e.button === 0) {
            const pos = this.screenToCanvas(e.clientX, e.clientY);

            for (let i = this.state.images.length - 1; i >= 0; i--) {
                const img = this.state.images[i];

                if (this.isPointInImage(pos.x, pos.y, img)) {
                    this.state.draggingImage = {
                        image: img,
                        offsetX: pos.x - img.x,
                        offsetY: pos.y - img.y,
                    };

                    break;
                }
            }

            if (!this.state.draggingImage) {
                this.state.isPanning = true;
                this.state.lastMouse = { x: e.clientX, y: e.clientY };
                this.canvas.style.cursor = "grabbing";
            }
        }
    }

    handleMouseMove(e) {
        if (this.state.isPanning) {
            const dx = (e.clientX - this.state.lastMouse.x) / this.state.scale;
            const dy = (e.clientY - this.state.lastMouse.y) / this.state.scale;

            this.state.offset.x += dx;
            this.state.offset.y += dy;
            this.state.lastMouse = { x: e.clientX, y: e.clientY };
        } else if (this.state.draggingImage) {
            const pos = this.screenToCanvas(e.clientX, e.clientY);

            this.state.draggingImage.image.x = pos.x - this.state.draggingImage.offsetX;
            this.state.draggingImage.image.y = pos.y - this.state.draggingImage.offsetY;
        }
    }

    handleMouseUp() {
        this.state.isPanning = false;
        this.state.draggingImage = null;
        this.canvas.style.cursor = "grab";
    }

    handleWheel(e) {
        e.preventDefault();

        const delta = e.deltaY * -this.state.zoomSpeed;
        const originalScale = this.state.scale;
        let newScale = originalScale * Math.exp(delta / 100);

        newScale = Math.max(this.state.zoomLimits.min, Math.min(newScale, this.state.zoomLimits.max));

        const rect = this.canvas.getBoundingClientRect();
        const screenX = e.clientX - rect.left;
        const screenY = e.clientY - rect.top;

        this.state.offset.x += screenX * (1 / newScale - 1 / originalScale);
        this.state.offset.y += screenY * (1 / newScale - 1 / originalScale);

        this.state.scale = newScale;
    }

    screenToCanvas(clientX, clientY) {
        const rect = this.canvas.getBoundingClientRect();

        return {
            x: (clientX - rect.left) / this.state.scale - this.state.offset.x,
            y: (clientY - rect.top) / this.state.scale - this.state.offset.y,
        };
    }

    isPointInImage(x, y, image) {
        return x >= image.x && x <= image.x + image.width && y >= image.y && y <= image.y + image.height;
    }

    startRendering() {
        const render = () => {
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            this.ctx.save();
            this.ctx.scale(this.state.scale, this.state.scale);
            this.ctx.translate(this.state.offset.x, this.state.offset.y);

            this.state.images.forEach((img) => {
                this.ctx.drawImage(img.img, img.x, img.y, img.width, img.height);
            });

            this.ctx.restore();
            requestAnimationFrame(render);
        };

        render();
    }
}

window.addEventListener("DOMContentLoaded", () => {
    new App(document.getElementById("app"));
});
