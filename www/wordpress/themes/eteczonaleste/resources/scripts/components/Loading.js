class LoadingSpinner {
    constructor() {
        this.loading = document.querySelector('[data-js="loading-spinner"]');
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
