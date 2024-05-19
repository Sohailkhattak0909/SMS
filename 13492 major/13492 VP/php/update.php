
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Records</title>
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
   <div class="head"><h2>Update Records</h2></div>
   <div class="table">
    
    <table>
        <thead>
            <tr>
                <th>Admission No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Update</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
            include 'connection.php';
            $selectquery = "select *  from data";
            $query = mysqli_query($con,$selectquery);
            $nums = mysqli_num_rows($query);
            while($res = mysqli_fetch_array($query)){
                ?>

                <tr>
                <td > <?php echo $res['S_No']; ?> </td>
                <td > <?php echo $res['first_n']; ?> </td>
                <td > <?php echo $res['last_n']; ?> </td>
                <td > <?php echo $res['age']; ?> </td>
                <td > <?php echo $res['gender']; ?> </td>
                <td > <?php echo $res['class']; ?> </td>
                <td > <?php echo $res['email']; ?> </td>
                <td > <?php echo $res['phone']; ?> </td>
                <td > <?php echo $res['address']; ?> </td>
                <td > <a href="update_record.php?id=<?php echo $res['S_No']; ?> "><img src="../icon/edit.png" 
                style="width:1.5rem;height:1.5rem;position:relative;left: 30%;"></a> </td>  
            </tr>
            <?php
            }
            ?>
           
          
        </tbody>
    </table>
   </div>
   </div>
   <script src="../js/Events.js"></script>
</body>
</html>