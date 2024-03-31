<?php
// Opens a connection to a MySQL server.
$connection=mysqli_connect("localhost", 'root', '','hackathon_2024');
if (!$connection) {
    die('Not connected : ' . mysqli_connect_error());
}
?>