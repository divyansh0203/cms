<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: /am/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- head started -->
<head>
<title>College Management System</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/aa/css/main.css">

</head>
<!-- head ended -->

<!-- body started -->
<body>

<!-- Menus started-->
<header>

  <h1>Shaheed Bhagat Singh State Technical Campus</h1>
  <h2>College Management System</h2>
  <div class="navbar">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="report.php">My Report</a>
  <a href="account.php">My Account</a>
  <a href="/aa/logout.php">Logout</a>

</div>

</header>
<!-- Menus ended -->

<center>

<!-- Content, Tables, Forms, Texts, Images started -->
<div class="row">
    <div class="content">
      <p>Be attentive and be regular :)</p>
    <img src="/aa/img/logo.png" height="250px" width="300px" />

  </div>

</div>
<!-- Contents, Tables, Forms, Images ended -->

</center>

</body>
<!-- Body ended  -->

</html>
