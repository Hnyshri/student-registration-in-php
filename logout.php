<?php
session_start();
    header('location:login.php?logout= you are sucessfully logged out..');
session_destroy();
?>