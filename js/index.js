var animation = document.querySelectorAll('.animation');
var scrollContainer = document.querySelector('.main');

scrollContainer.addEventListener('scroll', function() {
  animation.forEach(sec => {
    var top = scrollContainer.scrollTop;
    var offset = sec.offsetTop - 250;
    var height = sec.offsetHeight;

    if (top >= offset && top < offset + height) {
      sec.classList.add('show-animation');
    } else {
      sec.classList.remove('show-animation');
    }
  });
});

var prevScrollpos= scrollContainer.scrollTop;


scrollContainer.addEventListener('scroll', function() {
  var width = document.documentElement.clientWidth;

  if (width <= 780) {
    var top = scrollContainer.scrollTop;
    var offset = prevScrollpos;
    var height = scrollContainer.offsetHeight;

    var currentScrollPos = scrollContainer.offsetTop;

    if (top >= offset && top < offset + height) {
      document.getElementById("right").style.display = "none";
    } else {
      document.getElementById("right").style.display = "flex";
    }
    prevScrollpos = top;
  }
});


function redirectToLink(url) {
    window.location.href = url;
}