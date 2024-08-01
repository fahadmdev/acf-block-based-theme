var swiper = new Swiper(".staff-augmentation-slider", {
    pagination: {
      el: ".swiper-pagination.staff-augmentation-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    navigation: {
      nextEl: ".swiper-button-next.staff-augmentation-nav",
      prevEl: ".swiper-button-prev.staff-augmentation-nav",
    },
    loop: true,
    autoplay: true,
    speed: 1200,
    delay: 5000,
    pauseOnMouseEnter: true
});