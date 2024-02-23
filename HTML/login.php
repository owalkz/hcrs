<?php
session_start();

include("connect.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    //something was posted
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    if(!empty($email_address) && !empty($password) && !empty($user_type)){
        //read from database according to the user type
        if($user_type=='HomeOwner'){

            $queryho = "select * from tbl_home_owners where email_address = '$email_address' limit 1";
            $result = mysqli_query($con, $queryho);
            if($result){
                if ($result && mysqli_num_rows($result) > 0){

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password){

                        $_SESSION['owner_id'] = $user_data['owner_id'];
                        header("Location: mainpageho.php");
                        die;

                    }
                }
            }
        }elseif($user_type=='Caretaker'){
            
            $query = "select * from tbl_caretakers where email_address = '$email_address' limit 1";
            $result = mysqli_query($con, $query);

            if($result){
                if ($result && mysqli_num_rows($result) > 0){

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password']==$password){

                        $_SESSION['caretaker_id'] = $user_data['caretaker_id'];
                        header("Location: mainpagect.php");
                        die;

                    }
                }
            }

        }
        echo "Wrong email address or password!";
    }else{
        echo "Please enter some valid information!";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../CSS/loginstyle.css">
        <link rel="icon" href="../ASSETS/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="En-KE">
    </head>
    <body>
        <div class="maindiv">
            <form class="formstyle" method = "POST">
                <div class="formheader">LOGIN</div>
                <div><label for="email_address" class="formcontent">Email Address</label></div>
                <div><input type="text" name="email_address" placeholder="Enter Email Address" required class="forminput"></input></div>
                <div><label for="password">Password</label></div>
                <div><input type="password" name="password" placeholder="Enter Password" required class="forminput"></input></div>
                <div><label for="user_type">I am a: </label></div>
                <div>
                    <select name="user_type" class="forminput">
                        <option value="HomeOwner">Home Owner</option>
                        <option value="Caretaker">Caretaker</option>
                    </select></div>
                <div><input type="submit" value="Login" class="button"></div>
                <div>Or Click <a href=registration.php>here</a> to register an account.</div>
            </form>
        </div>
    </body>
</html>