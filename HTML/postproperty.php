<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //something was posted
        $property_name = $_POST['property_name'];
        $property_size = $_POST['property_size'];
        $property_location = $_POST['property_location'];
        $property_owner = $user_data['owner_id'];
        $property_status = 0;
    
        if(!empty($property_name) && !empty($property_size) && !empty($property_owner)){
            //add record to tbl_properties
            $query = "INSERT INTO tbl_properties (property_name, property_size, property_owner, property_location, property_status) VALUES ('$property_name', '$property_size', '$property_owner', '$property_location', '$property_status')";
            $result = mysqli_query($con, $query);
            if($result){
                echo "record added successfully";
                sleep(3);
                header("Location: mainpageho.php");
            }
        }
           
    }
?>

<DOCTYPE html>
<html>
    <header>
        <title>Post Property</title>
        <link rel="favicon" type="image/x-icon" href="/ASSETS/favicon.png">
        <link rel="stylesheet" href="../CSS/loginstyle.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
                <form class="formstyle" method = "POST">
                    <div class="formheader">POST PROPERTY</div>
                    <div><label for="property_name" class="formcontent">Property Name</label></div>
                    <div><input type="text" name="property_name" placeholder="Enter Property Name" required class="forminput"></input></div>
                    <div><label for="property_size">Property Size(ACRES)</label></div>
                    <div><input type="number" name="property_size" placeholder="Enter Property Size" required class="forminput"></input></div>
                    <div><label for="property_location">Property Location(County)</label></div>
                    <div><input type="text" name="property_location" placeholder="Property Location" required class="forminput"></input></div>
                    <div><input type="submit" value="POST PROPERTY" class="button"></div>
                </form>
            </div>
    </body>
</html>