<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel='stylesheet' href="css/styles.css">
    <link rel='stylesheet' href="css/aos.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <title>Dougherty Summer Soccer Camp</title>
</head>
</html>


<?php
header( "refresh:6;url=index.html" );

$afname = filter_input(INPUT_POST, 'afname');
$alname = filter_input(INPUT_POST, 'alname');
$month = filter_input(INPUT_POST, 'month');
$day = filter_input(INPUT_POST, 'day');
$year = filter_input(INPUT_POST, 'year');
$age = filter_input(INPUT_POST, 'age');
$grade = filter_input(INPUT_POST, 'grade');
$gender = filter_input(INPUT_POST, 'gender');
$address1 = filter_input(INPUT_POST, 'address1');
$address2 = filter_input(INPUT_POST, 'address2');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip');
$pfname = filter_input(INPUT_POST, 'pfname');
$plname = filter_input(INPUT_POST, 'plname');
$pnumber = filter_input(INPUT_POST, 'pnumber');
$email = filter_input(INPUT_POST, 'email');
$ecfname = filter_input(INPUT_POST, 'ecfname');
$eclname = filter_input(INPUT_POST, 'eclname');
$relationship = filter_input(INPUT_POST, 'relationship');
$ecnumber = filter_input(INPUT_POST, 'ecnumber');

$host = "localhost";
$dbusername = "root";
$dbpassword = "elinhart9";
$dbname = 'dsss';

// Creating Connection to DataBase
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
    }
else{
    $sql = "INSERT INTO registration (afname, alname, month, day, year, age, grade, gender, address1, address2, city, state, zip, pfname, plname, pnumber, email, ecfname, eclname, relationship, ecnumber)
    VALUES ('$afname','$alname','$month','$day','$age','$year','$grade','$gender','$address1','$address2','$city','$state','$zip','$pfname','$plname','$pnumber','$email','$ecfname','$eclname','$relationship','$ecnumber')";
    if ($conn->query($sql)){
    echo "<div align='center' class='echo'>" . 'Registration Successfully Completed!' . "</div>";
    echo "<div align='center' class='redirect'>" . '(You will be redirected to the home page in 5 seconds)' . "</div>";
    }
    else{
        echo "<div align='center' class='echoerror'>" . 'Error. Registration failed.' . "</div>";
        echo "<div align='center' class='redirect'>" . '(You will be redirected to the registration page in 5 seconds)' . "</div>";
     echo "Error: ". $sql ."
    ". $conn->error;
    }
    $conn->close();
};

?>