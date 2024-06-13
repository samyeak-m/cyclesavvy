// Sample product data (replace this with actual product data from the server)
let products = [];

// Function to pull data from the HTML table and update the products array
function pullDataFromTable() {
  const productList = document.getElementById("productList");
  products = [];

  const rows = productList.getElementsByTagName("tr");
  for (const row of rows) {
    const cells = row.getElementsByTagName("td");
    const product = {
      image: cells[0].querySelector("img").src,
      name: cells[1].textContent,
      price: parseFloat(cells[2].textContent.replace("$", "")),
      description: cells[3].textContent
    };
    products.push(product);
  }
}

// Function to display products in the table
function displayProducts() {
  const productList = document.getElementById("productList");
  productList.innerHTML = "";

  products.forEach((product, index) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td><img class="adminproduct-image" src="${product.image}" alt="${product.name}" class="product-image"></td>
      <td class="adminproduct-name"><p>${product.name}</p></td>
      <td class="adminproduct-price">$${product.price.toFixed(2)}</td>
      <td class="adminproduct-detail"><p>${product.description}</p></td>
      <td><button class="edit-product updatebtn" onclick="editProduct(${index})">Edit</button></td>
      <td><button class="delete-product updatebtn" onclick="deleteProduct(${index})">Delete</button></td>
    `;
    productList.appendChild(row);
  });
}

// Function to open the modal
function openModal(mode, modalContent = null) {
  const modal = document.getElementById("myModal");
  modal.style.display = "block";
  const modalContentContainer = document.getElementById("modalContent");

  if (mode === "add") {
    modalContentContainer.innerHTML = `
      <h2>Add Product</h2>
      <div class="product-form">
        <input type="text" id="productName" placeholder="Product Name" required>
        <input type="number" id="productPrice" placeholder="Price" required>
        <textarea id="productDescription" placeholder="Product Description" required></textarea>
        <input type="file" id="productImage" accept="image/*">
      </div>
      <button class="addproduct" onclick="addProduct()">Add Product</button>
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
  const product = products[index];
  console.log(products);
  const editModalContent = document.createElement("div");
  editModalContent.innerHTML = `
    <h2>Edit Product</h2>
    <div class="product-form">
      <input type="text" id="editProductName" placeholder="Product Name" value="${product.name}" required>
      <input type="number" id="editProductPrice" placeholder="Price" value="${product.price}" required>
      <textarea id="editProductDescription" placeholder="Product Description" required>${product.description}</textarea>
      <input type="file" id="editProductImage" accept="image/*">
    </div>
    <button class="saveproduct-btn" onclick="saveProduct(${index})">Save Changes</button>
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

// Function to delete a product
function deleteProduct(index) {
  if (confirm("Are you sure you want to delete this product?")) {
    products.splice(index, 1);
    displayProducts();
  }
}

// Display initial products on page load
pullDataFromTable();
displayProducts();
