<?php
include('connect_db.php');
if (isset($_POST['btnsubmit'])) {

	$file = $_FILES['pimage'];
	//print_r($file);
	$fileName = $_FILES['pimage']['name'];
	$fileTmpName = $_FILES['pimage']['tmp_name'];
	$fileSize = $_FILES['pimage']['size'];
	$fileError = $_FILES['pimage']['error'];
	$fileType = $_FILES['pimage']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				//$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileNameNew = uniqid('', true).$fileName;
				
				if ($_POST['pcategory'] == 1)
				{
					$fileDestination = 'product_images/Women/'.$fileNameNew;
				}
				else if ($_POST['pcategory'] == 2)
				{
					$fileDestination = 'product_images/Men/'.$fileNameNew;
				}
				else if ($_POST['pcategory'] == 3)
				{
					$fileDestination = 'product_images/Kids/'.$fileNameNew;
				}
				
				move_uploaded_file($fileTmpName, $fileDestination);
				$query = "INSERT INTO product (name, brand, category, quantity, type, price, image) VALUES ('$_POST[pname]', '$_POST[pbrand]', '$_POST[pcategory]', $_POST[pquantity], $_POST[ptype], $_POST[pprice], '$fileDestination')";

				if ($con->query($query) === TRUE) 
				{
					echo "<script type=\"text/javascript\">"."alert('Product successfully registered');"."</script>";
			    } 
				else 
				{
					echo "Error: " . $query . "<br>" . $con->error;
				} 
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file! ".$fileError;
		}
	} else {
		echo "You cannot upload files of this type!";
	}		
}
?>