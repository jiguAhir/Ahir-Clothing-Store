<?php
	session_start();

	include('connect_db.php');

	if(isset($_SESSION['usrid']))
  	{
  		$usrid = $_SESSION['usrid'];
  	}

  	if(isset($_POST['remove']))
  	{
  		foreach ($_SESSION['cart'] as $key => $value)
  		{
  			if($value["product_id"] == $_POST['prod_id'])
  			{
  				unset($_SESSION['cart'][$key]);
  				//echo "<script>alert('Product has been removed...!')</script>"; */
  			}
  		}
  	}

  	if(isset($_POST['update_qty']))
  	{
  		foreach ($_SESSION['cart'] as $key => $value)
  		{
  			if($value["product_id"] == $_POST['prod_id'])
  			{
  				$_SESSION['cart'][$key]["product_qty"] = $_POST['quantity'];
  			}
  		}
  	}

	include('layouts/header.php');
?>

<div class='container'>
	<div class="shopping-cart">
		<div class="col-md-7">
			<div>
				<h4>My Cart</h4>
				<hr>

				<?php

					$total = 0;
					

					if(isset($_SESSION['cart'])) 
					{
						$product_id = array_column($_SESSION['cart'], 'product_id');
						$product_qty = array_column($_SESSION['cart'], 'product_qty');
						$content = array_combine($product_id, $product_qty);
						$sql = "SELECT id, name, brand, price, image 
								FROM product";

						$result = mysqli_query($con, $sql);
					?>

					<?php

						while($row = mysqli_fetch_assoc($result))
						{
							foreach($content as $id => $qty)
							{
								if($row['id'] == $id)
								{
									echo "<form method='POST' action='' class='cart-items'>
										<div>
											<div class='row'>
												<div class='col-md-3'>
													<img src='../admin/$row[image]' alt='' class='img-thumbnail'>
												</div>
												<div class='col-md-5'>
													<h5>$row[name]</h5>
													<h5>$row[brand]</h5>
													<h5>$$row[price]</h5>
												</div>
												<div class='col-md-4'>
													Quantity: <input type='number' class='product-quantity' name='quantity' value='$qty'>
													<input type='hidden' name='prod_id' value='$id'>
													<button type='submit' class='btn-cart btn btn-warning' name='update_qty'>Update quantity</button>
													<button type='submit' class='btn-cart btn btn-danger' name='remove'>Remove</button>
												</div>
											</div>
										</div>
									</form>	
									<hr>";
									
									$total = $total + ($row['price'] * $qty);
								}
							}
						}
					}
					
					if (!isset($_SESSION['cart']) || $total == 0)
					{
						echo "<h5>Cart is empty</h5>";
					}		 
				?>

			</div>
		</div>
		<div class="col-md-5">
			<?php
				if (isset($_SESSION['cart']) && $total <> 0)
				{
			?>
					<div>
						<h4>Price Details</h4>
						<hr>
						<div class="row price-details">
							<div class="col-md-12">
								<table class="cart_price">
									<tr>
										<th colspan="2">
											<h5>Price (<?php echo $count; ?> items)</h5>
										</th>
									</tr>
									<?php
										$product_id = array_column($_SESSION['cart'], 'product_id');
										$product_qty = array_column($_SESSION['cart'], 'product_qty');
										$content = array_combine($product_id, $product_qty);
										$sql = "SELECT id, name, brand, price, image 
												FROM product";
										$result = mysqli_query($con, $sql);

									while($row = mysqli_fetch_assoc($result))
									{
										foreach($content as $id => $qty)
										{
											if($row['id'] == $id)
											{
												$total_price = $row['price'] * $qty;
												echo "<tr>
														<td>
															$row[name] - $row[brand]&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;$qty
														</td>
														<td>
															$";
															echo number_format($total_price, 2);
												echo "</td>
													</tr>";
											}
										}
									}
									?>
									<tr>
										<td>
											<h5>Shipping charges</h5>
										</td>
										<td>
											<h6 class="text-success">FREE</h6>
										</td>
									</tr>
									<tr>
										<td>
											<h5>Total amount</h5>
										</td>
										<td>
											$<?php 
												echo number_format($total, 2);
												$_SESSION['total'] = $total; 
											?>		
										</td>
									</tr>
								</table>
								<?php
									echo "<a href='checkout.php?usrid=$_SESSION[usrid]&action=checkout' class='btn-cart2 btn btn-success' name='sbmt_checkout'>CHECKOUT</a>";
								?>
							</div>
						</div>
					</div>
			<?php
				} 
			?>
		</div>
	</div>
</div>

<?php
	include('layouts/footer.php');
?>

