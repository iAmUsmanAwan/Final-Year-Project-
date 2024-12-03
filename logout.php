<?php
session_start();
if(isset($_SESSION['user_id']))
// if(isset($_SESSION['role']))
{
    unset($_SESSION['user_id']);
    unset($_SESSION['role']);
}

header("Location: service.php");
die;


?>