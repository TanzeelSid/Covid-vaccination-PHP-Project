<?php 

include("../include/connection.php");

$query = "SELECT * FROM hospitals WHERE status='Pending' ORDER BY data_reg ASC";
$res = mysqli_query($connect,$query);

$output = "";

$output = "
<table class='table table-bordered'>
<tr>
<th>ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Phone</th>
<th>Data Registered</th>
<th>Action</th>
</tr>

";

if (mysqli_num_rows($res) < 1) {
$output .= "
<tr>
<td colspan='8' class='text-center'>No job Request Yet.</td>
</tr>";
}

while ($row = mysqli_fetch_array($res)) {
    $output .= "
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['firstname']."</td>
        <td>".$row['lastname']."</td>
        <td>".$row['email']."</td>
        <td>".$row['phonenumber']."</td>
        <td>".$row['data_reg'].".</td>
        <td>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-6'>
                    <button id='".$row['id']."' class='btn btn-success approve'>Approve</button>
                </div>
                <div class='col-md-6'>
                    <button id='".$row['id']."' class='btn btn-danger reject'>Reject</button>
                </div>
            </div>
        </div>
        </td>
    ";
}
$output .="
</tr>
</table>";

echo $output;
?>