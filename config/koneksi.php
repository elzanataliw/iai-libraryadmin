<?php 

$host = 'iai-epu.mysql.database.azure.com';
$username = 'mendung';
$password = 'TanpoUdan<3';
$db_name = 'epus-db';

//Initializes MySQLi
$koneksi = mysqli_init();

// Establish the connection
mysqli_real_connect($koneksi, 'iai-epu.mysql.database.azure.com', 'mendung', 'TanpoUdan<3', 'epus-db', 3306, NULL, MYSQLI_CLIENT_SSL);

//If connection failed, show the error
if (mysqli_connect_errno())
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}


