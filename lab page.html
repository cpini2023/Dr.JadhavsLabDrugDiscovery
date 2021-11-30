<?php
 include("connectToDB.inc");
?>

<!doctype html>
<!-- File Name: -->
<!-- Author:  -->
<!-- Date Created/Updated:  -->
<!-- This is a page that . -->
<!-- =================================================== -->

<html>

<head>
   <meta character set = "UTF-8">
    <title> Title </title>
    <link rel="stylesheet" href="mystyle.css">
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
                    <a href="lab page.php" class="ACTIVE">Chemical Lab</a>
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
                    <a href="admin.php">Admin</a>
               </li>
           </td>
        </tr>
        </ul>
    </table>
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

	$query1 = 'SELECT * FROM Chemicals ORDER BY chem_ID';
	$result1 = mysqli_query($dataBase, $query1) or die('Query failed: ' . mysqli_error($dataBase));
	
	echo "<br>All <i>Chemical</i> Records:<br>";
	
	echo "<table border='1' style='background-color:white;content-align:center;'>";
	echo "<tr> <td>Chemical ID</td> <td>Chemical Name</td> <td>Chemical Abbreviation</td><td>Chemical Synonym</td> <td>Chemical Make</td> <td>Chemical CAS</tr>";
	while ($line1 = mysqli_fetch_array($result1, MYSQL_ASSOC))
		{extract($line1);
			echo "<tr> <td>$chem_ID</td> <td>$Chem_Name</td> <td>$Abbreviation</td> <td>$Chem_Synonym</td> <td>$Chem_Make</td><td>$Chem_CAS</td></tr>";
		}
    echo "</table>";
    
    mysqli_close($dataBase);

}

?>
    </div>
</body>


</html>
