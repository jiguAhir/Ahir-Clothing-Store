<?php
      session_start();
      //$_SESSION['message'] = "";

      include('connect_db.php');

      if($_SERVER["REQUEST_METHOD"] == "POST") 
      {
          $myuser = mysqli_real_escape_string($con, $_POST['txt_username']);
          $mypass = mysqli_real_escape_string($con, $_POST['txt_password']);

          $sql = "SELECT * FROM admin_user WHERE username = '$myuser' AND password = '$mypass'";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          //$active = $row['active'];

          $count = mysqli_num_rows($result);

          if($count == 1) {
             //session_register("myuser");
             $_SESSION['username'] = $row['username'];
             $name = $row['firstname'] . " " . $row['lastname'];
             $_SESSION['login_msg'] = "Hi, " . $name;
             header("Location: index.php");
          }
          else {
             $error = "Username or Password is invalid";
          }
      }          
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ACS Admin Login</title>
        <link rel="stylesheet" href="css/login_style.css">
  </head>

  <body>

    <div class="login">
      <div class="login-triangle"></div>
      
      <h2 class="login-header">Log in</h2>

      <form class="login-container" name="form1" action="" method="post">
        <p><input type="text" placeholder="Username" required name="txt_username"></p>
        <p><input type="password" placeholder="Password" required name="txt_password"></p>
        <p><input type="submit" id="submitbtn" value="Log in"></p>
      </form>
    </div>

    <?php
      include('layouts/scripts.php');
    ?>
  </body>
</html>