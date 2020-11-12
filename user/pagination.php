<?php

    $showRecordPerPage = 9;

    if (isset($_GET['page']) && !empty($_GET['page'])) {

      $currentPage = $_GET['page'];
    }
    else {
      $currentPage = 1;
    }

    $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;

    $sql = "SELECT id, name, brand, category, type, quantity, price, image
            FROM product
            WHERE category = ".$category."
            AND type = ".$type;
    
    $result = mysqli_query($con, $sql);
    
    $totalRecord = mysqli_num_rows($result);
    $lastPage = ceil($totalRecord/$showRecordPerPage);
    $firstPage = 1;
    $nextPage = $currentPage + 1;
    $previousPage = $currentPage - 1;

    $sql2 = "SELECT id, name, brand, category, type, quantity, price, image
            FROM product
            WHERE category = ".$category."
            AND type = ".$type."
            LIMIT " . $startFrom . "," . $showRecordPerPage;

    $final_result = mysqli_query($con, $sql2);
?>      