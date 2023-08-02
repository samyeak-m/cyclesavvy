<?php

$id=$_GET['id'];
include "../dbconnect.php";
$q="select * from tbl_inventory where stk_id=$id";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

<style>
<?php include "css/edititem.css";?>
</style>

<div class="modal">
    <div class="modalcontent">
    <form method="post" id="myform" action="updateitem.php" enctype="multipart/form-data">
      <h2>Edit Product</h2>
      <div class="product-form">
        <input type="text" name="name" placeholder="Product Name" value="<?php  echo $row['name'];?>" required>
        <input type="number" name="price" placeholder="Price" value="<?php  echo $row['price'];?>" required>
        <textarea name="description" placeholder="Product Description" required><?php  echo $row['description'];?></textarea>
        <input type="file" name="photo" accept="image/*">
      </div>
      <input type="hidden" name="id" value="<?php  echo $row['stk_id'];?>">
      <button type="submit" class="saveproduct-btn">Save Changes</button>
    </form>
    </div>
    </div>