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
        $update = mysqli_query($conn,"UPDATE userrating SET comment='".$comment."' WHERE txt='".$txt."' ");

        if (mysqli_num_rows($check) > 0) {
            
            //Prepare Statement userrating
            $stmt = $conn->prepare($check);
            $stmt->bind_param("s", $txt);
            $stmt->execute();
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum==0) {

                $stmt->close();

                $stmt = $conn->prepare($update);
                $stmt->bind_param("s", $comment);
                $stmt->execute();


            } else {
            
                echo "Someone already register using this email";

            }
            $stmt->close();

            echo "Your comment was updated successfully.";
            $conn->close();

        }
        else{

            echo "Invalid username, please enter valid username.";
            $conn->close();

        }
        
        

    }

}else{

    echo "Username cannot be found.";
    die();

}

?>