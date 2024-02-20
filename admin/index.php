<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
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
            <div class="col-md-10 ">
                <h4 class="my-2">Admin Dashboard</h4>
                <div class="col-md-12 my-1">
                <div class="row">
    <div class="col-md-12 my-1">
        <div class="row">
        <div class='col-md-3 bg-success mx-2' style='height: 130px;'>
             <div class='col-md-12'>
                 <div class='row'>
                 <div class="col-md-8">
    <?php 
    $ad = mysqli_query($connect, "SELECT * FROM admin");
    $num = mysqli_num_rows($ad);
    ?>
    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
    <h5 class="text-white">Total</h5>
    <h5 class="text-white">Admin</h5>
</div>

                     <div class='col-md-4'>
                         <a href='admin.php'><i class='fa fa-users-cog fa-3x my-4' style='color: white;'></i></a>
                     </div>
                 </div>
             </div>

            </div>
            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
            <div class='col-md-12'>
        <div class='row'>
            <div class='col-md-8'>
            <?php
$hospital = mysqli_query($connect,"SELECT * FROM hospitals WHERE status='Approved'");
$num2 = mysqli_num_rows($hospital);
?>
<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2; ?></h5>
                <h5 class='text-white'>Total</h5>
                <h5 class='text-white'>Hospitals</h5>
            </div>
            <div class='col-md-4'>
                <a href='hospital.php'><i class='fa fa-hospital fa-3x my-4' style='color: white;'></i></a>
            </div>
        </div>
            </div>

        </div>
            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
            <div class='col-md-12'>
        <div class='row'>
        <div class="col-md-8">
    <?php
    $p = mysqli_query($connect, "SELECT * FROM patient");
    $pp = mysqli_num_rows($p);
    ?>
    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $pp; ?></h5>
    <h5 class="text-white">Total</h5>
    <h5 class="text-white">Patient</h5>
</div>

            <div class='col-md-4'>
                <a href='patient.php'><i class='fa fa-procedures fa-3x my-4' style='color: white;'></i></a>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-8">
    <?php
    $re = mysqli_query($connect, "SELECT * FROM report");
    $rep = mysqli_num_rows($re);
    ?>
    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $rep; ?></h5>
    <h5 class="text-white">Total</h5>
    <h5 class="text-white">Report</h5>
</div>
            <div class="col-md-4">
                <a href="report.php"><i class="fa fa-flag fa-3x my-4"
                    style="color: white;"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
            <?php 
    $job = mysqli_query($connect, "SELECT * FROM hospitals WHERE status='Pending'");
    $num1 = mysqli_num_rows($job);
    ?>
    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1; ?></h5>
    <h5 class="text-white">Total</h5>
                <h5 class="text-white">Hospital Request</h5>
            </div>
            <div class="col-md-4">
                <a href="./hospital_request.php"><i class="fa fa-book-open fa-3x my-4"
                    style="color: white;"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
            <?php $in = mysqli_query($connect, "SELECT sum(amount_paid) as profit FROM income"); 
            $row = mysqli_fetch_array($in); 
            $inc = $row['profit']; 
            ?>
                <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo "Rs.$inc"; ?></h5>
                <h5 class="text-white">Total</h5>
                <h5 class="text-white">Income</h5>
            </div>
            <div class="col-md-4">
                <a href="income.php"><i class="fa fa-money-check-alt fa-3x my-4"
                    style="color: white;"></i></a>
            </div>
        </div>
    </div>
</div>


                </div>
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