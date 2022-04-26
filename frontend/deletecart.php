<?php 
session_start();
    if(isset($_GET['delete'])){
        unset($_SESSION['carts'][$_GET['delete']]);

    }
    header ("Location: cart.php");
?>



?>
