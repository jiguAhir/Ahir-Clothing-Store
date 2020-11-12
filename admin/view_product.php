<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    header("Location: login.php");
  }
  include('layouts/header.php');
  include('layouts/sidebar.php');
?>
<script type="text/javascript">
    function confirm_delete(id) 
    {        
      var answer = confirm("Are you sure you want to delete this product?");
      
      if (!answer) 
      {
        window.location = "#";
      } 
      else
      {
        window.location = "delete_product.php?prod_id="+id;
      }
    }
</script>

    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">   
            <div class="border-head">
              <h2>View Product</h2>
            </div> 
            <div class="weather-2 pn">
              <?php
                include('connect_db.php');

                include('pagination.php');

                if ($row=mysqli_num_rows($final_result) > 0) {
                  echo "<table id='stock_table'><tr><th>Name</th><th>Brand</th><th>Category</th><th>Type</th><th>Quantity</th><th>Price</th><th>Edit</th><th>Delete</th>";
                  while($row = mysqli_fetch_assoc($final_result)){
                    echo "<tr><td>".$row["name"]."</td><td>".$row["brand"]."</td><td>".$row["category"]."</td><td>".$row["type"]."</td><td>".$row["quantity"]."</td><td>$".$row["price"]."</td><td><a href='update_product.php?prod_id=$row[id]'>Edit</a></td><td><a href='#' onclick='confirm_delete($row[id])'>Delete</a></td></tr>";
                  }
                  echo "</table>";
                } else {
                  echo "0 results";
                }               
              ?> 
            </div>   
          </div>
        </div>
        <?php 
          include('pagination2.php');
        ?>
      </section>
    </section>
   
   <?php
    include('layouts/footer.php');
   ?>