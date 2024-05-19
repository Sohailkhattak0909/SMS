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
<div class="tth_container">
<div class="tt_head" onclick="toggleTable('classVI', event)">Class VI</div>
<div class="tt_head" onclick="toggleTable('classVII', event)">Class VII</div>
<div class="tt_head" onclick="toggleTable('classVIII', event)">Class VIII</div>
</div>

<div id="classVI" class="time_table_container">
    <?php
       include 'all_function.php';
       displayTableData('vi');
       ?>
  
</div>

<div id="classVII" class="time_table_container">
    <?php
       include 'all_function.php';
       displayTableData('vii');
       ?>
</div>

<div id="classVIII" class="time_table_container">
 
    <?php
       include 'all_function.php';
       displayTableData('viii');
       ?>
   
</div>

<script src="../js/Events.js"></script>
</body>
</html>
