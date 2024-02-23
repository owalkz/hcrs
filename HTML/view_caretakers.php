<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);
    $caretaker_records = get_caretaker_records($con);

?>

<!DOCTYPE html>
<html>
    <header>
        <title>View Caretakers</title>
        <link rel="favicon" type="image/x-icon" href="/ASSETS/favicon.png">
        <link rel="stylesheet" href="../CSS/view_and_edit.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
            <button class=homebutton onclick="window.location.href='mainpageho.php';">Home Page</button>
            <table>
                    <th>Caretaker Name</th>

                    <?php 
                        while($rows = $caretaker_records->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td><?php echo $rows['caretaker_name']?></td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
        </div>
    </body>

</html>