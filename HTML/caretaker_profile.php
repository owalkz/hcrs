<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);
    $caretaker_record = get_caretaker_record($con);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //something was posted
        $caretaker_name = $_POST['caretaker_name'];
        $email_address = $_POST['email_address'];
        $location = $_POST['location'];
        $caretaker_id = $_SESSION['caretaker_id'];
    
        if(!empty($caretaker_name) && !empty($email_address)){
            //add record to tbl_properties
            $query = "UPDATE tbl_caretakers SET caretaker_name = '$caretaker_name', email_address ='$email_address', location = '$location' WHERE caretaker_id = '$caretaker_id'";
            $result = mysqli_query($con, $query);
            if($result){
                echo "profile updated successfully";
                header("Location: caretaker_profile.php");
            }
        }
           
    }

?>

<!DOCTYPE html>
<html>
    <header>
        <title>Caretaker Profile</title>
        <link rel="favicon" type="image/x-icon" href="/ASSETS/favicon.png">
        <link rel="stylesheet" href="../CSS/view_and_edit.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
            <button class=homebutton onclick="window.location.href='mainpagect.php';">Home Page</button>
            <table>
                    <th>Caretaker Name</th>
                    <th>Email Address</th>
                    <th>Location</th>

                    <?php 
                        while($rows = $caretaker_record->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td><?php echo $rows['caretaker_name']?></td>
                        <td><?php echo $rows['email_address']?></td>
                        <td><?php echo $rows['location']?></td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
            <div class="editbar">
                <form method="post">
                    <label for="caretaker_name">Name</label>
                    <input type="text" name="caretaker_name" placeholder="Name">
                    <label for="email_address">Email Address</label>
                    <input type="text" name="email_address" placeholder="Email Address">
                    <label for="location">Location</label>
                    <input type="text" name="location" placeholder="Location">
                    <input type="submit" name="Make Changes" value="Make Changes" class="button">
                </form>
            </div>
        </div>
    </body>

</html>