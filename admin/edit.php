<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Total Hospitals</title>
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
            <h5 class="text-center">Edit Hospital</h5>
            <?php 
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            
                $query = "SELECT * FROM hospitals WHERE id='$id'";
                $res = mysqli_query($connect,$query);
            
                $row = mysqli_fetch_array($res);
            }
            
            ?>
                <div class="row">
    <div class="col-md-8">
        <h5 class="text-center">Hospital Details</h5>
        <h5 class="my-3">ID : <?php echo $row['id']; ?></h5>
        <h5 class="my-3">Firstname : <?php echo $row['firstname']; ?></h5>
        <h5 class="my-3">Lastname : <?php echo $row['lastname']; ?></h5>
        <h5 class="my-3">Email : <?php echo $row['email']; ?></h5>
        <h5 class="my-3">Phone : <?php echo $row['phonenumber']; ?></h5>
        <h5 class="my-3">Date Registered: <?php echo $row['data_reg']; ?></h5>
        <h5 class="my-3">Price: Rs.<?php echo $row['price']; ?></h5>
    </div>
    <div class="col-md-4">
        <h5 class="text-center">Update Salary</h5>
        <?php
if (isset($_POST['update'])) {
    $salary = $_POST['salary'];
    $q = "UPDATE hospitals SET price='$salary' WHERE id='$id'";
    mysqli_query($connect, $q);
}
?>

        <form method='post'>
    <label>Enter Hospital's Price</label>
    <input type='number' name='salary' class='form-control' autocomplete='off' placeholder="Enter Hospital's Price" value='<?php echo $row['salary']; ?>'>
    <input type='submit' name='update' class='btn btn-success my-3' value='Update Salary'>
</form>

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