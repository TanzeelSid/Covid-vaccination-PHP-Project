

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
</head>
<style>
 
    .body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    
    .login-container {
      text-align: center;
      margin: 20px;
    }
    
    .login-button {
      color: #fff;
    background-color: #198754;
    border-color: #198754;
    border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 4px;
      transition-duration: 0.4s;
    }
    
    .login-button:hover {
      background-color: #45a049;
    }
    
    .admin {
      background-color: #f1f1f1;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin-right: 20px;
    }
    
    .hospital, .patient {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }
  </style>
<body>

<?php
include("include/header.php");
?>

<div class="body">
<div class="login-container admin">
    <h2>Admin Login</h2>
    <button class="login-button"><a href="adminlogin.php" class="btn btn-success">Login</a></button>
  </div>
  <div class="login-container hospital">
    <h2>Hospital Login</h2>
    <button class="login-button"><a href="hospitallogin.php" class="btn btn-success">Login</a></button>
  </div>
  <div class="login-container patient">
    <h2>Patient Login</h2>
    <button class="login-button"><a href="patientlogin.php" class="btn btn-success">Login</a></button>
  </div>
  </div>
</body>
</html>