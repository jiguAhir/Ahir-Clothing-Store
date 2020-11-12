<?php
  session_start();
  
  include('connect_db.php');

  if (!isset($_SESSION['username']))
  {
    header("Location: login.php");
  }

  if (isset($_POST['btnsubmit'])) 
  {
      $query = "UPDATE product
                SET name = '$_POST[pname]', brand = '$_POST[pbrand]', category = '$_POST[pcategory]', quantity = $_POST[pquantity], type = $_POST[ptype], price = $_POST[pprice]
                WHERE id = $_POST[pid]";

    if ($con->query($query) === TRUE) 
    {
      header("Location: view_product.php");
      echo "<script type=\"text/javascript\">"."alert('Product successfully updated');"."</script>";
    } 
    else 
    {
      echo "Error: " . $query . "<br>" . $con->error;
    }
  }

  include('layouts/header.php');
  include('layouts/sidebar.php');

?>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="border-head">
              <h2>Update Product</h2>
            </div> 
            <?php

              $sql = "SELECT name, brand, category, type, quantity, price 
                      FROM product
                      WHERE id = $_GET[prod_id]";

                      $result = mysqli_query($con, $sql);

                      if (($row=mysqli_num_rows($result)) == 1)
                      {
                        while($row = mysqli_fetch_array($result))
                        {
                          $pid = $_GET['prod_id'];
                          $pname = $row['name'];
                          $pbrand = $row['brand'];
                          $pcategory = $row['category'];
                          $ptype = $row['type'];
                          $pquantity = $row['quantity'];
                          $pprice = $row['price'];
                        }
                      }

            ?>
            <div class="weather-2 pn">
              <form name="form1" action="" method="POST" enctype="multipart/form-data">
                <table class="addproduct">
                  <tr>
                    <td>Product Name</td>
                    <td><input type="text" class="ptxt1" required name="pname" value="<?php echo $pname; ?>"></td>
                  </tr>
                  <tr>
                    <td>Product Brand</td>
                    <td><input type="text" required name="pbrand" value="<?php echo $pbrand; ?>"></td>
                  </tr>
                  <tr>
                    <td>Product Category</td>
                    <td>
                      <select id="pcategory" name="pcategory" class="ptxt3">
                        <?php
                          if ($pcategory == 1)
                          {
                        ?>  <option value="1" selected>Women clothes</option>
                            <option value="2">Men clothes</option>
                            <option value="3">Kids clothes</option>";
                       <?php
                          } 
                          else if ($pcategory == 2)
                          { ?>
                            <option value="1">Women clothes</option>
                            <option value="2" selected>Men clothes</option>
                            <option value="3">Kids clothes</option>";
                          <?php
                          } 
                          else if ($pcategory == 3)
                          { ?>
                            <option value="1">Women clothes</option>
                            <option value="2">Men clothes</option>
                            <option value="3" selected>Kids clothes</option>";
                    <?php }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Product Type</td>
                    <td>
                      <select id="ptype" name="ptype" class="ptxt3">
                        <?php
                          if ($ptype == 1)
                          {
                            echo "<option value='1' selected>T-Shirts</option>
                            <option value='2'>Dress Shirts</option>
                            <option value='3'>Jackets</option>
                            <option value='4'>Polos</option>
                            <option value='5'>Pants</option>
                            <option value='6'>Shorts</option>";
                          }
                          else if($ptype == 2)
                          {
                            echo "<option value='1'>T-Shirts</option>
                            <option value='2' selected>Dress Shirts</option>
                            <option value='3'>Jackets</option>
                            <option value='4'>Polos</option>
                            <option value='5'>Pants</option>
                            <option value='6'>Shorts</option>";
                          }
                          else if($ptype == 3)
                          {
                            echo "<option value='1'>T-Shirts</option>
                            <option value='2'>Dress Shirts</option>
                            <option value='3' selected>Jackets</option>
                            <option value='4'>Polos</option>
                            <option value='5'>Pants</option>
                            <option value='6'>Shorts</option>";
                          }
                          else if($ptype == 4)
                          {
                            echo "<option value='1'>T-Shirts</option>
                            <option value='2'>Dress Shirts</option>
                            <option value='3'>Jackets</option>
                            <option value='4' selected>Polos</option>
                            <option value='5'>Pants</option>
                            <option value='6'>Shorts</option>";
                          }
                          else if($ptype == 5)
                          {
                            echo "<option value='1' selected>T-Shirts</option>
                            <option value='2'>Dress Shirts</option>
                            <option value='3'>Jackets</option>
                            <option value='4'>Polos</option>
                            <option value='5' selected>Pants</option>
                            <option value='6'>Shorts</option>";
                          }
                          else if($ptype == 6)
                          {
                            echo "<option value='1' selected>T-Shirts</option>
                            <option value='2'>Dress Shirts</option>
                            <option value='3'>Jackets</option>
                            <option value='4'>Polos</option>
                            <option value='5'>Pants</option>
                            <option value='6' selected>Shorts</option>";
                          }  
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Product Quantity</td>
                    <td><input type="number" required class="ptxt2" name="pquantity" value="<?php echo $pquantity; ?>"></td>
                  </tr>
                  <tr>
                    <td>Product Price</td>
                    <td><input type="number" step="0.01" required class="ptxt2" name="pprice" value="<?php echo $pprice; ?>"></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left"><button type="submit" id="btnsubmit" name="btnsubmit">Update product</td>
                  </tr>
                </table>
              </form>
            </div>   
          </div>
        </div> 
      </section>
    </section>
   
   <?php 
      include('layouts/footer.php');
   ?>