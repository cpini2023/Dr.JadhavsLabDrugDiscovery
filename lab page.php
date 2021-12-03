<?php
 include("connectToChemDB.inc");
?>

<!doctype html>
<!-- File Name: lab page.php-->
<!-- Author: Madhuri Jadhav and Claire Pini -->
<!-- Date Created/Updated: 12/03/2021-->
<!-- This is the .php page for the Chemical lab page. -->
<!-- --------------------------------------------------- -->

<html>

<head>
   <meta character set = "UTF-8">
    <title> Title </title>
    <link rel="stylesheet" href="mystyle.css">
    <script src="update.js"></script>
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
// Shows Chemical Table. Is not interactable. //
function showAllData()
{
	$dataBase = connectDB();

	$query1 = 'SELECT * FROM Chemicals ORDER BY Chem_id';
	$result1 = mysqli_query($dataBase, $query1) or die('Query failed: ' . mysqli_error($dataBase));
	
	echo "<br><h1 style='text-align:center;'>List of Lab Chemicals</h1><br>";
	
	echo "<table border='1' style='background-color:white;margin-left:auto;margin-right:auto;'>";
	echo "<tr> <td>Chemical ID</td> <td>Chemical Name</td> <td>Chemical Abbreviation</td><td>Chemical Synonym</td> <td>Chemical Make</td> <td>Chemical CAS</tr>";
	while ($line1 = mysqli_fetch_array($result1, MYSQL_ASSOC))
		{extract($line1);
			echo "<tr> <td>$Chem_id</td> <td>$Chem_name</td> <td>$Chem_abbreviation</td> <td>$Chem_synonym</td> <td>$Chem_make</td><td>$Chem_CAS</td></tr>";
		}
    echo "</table>";
    
    mysqli_close($dataBase);

}

?>
    </div>
<!-- --------------------------------------------------- -->
<!-- Form for students to fill out if a chemical is running row. Connects to separate table than overall chemical table. -->
    <div style="text-align: center; margin-bottom: 50px;">
        <h2>Chemical Update Submission Form</h2>
        <p>Notice a chemical is running low? Fill out a form and Dr.Jadhav will fix that!</p>
        <form method="post" action="update.php" autocomplete="on">
        <table style="margin-left: auto; margin-right: auto;">
            <tr><td>Name: </td><td><input type="text" id="Name" name="Name" required></td></tr>
            <tr><td>netID: </td><td><input type="text" id="netID" name="netID" required></td></tr>
            <tr><td>Chemical to be Updated: </td><td><input type="text" id="Chemical" name="Chemical" required></td></tr>
        </table>
        <br>
        <button type="submit" value="Submit">Click to Register</button>
        </form>
    </div>
</body>


</html>
