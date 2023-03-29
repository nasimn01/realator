// Swiper

const swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  freeMode: true,
  loop: true,
  lazyLoading: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  keyboard: {
    enabled: true,
  },
  breakpoints: {
    480: {
      slidesPerView: 1,
      spaceBetween: 40,
    },
    600: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    990: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
  },
});
