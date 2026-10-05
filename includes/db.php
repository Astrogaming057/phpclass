<?php
$con = mysqli_connect('localhost', 'dbuser', 'dbdev123');
mysqli_select_db($con, 'phpclass');

$pdo = new PDO('mysql:host=localhost;dbname=phpclass', 'dbuser', 'dbdev123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
