<?php 
    include("database.php");
    $delete_id = $_GET['del'];
    $delete_query = " delete from student_data where id = '$delete_id'";

    if (mysql_query($delete_query)) 
            {
                echo "<script>alert('A Post has been deleted')</script>";
                echo "<script>window.open('display.php?display=A post has been deleted...','_self')</script>";
            } 

?>