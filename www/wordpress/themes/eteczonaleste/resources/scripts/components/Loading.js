class LoadingSpinner {
    constructor(element = false) {
        this.loading = element ? element : document.querySelector('[data-js="loading-spinner-main"]');
    }

    show() {
        this.loading.classList.add('show')
    }

    hidden() {
        console.log(this.loading)
        this.loading.classList.remove('show')
    }
}

export { LoadingSpinner };
