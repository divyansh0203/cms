<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: /aa/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>College Management System</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/aa/css/main.css">

</head>
<body>

<header>

  <h1>Shaheed Bhagat Singh State Technical Campus</h1>
  <h2>College Management System</h2>
  <div class="navbar">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="teachers.php">Faculties</a>
  <a href="attendance.php">Attendance</a>
  <a href="report.php">Report</a>
  <a href="/aa/logout.php">Logout</a>

</div>

</header>

<center>

<div class="row">
    <div class="content">
    <img src="/aa/img/logo.png" height="250px" width="300px" />
      <p>Moga Road (NH-95), Ferozepur-152004 (Punjab), INDIA</p>
  </div>

</div>

</center>

</body>
</html>
