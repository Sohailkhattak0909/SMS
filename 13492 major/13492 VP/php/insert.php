<?php
if(isset($_POST['submit'])) { 
include 'connection.php';

$first_n = $_POST['first_n'];
$last_n = $_POST['last_n'];
$age= $_POST['age'];
$gender= $_POST['gender'];
$class=$_POST['class'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$address= $_POST['address'];

$sql ="INSERT INTO `info`.`data` ( `first_n`,`last_n`, `age`, `gender`,`class`, `email`, `phone`,`address`, `date`) VALUES ( '$first_n', '$last_n', '$age', '$gender','$class', '$email', '$phone','$address', current_timestamp());";



if($con->query($sql)==true){
    header('location:insert.php');
    exit;
}
else {
    echo "failed to insert data".mysqli_error($con);
}
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<div class="sidenav">
  <a href="Dashboard.php">Dashboard</a>
  <a href="#" class="dropdown-btn">Student Portal</a>
  <div class="dropdown-container">
  <a href="insert.php">Student Registration</a> 
  <a href="display.php">Student Records</a> 
  <a href="update.php">Update Records</a> 
  <a href="delete.php">Delete Records</a>
  </div>
  <a href="#" class="dropdown-btn">Examination</a>
  <div class="dropdown-container">
  <a href="toppers.php">Batch Toppers</a> 
  <a href="add_marks.php">Add & Update Marks</a> 
  <a href="display_results.php">Display Results</a> 
  </div>
  <a href="time_table.php">Time Table</a>
</div>
<div id=dash_back></div>
<nav>
        <div class="logo"></div>
          
          <!-- Mode change button -->
          
          <ul class="nav_item">
            <li class="item"><button id="but"></button> </li>
          <li class="dropdown , item">
            <a href="#"><img src="../icon/user.png" alt="user" style=" width: 2rem;height: 2rem;border-radius: 2vh;border: hidden; background-color: white;"></a>
            <div class="dropdown-content">
              <a href="../index.html">Sign Out</a> 
            </div>
          </li> 
        </ul> 
      </nav>
    <div class="insert_container">
        <div class="head">
            <h2>Student Registration</h2>
        </div>
       <div class="stu_info">
        <div class="left_side">
            <p>First Name:</p><br>
            <p>Last Name:</p><br>
            <p>Age:</p><br>
            <p>Gender:</p><br>
            <p>Class:</p><br>
            <p>Email:</p><br>
            <p>Contect Number:</p><br>
            <p>Address:</p><br>
        </div>

        <div class="right_side">
        <form action="" method="post">
       
           <input class="in_input" type="text"  name="first_n"   placeholder="Abc" required><br>
           <input class="in_input" type="text"  name="last_n"    placeholder="Xyz" ><br>
           <input class="in_input" type="int"   name="age"       placeholder="09 to 16"  required><br>
           <select class="in_sel" name="gender">
                <option value="--" selected>--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br>
            <select class="in_sel" name="class">
                <option value="--" selected>--</option>
                <option value="VI" >VI</option>
                <option value="VII">VII</option>
                <option value="VII">VII</option>
            </select><br>
            <input class="in_input" type="email" name="email"     placeholder="abc@gmail.com" required><br>
            <input class="in_input" type="bigint" name="phone"     placeholder="0000-0000000" required><br>
            <input class="in_input" type="text"  name="address"   placeholder="Earth"         required><br>
           
            <div class="btu">
        <button class="b1" name="submit">Submit</button>
        <button class="b1" id="reset">Clear</button>
        </div>

    </form>
    </div>
    </div>
       
    </div>
    <script src="../js/Events.js"></script>
</body>

</html>