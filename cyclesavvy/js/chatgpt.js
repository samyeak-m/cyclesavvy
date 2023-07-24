var animation = document.querySelectorAll(".section");
    window.onscroll =() =>{
        animation.forEach(sec=>{
            var top = window.scrollY;
            var offset = sec.offsetTop -300;
            var height =sec.offsetHeight;

            if (top >= offset && top < offset + height){
                sec.classList.add('show-animation');

            }

            else{
                sec.classList.remove('show-animation');

            }
        })
    }