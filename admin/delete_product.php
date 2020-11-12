<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    header("Location: login.php");
  }

  include('connect_db.php');

  $query = "DELETE FROM product
          WHERE id = " . $_GET['prod_id'];
  
  if ($con->query($query) === TRUE) 
  {
    header("Location: view_product.php");
  } 
  else 
  {
    echo "Error: " . $query . "<br>" . $con->error;
  }       
?>
