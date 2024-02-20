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

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-success me-2"></i>Opening Hours: Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed </small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-success text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>VaccinarionCentre@gmail.com</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg navbar-light shadow-sm px-5 py-3 py-lg-0">
       <?php
       if (isset($_SESSION['admin'])){

        $user = $_SESSION['admin'];
        echo ' <a href="index.html" class="navbar-brand p-0">
        <h1 class="m-0 text-success"><img src="../assets/img/bacteria.png" alt="" style="width: 50px; height: 50px;"></i>Vaccination Centre</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="../admin/index.php" class="nav-item nav-link">'.$user.'</a>
            <a href="logout.php" class="nav-item nav-link">Logout</a>
        </div>
        <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        <a href="#" class="btn btn-primary py-2 px-4 ms-3">Appointment</a>
';
       }
       elseif(isset($_SESSION['hospital'])){

            $user = $_SESSION['hospital'];
            echo' <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 text-success"><img src="../assets/img/bacteria.png" alt="" style="width: 50px; height: 50px;"></i>Vaccination Centre</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="../hospital/index.php" class="nav-item nav-link">'.$user.'</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
            <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            <a href="#" class="btn btn-primary py-2 px-4 ms-3">Appointment</a>
';
    
        } elseif(isset($_SESSION['patient'])){

            $user = $_SESSION['patient'];
            echo' <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 text-success"><img src="../assets/img/bacteria.png" alt="" style="width: 50px; height: 50px;"></i>Vaccination Centre</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="../patient/index.php" class="nav-item nav-link">'.$user.'</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
            <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            <a href="appointment.php" class="btn btn-primary py-2 px-4 ms-3">Appointment</a>
';
    
        }else{echo
        ' <a href="index.html" class="navbar-brand p-0">
        <h1 class="m-0 text-success"><img src="assets/img/bacteria.png" alt="" style="width: 50px; height: 50px;"></i>Vaccination Centre</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="price.php" class="dropdown-item">Vaccines</a>
                    <a href="hospital.php" class="dropdown-item">Our Hospitals</a>
                    <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                    <a href="patientlogin.php" class="dropdown-item">Appointment</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            <a href="logins.php" class="nav-item nav-link">Logins</a>
            <!-- <a href="./patientsignup.php" class="nav-item nav-link">Sign Up</a> -->
        </div>
        <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        <a href="patientlogin.php" class="btn btn-primary py-2 px-4 ms-3">Appointment</a>
';

       }
       ?>
       
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->





   <!-- JavaScript Libraries -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="assets/lib/wow/wow.min.js"></script>
   <script src="assets/lib/easing/easing.min.js"></script>
   <script src="assets/lib/waypoints/waypoints.min.js"></script>
   <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="assets/lib/tempusdominus/js/moment.min.js"></script>
   <script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
   <script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
   <script src="assets/lib/twentytwenty/jquery.event.move.js"></script>
   <script src="assets/lib/twentytwenty/jquery.twentytwenty.js"></script>

   <!-- Template Javascript -->
   <script src="assets/js/main.js"></script>
</body>

</html>