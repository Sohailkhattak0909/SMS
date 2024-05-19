<?php
            include 'connection.php';
           $up_id = $_GET['id'];
           $showquery = "SELECT * FROM `data` WHERE S_No = {$up_id}";
           $showdata = mysqli_query($con,$showquery);

           $access_data = mysqli_fetch_array($showdata);

           if(isset($_POST['submit'])) { 
            $sel_id = $_GET['id'];

            $Urdu = $_POST['urdu'];
            $English = $_POST['english'];
            $Maths= $_POST['maths'];
            $Islamiat= $_POST['islamiat'];
            $Science= $_POST['science'];
            $Geography= $_POST['geography'];
            $History= $_POST['history'];
            // obtain marks and percentage
            $total=$_POST['urdu']+$_POST['english']+$_POST['maths']+$_POST['islamiat']+$_POST['science']+$_POST['geography']+$_POST['history'];
            $per=(($_POST['urdu']+$_POST['english']+$_POST['maths']+$_POST['islamiat']+$_POST['science']+$_POST['geography']+$_POST['history'])/700 )*100;
            //update the query
            $update_query = "UPDATE `data` SET `urdu`='$Urdu',`english`='$English',`maths`='$Maths',`islamiat`='$Islamiat',`science`='$Science',`geography`='$Geography',`history`='$History',`total`='$total',`per`='$per' WHERE S_No=$sel_id";
            $update_data = mysqli_query($con,$update_query);

            if ($update_data) {
                // If update is successful, redirect to main page
                header("Location: add_marks.php");
                exit(); 
            }
           }      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add & Update Marks</title>
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
    <div class="container">
        <div class="head"><h2>Add & Update Marks</h2></div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                      <th rowspan="2">Admission No</th>
                      <th rowspan="2">Class</th>
                      <th colspan="7">Subject</th>
                      <th rowspan="2">Add & <br> Update</th>
                    </tr>
                    <tr>
                      <th>Urdu</th>
                      <th>English</th>
                      <th>Maths</th>
                      <th>Islamiat</th>
                      <th>Science</th>
                      <th>Geography</th>
                      <th>History</th>
                    </tr>
                    
                  </thead>
                  <tbody>
                  <tr>
                <form action="" method ="POST">
                <td> <?php echo $access_data['S_No']; ?> </td>
                <td> <?php echo $access_data['class']; ?> </td>
                <td> <input class="up_input" type="int"  name="urdu"      value="<?php echo $access_data['urdu'];      ?>"> </td>
                <td> <input class="up_input" type="int"  name="english"   value="<?php echo $access_data['english'];   ?>"> </td>
                <td> <input class="up_input" type="int"  name="maths"     value="<?php echo $access_data['maths'];     ?>"> </td>
                <td> <input class="up_input" type="int"  name="islamiat"  value="<?php echo $access_data['islamiat'];  ?>"> </td>
                <td> <input class="up_input" type="int"  name="science"   value="<?php echo $access_data['science'];   ?>"> </td>
                <td> <input class="up_input" type="int"  name="geography" value="<?php echo $access_data['geography']; ?>"> </td>
                <td> <input class="up_input" type="int"  name="history"   value="<?php echo $access_data['history'];   ?>"> </td>
                <td > 
                   
                    <button name="submit" style=" position:relative;left: 20%;  background-color: transparent; border: none; " >
                    
                    <img src="../icon/upload.png" style="width:1.5rem;height:1.5rem;background-size: cover;position:relative;left: 10%;">
                </a></button>
                   
                   </td>  
                   </form>
            </tr>
                  </tbody>
            </table>
        </div>
 </div>
 <script src="../js/Events.js"></script>
</body>
</html>