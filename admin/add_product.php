<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    header("Location: login.php");
  }
?>
<?php
  include('layouts/header.php');
  include('layouts/scripts.php');
  include('layouts/sidebar.php');
?>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
           
            <div class="border-head">
              <h2>Add Product</h2>
            </div> 
            <div class="weather-2 pn">
              <form name="form1" action="" method="POST" enctype="multipart/form-data">
                <table class="addproduct">
                  <tr>
                    <td>Product Name</td>
                    <td><input type="text" class="ptxt1" required name="pname"></td>
                  </tr>
                  <tr>
                    <td>Product Brand</td>
                    <td><input type="text" required name="pbrand"></td>
                  </tr>
                  <tr>
                    <td>Product Category</td>
                    <td>
                      <select id="pcategory" name="pcategory" class="ptxt3">
                        <option value="1">Women clothes</option>
                        <option value="2">Men clothes</option>
                        <option value="3">Kids clothes</option>
                      </select
                    </td>
                  </tr>
                  <tr>
                    <td>Product Type</td>
                    <td>
                      <select id="ptype" name="ptype" class="ptxt3">
                        <option value="1">T-Shirts</option>
                        <option value="2">Dress Shirts</option>
                        <option value="3">Jackets</option>
                        <option value="4">Polos</option>
                        <option value="5">Pants</option>
                        <option value="6">Shorts</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Product Quantity</td>
                    <td><input type="number" required class="ptxt2" name="pquantity"></td>
                  </tr>
                  <tr>
                    <td>Product Price</td>
                    <td><input type="number" step="0.01" required class="ptxt2" name="pprice"></td>
                  </tr>
                  <tr>
                    <td>Product Image</td>
                    <td><input type="file" required name="pimage"></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left"><button type="submit" id="btnsubmit" name="btnsubmit">Add product</td>
                  </tr>
                </table>
              </form>

              <?php
                include('upload.php');
              ?>
            </div>   
          </div>
        </div>
        
      </section>
    </section>
   
   <?php
    include('layouts/footer.php');
   ?>