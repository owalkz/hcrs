<?php
session_start();

    include("connect.php");
    include("functions.php");

    $user_data = check_login($con);
    $number = get_caretakers($con);
    $number_of_properties = get_properties($con);
    $number_of_jobs_provided = get_jobs_provided($con);

?>

<DOCTYPE html>
<html>
    <header>
        <title>HCRS Dashboard</title>
        <link rel="favicon" type="image/x-icon" href="/ASSETS/favicon.png">
        <link rel="stylesheet" href="../CSS/dashboard.css?v=<?php echo time(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </header>
    <body>
        <div class="maindiv">
            <button class=homebutton onclick="window.location.href='javascript:window.history.back()';">Home Page</button>
            <div class="topmost">Number of Caretakers</div>
            <div><?php echo $number?></div>
            <div>Number of Posted Properties</div>
            <div><?php echo $number_of_properties?></div>
            <div>Number of Jobs Provided</div>
            <div><?php echo $number_of_jobs_provided?></div>
        </div>
    </body>
</html>