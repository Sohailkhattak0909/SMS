<?php
if(isset($_POST['submit'])) {
    include 'connection.php';

    $C_id = $_POST['Course_ID'];
    $C_name = $_POST['Course_name'];
    $time = $_POST['Time'];
    $location = $_POST['Location'];
    
    // Retrieve the table name from the URL parameter
    $tableName = $_GET['table'];

    $sql = "INSERT INTO `$tableName` (`Course_ID`, `Course_name`, `Time`, `Location`) VALUES ('$C_id', '$C_name', '$time', '$location')";

    if($con->query($sql) === TRUE){
        header('location:time_table.php');
        exit;
    } else {
        echo "Failed to insert data: " . $con->error;
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Time Table</title>
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
</div>
<div class="Add_tt_container">
    <div class="head"><h2>Add Time Table For Course</h2></div>
  <table>
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Time</th>
        <th>Location</th>
        <th>Add Course</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    <form action="" method ="POST">
<?php
// Get the tablename from the URL parameter
$tableName = $_GET['table'];

// Define the options based on the tablename
if ($tableName === 'vi') {
    $options = '
        <option value="--" selected>--</option>
        <option value="Urdu 6">Urdu 6</option>
        <option value="Eng 6">Eng 6</option>
        <option value="Math 6">Math 6</option>
        <option value="Isla 6">Isla 6</option>
        <option value="Sci 6">Sci 6</option>
        <option value="Geo 6">Geo 6</option>
        <option value="Hist 6">Hist 6</option>';
} elseif ($tableName === 'vii') {
    $options = '
        <option value="--" selected>--</option>
        <option value="Urdu 7">Urdu 7</option>
        <option value="Eng 7">Eng 7</option>
        <option value="Math 7">Math 7</option>
        <option value="Isla 7">Isla 7</option>
        <option value="Sci 7">Sci 7</option>
        <option value="Geo 7">Geo 7</option>
        <option value="Hist 7">Hist 7</option>';
} elseif ($tableName === 'viii') {
  $options = '
      <option value="--" selected>--</option>
      <option value="Urdu 8">Urdu 8</option>
      <option value="Eng 8">Eng 8</option>
      <option value="Math 8">Math 8</option>
      <option value="Isla 8">Isla 8</option>
      <option value="Sci 8">Sci 8</option>
      <option value="Geo 8">Geo 8</option>
      <option value="Hist 8">Hist 8</option>';
} 

// Generate the HTML with the dynamic options
echo '
    <td>
        <select name="Course_ID" style="width: auto; height: auto; position: relative; left: 10%; background-color: transparent; border: none; outline: none;">
            ' . $options . '
        </select>
    </td>';
?>


                <td >  <select name="Course_name"
                style="width: auto ;height:auto;position:relative;left: 10%;  background-color: transparent; border: none; outline: none; ">
                <option value="--"   selected  >--</option>
                <option value="Urdu"  >Urdu</option>
                <option value="English" >English</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Islamiat">Islamiat</option>
                <option value="Science" >Science</option>
                <option value="Geography" >Geography</option>
                <option value="History">History</option>
                </select> </td>

                <td >  <select name="Time"
                style="width: auto ;height:auto;position:relative;left: 10%;  background-color: transparent; border: none; outline: none; ">
                <option value="--"   selected  >--</option>
                <option value="8:00 AM To 8:40 AM">8:00 AM To 8:40 AM</option>
                <option value="8:40 AM To 9:20 AM" >8:40 AM To 9:20 AM</option>
                <option value="9:20 AM To 10:00 AM">9:20 AM To 10:00 AM</option>
                <option value="10:30 AM To 11:10 AM">10:30 AM To 11:10 AM</option>
                <option value="11:10 AM To 11:50 AM" >11:10 AM To 11:50 AM</option>
                <option value="12:00 PM To 12:40 PM" >12:00 PM To 12:40 PM</option>
                <option value="12:40 PM To 1:10 PM">12:40 PM To 1:10 PM</option>
                </select> </td>

                <td >  <select name="Location"
                style="width: auto ;height:auto;position:relative;left: 10%;  background-color: transparent; border: none; outline: none; ">
                <option value="--"   selected  >--</option>
                <option value="A 1">A 1</option>
                <option value="A 2">A 2</option>
                <option value="A 3">A 3</option>
                <option value="A 4">A 4</option>
                <option value="A 5">A 5</option>
                <option value="A 6">A 6</option>
                <option value="A 7">A 7</option>
                <option value="A 8">A 8</option>
                <option value="A 9">A 9</option>
                <option value="A 10">A 10</option>
                </select> </td>

                <td > 
                   <button name="submit" style=" position:relative;left: 40%;  background-color: transparent; border: none;cursor: pointer; " >
                   
                   <img src="../icon/update.png" style="width:1.5rem;height:1.5rem;background-size: cover;position:relative;left: 10%;">
                </button>
                  
                  </td>  
                </form>
             </tr>

    </tbody>
</table>
<script src="../js/Events.js"></script>
</body>
</html>