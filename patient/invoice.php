<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Invoice</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../assets/img/bacteria.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="../assets/lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    include ("../include/header.php");

    include ("../include/connection.php");
    ?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                    include("sidenav.php");
                ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center my-3">My Invoice</h5>
                <?php 
$pat = $_SESSION['patient'];

$query = "SELECT * FROM patient WHERE firstname='$pat'";
$res = mysqli_query($connect,$query);

$row = mysqli_fetch_array($res);
$fname = $row['firstname'];

$querys = mysqli_query($connect,"SELECT * FROM income WHERE patient='$fname'");

$output = "";

$output .= "
<table class='table table-bordered'>
    <tr>
        <td>ID</td>
        <td>Hospital</td>
        <td>Patient</td>
        <td>Date Vaccination</td>
        <td>Amount Paid</td>
        <td>Description</td>
        <td>Action</td>
    </tr>
";

if (mysqli_num_rows($querys) < 1) {
    $output = "
    <tr>
        <td colspan='6' class='text-center'>No Invoice Yet</td>
    </tr>";
}

while ($row = mysqli_fetch_array($querys)) {
    $output .= "
    <tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['hospital'] . "</td>
        <td>" . $row['patient'] . "</td>
        <td>" . $row['date_vaccination'] . "</td>
        <td>" . $row['amount_paid'] . "</td>
        <td>" . $row['description'] . "</td>
        <td>
            <a href='view.php?id=" . $row['id'] ."'>
                <button class='btn btn-success'>View</button>
            </a>
        </td>
    ";
}
$output .= "</tr></table>";
echo $output;


?>

            </div>
        </div>
    </div>
</div>




 
  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="assets/lib/wow/wow.min.js"></script>
   <script src="../assets/lib/easing/easing.min.js"></script>
   <script src="../assets/lib/waypoints/waypoints.min.js"></script>
   <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
   <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
   <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
   <script src="../assets/lib/twentytwenty/jquery.event.move.js"></script>
   <script src="../assets/lib/twentytwenty/jquery.twentytwenty.js"></script>

   <!-- Template Javascript -->
   <script src="../assets/js/main.js"></script>

</body>
</html>