<!-- File Name: update.php-->
<!-- Author: Madhuri Jadhav and Claire Pini -->
<!-- Date Created/Updated: 12/03/2021-->
<!-- This is the .php page for the student chemical update form in the chemical lab.php page. -->
<!-- --------------------------------------------------- -->
<!DOCTYPE html>
<?php
include("connectToDB.inc");
?>
<html>
    <head>
        <link href="mystyle.css" rel="stylesheet" type="text/CSS">

    </head>
<!-- --------------------------------------------------- -->
<!-- Prints gathered information from the update form from lab page.php -->
    <body>
        <p>Thank you for your submission! Here is the information we have gathered from you:</p>

        <p>
        Name: <?php print($_POST['Name']); ?> <br>
        netID <?php print($_POST['netID']); ?> <br>
        Chemical: <?php print($_POST['Chemical']); ?> <br>
        Day and Time Submitted: <?php 
            date_default_timezone_set('US/Central');
            $date_and_time = date('l, F d Y g:i:s a');
            print($date_and_time); 
            ?>
        </p>

<!-- --------------------------------------------------- -->
<!-- Pushes data to EmptyChemicals Table -->
        <?php 
        function insertDataToDB()
        {

            $dataBase = connectDB();
            date_default_timezone_set('US/Central');
            $date_and_time = date('l, F d Y g:i:s a');

            $inputINSERT = "INSERT INTO EmptyChemicals(Name,netID,Chemical,DaySubmission)";
            $inputSTART = "VALUES('";
            $inputName = mysqli_real_escape_string($dataBase, $_POST['Name'])."','";
            $inputnetID = mysqli_real_escape_string($dataBase, $_POST['netID'])."','";
            $inputChemical = mysqli_real_escape_string($dataBase, $_POST['Chemical'])."','";
            $inputDaySubmission = mysqli_real_escape_string($dataBase, $date_and_time);
            $inputEND = "');";


            $query1 = $inputINSERT.$inputSTART.$inputName.$inputnetID.$inputChemical.$inputDaySubmission.$inputEND;

            $result1 = mysqli_query($dataBase, $query1) or die('Query failed: ' . mysqli_error($dataBase));


            mysql_close($dataBase);
        }


        insertDataToDB();


        ?>

    </body>
    </html>
