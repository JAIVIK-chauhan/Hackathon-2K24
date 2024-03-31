<?php

// Establishing a connection to the MySQL database
$connect = mysqli_connect("localhost", "root") or die ("Connection Failed..!");

// Selecting the database to work with
mysqli_select_db($connect, "hackathon_2024");

// Displaying a message to indicate successful connection
echo "..<br><br>";

?>
