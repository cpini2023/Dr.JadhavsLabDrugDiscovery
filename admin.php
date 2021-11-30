<?php
 include("connectToDB.inc");
?>
    
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Page</title>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<link href="mystyle.css" type="text/css" rel="stylesheet">
 
	</head>

<body>
<!-- =================================================== -->
   <!-- Navigation Bar. Use this in all pages and make sure correct page is .active -->   
     <table id="navBar">
      <ul>
      <tr>
            <td>
               <li>
                   <h2>Dr.Jadhav's Lab Drug Discovery</h2>
               </li>
            </td>
            <td>
                <li>
                   <a href="index.html">Homepage</a>
                </li>
            </td>
            <td>
                <li>
                    <a href="profile.html">About Dr.Jadhav</a>
                </li>
            </td>
            <td>
                <li>
                    <a href="lab page.php" >Chemical Lab</a>
                </li>
            </td>
            <td>
                <li>
                    <a href="Volunteeropportunity.html">Become a volunteer</a>
                </li>
            </td>
           <td>
               <li>
                    <a href="download.html">Software</a>
               </li>
               <td>
               <li>
                    <a href="admin.php"class="ACTIVE">Admin</a>
               </li>
           </td>
        </tr>
        </ul>
    </table>
    <br><br><br><br><br><br>
<div id="underNav">
<?php


if(isset($_POST['tableName1']) &&  isset($_POST['attributeName1']) && isset($_POST['attributeValue1']))
	{
		deleteRecords();
		showAllData();
	}

else if(isset($_POST['tableName2']) &&  isset($_POST['attributeName2']) && isset($_POST['attributeValue2']) && isset($_POST['attributeName3']) && isset($_POST['attributeValue3']))
	{
		updateRecords();
		showAllData();
	}

else{
	showAllData();
	}


/////////////Creating Two Tables that show all the database data/////////////
function showAllData()
{
	$dataBase = connectDB();

	$query1 = 'SELECT * FROM Login ORDER BY login_id';
	$result1 = mysqli_query($dataBase, $query1) or die('Query failed: ' . mysqli_error($dataBase));
	
	echo "<br>All <i>Student</i> Records:<br>";
	
	echo "<table border='1'>";
	echo "<tr> <td>login_id</td> <td>First Name</td> <td>Last Name</td><td>email</td> <td>Password</td></tr>";
	while ($line1 = mysqli_fetch_array($result1, MYSQL_ASSOC))
		{extract($line1);
			echo "<tr> <td>$login_id</td> <td>$Fname</td> <td>$Lname</td> <td>$email</td> <td>$password</td></tr>";
		}
    echo "</table>";
    
    mysqli_close($dataBase);

}


///////////Enabling the Admin to DELETE records///////////
function deleteRecords(){
	$dataBase = connectDB();
	
	$q1 = 'DELETE FROM ';
	$q2 = mysqli_real_escape_string($dataBase, $_POST['tableName1']);
	$q3 = " WHERE ";
	$q4 = mysqli_real_escape_string($dataBase, $_POST['attributeName1']). "="; 
	$q5 = "'" . mysqli_real_escape_string($dataBase, $_POST['attributeValue1']). "'";
	$query3 = $q1.$q2.$q3.$q4.$q5;
	
	echo "You ran this query: ".$query3."<br>";
	
	$result3 = mysqli_query($dataBase, $query3) or die('Query failed: ' . mysqli_error($dataBase));
	
	echo "the selected row has been deleted . . . <br>";
	
	mysqli_close($dataBase);
}


///////////Enabling the Admin to UPDATE records///////////
function updateRecords(){
	$dataBase = connectDB();
	
	$q1 = ' UPDATE ';
	$q2 = mysqli_real_escape_string($dataBase, $_POST['tableName2']);
	$q3 = " SET ";
	$q4 = mysqli_real_escape_string($dataBase, $_POST['attributeName2']). "="; 
	$q5 = "'" . mysqli_real_escape_string($dataBase, $_POST['attributeValue2']). "'";
	$q6 = ' WHERE ';
	$q7 = mysqli_real_escape_string($dataBase, $_POST['attributeName3']). "="; 
	$q8 = "'" . mysqli_real_escape_string($dataBase, $_POST['attributeValue3']). "'";

	$query4 = $q1.$q2.$q3.$q4.$q5.$q6.$q7.$q8;
	
	echo "You ran this query: ".$query4."<br>";
	
	$result4 = mysqli_query($dataBase, $query4) or die('Query failed: ' . mysqli_error($dataBase));
	
	echo "the selected row has been updated . . . <br>";
	
	mysqli_close($dataBase);
}



/////Print the Two forms////////
echo <<<END
	<h2>Below you can DELETE records from the tables above</h2>
	<form action="$_SERVER[PHP_SELF]" method="post">
		<p>DELETE FROM <input type="text" name="tableName1" value=""> </p>
		<p>WHERE <input type="text" name="attributeName1" value="">  = <input type="text" name="attributeValue1" value=""> </p>
		<input type='submit'>
	</form>
END;


echo <<<END
	<h2>Below you can UPDATE records in the tables above</h2>
	<form action="$_SERVER[PHP_SELF]" method="post">
		<p>UPDATE <input type="text" name="tableName2" value=""> </p>
		<p>SET <input type="text" name="attributeName2" value=""> = <input type="text" name="attributeValue2" value=""> </p>
		<p>WHERE <input type="text" name="attributeName3" value=""> = <input type="text" name="attributeValue3" value=""> </p>
		<input type='submit'>
	</form>
END;


?>
<div id="piechart" style="width: 900px; height: 500px;"></div>
</div>
</body>

<html>