<?php

function check_login($con){

    if(isset($_SESSION['caretaker_id'])){

        $id = $_SESSION['caretaker_id'];
        $queryct = "SELECT * FROM tbl_caretakers WHERE caretaker_id = '$id' limit 1";
        $result = mysqli_query($con, $queryct);
        if ($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }elseif(isset($_SESSION['owner_id'])){
        $id = $_SESSION['owner_id'];
        $queryho = "SELECT * FROM tbl_home_owners WHERE owner_id = '$id' limit 1";
        $result = mysqli_query($con, $queryho);
        if ($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to Login Page
    header("Location: login.php");
    die;
    
}
function get_caretakers($con){
    $query = "SELECT * FROM tbl_caretakers";
    $result = mysqli_query($con, $query);
    $number = mysqli_num_rows($result);
    return $number;
}
function get_properties($con){
    $query = "SELECT * FROM tbl_properties";
    $result = mysqli_query($con, $query);
    $number = mysqli_num_rows($result);
    return $number;
}
function get_jobs_provided($con){
    $query = "SELECT * FROM tbl_properties WHERE property_status = 1";
    $result = mysqli_query($con, $query);
    $number = mysqli_num_rows($result);
    return $number;
}
function get_property_records($con){
    $owner_id = $_SESSION['owner_id'];
    $query = "SELECT * FROM tbl_properties WHERE property_owner = '$owner_id'";
    $result = mysqli_query($con, $query);
    return $result;
}
function get_caretaker_records($con){
    $query = "SELECT * FROM tbl_caretakers";
    $result = mysqli_query($con, $query);
    return $result;
}
function get_propertiesct($con){
    $query = "SELECT * FROM tbl_properties WHERE property_status = 0";
    $result = mysqli_query($con, $query);
    return $result;
}
function get_my_applications($con){
    $caretaker_id = $_SESSION['caretaker_id'];
    $query = "SELECT 
        tbl_applications.property_id,
        tbl_properties.property_name,
        tbl_properties.property_location,
        tbl_applications.application_status FROM tbl_applications 
        JOIN tbl_properties ON tbl_applications.property_id = tbl_properties.property_id
        WHERE tbl_applications.caretaker_id = '$caretaker_id'
        ORDER BY tbl_applications.application_status DESC";
    $result = mysqli_query($con, $query);
    return $result;
}
function view_applications_made($con){
    $owner_id = $_SESSION['owner_id'];
    $query = "SELECT 
        tbl_applications.property_id AS property_id,
        tbl_properties.property_name AS property_name,
        tbl_applications.caretaker_id AS caretaker_id,
        tbl_caretakers.caretaker_name AS caretaker_name,
        tbl_caretakers.location AS caretaker_location FROM tbl_applications 
        JOIN tbl_properties ON tbl_applications.property_id = tbl_properties.property_id
        JOIN tbl_caretakers ON tbl_applications.caretaker_id = tbl_caretakers.caretaker_id
        WHERE tbl_applications.owner_id = '$owner_id' AND application_status = 0 AND tbl_caretakers.caretaker_status = 0";
    $result = mysqli_query($con, $query);
    return $result;
}
function get_caretaker_record($con){
    $caretaker_id = $_SESSION['caretaker_id'];
    $query = "SELECT * FROM tbl_caretakers WHERE caretaker_id = '$caretaker_id'";
    $result = mysqli_query($con, $query);
    return $result;
}

?>