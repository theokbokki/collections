import axios from "axios";
import "./bootstrap";

class App {
    constructor(el) {
        this.el = el;

        this.setDefaults();
        this.getElements();
        this.setEvents();
        this.updateTransform();
    }

    setDefaults() {
        this.transform = {
            x: window.innerWidth / 2,
            y: window.innerHeight / 2,
            scale: 1,
        };
        this.isDragging = false;
        this.lastX = 0;
        this.lastY = 0;
        this.selectedImage = null;
        this.imgStartX = 0;
        this.imgStartY = 0;
        this.mouseStartX = 0;
        this.mouseStartY = 0;
        this.canvasSize = 100000;
    }

    getElements() {
        this.canvas = this.el.querySelector("#canvas");
    }

    setEvents() {
        this.canvas.addEventListener("dragover", this.handleDragOver.bind(this));

        this.canvas.addEventListener("drop", this.handleDrop.bind(this));

        this.canvas.addEventListener("mousedown", this.handleMouseDown.bind(this));

        document.addEventListener("mousemove", this.handleMouseMove.bind(this));

        document.addEventListener("mouseup", this.handleMouseUp.bind(this));

        this.canvas.addEventListener("wheel", this.handleWheel.bind(this));
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
                    img.className = "image";

                    const rect = canvas.getBoundingClientRect();
                    const x = (e.clientX - rect.left) / this.transform.scale;
                    const y = (e.clientY - rect.top) / this.transform.scale;

                    img.style.left = `${x - img.naturalWidth / 2}px`;
                    img.style.top = `${y - img.naturalHeight / 2}px`;

                    img.draggable = false;
                    img.addEventListener("dragstart", (e) => e.preventDefault());

                    this.canvas.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });
    }

    handleMouseDown(e) {
        if (e.target === this.canvas) {
            this.isDragging = true;
            this.lastX = e.clientX;
            this.lastY = e.clientY;
            this.canvas.style.cursor = "grabbing";
        }

        if (e.target.classList.contains("image")) {
            this.selectedImage = e.target;
            this.imgStartX = parseFloat(this.selectedImage.style.left);
            this.imgStartY = parseFloat(this.selectedImage.style.top);
            this.mouseStartX = e.clientX;
            this.mouseStartY = e.clientY;
            e.preventDefault();
        }
    }

    handleMouseMove(e) {
        if (this.isDragging) {
            const dx = e.clientX - this.lastX;
            const dy = e.clientY - this.lastY;
            this.lastX = e.clientX;
            this.lastY = e.clientY;

            this.transform.x += dx;
            this.transform.y += dy;

            this.updateTransform();
        }

        if (this.selectedImage) {
            const dx = (e.clientX - this.mouseStartX) / this.transform.scale;
            const dy = (e.clientY - this.mouseStartY) / this.transform.scale;

            this.selectedImage.style.left = `${this.imgStartX + dx}px`;
            this.selectedImage.style.top = `${this.imgStartY + dy}px`;
        }
    }

    handleMouseUp(e) {
        this.isDragging = false;
        this.canvas.style.cursor = "grab";
        this.selectedImage = null;
    }

    handleWheel(e) {
        e.preventDefault();
        const delta = e.deltaY > 0 ? 0.9 : 1.1;
        const newScale = this.transform.scale * delta;

        const clampedScale = Math.min(Math.max(newScale, 0.1), 10);
        const scaleFactor = clampedScale / this.transform.scale;

        this.transform.x = e.clientX - (e.clientX - this.transform.x) * scaleFactor;
        this.transform.y = e.clientY - (e.clientY - this.transform.y) * scaleFactor;
        this.transform.scale = clampedScale;

        this.updateTransform();
    }

    updateTransform() {
        const maxX = (this.canvasSize / 2) * this.transform.scale - window.innerWidth / 2;
        const minX = (-this.canvasSize / 2) * this.transform.scale + window.innerWidth / 2;
        const maxY = (this.canvasSize / 2) * this.transform.scale - window.innerHeight / 2;
        const minY = (-this.canvasSize / 2) * this.transform.scale + window.innerHeight / 2;

        this.transform.x = Math.max(minX, Math.min(this.transform.x, maxX));
        this.transform.y = Math.max(minY, Math.min(this.transform.y, maxY));

        this.canvas.style.transform = `
            translate(${this.transform.x}px, ${this.transform.y}px)
            scale(${this.transform.scale})
        `;
    }
}

window.addEventListener("DOMContentLoaded", () => {
    new App(document.querySelector(".app"));
});
