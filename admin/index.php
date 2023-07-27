<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
       <?php include "css/admin.css"; ?>
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel - Product Management</h1>
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
                        <td><img src="example-product1.jpg" alt="Product 1"></td>
                        <td>Product 1</td>
                        <td>$19.99</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                        <td><button onclick="editProduct(0)">Edit</button></td>
                        <td><button onclick="deleteProduct(0)">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="example-product2.jpg" alt="Product 2"></td>
                        <td>Product 2</td>
                        <td>$24.99</td>
                        <td>Vestibulum vulputate turpis eu dictum fermentum.</td>
                        <td><button onclick="editProduct(1)">Edit</button></td>
                        <td><button onclick="deleteProduct(1)">Delete</button></td>
                    </tr>
                    <!-- End of Example Product Details -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/admin.js"></script>
</body>
</html>
