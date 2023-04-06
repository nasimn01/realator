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

//  Search page

const mainProSec = document.getElementById("main-pro-sec");
const innerRowRemove = document.querySelectorAll(".inner-row-remove");
const innerCol4Remove = document.querySelectorAll(".inner-col4-remove");
const innerCol8Remove = document.querySelectorAll(".inner-col8-remove");
const mainCol6Add = document.querySelectorAll(".main-col6-add");

function styOne() {
  mainProSec.classList.remove("row");
  innerRowRemove.forEach((i) => {
    i.classList.add("row");
  });
  innerCol4Remove.forEach((i) => {
    i.classList.add("col-sm-4");
  });
  innerCol8Remove.forEach((i) => {
    i.classList.add("col-sm-8");
  });
  mainCol6Add.forEach((i) => {
    i.classList.remove("col-sm-6");
  });
}
function styTwo() {
  mainProSec.classList.add("row");
  innerRowRemove.forEach((i) => {
    i.classList.remove("row");
  });
  innerCol4Remove.forEach((i) => {
    i.classList.remove("col-sm-4");
  });
  innerCol8Remove.forEach((i) => {
    i.classList.remove("col-sm-8");
  });
  mainCol6Add.forEach((i) => {
    i.classList.add("col-sm-6");
  });
}
