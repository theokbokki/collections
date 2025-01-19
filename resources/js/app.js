import './bootstrap';

class App {
    constructor(el) {
        this.el = el

        this.getElements();
    }

    getElements() {
        this.canvas = this.el.querySelector('#collection');
    }
}

window.addEventListener('DOMContentLoaded', () => {
    new App(document.querySelector('.app'));
});
