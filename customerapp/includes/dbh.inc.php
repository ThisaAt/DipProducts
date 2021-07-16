<?php 

    $serverName="localhost";
    $dbUserName="nipuna";
    $dBPassword="nipuna";
    $dbName="dipol_db"; 

  //  $conn = mysqli_connect("localhost","root","","dipol_db");
    $conn = mysqli_connect($serverName, $dbUserName, $dBPassword, $dbName);

    if(!$conn){
        die("connection failed :".mysqli_connect_error());
    }

?>