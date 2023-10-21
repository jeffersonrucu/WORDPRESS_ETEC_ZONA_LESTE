class Header {
    constructor() {
        this.headers = document.querySelectorAll('[data-section="header"]');

        if(this.headers.length <= 0) return;

        this.coreBody = document.body;

        this.headers.forEach(header => {
            const btnHamburger = header.querySelectorAll('[data-js="btn-hamburger"]')

            btnHamburger.forEach(btn => {
                btn.addEventListener('click', () => {
                    this.handleBtnHamburger(header, btn)
                })
            });
        });
    }

    handleBtnHamburger(header, btn) {
        const navigationBar = header.querySelector('[data-js="navigation-bar"]')

        if(btn.classList.contains('active')) {
            btn.classList.remove('active')
            navigationBar.classList.remove('active')
            this.coreBody.classList.remove('overflow-hidden')
        } else {
            btn.classList.add('active')
            navigationBar.classList.add('active')
            this.coreBody.classList.add('overflow-hidden')
        }
    }
}

export { Header };
