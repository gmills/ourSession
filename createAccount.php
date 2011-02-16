<?php 
 session_start();
?>
<?php
 $_session ['username'] = '$username';
$_session ['pw'] = '$pw';
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
  <form method="post" action="login.php">
  <input type="submit" value="Click to continue" name="submit" />
<?php

include('db_connect.php');
$username = $_POST['username'];
$pw = $_POST['pw'];
$zip = $_POST['zip'];

?>
<?php
$query= "INSERT INTO users (id, username, password, zipcode) VALUES(NULL, '$username', SHA('$pw'), '$zip')";
$result = mysqli_query($db, $query)
or die("Error Querying Database");
mysqli_close($db);


?>

