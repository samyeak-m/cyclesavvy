<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Page</title>
    <link rel="stylesheet" href="css/super-admin.css">
</head>
<body>
    <div class="container">
        <h1>Admin Management</h1>
        <!-- "Add Admin" button aligned to the right -->
        <button class="add-admin-button" onclick="openModal('addAdmin')">Add Admin</button>
        <!-- The Modal for Adding Admin -->
        <div id="addAdminModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                
                
                    <form id="addAdminForm" method="post" action="saveadmin.php" enctype="multipart/form-data">
                    <h2>Add Admin</h2>
                    <input type="text" id="adminName" name="name" placeholder="Name" required>
                    <input type="text" id="adminEmail" name="email" placeholder="Email" required>
                    <input type="password" id="adminPassword" name="password" placeholder="Password" required>
                    <input type="text" id="adminPhone" name="phone" placeholder="Phone" required>
                    <input type="text" id="adminAddress" name="address" placeholder="Address" required>
                    <button class="saveadmin" onclick="saveAdmin()">Save Admin</button>
                    </form>

            </div>
        </div>
        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="adminList">
                <?php

include "../dbconnect.php";
$q="select * from tbl_admin";
$result=mysqli_query($con,$q);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo "<tr>";

        
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td><a class='delete-product updatebtn' onclick=\"return confirm('Are you sure to delete?')\" href='deleteadmin.php?id={$row['a_id']}'>Delete</a></td>";                            
        echo"</tr>";
    }

    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        
    // Function to open the modal
    function openModal(modalType) {
        var modal = document.getElementById(modalType + "Modal");
        modal.style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
        var modals = document.getElementsByClassName("modal");
        for (var i = 0; i < modals.length; i++) {
            modals[i].style.display = "none";
        }
    }

    // Function to save admin details
    function saveAdmin(event) {
            event.preventDefault(); // Prevent form submission
            var adminName = document.getElementById("adminName").value;
            var adminEmail = document.getElementById("adminEmail").value;
            var adminPassword = document.getElementById("adminPassword").value;
            var adminPhone = document.getElementById("adminPhone").value;
            var adminAddress = document.getElementById("adminAddress").value;

            // Perform form validation
            if (adminName.trim() === '' || adminEmail.trim() === '' || adminPassword.trim() === '' || adminPhone.trim() === '' || adminAddress.trim() === '') {
                alert("All fields are required!");
                return;
            }

        // Add your logic here to save the admin details to the server or perform other actions
        // For this example, we will simply display the admin details in the table

        var adminList = document.getElementById("adminList");
        var newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td class="admin-name"><p>${adminName}</p></td>
            <td class="admin-email"><p>${adminEmail}</p></td>
            <td class="admin-phone"><p>${adminPhone}</p></td>
            <td class="admin-address"><p>${adminAddress}</p></td>
            <td><button class="delete-admin updatebtn" onclick="deleteAdmin(this)">Delete</button></td>
        `;
        adminList.appendChild(newRow);

        // Close the modal after saving
        closeModal();
    }

    // Function to delete admin details
    function deleteAdmin(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
    </script>
</body>
</html>
