<?php
include'../includes/connection.php';
?>
            <?php
           $fname = $_POST['firstname'];
           $lname = $_POST['lastname'];
           $gen = $_POST['gender'];
           $email = $_POST['email'];
           $phone = $_POST['phonenumber'];
           $jobb = $_POST['jobs'];
           $hdate = $_POST['hireddate'];
         
             $sql_2 = "SELECT * FROM employee where `FIRST_NAME` = '{$fname}' and `LAST_NAME` = '{$lname}' and  `EMAIL`= '{$email}' and `JOB_ID` = '{$jobb}'   ";
             $query_2 = mysqli_query($db,$sql_2);
             if(mysqli_num_rows($query_2)){
?>
            	<script type="text/javascript">
			alert("Error !!  Employee Exist.");
			window.location = "employee.php";
		</script>
   <?php //echo $sql_2;?>
<?php
             }else{
          
           $sql = "INSERT INTO `employee`(`EMPLOYEE_ID`,`FIRST_NAME`,`LAST_NAME`,`GENDER`,`EMAIL`,`PHONE_NUMBER`,`JOB_ID`,`HIRED_DATE`)
                               VALUES (Null,'{$fname}','{$lname}','{$gen}','{$email}','{$phone}','{$jobb}','{$hdate}')";
                $query = mysqli_query($db,$sql);
                if($query){
                  ?>
            	<script type="text/javascript">
			alert("You've Added Employee Successfully.");
			window.location = "employee.php";
		</script>
<?php
                }else{
?>

            	<script type="text/javascript">
			alert("Error !!  Employee Not Added.");
			window.location = "employee.php";
		</script>


<?php


                }
             }
            ?>
