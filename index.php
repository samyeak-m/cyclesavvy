<!DOCTYPE html>
<head>
    <style>  
        <?php include "css/index.css"; ?>
    </style>
</head>
<body>

<div class="main">

<?php
$currentPage = 'home';
include("header.php");
?>


	<div class="sect one animation show-animation" onclick="redirectToLink('product.php')">

		<img src="photo/index_2.jpg" alt="" class="photo">
		<h2 class="animate">Section 1</h2>
		<p class="animate" style="--i:0;">Rent a Bike now</p>
		</div>

	<div class="sect two animation" onclick="redirectToLink('product.php')">
	
		<img src="photo/index_1.jpg" alt="" class="photo">
		<h2 class="animate">Section 2</h2>
		<p class="animate" style="--i:0;">Rent a Bike now</p>
		</div>

	<div class="sect three animation" onclick="redirectToLink('product.php')">
	<img src="photo/index_3.jpg" alt="" class="photo">
		<h2 class="animate">Section 3</h2>
		<p class="animate" style="--i:0;">Rent a Bike now</p>
		</div>

	<div class="sect four animation" onclick="redirectToLink('product.php')">
	<img src="photo/index_6.png" alt="" class="photo">
		<h2 class="animate">Section 4</h2>
		<p class="animate" style="--i:0;">Rent a Bike now</p>
	</div>


<?php
include("footer.php");
?>
</div>

<script src="js/index.js"></script>

</body>
</html>