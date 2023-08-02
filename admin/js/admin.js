
// Function to pull data from the HTML table and update the products array


// Function to open the modal
function openModal(mode, modalContent = null) {
  const modal = document.getElementById("myModal");
  modal.style.display = "block";
  const modalContentContainer = document.getElementById("modalContent");

  if (mode === "add") {
    modalContentContainer.innerHTML = `
    <form method="post"id="myform" action="saveItem.php" enctype="multipart/form-data">
      <h2>Add Product</h2>
      <div class="product-form">
        <input type="text" id="productName" name="name" placeholder="Product Name" required>
        <input type="number" id="productPrice" name="price" placeholder="Price" required>
        <textarea id="productDescription" name="description" placeholder="Product Description" required></textarea>
        <input type="file" id="productImage" name="photo" accept="image/*">
      </div>
      <button class="addproduct" onclick="addProduct()">Add Product</button>
      </form>
    `;
  } else if (mode === "edit" && modalContent) {
    modalContentContainer.innerHTML = "";
    modalContentContainer.appendChild(modalContent);
  }
}

// Function to close the modal
function closeModal() {
  const modal = document.getElementById("myModal");
  modal.style.display = "none";
}

// Function to add a new product
function addProduct() {
  const productName = document.getElementById("productName").value;
  const productPrice = parseFloat(document.getElementById("productPrice").value);
  const productDescription = document.getElementById("productDescription").value;
  const productImage = document.getElementById("productImage").files[0];

  if (productName && productPrice && productDescription && productImage) {
    const newProduct = {
      name: productName,
      price: productPrice,
      description: productDescription,
      image: URL.createObjectURL(productImage)
    };

    products.push(newProduct);
    closeModal();
    displayProducts();
  } else {
    alert("Please fill all the fields before adding a product.");
  }
}

// Function to edit a product
function editProduct(index) {
  console.log(index);
  $sid=index;

  const product = products[index];
  const editModalContent = document.createElement("div");
  editModalContent.innerHTML = `

  <?php

$id=$_GET['index'];
include "../dbconnect.php";
$q="select * from tbl_inventory where stk_id=$id";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

    <form method="post" id="myform" action="updateitem.php" enctype="multipart/form-data">
      <h2>Edit Product</h2>
      <div class="product-form">
        <input type="text" name="name" placeholder="Product Name" value="${product.name}" required>
        <input type="number" name="price" placeholder="Price" value="${product.price}" required>
        <textarea name="description" placeholder="Product Description" required>${product.description}</textarea>
        <input type="file" name="photo" accept="image/*">
      </div>
      <input type="text" name="id" value="${index}">
      <button type="submit" class="saveproduct-btn">Save Changes</button>
    </form>
  `;

  openModal("edit", editModalContent);
}


// Function to save changes to a product
function saveProduct(index) {
  const productName = document.getElementById("editProductName").value;
  const productPrice = parseFloat(document.getElementById("editProductPrice").value);
  const productDescription = document.getElementById("editProductDescription").value;
  const productImage = document.getElementById("editProductImage").files[0];

  if (productName && productPrice && productDescription) {
    products[index].name = productName;
    products[index].price = productPrice;
    products[index].description = productDescription;
    if (productImage) {
      products[index].image = URL.createObjectURL(productImage);
    }

    closeModal();
    displayProducts();
  } else {
    alert("Please fill all the fields before saving the changes.");
  }
}

pullDataFromTable();
displayProducts();
