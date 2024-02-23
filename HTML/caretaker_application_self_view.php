<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);
    $application_records = get_my_applications($con);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //something was posted
        $property_id = $_POST['property_id'];
        $caretaker_id = $_SESSION['caretaker_id'];
    
        if(!empty($property_id) && !empty($caretaker_id)){
            //add record to tbl_properties
            $query = "DELETE FROM tbl_applications WHERE caretaker_id = '$caretaker_id' AND property_id ='$property_id'";
            $result = mysqli_query($con, $query);
            if($result){
                echo "record deleted successfully";
                header("Location: caretaker_application_self_view.php");
            }
        }
           
    }

?>

<!DOCTYPE html>
<html>
    <header>
        <title>Properties Applied For</title>
        <link rel="favicon" type="image/x-icon" href="/ASSETS/favicon.png">
        <link rel="stylesheet" href="../CSS/view_and_edit.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
            <button class=homebutton onclick="window.location.href='mainpagect.php';">Home Page</button>
            <table>
                    <th>Property ID</th>
                    <th>Property Name</th>
                    <th>Property Location</th>
                    <th>Application Status (1-approved 0-not approved)</th>

                    <?php 
                        while($rows = $application_records->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td><?php echo $rows['property_id']?></td>
                        <td><?php echo $rows['property_name']?></td>
                        <td><?php echo $rows['property_location']?></td>
                        <td><?php echo $rows['application_status']?></td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
            <div class="editbar">
                <form method="post">
                    <label for="property_id">Property ID</label>
                    <input type="number" name="property_id" placeholder="Property ID" required>
                    <input type="submit" name="submit" value="Withdraw Application" class="button">
                </form>
            </div>
        </div>
    </body>

</html>