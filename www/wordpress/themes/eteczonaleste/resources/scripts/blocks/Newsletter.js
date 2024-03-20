class Newsletter {
  constructor() {
      this.carousel();
  }

    carousel() {
        new window.Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                slidesPerView: 2,
                spaceBetween: 20,
                },
                1024: {
                slidesPerView: 3,
                spaceBetween: 50,
                },
            },
        });
    }
}

export { Newsletter };
