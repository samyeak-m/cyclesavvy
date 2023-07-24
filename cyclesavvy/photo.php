<!DOCTYPE html>
<html lang="en">
<head>

<style>  
        <?php include "css/photo.css"; ?>
    </style>
</head>
<body>

<div class="main">

<?php
$currentPage = 'home';
include("header.php");
?>

	<div class="sect one animation show-animation">
		<h2 class="animate">Section 1</h2>
		<p class="animate">Rent a Bike now</p>
		<a href="#model1"><p class="animate">Check Model</p></a>
		</div>

	<div class="sect two animation">
		<h2 class="animate">Section 2</h2>
		<p class="animate">Rent a Bike now</p>
		<a href="#model2"><p class="animate">Check Model</p></a>
		</div>

	<div class="sect three animation">
		<h2 class="animate">Section 3</h2>
		<p class="animate">Rent a Bike now</p>
		<a href="#model3"><p class="animate">Check Model</p></a>
		</div>

	<div class="sect four animation">
		<h2 class="animate">Section 4</h2>
		<p class="animate">Rent a Bike now</p>
		<a href="#model4"><p class="animate">Check Model</p></a>
	</div>
	

	<?php
include("footer.php");
?>
    </div>
    
    <script src="js/cs.js"></script>

</body>
</html>