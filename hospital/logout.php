<?php
session_start();

if(isset($_SESSION['hospital'])){
    unset($_SESSION['hospital']);

    header( "Location: ../index.php" );
}
?>