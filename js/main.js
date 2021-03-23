$(document).ready(function () {
const hotelSlider = new Swiper('.hotel-slider', {
  // Optional parameters
  loop: true,
  // Navigation arrows
  navigation: {
    nextEl: '.hotel-slider__button--next',
    prevEl: '.hotel-slider__button--prev',
  },
  keyboard: {
    enabled: true,
    onlyInViewport: false,
  },
  
});
const reviewSlider = new Swiper('.reviews-slider', {
  // Optional parameters
  loop: true,
  // Navigation arrows
  navigation: {
    nextEl: '.reviews-slider__button--next',
    prevEl: '.reviews-slider__button--prev',
  },
  keyboard: {
    enabled: true,
    onlyInViewport: false,
  },
  
});


    ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [7.573638, 79.803867],
            zoom: 12
        }, {
            searchControlProvider: 'yandex#search'
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'Grand Hilton Hotel',
         //   balloonContent: 'Это красивая метка'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'img/icon-place.png',
            // Размеры метки.
            iconImageSize: [30, 30],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-5, -38]
        });
        myMap.geoObjects
        .add(myPlacemark);
});
$('.parallax-window').parallax({imageSrc: 'img/newsletter-bg.jpeg'});

var menuButton = document.querySelector(".menu-button");
menuButton.addEventListener('click', function () {
  document.querySelector(".navbar-bottom").classList.toggle("navbar-bottom--visible");
});
var modalButton = $('[data-toggle=modal]');
var closeModalButton = $(".modal__close");
modalButton.on('click', openModal);
closeModalButton.on('click', closeModal);
function openModal(){
  var modalOverlay = $(".modal__overlay");
  var modalDialog = $(".modal__dialog");
  modalOverlay.addClass("modal__overlay--visible");
  modalDialog.addClass("modal__dialog--visible");
}
function closeModal(event){
  event.preventDefault();
  var modalOverlay = $(".modal__overlay");
  var modalDialog = $(".modal__dialog");
  modalOverlay.removeClass("modal__overlay--visible");
  modalDialog.removeClass("modal__dialog--visible");
}
$(document).on('keydown', function(e) {
  if (e.keyCode == 27)
   var modalOverlay = $(".modal__overlay");
  var modalDialog = $(".modal__dialog");
  modalOverlay.removeClass("modal__overlay--visible");
  modalDialog.removeClass("modal__dialog--visible");
});




$(".form").each(function () {
  $(this).validate({
  messages: {
    name: "Please specify your name",
    phone: "Please specify your phone number",
    email: {
      required: "Please specify email address",
      email: "Your email address must be in the format of name@domain.com"
    }
  }
});
});

$('.phone').mask('+7 (999) 999-99-99');
AOS.init();
});
