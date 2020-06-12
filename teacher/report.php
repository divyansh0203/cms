<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Attendance Management System</title>
<meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="/aa/css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<header>

  <h1>Shaheed Bhagat Singh State Technical Campus</h1>
  <h2>Online Attendance Management</h2>
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
    <h3>Individual Report</h3>

    <form method="post" action="">

    <label>Select Course</label>
    <select name="whichcourse">
       <option name="IOT" value="iot">Internet of Things</option>
       <option name="ST" value="st">Software Testing</option>
    </select>

      <p>  </p>
      <label>Student ID</label>
      <input type="text" name="sr_id">
      <input type="submit" name="sr_btn" value="Go!" >

    </form>

    <h3>Mass Report</h3>

    <form method="post" action="">

    <label>Select Course</label>
    <select name="whichcourse">
       <option name="IOT" value="iot">Internet of Things</option>
       <option name="ST" value="st">Software Testing</option>
    </select>
    <p>  </p>
      <label>Date ( yyyy-mm-dd )</label>
      <input type="text" name="date">
      <input type="submit" name="sr_date" value="Go!" >
    </form>

    <br>

    <br>

   <?php

    if(isset($_POST['sr_btn'])){

     $sr_id = $_POST['sr_id'];
     $course = $_POST['whichcourse'];

     $single = mysqli_query($con1,"select * from attendance where stat_id='$sr_id' and course = '$course'");

     $count_tot = mysqli_num_rows($single);

mysqli_close($con1);

  } 

    if(isset($_POST['sr_date'])){

     $sdate = $_POST['date'];
     $course = $_POST['whichcourse'];

     $all_query = mysqli_query($con1,"select * from attendance where stat_date='$sdate' and course = '$course'");

    }
    if(isset($_POST['sr_date'])){

      ?>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">Student ID</th>
          <th scope="col">Date</th>
          <th scope="col">Attendance Status</th>
        </tr>
     </thead>


    <?php

     $i=0;
     while ($data = mysqli_fetch_array($all_query)) {

       $i++;

     ?>
        <tbody>
           <tr>
             <td><?php echo $data['stat_id']; ?></td>
             <td><?php echo $data['stat_date']; ?></td>
             <td><?php echo $data['st_status']; ?></td>
           </tr>
        </tbody>

     <?php 
   } 
  }
     ?>
     
    </table>


    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table table-striped">

    <?php


    if(isset($_POST['sr_btn'])){

       $count_pre = 0;
       $i= 0;
       while ($data = mysqli_fetch_array($single)) {
       $i++;
       if($data['st_status'] == "Present"){
          $count_pre++;
       }
       if($i <= 1){
     ?>


     <tbody>
      <tr>
          <td>Student ID: </td>
          <td><?php echo $data['stat_id']; ?></td>
      </tr>


           <?php
         }
        
        }

      ?>
      
      <tr>
        <td>Total Class (Days): </td>
        <td><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Present (Days): </td>
        <td><?php echo $count_pre; ?> </td>
      </tr>

      <tr>
        <td>Absent (Days): </td>
        <td><?php echo $count_tot -  $count_pre; ?> </td>
      </tr>
      <tr>
	<td>Attendace Percentage </td>
	<td><?php echo $percentage = ($count_pre*100)/$count_tot; ?> % </td>
      </tr>






    </tbody>

   <?php

     }  
   
     ?>
    </table>
  </form>

  </div>

</div>

</center>

</body>
</html>
