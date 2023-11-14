import { LoadingSpinner } from "@scripts/components/Loading";

class ComponentAccessibilityBar {
    constructor() {
        this.accessibilityBars = document.querySelectorAll('[data-component="accessibility-bar"]');
        this.levelFontSize = 1;
        this.loading = new LoadingSpinner();

        if(this.accessibilityBars.length <= 0) return;

        this.coreHtml = document.querySelector('html');
        this.coreBody = document.body;


        if (localStorage.getItem('darkMode') !== null && localStorage.getItem('darkMode') == 'true') {
            this.coreBody.classList.add('dark');
            this.coreHtml.classList.add('dark');
        }

        if (localStorage.getItem('fontLevel') !== null) {
            this.coreHtml.classList.add(localStorage.getItem('fontLevel'));
        }

        this.accessibilityBars.forEach(element => {
            const button = {
                'guide'         : element.querySelector('[data-click="guide-accessibility"]'),
                'contrast'      : element.querySelector('[data-click="contrast-accessibility"]'),
                'fontsizeup'    : element.querySelector('[data-click="fontsizeup-accessibility"]'),
                'fontsizedown'  : element.querySelector('[data-click="fontsizedown-accessibility"'),
            }

            button.guide.addEventListener('click', () => {
                this.handleGuide();
            })

            button.contrast.addEventListener('click', () => {
                this.handleContrast();
            })

            button.fontsizeup.addEventListener('click', () => {
                this.handleFontSizeUp();
            })

            button.fontsizedown.addEventListener('click', () => {
                this.handleFontSizeDown();
            })
        })
    }

    handleGuide() {
        window.location.href = "/guia-acessibilidade";
    }

    handleContrast() {
        this.loading.show();

        setTimeout(() => {
            const blocks = document.querySelectorAll('[data-block]')

            const isDarkMode = this.coreBody.classList.contains('dark');

            this.coreBody.classList.toggle('dark', !isDarkMode);
            this.coreHtml.classList.toggle('dark', !isDarkMode);

            if (blocks.length > 0) {
                blocks.forEach(block => {
                    block.classList.toggle('dark', !isDarkMode);
                });
            }

            localStorage.setItem('darkMode', !isDarkMode);

            setTimeout(() => {
                this.loading.hidden();
            }, 1000);
        }, 500);
    }

    handleFontSizeUp() {
        if(this.levelFontSize == 5) return;

        this.levelFontSize++;
        this.coreHtml.classList.replace(`font-level--${this.levelFontSize - 1}`, `font-level--${this.levelFontSize}`);
        localStorage.setItem('fontLevel', `font-level--${this.levelFontSize}`);
    }

    handleFontSizeDown() {
        if(this.levelFontSize == 1) return;

        this.levelFontSize--;
        this.coreHtml.classList.replace(`font-level--${this.levelFontSize + 1}`, `font-level--${this.levelFontSize}`);
        localStorage.setItem('fontLevel', `font-level--${this.levelFontSize}`);
    }
}

export { ComponentAccessibilityBar };
