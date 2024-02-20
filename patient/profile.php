<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile Dashboard</title>
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

                $patient = $_SESSION['patient'];
$query = "SELECT * FROM patient WHERE firstname='$patient'";
$res = mysqli_query($connect, $query);
$row = mysqli_fetch_array($res);
                ?>
            </div>
            <div class="col-md-10">
            <div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
        <?php
if (isset($_POST['upload'])) {
    $img = $_FILES['img']['name'];

    if (empty($img)) {
        // Handle case where no image is uploaded
    } else {
        $query = "UPDATE patient SET profile='$img' WHERE firstname='$patient'";
        $res = mysqli_query($connect, $query);

        if ($res) {
            move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
        }
    }
}
?>

            <h5>My Profile</h5>
            <form method="post" enctype="multipart/form-data">
    <?php
    echo '<img src="img/' . $row['profile'] . '" class="col-md-9" style="height: 250px;">';
    ?>
    <input type="file" name="img" class="form-control my-2">
    <input type="submit" name="upload" class="btn btn-success" value="Update Profile">
</form>

<table class="table table-bordered">
    <tr>
        <th colspan="2" class="text-center">My Details</th>
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
    <td>Phone Number</td>
        <td><?php echo $row['phonenumber']; ?></td>
    </tr>
    <!-- <tr>
        <td>Phone Number</td>
        <td><?php //echo $row['phone']; ?></td>
    </tr> -->
</table>

        </div>
        <div class="col-md-6">
    <h5 class="text-center">Change Username</h5>
    <?php
if (isset($_POST['update'])) {
    $uname = $_POST['uname'];

    if (empty($uname)) {
        // Handle case where no username is provided
    } else {
        $query = "UPDATE patient SET firstname='$uname' WHERE firstname='$patient'";
        $res = mysqli_query($connect, $query);

        if ($res) {
            $_SESSION['patient'] = $uname;
        }
    }
}
?>

    <form method="post">
        <label>Enter Username</label>
        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
        <input type="submit" name="update" class="btn btn-success my-2" value="Update Username">
    </form>

    <h5 class="text-center">Change Password</h5>
    <?php
if (isset($_POST['change'])) {
    $old = $_POST['old_pass'];
    $new = $_POST['new_pass'];
    $con = $_POST['con_pass'];

    $q = "SELECT * FROM patient WHERE firstname='$patient'";
    $re = mysqli_query($connect, $q);
    $row = mysqli_fetch_array($re);

    if (empty($old)) {
        echo "<script>alert('Enter old Password')</script>";
    } else if (empty($new)) {
        echo "<script>alert('Enter New Password')</script>";
    } else if ($con != $new) {
        echo "<script>alert('Both Passwords do not match')</script>";
    } else if ($old != $row['password']) {
        echo "<script>alert('Old password is incorrect')</script>";
    } else {
        // Update the password
        $query = "UPDATE patient SET password='$new' WHERE firstname='$patient'";
        mysqli_query($connect, $query);
        echo "<script>alert('Password updated successfully')</script>";
    }
}
    
?>

    <form method="post">
        <label>Old Password</label>
        <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
        <label>New Password</label>
        <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
        <label>Confirm Password</label>
        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
        <input type="submit" name="change" class="btn btn-success" value="Change Password">
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