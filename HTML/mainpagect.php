<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <header>
        <title>HCRS</title>
        <link rel="favicon" type="image/x-icon" href="/ASSETS/favicon.png">
        <link rel="stylesheet" href="../CSS/mainstylect.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
                <div class="topdisplaybar"> 
                    <div>Welcome, <?php echo $user_data['caretaker_name'] ?></div>
                    <div><a href="logout.php">Logout</a></div>
                </div>
                <div class="navigationdisplay">
                    <div><a href="dashboard.php">Dashboard</a></div>
                    <div><a href="view_properties.php">View Properties and Make Applications</a></div>
                    <div><a href="caretaker_application_self_view.php">My Applications</div>
                    <div><a href="caretaker_profile.php">My Profile</div>
                </div>
            </div>
    </body>
</html>