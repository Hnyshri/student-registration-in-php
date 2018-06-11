<?php
session_start();
if(!isset($_SESSION['admin_name']))
{
    header("location:login.php");
}
else{
?><html>
     <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit the student Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="student.css">
    </head>
<body>
<?php    
    include("database.php");
    $edit_id = @$_GET['edit'];
    $display = @$_GET['display'];
    $query = "select * from student_data where id= '$edit_id'";
    $run = mysql_query($query);
    while( $row = mysql_fetch_array($run))
	{   
            $edit_id1 = $row['id'];
        	$student_id = $row['student_id'];
            $name = $row['name'];
            $age = $row['age'];
            $dob = $row['date_of_birth'];
            $email = $row['email_id'];
            $mobile = $row['mobile_no'];
            $address = $row['address'];   
?>
    <div class="modal1">
        <center><h1><label><font color="white">Edit the Student Data</font></label></h1></center>
            <form class="modal-content1" action="edit.php?edit_form=<?php echo $edit_id1 ?>" method='post' enctype="multipart/form-data">
	            <div class="container1" >                   
                        <label><b>Student Id</b></label><br>    
                        <input type="text" placeholder="Change Id" name="title" value="<?php echo $student_id ?>">
                        <label><b>Name</b></label>
                        <input type="text" placeholder="Change Your Name" name="student_name" value="<?php echo $name ?>">
                        
                        <label><b>Age</b></label>
                        <input type="text" placeholder="Change Age"name="student_age" value="<?php echo $age ?>">          
                        
                        <label><b>Date of Birth</b></label>
                        <input type="date" name="student_dob" value="<?php echo $dob; ?>">
                        <br>
                        <label><b>Email Id</b></label>
                        <input type="text" placeholder="Change Email Id" name="student_email" value="<?php echo $email ?>">
                        
                        <label><b>Mobile No</b></label>
                        <input type="text" placeholder="Change your number" name="student_no" value="<?php echo $mobile ?>" >
                        
                        <label><b>Address</b></label>
                        <textarea placeholder="Change your current Address" name="student_address"><?php echo $address ?></textarea>                
                        <button type="submit"  name='update'>Update Now</button>
                        <button type="submit"  name='back'>Back</button>                                    
<?php } ?>
                </div>
            </form>
    </div>
</body>
</html> 
    <?php 
        if(isset($_POST['update']))
        {
            $update_id = $_GET['edit_form'];
            $title = $_POST['title'];
            $name = $_POST['student_name'];
            $age = $_POST['student_age'];
            $date = $_POST['student_dob'];
            $email = $_POST['student_email'];
            $mobile = $_POST['student_no'];
            $address = $_POST['student_address'];
            if($age>5)
            {

            }else{
                echo "<script>alert('Required maximum age is 5.')</script>";
                exit();
            }
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == true)
            {
            }
            else{
                echo "<script>alert('This email_id is not valid')</script>";
                exit();
            }
            if(preg_match('/^\d{10}+$/', $mobile)) 
            {
               
            }else{
               echo "<script>alert('Please put 10 digit Number')</script>";
               exit();
           }
            $update_query = " update student_data set student_id='$title',name='$name',age='$age',date_of_birth='$date',email_id='$email',mobile_no='$mobile',address='$address' 
                        where id ='$update_id'";
            if (mysql_query($update_query)) 
            {
                echo "<script>alert('Post has been updated')</script>";
                echo "<script>window.open('index.php?post=Data has been updated...','_self')</script>";
            } 

        }
    ?>
    <?php
        if(isset($_POST['back']))
        {
            echo "<script>window.open('display.php?display=you have display page...','_self')</script>";
        }
    ?>
    <?php } ?>