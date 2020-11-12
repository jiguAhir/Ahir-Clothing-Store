<?php
	session_start();

  	include('connect_db.php');

  	if(isset($_SESSION['usrid']))
  	{
  		$usrid = $_SESSION['usrid'];
  	}

  	$category = $_GET['category'];
  	$type = $_GET['type'];

  	if(isset($_POST['add'])){
  		//print_r($_POST['product_id']);

  		if(isset($_SESSION['cart']))
  		{
  			$item_array_id = array_column($_SESSION['cart'], "product_id", "product_qty");

  			if(in_array($_POST['product_id'], $item_array_id))
  			{
  				echo "<script>alert('Product is already added in the cart..!')</script>";
  				//echo "<script>window.location = 'index.php'</script>";
  			}
  			else
  			{
  				$count = count($_SESSION['cart']);
  				$item_array = array('product_id' => $_POST['product_id'], 'product_qty' => 1);

  				$_SESSION['cart'][$count] = $item_array;
  				//print_r($_SESSION['cart']);
  			}
  		} 
  		else
  		{
  			$item_array = array('product_id' => $_POST['product_id'], 'product_qty' => 1);

  			$_SESSION['cart'][0] = $item_array;
  			//print_r($_SESSION['cart']);
  		}
  	}
?>
<?php
	include('pagination.php');
 	include('layouts/header.php');
?>
<section>
	<div class="container">
		<div class="row">
			<div>
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Items in stock</h2>
						<?php
							if ($row = mysqli_num_rows($final_result) >= 1)
							{
								while($row = mysqli_fetch_assoc($final_result)) 
								{
									if(isset($_SESSION['usrid']))
									{
										echo "<div class='col-md-4 colstrap'>
												<div class='product-image-wrapper'>
													<div class='single-products'>
														<div class='productinfo text-center'>
															<form method='POST' action=''>
																<img src='../admin/$row[image]' alt='' />
																<h2>$row[name] - $row[brand]</h2>
																<div class='cartinput'>
																	$$row[price]
																	<input type='hidden' name='product_id' value='$row[id]'>
																	<button type='submit' class='btn btn-default add-to-cart' name=\"add\">Add to cart <i class=\"fa fa-shopping-cart\"></i></button>
																</div>
															</form>";
															?>
															<!--<a href='cart.php' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>-->
									<?php

									}
									else if(!isset($_SESSION['usrid'])) 	
									{
										echo "<div class='col-sm-4 colstrap'>
											<div class='product-image-wrapper'>
												<div class='single-products'>
													<div class='productinfo text-center'>
														<img src='../admin/$row[image]' alt='' />
														<h2>$row[name] - $row[brand]</h2>
														<p>Price: $$row[price]</p>";
									}

													echo "</div>
													</div>
												</div>
											</div>";
								}
							}
						?>
				</div>
			</div>
		</div>
		<?php
			include('pagination2.php');
		?>
	</section>
<?php
	include('layouts/footer.php');
?>