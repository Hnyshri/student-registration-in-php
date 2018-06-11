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
        <title>Display All Student Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="student.css">
    </head>
    <body>
        <div class="back-page"><h2><a href="index.php"><font color="white">Back</font></a></h2></div>
        <div class="log"><h2><a href="logout.php"><font color="white">Logout</font></a></h2></div>
        
        <?php 
            if(isset($_GET['display'])) 
            { ?> 
                <table width="1100" border="3" align="center">
			    <tr><td  colspan="10" align="center"><h1><font color="white">View Student Data</font></h1></td></tr>
			    <tr align="center">
                    <th><font color="rgb(180,37,0)">S.No</font></th>
                    <th><font color="rgb(180,37,0)">Student Id</font></th>
                    <th><font color="rgb(180,37,0)">Name</font></th>	
                    <th><font color="rgb(180,37,0)">Age</font></th>	
                    <th><font color="rgb(180,37,0)">Date of Birth</font></th>
                    <th><font color="rgb(180,37,0)">Email Id</font></th>	
                    <th><font color="rgb(180,37,0)">Mobile No</font></th>	
                    <th><font color="rgb(180,37,0)">Address</font></th>	
                    <th><font color="rgb(180,37,0)">Edit</font></th>	
                    <th><font color="rgb(180,37,0)">Delete</font></th>	
                </tr>
            <?php
            include("database.php");
            $i=1;
            if(isset($_GET['display']))
            {
                $query = "Select * from student_data order by 1 DESC"; 
				$run = mysql_query($query);
				while( $row = mysql_fetch_array($run))
				{
					$id = $row['id'];
					$student_id = $row['student_id'];
                    $name = $row['name'];
                    $age = $row['age'];
                    $dob = $row['date_of_birth'];
                    $email = $row['email_id'];
                    $mobile = $row['mobile_no'];
                    $address = substr($row['address'],0,30);
            
        ?>
            <tr align="center">
                <td><font color="white"><?php echo $i++;?></font></td>
                <td><font color="white"><?php echo $student_id;?></font></td>
                <td><font color="white"><?php echo $name;?></font></td>                
                <td><font color="white"><?php echo $age;?></font></td>
                <td><font color="white"><?php echo $dob;?></font></td>
                <td><font color="white"><?php echo $email; ?></font></td>
                <td><font color="white"><?php echo $mobile;?></font></td>
                <td><font color="white"><?php echo $address;?></font></td>
                <td><a href="edit.php?edit=<?php echo $id; ?>"><font color="rgb(209,209,209)">Edit</font></a></td>
                <td><a href="delete.php?del=<?php echo $id; ?>"><font color="rgb(209,209,209)">Delete</font></a></td>
            </tr>
        <?php } } } ?>
        </table>
    </body>
</html>
<?php }?>