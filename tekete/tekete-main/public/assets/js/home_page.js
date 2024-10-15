var slideIndex = 1;
showSlides(slideIndex);

//next slide
function plusSlides(n) {
  showSlides((slideIndex += n));
}

//current slide
function currentSlide(n) {
  showSlides((slideIndex = n));
}

//previous slide
function minusSlides(n) {
  showSlides((slideIndex -= n));
}

//display slides
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex - 1].style.display = "block";
}
//make slides change automatically
setInterval(function () {
  plusSlides(1);
}, 15000);

function login() {
  window.location.href = "usertest.php";
}
function register() {
  window.location.href = "register.php";
}

// navigate to the login page
function redirectToLogin() {
  window.location.href = "app/AppComponent/Views/login_page.php";
}

// navigate to the login page
function redirectToRegister() {
  window.location.href = "app/AppComponent/Views/register_page.php";
}
