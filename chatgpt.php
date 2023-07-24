<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   
	
	<title>product</title>

	<style>
		<?php include "css/chatgpt.css"; ?>
	</style>
</head>
<body>

<div class="main">
	<section class="product">
		<figure class="animation show-animation" onclick="redirectToLink('#model1')">
			<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" class="animate">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>

		</figure>

		<figure class="animation" onclick="redirectToLink('#model2')">
		<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" class="animate">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>

		<figure class="animation" onclick="redirectToLink('#model3')">
		<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" class="animate">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>

		<figure class="animation" onclick="redirectToLink('#model4')">
		<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" class="animate">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>

		<figure class="animation" onclick="redirectToLink('#model5')">
		<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" class="animate">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>

		<figure class="animation" onclick="redirectToLink('#model6')">
		<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" class="animate">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>

		<figure class="animation" onclick="redirectToLink('#model7')">
		<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" class="animate">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>

		<figure class="animation" onclick="redirectToLink('#model8')">
		<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one" class="animate">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>
	</section>
</div>

	<script>

function redirectToLink(url) {
  window.location.href = url;
}

		var animation = document.querySelectorAll(".animation");
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
	</script>
	
	
</body>
</html>