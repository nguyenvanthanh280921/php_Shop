<?php
    require_once("../connection.php");
    $result_per_pages = 10;
    $sql = "SELECT * FROM tbl_product";
    $result = mysqli_query($con,$sql);
    $number_of_result = mysqli_fetch_array($result);


    while ($row = mysqli_fetch_array($result)){
        echo $row['id_product'].''. $row['tbl_product']. '<br>';
    }

    $number_of_pages = ceil($number_of_result/$result_per_pages);


    for($page=1;$page<=$number_of_pages;$page++){
        echo '<a href="pagination.php?page='.$page.'">'.$page.'</a>';
    }

?>