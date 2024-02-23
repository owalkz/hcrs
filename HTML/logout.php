<?php
session_start();

if(isset($_SESSION['caretaker_id'])){

    unset($_SESSION['caretaker_id']);
}elseif(isset($_SESSION['owner_id'])){
    unset($_SESSION['owner_id']);
}
header("Location: login.php");
die;
?>