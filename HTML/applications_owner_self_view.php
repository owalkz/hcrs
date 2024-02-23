<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);
    $application_records = view_applications_made($con);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //something was posted
        $property_id = $_POST['property_id'];
        $caretaker_id = $_POST['caretaker_id'];
    
        if(!empty($property_id) && !empty($caretaker_id)){
            //add record to tbl_properties
            $query1 = "UPDATE tbl_applications SET application_status = 1 WHERE caretaker_id = '$caretaker_id' AND property_id = '$property_id'";
            $result1 = mysqli_query($con, $query1);
            $query2 = "UPDATE tbl_caretakers SET caretaker_status = 1 WHERE caretaker_id = '$caretaker_id'";
            $result2 = mysqli_query($con, $query2);
            $query3 = "UPDATE tbl_properties SET property_status = 1 WHERE property_id = '$property_id'";
            $result3 = mysqli_query($con, $query3);
            if($result1 && $result2 && $result3){
                echo "application approved successfully";
                header("Location: applications_owner_self_view.php");
            }
        }
           
    }

?>

<!DOCTYPE html>
<html>
    <header>
        <title>Applications Made</title>
        <link rel="favicon" type="image/x-icon" href="/ASSETS/favicon.png">
        <link rel="stylesheet" href="../CSS/view_and_edit.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
            <button class=homebutton onclick="window.location.href='mainpageho.php';">Home Page</button>
            <table>
                    <th>Property ID</th>
                    <th>Property Name</th>
                    <th>Caretaker ID</th>
                    <th>Caretaker Name</th>
                    <th>Caretaker Location</th>

                    <?php 
                        while($rows = $application_records->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td><?php echo $rows['property_id']?></td>
                        <td><?php echo $rows['property_name']?></td>
                        <td><?php echo $rows['caretaker_id']?></td>
                        <td><?php echo $rows['caretaker_name']?></td>
                        <td><?php echo $rows['caretaker_location']?></td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
            <div class="editbar">
                <form method="post">
                    <label for="property_id">Property ID</label>
                    <input type="number" name="property_id" placeholder="Property ID" required>
                    <label for="caretaker_id">Caretaker ID</label>
                    <input type="number" name="caretaker_id" placeholder="Caretaker ID" required>
                    <input type="submit" name="submit" value="Approve Application" class="button">
                </form>
            </div>
        </div>
    </body>

</html>