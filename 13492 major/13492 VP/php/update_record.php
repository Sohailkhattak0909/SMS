<?php
            include 'connection.php';
           $up_id = $_GET['id'];
           $showquery = "SELECT * FROM `data` WHERE S_No = {$up_id}";
           $showdata = mysqli_query($con,$showquery);

           $access_data = mysqli_fetch_array($showdata);

           $u_gender= $access_data['gender'];
           $u_class= $access_data['class'];

           if(isset($_POST['submit'])) { 
            $sel_id = $_GET['id'];

            $first_n = $_POST['first_n'];
            $last_n = $_POST['last_n'];
            $age= $_POST['age'];
            $gender= $_POST['gender'];
            $class= $_POST['class'];
            $email= $_POST['email'];
            $phone= $_POST['phone'];
            $address= $_POST['address'];
          
            $update_query = "UPDATE `data` SET `S_No`='$sel_id',`first_n`='$first_n',`last_n`='$last_n',`age`='$age',`gender`='$gender',`class`='$class',`email`='$email',`phone`='$phone',`address`='$address',`date`= current_timestamp() WHERE S_No=$sel_id";
            $update_data = mysqli_query($con,$update_query);

            if ($update_data) {
                // If update is successful, redirect to main page
                header("Location: update.php");
                exit(); 
            }
           }      
?>


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
            
                <th >First Name</th>
                <th >Last Name</th>
                <th >Age</th>
                <th >Gender</th>
                <th >Class</th>
                <th >Email</th>
                <th >Contact Number</th>
                <th >Address</th>
                <th >Update</th>
                
            </tr>
        </thead>
        <tbody>
                <tr>
                <form action="" method ="POST">
                <td> <input class="up_input" type="text"  name="first_n"  value="<?php echo $access_data['first_n']; ?> " >  </td>
                <td> <input class="up_input" type="text"  name="last_n"   value="<?php echo $access_data['last_n']; ?>  " >  </td>
                <td> <input class="up_input" type="int"   name="age"      value="<?php echo $access_data['age']; ?>     " >  </td>

                <td >  <select name="gender"
                style="width: auto ;height:auto;position:relative;left: 10%;  background-color: transparent; border: none; outline: none; ">
                <option value="--"     <?php if ($u_gender == '--') {echo 'selected';    } ?>     >--</option>
                <option value="Male"   <?php if ($u_gender == 'Male') {echo 'selected';  } ?>   >Male</option>
                <option value="Female" <?php if ($u_gender == 'Female') {echo 'selected';} ?> >Female</option>
                </select> </td>

                <td >  <select name="class"
                style="width: auto ;height:auto;position:relative;left: 10%;  background-color: transparent; border: none; outline: none; ">
                <option value="--"     <?php if ($u_class == '--') {echo 'selected';    } ?> >--</option>
                <option value="VI"     <?php if ($u_class == 'VI') {echo 'selected';  } ?>   >VI</option>
                <option value="VII"    <?php if ($u_class == 'VII') {echo 'selected';} ?>    >VII</option>
                <option value="VIII"   <?php if ($u_class == 'VIII') {echo 'selected';} ?>   >VIII</option>
                </select> </td>

                <td> <input class="up_input" type="email" name="email"   value="<?php echo $access_data['email']; ?>  "> </td>
                <td> <input class="up_input" type="bigint"name="phone"   value="<?php echo $access_data['phone']; ?>  "> </td>
                <td> <input class="up_input" type="text"  name="address" value="<?php echo $access_data['address']; ?>"> </td>
                <td > 
                   
                    <button name="submit" style=" position:relative;left: 20%;  background-color: transparent; border: none; " >
                    
                    <img src="../icon/update.png" style="width:1.5rem;height:1.5rem;background-size: cover;position:relative;left: 10%;">
                </button>
                   
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