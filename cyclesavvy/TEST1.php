<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1" name="viewport" />

  <title>Scroll List with Animations</title>
  <link rel="stylesheet" href="css/test.css">
  </head>
<body>

<div class="product-v">

<a onclick="openModal()" style="width: auto;">
<figure class="product-button">
			<img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one">
			<figcaption><h4> Cycle Name </h4> <p>Rs 1,000</p></figcaption>
		</figure>
	</a>
  <div id="product-pop" class="product-modal">
    <div class="product-container product-animated" id="product-container">
      <span onclick="closeModal()" class="product-close">&times;</span>
      
      <div class="product-view">
        <div class="product-photo">
          <img src="https://cdn.shopify.com/s/files/1/0541/0154/1047/products/0711964_b_900x.jpg?v=1614971567" alt="one">
        </div>

        <div class="product-detail">
          <h2 class="product-head">Cycle Name</h2>
          <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores veniam minima harum blanditiis voluptas optio ipsum quibusdam molestiae ea voluptate tempore, amet dolorum aliquam incidunt natus voluptatem, molestias voluptates. Dolores illo unde quae repudiandae dolorum, quam consequatur impedit nobis obcaecati.</p>
          

          <div class="product-review">
            
            <div class="review-high">
            <h4 class="review-user">Top user</h4>

              <div class="review-top">
                <img src="photo/user.png" alt="top" class="top-img">
                <h5 class="review-name">Name1</h5>
              </div>

              <div class="review-top">
                <img src="photo/user.png" alt="top" class="top-img">
                <h5 class="review-name">Name2</h5>
              </div>
            </div>

            <div class="review-low">
            <h4 class="review-user">Aveage user</h4>

              <div class="review-short">
                <img src="photo/user.png" alt="short" class="review-img">
                <h5 class="review-name">Name3</h5>
              </div>

              <div class="review-short">
                <img src="photo/user.png" alt="short" class="review-img">
                <h5 class="review-name">Name4</h5>
              </div>
            

            </div>
          </div>
        
          <div class="product-booking">
            <h5 class="product-price">Rs 1,000</h5>
            <button type="submit"><h3 class="product-book">Book Now</h3></button>
          </div>

        </div>
      </div>
    </div>
  </div>

  </div>

  <script>
  document.addEventListener("DOMContentLoaded", function () {
    var notBtn = document.querySelector(".product-v");
    var width = document.documentElement.clientWidth;

    function onResize(event) {
      width = document.documentElement.clientWidth;
    }

    function onClick() {
      if (width > 780) {
        document.getElementById('product-pop').style.display = 'flex';
      } else {
        window.location.href = "productmobile.php";
      }
    }

    notBtn.addEventListener("click", onClick);

    var modal = document.getElementById('product-pop');

    window.addEventListener("resize", function () {
      notBtn.removeEventListener("click", onClick);
      onResize();
      notBtn.addEventListener("click", onClick);
    });

    window.addEventListener("click", function(event) {
      if (event.target === modal || event.target.classList.contains("product-close")) {
        modal.style.display = "none";
      }
    });
  });
</script>

  </body>
</html>
