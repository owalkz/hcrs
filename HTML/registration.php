<?php
session_start();

    include("connect.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //something was posted
        $fullname = $_POST['fullname'];
        $email_address = $_POST['email_address'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        if(!empty($fullname) && !empty($email_address) && !empty($password) && !empty($user_type)){
            //save to database according to the user type
            if($user_type=='HomeOwner'){

                $queryho = "insert into tbl_home_owners (owner_name, email_address, password) values ('$fullname', '$email_address', '$password')";
                mysqli_query($con, $queryho);
                header("Location: login.php");
                die;

            }elseif($user_type=='Caretaker'){
                
                $query = "insert into tbl_caretakers (caretaker_name, email_address, password) values ('$fullname', '$email_address', '$password')";
                mysqli_query($con, $query);
                header("Location: login.php");
                die;

            }
        }else{
            echo "Please enter some valid information!";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="../CSS/registrationstyle.css">
        <link rel="icon" href="../ASSETS/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </head>
    <body>
        <div class="maindiv">
            <form class="formstyle" method="POST">
                <div class="formheader">REGISTRATION</div>
                <div><label for="fullname">Name</label></div>
                <div><input type="text" name = "fullname" placeholder="Enter Your Full Name" class="forminput"></div>
                <div><label for="email" class="formcontent">Email</label></div>
                <div><input type="email" name="email_address" placeholder="Enter Your Email address" class = "forminput" required></input></div>
                <div><label for="password">Password</label></div>
                <div><input type="password" name="password" placeholder="Choose Your Password" required class="forminput"></input></div>
                <div><label for="user_type">I am a: </label></div>
                <div>
                    <select name="user_type" class="forminput">
                        <option value="HomeOwner">Home Owner</option>
                        <option value="Caretaker">Caretaker</option>
                    </select></div>
                <div><input type="submit" value="Create Account" class="button"></div>
            </form>
        </div>
    </body>
</html>