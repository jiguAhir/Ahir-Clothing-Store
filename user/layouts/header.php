<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ahir Clothing Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <link rel="stylesheet" href="css/price-range.css">
    <link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/style.css" >
	<link rel="stylesheet" href="css/fontello.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a><i class="fa fa-phone"></i> +1 713 409 0123</a></li>
								<li><a><i class="fa fa-envelope"></i> info@ahirclstore.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header_middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div>
						<div class="item2">
							<a href="index.php"><h1><span>AHIR</span>-CLOTHING STORE</h1></a>
						</div>
					</div>
					<div>
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
									if(isset($_SESSION['name']))
									{
								?>		<li>
											<p>Hi, <?php echo $_SESSION['name']; ?><a href="logout.php"> (Logout)</a></p>
										</li>
										<li>
										<?php
											/*if(isset($_GET['category'])&&isset($_GET['type'])) 
											{
												echo "<p><a href='cart.php?usrid=$_SESSION[usrid]&category=$_GET[category]&type=$_GET[type]'><i class='fa fa-shopping-cart'></i> Cart";*/

												echo "<p><a href='cart.php?usrid=$_SESSION[usrid]'><i class='fa fa-shopping-cart'></i> Cart</a>";

												if(isset($_SESSION['cart']))
												{
													$count = count($_SESSION['cart']);
													echo "&nbsp;&nbsp;<span id=\"cart_count\" id=\"cart_count\">$count</span>";			
												}
												
											/*} else
											{
												echo "<p><a href='cart.php?usrid=$_SESSION[usrid]'><i class='fa fa-shopping-cart'></i> Cart</a>";

												//echo "&nbsp;&nbsp;<span id=\"cart_count\">0</span>";
											}*/
											 ?>
										</p></li>
								<?php }
									else if(!isset($_SESSION['name']))
									{
										echo "<li><a href='login.php'><i class='fa fa-lock'></i> Login</a></li>";
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div><!--header-middle-->
		<div class="header_bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="mainmenu pull-left">
							<input type="checkbox" id="btn-menu">
							<label for="btn-menu" class="icon-menu"></label>
							<nav class="menu">
								<ul class="nav navbar-nav collapse navbar-collapse menu">
									<li><a href="index.php" class="active">Home</a></li>
									<li class="dropdown"><a href="#">Women<i class="fa fa-angle-down"></i></a>
	                                    <ul role="menu" class="sub-menu">
	                                    	<?php
	                                    		if(isset($_SESSION['usrid']))
	                                    		{
	                                    			echo "<li><a href='women.php?usrid=$_SESSION[usrid]&category=1&type=1'>T-Shirts</a></li>
													<li><a href='women.php?usrid=$_SESSION[usrid]&category=1&type=2'>Dress shirts</a></li> 
													<li><a href='women.php?usrid=$_SESSION[usrid]&category=1&type=3'>Jackets</a></li> 
													<li><a href='women.php?usrid=$_SESSION[usrid]&category=1&type=4'>Polos</a></li> 
													<li><a href='women.php?usrid=$_SESSION[usrid]&category=1&type=5'>Pants</a></li>
													<li><a href='women.php?usrid=$_SESSION[usrid]&category=1&type=6'>Shorts</a></li>"; 
	                                    		}
	                                    		else if(!isset($_SESSION['usrid']))
	                                    		{
	                                    			echo "<li><a href='women.php?category=1&type=1'>T-Shirts</a></li>
													<li><a href='women.php?category=1&type=2'>Dress shirts</a></li> 
													<li><a href='women.php?category=1&type=3'>Jackets</a></li> 
													<li><a href='women.php?category=1&type=4'>Polos</a></li> 
													<li><a href='women.php?category=1&type=5'>Pants</a></li>
													<li><a href='women.php?category=1&type=6'>Shorts</a></li>"; 
	                                    		}
	                                    	?>
	                                    <</ul>
	                                </li> 
	                                <li class="dropdown"><a href="#">Men<i class="fa fa-angle-down"></i></a>
	                                    <ul role="menu" class="sub-menu">
	                                        <?php
	                                        	if(isset($_SESSION['usrid']))
	                                    		{
	                                    			echo "<li><a href='men.php?usrid=$_SESSION[usrid]&category=2&type=1'>T-Shirts</a></li>
													<li><a href='men.php?usrid=$_SESSION[usrid]&category=2&type=2'>Dress shirts</a></li> 
													<li><a href='men.php?usrid=$_SESSION[usrid]&category=2&type=3'>Jackets</a></li> 
													<li><a href='men.php?usrid=$_SESSION[usrid]&category=2&type=4'>Polos</a></li> 
													<li><a href='men.php?usrid=$_SESSION[usrid]&category=2&type=5'>Pants</a></li>
													<li><a href='men.php?usrid=$_SESSION[usrid]&category=2&type=6'>Shorts</a></li>";  
	                                    		}
	                                    		else if(!isset($_SESSION['usrid']))
	                                    		{
	                                    			echo "<li><a href='men.php?category=2&type=1'>T-Shirts</a></li>
													<li><a href='men.php?category=2&type=2'>Dress shirts</a></li> 
													<li><a href='men.php?category=2&type=3'>Jackets</a></li> 
													<li><a href='men.php?category=2&type=4'>Polos</a></li> 
													<li><a href='men.php?category=2&type=5'>Pants</a></li>
													<li><a href='men.php?category=2&type=6'>Shorts</a></li>";
	                                    		}
	                                        ?>
	                                    </ul>
	                                </li> 
	                                <li class="dropdown"><a href="#">Kids<i class="fa fa-angle-down"></i></a>
	                                    <ul role="menu" class="sub-menu">
	                                         <?php
	                                        	if(isset($_SESSION['usrid']))
	                                    		{
	                                    			echo "<li><a href='kids.php?usrid=$_SESSION[usrid]&category=3&type=1'>T-Shirts</a></li>
													<li><a href='kids.php?usrid=$_SESSION[usrid]&category=3&type=2'>Dress shirts</a></li> 
													<li><a href='kids.php?usrid=$_SESSION[usrid]&category=3&type=3'>Jackets</a></li> 
													<li><a href='kids.php?usrid=$_SESSION[usrid]&category=3&type=4'>Polos</a></li> 
													<li><a href='kids.php?usrid=$_SESSION[usrid]&category=3&type=5'>Pants</a></li>
													<li><a href='kids.php?usrid=$_SESSION[usrid]&category=3&type=6'>Shorts</a></li>"; 
	                                    		}
	                                    		else if(!isset($_SESSION['usrid']))
	                                    		{
	                                    			echo "<li><a href='kids.php?category=3&type=1'>T-Shirts</a></li>
													<li><a href='kids.php?category=3&type=2'>Dress shirts</a></li> 
													<li><a href='kids.php?category=3&type=3'>Jackets</a></li> 
													<li><a href='kids.php?category=3&type=4'>Polos</a></li> 
													<li><a href='kids.php?category=3&type=5'>Pants</a></li>
													<li><a href='kids.php?category=3&type=6'>Shorts</a></li>"; 
	                                    		}
	                                        ?>
	                                    </ul>
	                                </li>
	                                <?php
	                                	if(isset($_SESSION['usrid']))
	                                	{
	                                		echo "<li><a href='contactus.php?usrid=$_SESSION[usrid]'>Contact us</a></li>";	
	                                	}
	                                	else if(!isset($_SESSION['usrid']))
	                                	{
	                                		echo "<li><a href='contactus.php'>Contact us</a></li>";
	                                	}
	                                ?> 
								</ul>
							</nav>	
						</div>
					</div>
				</div>
				<?php
					if(isset($_GET['category']) && isset($_GET['type']))
					{
						$sql = "SELECT name
								FROM product_category 
								WHERE id = ".$_GET['category'];

						$res = mysqli_query($con, $sql);

						if ($row = mysqli_num_rows($res) == 1)
						{
							while($row = mysqli_fetch_assoc($res)) 
							{
								$category = $row['name'];
							}
						}

						$sql2 = "SELECT name 
								FROM product_type  
								WHERE id = ".$_GET['type'];

						$res2 = mysqli_query($con, $sql2);

						if ($row = mysqli_num_rows($res2) == 1)
						{
							while($row = mysqli_fetch_assoc($res2)) 
							{
								$type = $row['name'];
							}
						}

						if (isset($_GET['category'])&&isset($_GET['type']))
						{
							echo "<div class='row'>
								<div id='cattype' class='col-sm-9'>
									<p><span>Home</span> &nbsp/&nbsp ".$category." &nbsp/&nbsp ".$type."</p>
								</div>
							</div>";
						}
					}
				?>
			</div>
		</div><!--header-bottom-->
	</header><!--header-->
	<script src="js/menu.js"></script>