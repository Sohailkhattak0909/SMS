<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batch Topers</title>
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
<div class="topper_container">
    <div class="header">
      <h1 style="font-size: 32px; color: #333;">Batch Toppers</h1>
    </div>
    <?php
    // Establish database connection 
    include 'connection.php';
    
    
    // Fetch data from the database
    $sql = "SELECT first_n,last_n , S_No, class, per FROM data ORDER BY per DESC LIMIT 3";
    $result = $con->query($sql);
    
    // Display the top 3 toppers
    if ($result->num_rows > 0) {
        $rank = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<div class='topper'>";
            echo "<div class='rank'>" . $rank . "</div>";
            echo "<div class='name'>";
            echo "<h2>" . $row['first_n'] ." ". $row['last_n'] . "</h2>";
            echo "<p>Admission No: " . $row['S_No'] . "</p>";
            echo "<p>Class: " . $row['class'] . "</p>";
            echo "<p>Percentage: " . $row['per'] . "%</p>";
            echo "</div></div>";
            $rank++;
        }
    } else {
        echo "No toppers found.";
    }
    
    // Close connection
    $con->close();
    ?>
  </div>
  <script src="../js/Events.js"></script>
</body>
</html>