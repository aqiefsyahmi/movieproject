<?php

$txt = $_POST['txt'];
$comment = $_POST['comment'];

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
        $update = mysqli_query($conn,"UPDATE userrating SET comment='".$comment."' WHERE txt='".$txt."' ");
        

        if (mysqli_num_rows($check) > 0) {
            
            //Prepare Statement userrating
            $stmt = $conn->prepare($update);
            $stmt->bind_param("s", $comment);
            $stmt->execute();
            $stmt->bind_result($comment);
            $stmt->store_result();
            $stmt->close();

           echo "Your comment was updated successfully.";
            $conn->close();

        }
        else{

            echo "Username invalid, please use registered username.";
            $conn->close();

        }
        
        

    }

}else{

    echo "Username cannot be found.";
    die();

}

?>