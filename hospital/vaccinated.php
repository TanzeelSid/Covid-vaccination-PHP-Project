<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Check Appointment Details</title>
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
                <h5 class="text-center my-3">Total Appointment</h5>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT * FROM appointment WHERE id='$id'";
                    $res = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($res);
                }                 
                ?>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center">Appointment Details</td>
                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td><?php echo $row['firstname']; ?></td>
                            </tr>
                            <tr>
                                <td>Lastname</td>
                                <td><?php echo $row['lastname']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone No.</td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>
                            <tr>
                                <td>Appointment Date</td>
                                <td><?php echo $row['appointment_date']; ?></td>
                            </tr>
                            <tr>
                                <td>Vaccine</td>
                                <td><?php echo $row['vaccine']; ?></td>
                            </tr>
                        </table>

                        </div>
                        <div class="col-md-6">
                            <h5 class="text-center my-1">Invoice</h5>
                            <?php
if (isset($_POST['send'])) {
    $fee = $_POST['fee'];
    $des = $_POST['des'];

    if (empty($fee)) {
        // Handle empty fee case
        echo "<script>alert('Please enter the fee')</script>";
    } else if (empty($des)) {
        // Handle empty description case
        echo "<script>alert('Please enter the description')</script>";
    } else {
        // Insert data into the 'income' table
        $hos = $_SESSION['hospital'];
        $fname = $row['firstname'];

        $query = "INSERT INTO income (hospital, patient, date_vaccination, amount_paid, description) VALUES ('$hos', '$fname', NOW(), '$fee', '$des')";
        $res = mysqli_query($connect, $query);

        if ($res) {
            echo "<script>alert('You have sent the invoice')</script>";

            mysqli_query($connect, "UPDATE appointment SET status='Vaccinated' WHERE id='$id'");

        } else {
            echo "<script>alert('Failed to send the invoice')</script>";
        }
    }
}
?>


                            <form method="post">
                                <label>Fee</label>
                                <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter patient Fee">
                                <label>Description</label>
                                <input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
                                <input type="submit" name="send" class="btn btn-success my-2" value="Send">
                            </form>
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