<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
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
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center">All Admin</h5>

                            <?php
//session_start();
// Assuming $connect is your database connection

$sad = $_SESSION['admin'];
$query = "SELECT * FROM admin WHERE username != ?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "s", $sad);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

$output = "
<table class='table table-bordered'> 
    <tr> 
        <th>ID</th> 
        <th>Username</th> 
        <th style='width: 10%;'>Action</th> 
    </tr>
"; 

if (mysqli_num_rows($res) < 1) { 
    $output .= "<tr><td colspan='3' class='text-center'>No New Admin</td></tr>"; 
} 

while ($row = mysqli_fetch_array($res)) { 
    $id = $row['id']; 
    $username = $row['username'];  

    $output .= "
    <tr>
        <td>$id</td>
        <td>$username</td>
        <td>
        <a href='admin.php?id=<?php echo $id; ?>'><button id='<?php echo $id; ?>' class='btn btn-danger remove'>Remove</button></a>
        </td>
    ";
}

$output .= "
    </tr>
</table>";
echo $output;

// Assuming $connect is your database connection

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM admin WHERE id='$id'";
    $result = mysqli_query($connect, $query);

    if($result) {
        // Deletion successful
        echo "Admin with ID $id has been successfully removed.";
    } else {
        // Deletion failed
        echo "Error: " . mysqli_error($connect);
    }
}


?>



                        </div>
                        <div class="col-md-6">
                        <?php 
// Assuming $connect is your database connection
$error = "";

if (isset($_POST['add'])) { 
    $uname = $_POST['uname']; 
    $pass = $_POST['pass']; 
    $image = $_FILES['img']['name']; 

    if (empty($uname)) { 
        $error = "Enter Admin Username"; 
    } else if (empty($pass)) { 
        $error = "Enter Admin Password"; 
    } else if (empty($image)) { 
        $error = "Add Admin Picture"; 
    } else { 
        $q = "INSERT INTO admin(username, password, profile) VALUES('$uname', '$pass', '$image')"; 
        $result = mysqli_query($connect, $q); 
        if ($result) {
            move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
        } else {
            // Handle the case where the query fails
            $error = "Failed to add admin";
        }
    } 
} 
?>

<h5 class="text-center">Add Admin</h5>
<form method="post" enctype="multipart/form-data">
    <?php if ($error): ?>
        <h5 class="text-center alert alert-danger"><?php echo $error; ?></h5>
    <?php endif; ?>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="uname" class="form-control" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="pass" class="form-control">
    </div>
    <div class="form-group">
        <label>Add Admin Picture</label>
        <input type="file" name="img" class="form-control">
    </div>
    <br>
    <input type="submit" name="add" value="Add New Admin" class="btn btn-success">
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