<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    header("Location: login.php");
  }
?>
<?php
  include('layouts/header.php');
  include('layouts/sidebar.php');
?>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
           
            <div class="border-head">
              <h3>ADMIN MANAGEMENT</h3>
            </div> 
            <div class="weather-2 pn">
              <div class="weather-2-header">
                <p>Product Sales</p>
              </div>
              <div>
                This is the content part.
              </div>
            </div>   
          </div>
        </div>
        
      </section>
    </section>
   
   <?php
    include('layouts/footer.php');
   ?>