<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);
    $property_records = get_property_records($con);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //something was posted
        $property_name = $_POST['property_name'];
        $property_size = $_POST['property_size'];
        $property_location = $_POST['property_location'];
        $old_name = $_POST['old_property_name'];
    
        if(!empty($property_name) && !empty($property_size) && !empty($old_name)){
            //add record to tbl_properties
            $query = "UPDATE tbl_properties SET property_name = '$property_name', property_size ='$property_size', property_location = '$property_location' WHERE property_name = '$old_name'";
            $result = mysqli_query($con, $query);
            if($result){
                echo "record changed successfully";
                header("Location: properties_view_and_edit.php");
            }
        }
           
    }

?>

<!DOCTYPE html>
<html>
    <header>
        <title>View and Edit Properties</title>
        <link rel="favicon" type="image/x-icon" href="/ASSETS/favicon.png">
        <link rel="stylesheet" href="../CSS/view_and_edit.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
            <button class=homebutton onclick="window.location.href='mainpageho.php';">Home Page</button>
            <table>
                    <th>Property Name</th>
                    <th>Property Size</th>
                    <th>Propery Location</th>

                    <?php 
                        while($rows = $property_records->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td><?php echo $rows['property_name']?></td>
                        <td><?php echo $rows['property_size']?></td>
                        <td><?php echo $rows['property_location']?></td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
            <div class="editbar">
                <form method="post">
                    <label for="old_property_name">Old Name</label>
                    <input type="text" name="old_property_name" placeholder="Old Name">
                    <label for="property_name">New Property Name</label>
                    <input type="text" name="property_name" placeholder="New Property Name">
                    <label for="property_size">New Size</label>
                    <input type="number" name="property_size" placeholder="New Property Size">
                    <label for="property_location">New Location</label>
                    <input type="text" name="property_location" placeholder="New Location">
                    <input type="submit" name="Make Changes" value="Make Changes" class="button">
                </form>
            </div>
        </div>
    </body>

</html>