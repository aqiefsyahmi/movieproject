<?php

$email = $_POST['email'];
$pswd = $_POST['pswd'];

if(!empty($email) || !empty($pswd)){

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "movieproject";

    //db connection 
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {

        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    } else {

        $check = mysqli_query($conn, "SELECT email FROM userdata WHERE email = '".$email."'") or die(mysqli_error($conn));
        $check2 = mysqli_query($conn, "SELECT pswd FROM userdata WHERE pswd = '".$pswd."'") or die(mysqli_error($conn));

        if (mysqli_num_rows($check) > 0 && mysqli_num_rows($check2) > 0) {

            ?>
                
            <script>
                alert("You have log in successfully.");
                window.location.replace("../index9.html");
            </script>

            <?php

            echo "";

        }
        else{
            ?>
                
            <script>
                alert("You Have Entered Incorrect Email or Password.");
                history.back()
            </script>

            <?php


        }

        $conn->close();

    }

}else{

    echo "All field are required";
    die();

}

?>