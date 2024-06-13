<?php

include "../dbconnect.php";
$q="select * from tbl_inventory";
$result=mysqli_query($con,$q);
$table="";
$table.= "<table class='display_table'>";
$table.= "<tr>";
$table.= "<th>name<th>price<th colspan=3>Action";

$table.= "</tr>";
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
  $id=$row["id"];
  $table.= "<tr>";
      // foreach($row as $k=>$v){
      //   $table.= "<td> $v </td>";
      // }
$table.="<td>";
$table.=$row["name"];
$table.="</td>";

$table.="<td>";
$table.=$row["price"];
$table.="</td>";
      $table.="<td><a onclick=\"return confirm('Are you sure to delete?')\" href='deleteItem.php?id=$id'>Delete</a></td>";
      $table.="<td><a  href='updateItemForm.php?id=$id'>update</a></td>";
      $table.="<td><a  href='viewItem.php?id=$id'>View</a></td>";
      $table.= "</tr>";
}
$table.= "</table>";

// sleep(1);
echo $table;


?>