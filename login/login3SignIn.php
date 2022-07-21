<?php

$txt = $_POST['txt'];
$email = $_POST['email'];
$pswd = $_POST['pswd'];

if(!empty($txt) || !empty($email) || !empty($pswd)){

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "movieproject";

    //db connection 
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {

        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    } else {

        $SELECT = "SELECT email FROM userdata WHERE email = ? Limit 1";
        $INSERT = "INSERT INTO userdata (txt, email, pswd) VALUES(?, ?, ?)";

        $SELECT2 = "SELECT txt FROM userrating WHERE txt = ? Limit 1";
        $INSERT2 = "INSERT INTO userrating (txt) VALUES(?)";

        //Prepare Statement userdata
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0) {

            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $txt, $email, $pswd);
            $stmt->execute();

            //Prepare Statement For userrating
            $stmt = $conn->prepare($SELECT2);
            $stmt->bind_param("s", $txt);
            $stmt->execute();
            
            $stmt->bind_result($txt);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum==0) {

                $stmt->close();

                $stmt = $conn->prepare($INSERT2);
                $stmt->bind_param("s", $txt);
                $stmt->execute();
                echo "New record inserted successfully";

            } else {
            
                echo "Someone already entered this username";

            } 

        } else {
            
            echo "Someone already register using this email";

        }

        $stmt->close();
        $conn->close();

    }

}else{

    echo "All field are required";
    die();

}

?>