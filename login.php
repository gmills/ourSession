<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="contents">
<?php

  include "db_connect.php";
  $name = $_POST['username'];
  $pw = $_POST['pw'];

   $query = "select * from users WHERE username = '$name' AND password = SHA('$pw')";
   $result = mysqli_query($db, $query);
   if ($row = mysqli_fetch_array($result))
   {
   		$_SESSION['zip'] = $row['zipcode'];
   		echo "<p>Thanks for logging in, $name</p>\n";
   		echo "<p><a href=\"search.php\">Continue</a></p>";
   }
   else
    {
   		echo "<p>Incorrect username or password</p>\n";
		echo $query;
   		echo  "<h1>Log In</h1>\n  <form method=\"post\" action=\"login.php\">";
    	echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
        echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
        echo "<input type=\"submit\" value=\"Login\" name=\"submit\" /></form> <p><a href=\"createAccount.html\">Create Account</a></p>";
    }
   
  $_SESSION ['username'] = $name;
$_SESSION ['pw'] = $pw;

?>
  
  </div>
</body>
</html>
