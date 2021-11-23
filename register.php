<!DOCTYPE html>
<?php
include("connectToDB.inc");
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/CSS">
        <script src="webRegistration.js"></script>

    </head>
    <body>
        <p>Thank you for registering! Here is the information we have gathered from you:</p>

        <p>
        Name: <?php print($_POST['Fname']); ?> <?php print($_POST['Lname']); ?> <br>
        Email: <?php print($_POST['email']); ?> <br>
        Password: Hidden for your safety.
        </p>
        <p>
        You can now return to homepage. <br>
        <a href='index.html'><button>Homepage</button></a>
        </p>


        <?php 
        function insertDataToDB()
        {

            $dataBase = connectDB();

            $inputINSERT = "INSERT INTO Login(Fname,Lname,email,password)";
            $inputSTART = "VALUES('";
            $inputFNAME = mysqli_real_escape_string($dataBase, $_POST['Fname'])."','";
            $inputLNAME = mysqli_real_escape_string($dataBase, $_POST['Lname'])."','";
            $inputEMAIL = mysqli_real_escape_string($dataBase, $_POST['email'])."','";
            $inputPASSWORD = mysqli_real_escape_string($dataBase, $_POST['password']);
            $inputEND = "');";


            $query1 = $inputINSERT.$inputSTART.$inputFNAME.$inputLNAME.$inputEMAIL.$inputPASSWORD.$inputEND;

            $result1 = mysqli_query($dataBase, $query1) or die('Query failed: ' . mysqli_error($dataBase));


            mysql_close($dataBase);
        }


        insertDataToDB();


        ?>

    </body>
    </html>
