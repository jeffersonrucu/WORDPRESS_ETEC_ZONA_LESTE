class ListingCoursesFilter {
    constructor() {
        this.block          = document.querySelector('[data-js="listing-courses-filter"]');
        this.filters        = document.querySelectorAll('[data-filter]');
        this.filterID       = '';
        this.containerCards = document.querySelector('[data-container="cards"]');
        this.card           = document.querySelector('[data-template="card"]');

        this.handleFilter()
    }

    handleFilter() {
        this.filters.forEach(filter => {
            filter.addEventListener('click', () => {
                this.filterCourses(filter)
            })
        })
    }

    filterCourses(filter) {
        this.filters.forEach(element => {
            element.classList.remove('active')
        })

        filter.classList.contains('active') ? this.removeFilter(filter) : this.addFilter(filter)
    }

    addFilter(filter) {
        filter.classList.add('active')
        this.filterID = filter.getAttribute('data-filter')
        this.getCourses()
    }

    removeFilter(filter) {
        filter.classList.remove('active')
        this.filterID = ''
        this.getCourses()
    }

    renderCards(data) {
        const cloneCard = this.card.cloneNode(true);

        console.log(cloneCard);
        console.log(data);
        this.containerCards.innerHTML = data['html']
    }

    getCourses() {
        fetch(`${this.getUrl()}/wp-admin/admin-ajax.php?action=get_fieltered_courses&term=${this.filterID}`)
            .then(response => response.json())
            .then(data => {
                this.renderCards(data);
            })
    }

    getUrl() {
        return window.location.protocol + '//' + window.location.host;
    }
}

export { ListingCoursesFilter };
