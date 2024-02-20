<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Patient Dashboard</title>
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
            <h5>Patient's Dashboard</h5>
            <div class="col-md-12">
    <div class="row">
        <div class="col-md-3 bg-info mx-2" style="height: 150px;">
        <div class="row">
        <div class="col-md-8">
            <h5 class="text-white my-4">My Profile</h5>
        </div>
        <div class="col-md-4">
            <a href="profile.php">
                <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
            </a>
        </div>
    </div>
        </div>

        <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
        <div class="row">
        <div class="col-md-8">
            <h5 class="text-white my-4">Book Appointment</h5>
        </div>
        <div class="col-md-4">
            <a href="appointment.php">
                <i class="fa fa-calendar fa-3x my-4" style="color: white;"></i>
            </a>
        </div>
    </div>
        </div>

        <div class="col-md-3 bg-success mx-2" style="height: 150px;">
        <div class="row">
        <div class="col-md-8">
            <h5 class="text-white my-4">My Invoice</h5>
        </div>
        <div class="col-md-4">
            <a href="invoice.php">
                <i class="fa fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i>
            </a>
        </div>
    </div>
        </div>
    </div>
    
</div>
<?php
if (isset($_POST['send'])) {
    $title = $_POST['send'];
    $message = $_POST['message'];

    if (empty($title)) {
        // Handle empty title
    } else if (empty($message)) {
        // Handle empty message
    } else {
        $user = $_SESSION['patient'];

        $query = "INSERT INTO report (title, message, firstname, date_send) VALUES ('$title', '$message', '$user', NOW())";

        $res = mysqli_query($connect, $query);

        if ($res) {
            echo "<script>alert('You have sent your report')</script>";
        }
    }
}
?>


<div class="col-md-12">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 jumbotron bg-primary my-5">
            <h5 class="text-center my-2" style="color:aliceblue">Send A Report</h5>
            <form method="post">
                <label style="color:aliceblue">Title</label>
                <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report">

                <label style="color:aliceblue">Message</label>
                <input type="text" name="message" autocomplete="off" class ="form-control" placeholder ="Enter Message">

                <input type ="submit" name ="send" value ="Send Report " class ="btn btn-success my-2">
            </form>
        </div>
        <div class= "col-md-3"></div>
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