<?php
 include("connectToDB.inc");
?>
    
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Page</title>
		<link href="mystyle.css" type="text/css" rel="stylesheet">
 
	</head>

<body>
<!-- --------------------------------------------------- -->
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
    <br>
<div id="underNav">
<?php

// --------------------------------------------------- //
// Enables the page to show tables off of database //
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

// --------------------------------------------------- //
// Shows Login Table and EmptyChemicals Table //
// Login Table shows data filled out by students when they registered. //
// EmptyChemicals Table shows information on chemical refill requests and who filled oit those orders. //
function showAllData()
{
	$dataBase = connectDB();

	$query1 = 'SELECT * FROM Login ORDER BY login_id';
	$result1 = mysqli_query($dataBase, $query1) or die('Query failed: ' . mysqli_error($dataBase));
	
	echo "<br>Student Data:<br>(Login)<br>";
	
	echo "<table border='1'>";
	echo "<tr> <td>Login ID<br>(login_id)</td> <td>First Name<br>(Fname)</td> <td>Last Name<br>(Lname)</td><td>Email<br>(email)</td> <td>Password<br>(password)</td></tr>";
	while ($line1 = mysqli_fetch_array($result1, MYSQL_ASSOC))
		{extract($line1);
			echo "<tr> <td>$login_id</td> <td>$Fname</td> <td>$Lname</td> <td>$email</td> <td>$password</td></tr>";
		}
    echo "</table>";
    
    
    
    $query2 = 'SELECT * FROM EmptyChemicals ORDER BY numSubmission';
	$result2 = mysqli_query($dataBase, $query2) or die('Query failed: ' . mysqli_error($dataBase));
	
	echo "<br>Clemicals that are running low:<br>(EmptyChemicals)<br>";
	
	echo "<table border='1'>";
	echo "<tr> <td>Submisison Order<br>(numSubmission)</td> <td>Name of Student Submitting<br>(Name)</td> <td>netID of Student<br>(netID)</td><td>Chemical<br>(Chemical)</td> <td>Day and Time of Submission<br>(DaySubmission)</td></tr>";
	while ($line2 = mysqli_fetch_array($result2, MYSQL_ASSOC))
		{extract($line2);
			echo "<tr> <td>$numSubmission</td> <td>$Name</td> <td>$netID</td> <td>$Chemical</td> <td>$DaySubmission</td></tr>";
		}
    echo "</table>";
    
    mysqli_close($dataBase);

}



// --------------------------------------------------- //
// Allows for data from the Login Table and EmptyChemicals Table to be deleted //
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

// --------------------------------------------------- //
// Allows for data from the Login Table and EmptyChemicals Table to be updated //
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


// --------------------------------------------------- //
// This shows the delete form on the page //
echo <<<END
	<h2>Below you can DELETE records from the tables above</h2>
	<form action="$_SERVER[PHP_SELF]" method="post">
		<p>DELETE FROM <input type="text" name="tableName1" value=""> </p>
		<p>WHERE <input type="text" name="attributeName1" value="">  = <input type="text" name="attributeValue1" value=""> </p>
		<input type='submit'>
	</form>
END;

// This shows the update form on the page //
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
</div>
</body>

<html>
