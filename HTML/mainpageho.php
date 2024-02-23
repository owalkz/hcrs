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
        <link rel="stylesheet" href="../CSS/mainstyle.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
            <div class="topdisplaybar"> 
                <div>Welcome, <?php echo $user_data['owner_name'] ?></div>
                <div><a href="logout.php">Logout</a></div>
            </div>
            <div class="navigationdisplay">
                <div><a href="dashboard.php">Dashboard</a></div>
                <div><a href="view_caretakers.php">View Caretakers</a></div>
                <div><a href="postproperty.php">Post Property</a></div>
                <div><a href="properties_view_and_edit.php">View & Edit Properties</a></div>
                <div><a href="applications_owner_self_view.php">View Applications</a></div>
            </div>
        </div>
    </body>
</html>