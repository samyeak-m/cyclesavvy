<?php
$currentPage = 'product';
include("header.php");
?>
<html>
<head>
    <style>
       <?php include "css/admin.css"; ?>
    </style>
</head>
<body>

    <div class="container">
        <h1>Product Management</h1>
        <button class="add-product-button" onclick="openModal('add')">+</button>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div id="modalContent"></div>
            </div>
        </div>
        <div class="product-table">
            <table>
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
                
                <?php

                include "../dbconnect.php";
                $q="select * from tbl_inventory";
                $result=mysqli_query($con,$q);
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        echo "<tr>";

                        
                        echo "<td><img src='../photo/{$row['photo']}' class='adminproduct-image' alt='{$row['name']} Photo'></td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td><a class='edit-product updatebtn' href='edititem.php?id={$row['stk_id']}'>Edit</a></td>";
                        echo "<td><a class='delete-product updatebtn' onclick=\"return confirm('Are you sure to delete?')\" href='deleteItem.php?id={$row['stk_id']}'>Delete</a></td>";                            
                        echo"</tr>";
                    }

                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/admin.js"></script>
</body>
</html>
