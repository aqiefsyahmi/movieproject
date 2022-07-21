<?php

$txt = $_POST['txt'];
$comment = $_POST['comment'];

if(!empty($txt)){

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "movieproject";

    //db connection 
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {

        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    } else {

        $check = mysqli_query($conn, "SELECT txt FROM userrating WHERE txt = '".$txt."'") or die(mysqli_error($conn));
        $update = "UPDATE userrating WHERE comment = '".$comment."'";

        if (mysqli_num_rows($check) > 0) {

            mysqli_query($update) or trigger_error(mysqli_error()." ".$update);
            echo "Comment has updated.";

        }
        else{

            echo "Username cannot be found.";

        }

        $conn->close();

    }

}else{

    echo "Username field are required";
    die();

}

?>