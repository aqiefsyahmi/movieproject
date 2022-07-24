<?php

$txt = $_POST['username'];
$comment = $_POST['feedback'];
$rate = $_POST['rate'];

if(!empty($txt)){

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "movieproject";

    //db connection 
    $conn = new mysqli(
        $host, 
        $dbUsername, 
        $dbPassword, 
        $dbname
    );

    if (mysqli_connect_error()) {

        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    } else {

        $check = mysqli_query($conn, "SELECT txt FROM userrating WHERE txt = '".$txt."'");
        $update = mysqli_query($conn, "UPDATE userrating SET comment='".$comment."', rate=".$rate." WHERE txt='".$txt."'");

        if (mysqli_num_rows($check) > 0) {

            if ($update) {
                echo "Your feedback successfully update";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }

            $conn->close();

        }
        else{

            echo "Username invalid, please use registered username.";
            $conn->close();

        }
    }

} else {
    echo "Username cannot be found.";
    die();
}

?>