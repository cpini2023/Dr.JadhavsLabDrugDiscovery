<?php

function connectDB(){
	$dbConnection = mysqli_connect("sql202.epizy.com", "epiz_29508202", 
    "5S22CiDoEpEol", "epiz_29508202_chemicalinventory");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error());
	}
	return $dbConnection;
}
  
?>