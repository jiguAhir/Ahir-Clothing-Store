<?php
	session_start();

	include('connect_db.php');
	
	if (isset($_POST['submit_order']))
	{
		unset($_SESSION['cart']);
		$_SESSION['total'] = 0;
		echo "<script>alert('Payment successfully received, Thank you for shopping in AHIR-CLOTHING STORE')</script>";
		//header("Location: index.php?usrid=$_SESSION[usrid]&category=$_GET[category]&type=$_GET[type]");
	}

	include('layouts/header.php');
?>
<div class="container">
	<div class="col-md-12">
		<form action="" method="POST">
         	<div class="checkout">
	          	<h2 class="checkout_title">Total payable amount: $<?php echo number_format($_SESSION['total'], 2); ?></h2>
	          	<hr>
	            <h3>Billing Address</h3>
	            <hr>
	            <div>
	            	<i class="fa fa-user"></i> Name <input type="text" id="fname" name="firstname" required="required" placeholder="">
	            </div>
	            <div>
	            	<i class="fa fa-envelope"></i> Email <input type="email" id="email" name="email" required="required" placeholder="">	
	            </div>
	            <div>
	            	<i class="fa fa-address-card"></i> Address <input class="txtlong" type="text" id="adress" name="address" required="required" placeholder="">
	            </div>
	            <div>
	            	City <input type="text" id="city" name="city" required="required" placeholder="">	
	            	     State <input class="txtshort" type="text" id="state" name="state" required="required" placeholder="">
	            	     Zip code <input class="txtshort" type="text" id="state" name="zip" required="required" placeholder=""> 
	            </div>
          	</div>
	        <div class="checkout">
	            <h3>Payment</h3>
	            <hr>
	            <p class="accept_txt">Accepted Cards</p>
	            <div class="icon-container">
	            	<img src="images/credit_card.png" alt="" class="credit_img">
	            </div>
	            <div>
	            	Credit card number	<input class="txtlong" type="text" id="ccnum" name="cardnumber" required="required" placeholder="XXXX - XXXX - XXXX - XXXX">
	            </div>
	            <div>
	            	Name on card <input type="text" id="cname" name="cardname" required="required" placeholder="">
	            </div>
	            <div>
	            	Expiration date <input class="txtshort" type="text" id="expdate" name="expdate" required="required" placeholder="MM/YY">
	            </div>
	            <div>
	            	CVV <input class="txtshort" type="text" id="cvv" name="cvv" required="required" placeholder="000">
	            </div>
        		<div>
	            	<i class="fa fa-address-card"></i> Shipping address <input class="txtlong" type="text" id="address2" name="address2" required="required" placeholder="">
	            </div>
	            <div>
	            	City <input type="text" id="city2" name="city2" required="required" placeholder="">	
	            	State <input class="txtshort" type="text" id="state2" name="state2" required="required" placeholder="">
	            	Zip code <input class="txtshort" type="text" id="zip2" name="zip2" required="required" placeholder=""> 
	            </div>
        		<input type="submit" name="submit_order" value="PLACE ORDER" class="btn btn-checkout btn-warning"> 
        	</div>	
      	</form>
	</div>          
</div>
<?php
	include('layouts/footer.php');
?>