<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    header("Location: login.php");
  }

  if (isset($_POST['btnsubmit'])) 
  {
      include('connect_db.php');

      $query = "INSERT INTO admin_user (username, password, firstname, lastname)
                VALUES ('$_POST[usrname]', '$_POST[password]', '$_POST[firstname]', '$_POST[lastname]')";

      if ($con->query($query) === TRUE) 
      {
        echo "<script type=\"text/javascript\">"."alert('Username successfully registered');"."</script>";
      } 
      else 
      {
        echo "Error: " . $query . "<br>" . $con->error;
      }
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
              <h2>Register Admin user</h2>
            </div> 
            <div class="weather-2 pn">
              <form name="form1" action="" method="POST">
                <table class="addproduct">
                  <tr>
                    <td>Username</td>
                    <td><input type="text" required name="usrname"></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td><input type="password" required name="password"></td>
                  </tr>
                  <tr>
                    <td>First name</td>
                    <td><input type="text" required name="firstname"></td>
                  </tr>
                  <tr>
                    <td>Last name</td>
                    <td><input type="text" required name="lastname"></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left"><button type="submit" id="btnsubmit" name="btnsubmit">Register</td>
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