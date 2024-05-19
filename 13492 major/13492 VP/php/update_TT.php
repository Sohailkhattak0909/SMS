<?php
include 'connection.php';

// Sanitize input
$tableName = mysqli_real_escape_string($con, $_GET['table']);
$id = mysqli_real_escape_string($con, $_GET['id']);

// Retrieve data for the specified ID from the table
$showquery = "SELECT * FROM `$tableName` WHERE Course_ID = '$id'";
$showdata = mysqli_query($con, $showquery);

if($showdata) {
    $access_data = mysqli_fetch_array($showdata);
    // Assigning values to variables
    $C_id = $access_data['Course_ID'];
    $C_name = $access_data['Course_name'];
    $time = $access_data['Time'];
    $location = $access_data['Location'];
} else {
    echo "Error retrieving data: " . mysqli_error($con);
    exit;
}

// Handle form submission for updating data
if(isset($_POST['submit'])) {
    // Sanitize input
    $C_id = mysqli_real_escape_string($con, $_POST['Course_ID']);
    $C_name = mysqli_real_escape_string($con, $_POST['Course_name']);
    $time = mysqli_real_escape_string($con, $_POST['Time']);
    $location = mysqli_real_escape_string($con, $_POST['Location']);

    $update_query = "UPDATE `$tableName` SET `Course_ID`='$C_id', `Course_name`='$C_name', `Time`='$time', `Location`='$location' WHERE Course_ID='$id'";
    $update_data = mysqli_query($con, $update_query);

    if ($update_data) {
        // If update is successful, redirect to main page
        header("Location: time_table.php");
        exit(); 
    } else {
        echo "Error updating record: " . mysqli_error($con);
        exit;
    }
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
    <div class="head"><h2>Edit Time Table</h2></div>
  <table>
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Time</th>
        <th>Location</th>
        <th>Update Course</th>
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
        <option value="--" ' . ($C_id ==  '--'? 'selected' : '') . '>--</option>
        <option value="Urdu 6" ' . ($C_id == 'Urdu 6' ? 'selected' : '') . '>Urdu 6</option>
        <option value="Eng 6" ' . ($C_id == 'Eng 6' ? 'selected' : '') . '>Eng 6</option>
        <option value="Math 6" ' . ($C_id == 'Math 6' ? 'selected' : '') . '>Math 6</option>
        <option value="Isla 6" ' . ($C_id == 'Isla 6' ? 'selected' : '') . '>Isla 6</option>
        <option value="Sci 6" ' . ($C_id == 'Sci 6' ? 'selected' : '') . '>Sci 6</option>
        <option value="Geo 6" ' . ($C_id == 'Geo 6' ? 'selected' : '') . '>Geo 6</option>
        <option value="Hist 6" ' . ($C_id == 'Hist 6' ? 'selected' : '') . '>Hist 6</option>';
} elseif ($tableName === 'vii') {
    $options = '
        <option value="--" ' . ($C_id == '--' ? 'selected' : '') . '>--</option>
        <option value="Urdu 7" ' . ($C_id == 'Urdu 7' ? 'selected' : '') . '>Urdu 7</option>
        <option value="Eng 7" ' . ($C_id == 'Eng 7' ? 'selected' : '') . '>Eng 7</option>
        <option value="Math 7" ' . ($C_id == 'Math 7' ? 'selected' : '') . '>Math 7</option>
        <option value="Isla 7" ' . ($C_id == 'Isla 7' ? 'selected' : '') . '>Isla 7</option>
        <option value="Sci 7" ' . ($C_id == 'Sci 7' ? 'selected' : '') . '>Sci 7</option>
        <option value="Geo 7" ' . ($C_id == 'Geo 7' ? 'selected' : '') . '>Geo 7</option>
        <option value="Hist 7" ' . ($C_id == 'Hist 7' ? 'selected' : '') . '>Hist 7</option>';
} elseif ($tableName === 'viii') {
  $options = '
      <option value="--" ' . ($C_id == '--' ? 'selected' : '') . '>--</option>
      <option value="Urdu 7" ' . ($C_id == 'Urdu 8' ? 'selected' : '') . '>Urdu 8</option>
      <option value="Eng 7" ' . ($C_id == 'Eng 8' ? 'selected' : '') . '>Eng 8</option>
      <option value="Math 7" ' . ($C_id == 'Math 8' ? 'selected' : '') . '>Math 8</option>
      <option value="Isla 7" ' . ($C_id == 'Isla 8' ? 'selected' : '') . '>Isla 8</option>
      <option value="Sci 7" ' . ($C_id == 'Sci 8' ? 'selected' : '') . '>Sci 8</option>
      <option value="Geo 7" ' . ($C_id == 'Geo 8' ? 'selected' : '') . '>Geo 8</option>
      <option value="Hist 7" ' . ($C_id == 'Hist 8' ? 'selected' : '') . '>Hist 8</option>';
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
                <option value="--"         <?php if ($C_name == '--') {echo 'selected';    } ?>    >--</option>
                <option value="Urdu"       <?php if ($C_name == 'Urdu') {echo 'selected';    } ?>   >Urdu</option>
                <option value="EngLish"    <?php if ($C_name == 'English') {echo 'selected';    } ?>   >English</option>
                <option value="Mathematics"<?php if ($C_name == 'Mathematics') {echo 'selected';    } ?>   >Mathematics</option>
                <option value="Islamiat"   <?php if ($C_name == 'Islamiat') {echo 'selected';    } ?>   >Islamiat</option>
                <option value="Science"    <?php if ($C_name == 'Science') {echo 'selected';    } ?>   >Science</option>
                <option value="Geography"  <?php if ($C_name == 'Geography') {echo 'selected';    } ?>   >Geography</option>
                <option value="History"    <?php if ($C_name == 'History') {echo 'selected';    } ?>   >History</option>
                </select> </td>

                <td >  <select name="Time"
                style="width: auto ;height:auto;position:relative;left: 10%;  background-color: transparent; border: none; outline: none; ">
                <option value="--"                  <?php if ($time == '--') {echo 'selected';    } ?>    >--</option>
                <option value="8:00 AM To 8:40 AM"  <?php if ($time == '8:00 AM To 8:40 AM') {echo 'selected';    } ?>   >8:00 AM To 8:40 AM</option>
                <option value="8:40 AM To 9:20 AM"  <?php if ($time == '8:40 AM To 9:20 AM') {echo 'selected';    } ?>   >8:40 AM To 9:20 AM</option>
                <option value="9:20 AM To 10:00 AM" <?php if ($time == '9:20 AM To 10:00 AM') {echo 'selected';    } ?>   >9:20 AM To 10:00 AM</option>
                <option value="10:30 AM To 11:10 AM"<?php if ($time == '10:30 AM To 11:10 AM') {echo 'selected';    } ?>   >10:30 AM To 11:10 AM</option>
                <option value="11:10 AM To 11:50 AM"<?php if ($time == '11:10 AM To 11:50 AM') {echo 'selected';    } ?>    >11:10 AM To 11:50 AM</option>
                <option value="12:00 PM To 12:40 PM"<?php if ($time == '12:00 PM To 12:40 PM') {echo 'selected';    } ?>    >12:00 PM To 12:40 PM</option>
                <option value="12:40 PM To 1:10 PM" <?php if ($time == '12:40 PM To 1:10 PM') {echo 'selected';    } ?>   >12:40 PM To 1:10 PM</option>
                </select> </td>

                <td >  <select name="Location"
                style="width: auto ;height:auto;position:relative;left: 10%;  background-color: transparent; border: none; outline: none; ">
                <option value="--" <?php if ($location == '--') {echo 'selected';    } ?>    >--</option>
                <option value="A 1"<?php if ($location == 'A 1') {echo 'selected';    } ?>   >A 1</option>
                <option value="A 2"<?php if ($location == 'A 2') {echo 'selected';    } ?>   >A 2</option>
                <option value="A 3"<?php if ($location == 'A 3') {echo 'selected';    } ?>   >A 3</option>
                <option value="A 4"<?php if ($location == 'A 4') {echo 'selected';    } ?>   >A 4</option>
                <option value="A 5"<?php if ($location == 'A 5') {echo 'selected';    } ?>   >A 5</option>
                <option value="A 6"<?php if ($location == 'A 6') {echo 'selected';    } ?>   >A 6</option>
                <option value="A 7"<?php if ($location == 'A 7') {echo 'selected';    } ?>   >A 7</option>
                <option value="A 8"<?php if ($location == 'A 8') {echo 'selected';    } ?>   >A 8</option>
                <option value="A 9"<?php if ($location == 'A 9') {echo 'selected';    } ?>   >A 9</option>
                <option value="A 10"<?php if ($location =='A 10') {echo 'selected';    } ?>  >A 10</option>
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