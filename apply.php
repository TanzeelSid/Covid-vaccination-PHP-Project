<?php


include("include/connection.php");


// Initialize the $error variable as an empty array


if (isset($_POST['apply'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $password = $_POST['password'];

    $error = array();

    if (empty($firstname)) {
        $error['apply'] = "Enter Firstname";
    } else if (empty($lastname)) {
        $error['apply'] = "Enter Lastname";
    } else if (empty($email)) {
        $error['apply'] = "Enter Email";
    } else if (empty($phone)) {
        $error['apply'] = "Enter Phone Number";
    } else if (empty($password)) {
        $error['apply'] = "Enter Password";
    }


if (count($error)==0){


    $query = "INSERT INTO hospitals (firstname, lastname, email, password, price, data_reg, status, profile, phonenumber) 
              VALUES ('$firstname', '$lastname', '$email', '$password', '0', NOW(), 'Pending', 'doctor.jpg', '$phone')";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>alert('You have Successfully Applied')</script>";
        header("Location: hospitallogin.php");
        exit; // Exit to prevent further execution
    } else {
        // Provide more specific error message
        echo "<script>alert('Application Failed. Please try again later.')</script>";
    }
}

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Vaccination Centre</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="./assets/img/bacteria.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="assets/lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
    
    @import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;700&display=swap');
body, html { 
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-image: url("https://images.pexels.com/photos/1072179/pexels-photo-1072179.jpeg?cs=srgb&dl=pexels-c%C3%A1tia-matos-1072179.jpg&fm=jpg");
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    font-family: 'Lexend Deca', sans-serif;
    color: #fff;
}
.flex { 
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}
.wrapper {
    background-color: rgba(255, 255, 255, 0.123);
    backdrop-filter: blur(20px);
    padding: 40px 50px;
    border-radius: 10px;
}
h1 {
    letter-spacing: -2px;
    color: white;
    font-size: 40px;
    margin-left: 20px;
}

h2 {
    /* color: #ffffff85; */
    font-weight: 300;
    margin-bottom: 30px;
    font-size: 15px;
    margin-left: 20px;
}

#myForm input[type = text]{
    display: block;
    margin: 10px 20px 10px 20px;
    padding : 20px;
    width: 30em;
    border-radius: 15px;
    border: none;;
    background-color: rgba(255, 255, 255, 0.075);
    outline: none;
}
#myForm input[type = password]{
    display: block;
    margin: 10px 20px 10px 20px;
    padding : 20px;
    width: 30em;
    border-radius: 15px;
    border: none;;
    background-color: rgba(255, 255, 255, 0.075);
    outline: none;
}

#myForm input::placeholder {
    color: rgba(255, 255, 255, 0.418);
    font-weight: 500;
}
#myForm input[type = submit] {
    display: block;
    margin-top: 30px;
    margin-left: 20px;
    background-color: #6B7957;
    border: none;
    padding: 1em 3em 1em 3em;
    color: #fff;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
}
span{
    color: #ffffff85;
    font-weight: 300;
    font-size: 12px;
    margin-left: 20px;
}
</style>


</head>
<body>
    <?php 
    include ("./include/header.php")
    ?>


<div class="flex">
        <div class="wrapper">
            <h1 style="color: #fff;">Create your Account.</h1>
            <!-- <h2>Get yourself vaccinated.</h2> -->
            <div >
                <?php
                if(isset($error['apply'])){

                    $sh = $error['apply'];

                    $show = "<h4 class='alert alert-danger'>$sh</h4>";
                }else{
                    $show = "";
                }

                echo $show;
                ?>
            </div>
            <form id="myForm" method="post">
                <input type="text" placeholder="First Name" name="fname" >
                <input type="text" placeholder="Last Name" name="lname" >
                <input type="text" placeholder="Phone Number" name="number" >
                <input type="text" placeholder="Email" name="email" >
                <input type="password" placeholder="Password" name="password" >
                <input type="submit" value="Submit" name="apply">
            </form>
            <br><br>
            <span>already have an account! <a href="hospitallogin.php">click here</a> </span>
        </div>
    </div>

</body>
</html>