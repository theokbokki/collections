export default class Dashboard {
    constructor(el) {
        this.el = el;

        this.getElements();
        this.setEvents();
    }

    getElements() {
        this.triggers = this.el.querySelectorAll("[data-form=draft-collection]");
        this.form = this.el.querySelector("#draft-collection-form");
    }

    setEvents() {
        this.triggers.forEach((trigger) => {
            trigger.addEventListener("click", this.showForm.bind(this));
        });
    }

    async showForm(e) {
        e.preventDefault;

        this.form.classList.remove("hidden");
        this.form.classList.add("flex");

        await new Promise((resolve) => requestAnimationFrame(resolve));

        this.form.classList.remove("opacity-0");
    }
}
