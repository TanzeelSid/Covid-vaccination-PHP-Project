<?php 

include("../include/connection.php");

$id = $_POST['id'];

$query = "UPDATE hospitals SET status='Approved' WHERE id='$id'";

mysqli_query($connect,$query);



?>