<?php
    error_reporting(E_ALL);
    session_start();    
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="student.css">
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
                    }
        }
    </script>
</head>
<body>
    <div class="modal">
        <form class="modal-content" action='login.php' method='post'>
            <div class="container" >
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="admin_name" required>
                <label><b>Password</b></label>
                <input type="password" id="myInput" placeholder="Enter Password" name="admin_pass" required>
                <input type="checkbox" onclick="myFunction()"><font>Show</font>
                <button type="submit"  name='login'>Login</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    include("database.php");
    if(isset($_POST['login']))
    {
        $admin_name=mysql_real_escape_string($_POST['admin_name']);
        $admin_pass=mysql_real_escape_string($_POST['admin_pass']);
        $encrpt = md5($admin_pass);
        $query = "select * from admin_panel where admin_name='$admin_name' AND password='$admin_pass'";
        $run=mysql_query($query);
        if(mysql_num_rows($run)>0)
        {   
            $_SESSION['admin_name']=$admin_name; 
            echo "<script>window.open('index.php?logged=you are logged sucessfully','_self')</script>";
        }
        else
        {
            echo "<script>alert('user name and password is wrong')</script>";
        }
    }
?>