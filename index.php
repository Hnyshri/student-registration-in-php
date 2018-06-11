<?php
session_start();
if(!isset($_SESSION['admin_name']))
{
    header("location:login.php");
}
else{
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Insert the student Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="student.css">
    </head>
    <body>
        <div class="log"><h2><a href="logout.php"><font color="white">Logout</font></a></h2></div>
        <div class="modal1">
        <center><h1><label><font color="white">Insert Student Data</font></label></h1></center>
            <form class="modal-content1" action='' method='post' enctype="multipart/form-data">
                <div class="container1" >
                            
                <label><b>Student Id</b></label><br>    
                <input type="text" placeholder="Enter Id"name="title">
                <label><b>Name</b></label>
                <input type="text" placeholder="Enter Your Name"name="name">
                
                <label><b>Age</b></label>
                <input type="text" placeholder="Enter Age"name="age">          
                
                <label><b>Date of Birth</b></label>
                <input type="date" name="dob">
                <br>
                <label><b>Email Id</b></label>
                <input type="text" placeholder="Enter Email Id"name="email">
                
                <label><b>Mobile No</b></label>
                <input type="text" placeholder="Enter your number" name="no">
                
                <label><b>Address</b></label>
                <textarea placeholder="Enter your current Address" name="address"></textarea>                
                <button type="submit"  name='submit'>Add</button>
                <button type="submit"  name='display'>Display</button>                
            </div>
            </form>
        </div>
</body> 
</html>
<?php
     include("database.php");
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $date = $_POST['dob'];
        $email = $_POST['email'];    
        $mobile = $_POST['no'];
        $address = $_POST['address'];

            if($title=='' or $name=='' or $age=='' or $date=='' or $email=='' or $mobile=='' or $address=='')
            {
                echo "<script>alert('Any field is empty')</script>";
                exit();
            }
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
        $query = " insert into student_data(student_id,name,age,date_of_birth,email_id,mobile_no,address) values('$title','$name','$age','$date','$email','$mobile','$address')";
        if (mysql_query($query)) 
        {
            echo "<script>alert('your Data is inserted')</script>";
            echo "<script>window.open('index.php?published=Data has been Inserted..','_self')</script>";
            
        } 
    }
?>
<?php 
     include("database.php");
     if(isset($_POST['logout']))
     {
        echo "<script>window.open('logout.php','_self')</script>";
        
     }
?>
<?php 
     include("database.php");
     if(isset($_POST['display']))
     {
        echo "<script>window.open('display.php?display=your data is display','_self')</script>";
        
     }
?>
<?php } ?>

