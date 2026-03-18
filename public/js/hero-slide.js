
var swiper = new Swiper(".main-swiper", {
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  speed: 1000,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});