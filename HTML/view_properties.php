<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);
    $property_records = get_propertiesct($con);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //something was posted
        $property_id = $_POST['property_id'];
        $caretaker_id = $_SESSION['caretaker_id'];
        $property_owner = $_POST['owner_id'];
        $application_status = 0;
    
        if(!empty($property_id) && !empty($property_owner) && !empty($caretaker_id)){
            //add record to tbl_properties
            $query = "INSERT INTO tbl_applications (property_id, owner_id, caretaker_id, application_status) VALUES ('$property_id', '$property_owner', '$caretaker_id', '$application_status')";
            $result = mysqli_query($con, $query);
            if($result){
                echo "Application Made Successfully";
                //header("Location: properties_view_and_edit.php");
            }else echo "Duplicate Exists!";
        }
           
    }

?>

<!DOCTYPE html>
<html>
    <header>
        <title>View and Apply for Properties</title>
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
                    <th>Property Size</th>
                    <th>Property Location</th>
                    <th>Property Owner ID</th>

                    <?php 
                        while($rows = $property_records->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td><?php echo $rows['property_id']?></td>
                        <td><?php echo $rows['property_name']?></td>
                        <td><?php echo $rows['property_size']?></td>
                        <td><?php echo $rows['property_location']?></td>
                        <td><?php echo $rows['property_owner']?></td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
            <div class="editbar">
                <form method="post">
                    <label for="property_id">Property ID</label>
                    <input type="number" name="property_id" placeholder="Property ID" required>
                    <label for="owner_id">Owner ID</label>
                    <input type="number" name="owner_id" placeholder="Owner ID" required>
                    <input type="submit" name="submit" value="Make Application" class="button">
                </form>
            </div>
        </div>
    </body>

</html>