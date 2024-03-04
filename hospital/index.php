<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hospital Dashboard</title>
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
            <div class="container-fluid">
    <h5>Hospital's Dashboard</h5>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
                
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-white my-4">My Profile</h5>
                        </div>
                        <div class="col-md-4">
                            <a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
            <?php
    $p = mysqli_query($connect, "SELECT * FROM patient");
    $pp = mysqli_num_rows($p);
    ?>
    <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $pp; ?></h5>
                <h5 class="text-white">Total</h5>
                <h5 class="text-white">Patient</h5>
            </div>
            <div class="col-md-4">
                <a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-8">
    <?php
    $app = mysqli_query($connect, "SELECT * FROM appointment WHERE status='pending'");
    $appoint = mysqli_num_rows($app);
    ?>
    <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $appoint; ?></h5>
    <h5 class="text-white">Total</h5>
    <h5 class="text-white my-4">Appointment</h5>
</div>

            <div class="col-md-4">
                <a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
            </div>
        </div>
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