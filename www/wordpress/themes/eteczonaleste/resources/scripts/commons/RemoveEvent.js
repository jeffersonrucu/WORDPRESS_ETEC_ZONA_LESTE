class RemoveEvent {
    constructor() {
        this.element = document.querySelectorAll('[data-js="remove-event"]');

        console.log(this.element)

        if(this.element.length > 0) {
           this.element.forEach((element) => {
            element.addEventListener('click', (event) => {
                console.log('remove event')
                event.preventDefault();
            })
           })
        }
    }
}

export { RemoveEvent };
