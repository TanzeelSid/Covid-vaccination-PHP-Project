<?php
 session_start();

include("include/connection.php");

if(isset($_POST['login'])) {
    
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();
    $q = "SELECT * FROM hospitals WHERE firstname='$username' AND password='$password'";
    $qq = mysqli_query($connect,$q);
    $row = mysqli_fetch_array($qq);
    
    if (empty($username)) {
        $error['login'] = "Enter Username";
    } else if(empty($password)){
        $error['login'] = "Enter Password";
    }  else if($row['status'] == "Pending"){
        $error['login'] = "Please Wait For the admin to confirm";
    } else if($row['status'] == "Rejected"){
        $error['login'] = "Try again Later";
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM hospitals WHERE firstname='$username' AND password='$password'";
        $res = mysqli_query($connect, $query);
        if (mysqli_num_rows($res)) {
            echo "<script>alert('done')</script>";
            $_SESSION['hospital'] = $username;
            header("Location:hospital/index.php");
        } else {
            echo "<script>alert('Invalid Account')</script>";
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
    include("./include/header.php")
    ?>

<div class="flex">
        <div class="wrapper">
            <h1 style="color: #fff;">Hospital Login</h1>
            <form id="myForm" method="POST">

            <div >
                <?php
                if(isset($error['login'])){

                    $sh = $error['login'];

                    $show = "<h4 class='alert alert-danger'>$sh</h4>";
                }else{
                    $show = "";
                }

                echo $show;
                ?>
            </div>


                <input type="text" placeholder="Username" name="uname" >
                <input type="password" placeholder="Password" name="pass" >
                <input type="submit" value="Login" name="login">
            </form>
            <br><br>
            <span><a href="apply.php">Click here to Register Yourself</a></span>
        </div>
    </div>

</body>
</html>