<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Total Income</title>
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
                <h5 class="text-center my-3">Total Income</h5>
                <?php
$query = "SELECT * FROM income";
$res = mysqli_query($connect, $query);
$output = "";
$output .= "
<table class='table table-bordered'>
<tr>
<td>ID</td>
<td>Hospital</td>
<td>Patient</td>
<td>date_vaccinated</td>
<td>Amount Paid</td>
</tr>
";

if (mysqli_num_rows($res) < 1) {
    $output .= "
    <tr>
        <td class='text-center' colspan='4'>No Patient Vaccinated Yet.</td>
    </tr>
    ";
}

while ($row = mysqli_fetch_array($res)) {
    $output .= "
    <tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['hospital'] . "</td>
        <td>" . $row['patient'] . "</td>
        <td>" . $row['date_vaccination'] . "</td>
        <td>" . $row['amount_paid'] . "</td>
    </tr>
    ";
}

$output .= "</table>";

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