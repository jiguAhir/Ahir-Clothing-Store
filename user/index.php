<?php
  	session_start();

	include('connect_db.php');
    
  if (isset($_GET['usrid']))
  {
	$usrid = $_GET['usrid'];

    $sql = "SELECT id, name 
    	FROM web_user
    	WHERE id = ".$usrid;
    	
	$result = mysqli_query($con, $sql);

    if ($row = mysqli_num_rows($result) == 1)
	{
		while ($row = mysqli_fetch_assoc($result)) {
			$_SESSION['usrid'] = $row['id'];
			$_SESSION['name'] = $row['name'];
		}	
	}
  }
?>
<?php
  include('layouts/header.php');
  //include('layouts/sidebar.php');
?>
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="banner">
									<h1><span>AHIR</span>-CLOTHING STORE</h1>
								</div>	
								<div class="banner">
									<img src="images/banner1.jpg" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="banner">
									<h1><span>AHIR</span>-CLOTHING STORE</h1>
								</div>	
								<div class="banner">
									<img src="images/banner2.jpg" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="banner">
									<h1><span>AHIR</span>-CLOTHING STORE</h1>
								</div>	
								<div class="banner">
									<img src="images/banner3.jpg" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<?php
    	include('layouts/footer.php');
   	?>
	