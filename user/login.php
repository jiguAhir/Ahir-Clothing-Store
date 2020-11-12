<?php
  session_start();

  include('connect_db.php');

  /*if (!isset($_SESSION['username']))
  {
    header("Location: login.php");
  }*/

  if (isset($_POST['submit_login']))
  {
  	$sql = "SELECT id, username, password
  			FROM web_user
  			WHERE username = '$_POST[username]' AND password = '$_POST[password]'";

	$result = mysqli_query($con, $sql);

	if ($row = mysqli_num_rows($result) == 1)
	{
		while($row = mysqli_fetch_assoc($result)) {
			$userid = $row['id'];
		}

		header("Location: index.php?usrid=$userid");
	}
	else 
	{
		echo "<script type=\"text/javascript\">"."alert('Invalid Username or Password..!');"."</script>";
	}		

  }

  if (isset($_POST['submit_signin']))
  {
  	$sql = "INSERT INTO web_user (name, username, password, email) VALUES ('$_POST[name]', '$_POST[username]', '$_POST[password]', '$_POST[email]')";

  	if ($con->query($sql) === TRUE) 
	{
		echo "<script type=\"text/javascript\">"."alert('User successfully registered');"."</script>";
	} 
	else 
	{
		echo "Error: " . $query . "<br>" . $con->error;
	} 
  }

?>
<?php
  include('layouts/header.php');
  //include('layouts/sidebar.php');
?>
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form action="" method="POST">
						<input name="username" type="text" required placeholder="Username" />
						<input name="password" type="password" required placeholder="Password" />
						<!--<span>
							<input type="checkbox" class="checkbox"> 
								Keep me signed in
						</span>-->
						<button type="submit" name="submit_login" class="btn">Login</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form action="" method="POST">
						<input name="name" type="text" required placeholder="Name"/>
						<input name="username" type="text" required placeholder="Username"/>
						<input name="password" type="password" required placeholder="Password"/>
						<input name="email" type="email" required placeholder="Email address"/>
						<button type="submit" name="submit_signin" class="btn">Sign up</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->	
<?php
	include('layouts/footer.php');
?>
	
	