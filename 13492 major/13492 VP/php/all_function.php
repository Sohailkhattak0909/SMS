<?php
include 'connection.php';


// Check if function exists before declaring it
if (!function_exists('Total_Strength')) {
    function Total_Strength($tablename)
    {  
        global $con;

        $sql = "SELECT COUNT(*) AS total_rows FROM $tablename";
        $result = $con->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo  $row["total_rows"];
            }
        } else {
            echo "00";
        }
        // connection close
        $con->close();
    }
}


if (!function_exists('countMale')) {
    function countMale($tablename) {
        global $con;
        // Prepare and bind SQL query
        $sql = "SELECT COUNT(*) AS total_males FROM $tablename WHERE gender = 'Male'";
        $result = $con->query($sql);
    
        // Check if query executed successfully
        if ($result) {
            // Fetch result
            $row = $result->fetch_assoc();
            
            // Close result set
            $result->close();
            
            // Return total males
            echo $row['total_males'];
        } 
         // connection close
         $con->close();
    }
}

if (!function_exists('countFemale')) {
    function countFemale($tablename) {
        global $con;
        // Prepare and bind SQL query
        $sql = "SELECT COUNT(*) AS total_females FROM $tablename WHERE gender = 'Female'";
        $result = $con->query($sql);
    
        // Check if query executed successfully
        if ($result) {
            // Fetch result
            $row = $result->fetch_assoc();
            
            // Close result set
            $result->close();
            
            // Return total females
            echo $row['total_females'];
        } 
         // connection close
         $con->close();
    }
}
if (!function_exists('count_VI')) {
    function count_VI($tablename) {
        global $con;
        // Prepare and bind SQL query
        $sql = "SELECT COUNT(*) AS total_VI FROM $tablename WHERE class = 'VI'";
        $result = $con->query($sql);
    
        // Check if query executed successfully
        if ($result) {
            // Fetch class VI
            $row = $result->fetch_assoc();
            
            $result->close();
            
            // Return total females
            echo $row['total_VI'];
        } 
         // connection close
         $con->close();
    }
}

if (!function_exists('count_VII')) {
    function count_VII($tablename) {
        global $con;
        // Prepare and bind SQL query
        $sql = "SELECT COUNT(*) AS total_VII FROM $tablename WHERE class = 'VII'";
        $result = $con->query($sql);
    
        // Check if query executed successfully
        if ($result) {
            // Fetch class VII
            $row = $result->fetch_assoc();
            
            $result->close();
            
            // Return total females
            echo $row['total_VII'];
        } 
         // connection close
         $con->close();
    }
}
if (!function_exists('count_VIII')) {
    function count_VIII($tablename) {
        global $con;
        // Prepare and bind SQL query
        $sql = "SELECT COUNT(*) AS total_VIII FROM $tablename WHERE class = 'VIII'";
        $result = $con->query($sql);
    
        // Check if query executed successfully
        if ($result) {
            // Fetch class VII
            $row = $result->fetch_assoc();
            
            $result->close();
            
            // Return total females
            echo $row['total_VIII'];
        } 
         // connection close
         $con->close();
    }
}



if (!function_exists('displayTableData')) {
    function displayTableData($tableName) {
        global $con;
        // Query to retrieve data from the specified table
        $sql = "SELECT * FROM $tableName";
        $result = $con->query($sql);

        // Display data in HTML table format
       if($tableName==="vi"){
        echo "<div class=\"head\"><h2>Class VI Time Table</h2></div>";
       }elseif($tableName==="vii"){
        echo "<div class=\"head\"><h2>Class VII Time Table</h2></div>";
       }elseif($tableName==="viii"){
        echo "<div class=\"head\"><h2>Class VIII Time Table</h2></div>";
       }
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Course ID</th>";
        echo "<th>Course Name</th>";
        echo "<th>Time</th>";
        echo "<th>Location</th>";
        echo "<th>Edit & Delete</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Course_ID"] . "</td>";  
                echo "<td>" . $row["Course_name"] . "</td>";
                echo "<td>" . $row["Time"] . "</td>";       
                echo "<td>" . $row["Location"] . "</td>"; 
                // Add button to add a course based on the table name
                echo "<td><a href='delele_TT.php?table=$tableName&id=" . $row['Course_ID'] . "'><img src='../icon/delete.png' style='width:1.5rem;height:1.5rem;position:relative;left: 60%;'></a>
                    <a href='update_TT.php?table=$tableName&id=" . $row['Course_ID'] . "'><img src='../icon/edit_course.png' style='width:1.5rem;height:1.5rem;position:relative;left: 20%;'></a></td>";
            }
        } else {
            echo "<tr><td colspan='4'>Not Found any Course Time Table</td></tr>";
        }
       
        echo "<tr><td colspan='5' style='text-align: right;'><a href='Add_TT.php?table=$tableName' style='text-decoration: none;background-color:#4CAF50 ; color: white; padding: 5px;display: inline-block; font-size: 16px;margin: 4px 2px;
         cursor: pointer;border: 2px solid #4CAF50;border-radius: 5px;'>Add</a>
         <button class='printButton' style='background-color:black ; color: white; padding: 5px;'>Print</button>
         </td></tr>";
        echo "</tbody>";
        echo "</table>";
    }
}
?>












