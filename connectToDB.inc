<?php

function connectDB(){
	$dbConnection = mysqli_connect("sql304.epizy.com", "epiz_29470090", "0giaQH1hfgL", "epiz_29470090_ChemicalInventory");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error());
	}
	echo "Database connected successfully . . . <br>";
	return $dbConnection;
}


?>