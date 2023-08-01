
<html>
<head>
    <style>
       <?php include "css/test.css"; ?>
    </style>
</head>
<body>

    <div class="container">
        <h1>Product Management</h1>
        <!-- "Add Product" button aligned to the right -->
        <button class="add-product-button" onclick="openModal('add')">+</button>
        <!-- The Modal for Adding and Editing -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div id="modalContent"></div>
            </div>
        </div>
        <div class="product-table">
            <table>
                <!-- Table headers -->
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="productList">
                    <!-- Example Product Details -->
                    <tr>
                        <td><img class="adminproduct-image" src="../photo/user.png" alt="Product 1"></td>
                        <td class="adminproduct-name"><p>Product 1</p></td>
                        <td class="adminproduct-price">$19.99</td>
                        <td class="adminproduct-detail"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></td>
                        <td><button class="edit-product updatebtn" onclick="editProduct(this)">Edit</button></td>
                        <td><button class="delete-product updatebtn" onclick="deleteProduct(this)">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img class="adminproduct-image" src="../photo/user.png" alt="Product 2"></td>
                        <td class="adminproduct-name"><p>Product 2</p></td>
                        <td class="adminproduct-price">$24.99</td>
                        <td class="adminproduct-detail"><p>Vestibulum vulputate turpis eu dictum fermentum.</p></td>
                        <td><button class="edit-product updatebtn" onclick="editProduct(this)">Edit</button></td>
                        <td><button class="delete-product updatebtn" onclick="deleteProduct(this)">Delete</button></td>
                    </tr>
                    <!-- End of Example Product Details -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/chatgpt.js"></script>
</body>
</html>
