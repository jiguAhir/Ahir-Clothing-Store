<?php

    $showRecordPerPage = 15;

    if (isset($_GET['page']) && !empty($_GET['page'])) {

      $currentPage = $_GET['page'];
    }
    else {
      $currentPage = 1;
    }

    $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;

    $sql = "SELECT product.id, product.name, product.brand, product_category.name as 'category', product_type.name as 'type', product.quantity, product.price 
                        FROM ((product
                        INNER JOIN product_category ON product.category = product_category.id)
                        INNER JOIN product_type ON product.type = product_type.id)";
    
    $result = mysqli_query($con, $sql);
    
    $totalRecord = mysqli_num_rows($result);
    $lastPage = ceil($totalRecord/$showRecordPerPage);
    $firstPage = 1;
    $nextPage = $currentPage + 1;
    $previousPage = $currentPage - 1;

    $sql2 = "SELECT product.id, product.name, product.brand, product_category.name as 'category', product_type.name as 'type', product.quantity, product.price 
                        FROM ((product
                        INNER JOIN product_category ON product.category = product_category.id)
                        INNER JOIN product_type ON product.type = product_type.id)
                        ORDER BY category, type, brand DESC
                        LIMIT " . $startFrom . "," . $showRecordPerPage;

      $final_result = mysqli_query($con, $sql2);
?>      