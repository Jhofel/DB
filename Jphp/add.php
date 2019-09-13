<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$pid = $_POST['pid'];
	$pname = $_POST['pname'];
	$pdesc = $_POST['pdesc'];
	$pprice = $_POST['pprice'];
	$pquant = $_POST['pquant'];
		
	// checking empty fields
	if(empty($pid) || empty($pname) || empty($pdesc) || empty($pprice) || empty($pquant)) {
				
		if(empty($pid)) {
			echo "<font color='red'>Product ID field is empty.</font><br/>";
		}
		
		if(empty($pname)) {
			echo "<font color='red'>Product Name field is empty.</font><br/>";
		}
		
		if(empty($pdesc)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
		}

		if(empty($pprice)) {
			echo "<font color='red'>Product Price field is empty.</font><br/>";
		}

		if(empty($pquant)) {
			echo "<font color='red'>Product Quantity field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(pid, pname, pdesc, pprice, pquant) VALUES(:pid, :pname, :pdesc, :pprice, :pquant)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':pid', $pid);
		$query->bindparam(':pname', $pname);
		$query->bindparam(':pdesc', $pdesc);
		$query->bindparam(':pprice', $pprice);
		$query->bindparam(':pquant', $pquant);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
