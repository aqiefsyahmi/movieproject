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

        $sql = "SELECT txt FROM userrating WHERE txt = '".$txt."'";
        $sql2 = "UPDATE userrating SET comment='".$comment."', rate=".$rate." WHERE txt='".$txt."'";
        
        $check = mysqli_query($conn, $sql);
        
        
        if (mysqli_num_rows($check) > 0) {
            
            if (empty($comment) || empty($rate)) {
                ?>
                <script>
                    alert("Please give comment and rating")
                    history.back()
                </script>
                <?php
            } else {
                
                
                
                $update = mysqli_query($conn, $sql2);
                
                if ($update) {

                    ?>
                    <script>
                        alert("Your feedback successfully update")
                        window.location.replace("./index9.html")
                    </script>
                    <?php

                } 
            }

            $conn->close();

        } else{

            ?>
            <script>
                alert("Username invalid, please use registered username.")
                history.back();
            </script>
            <?php

            $conn->close();

        }
    }

} else {
    ?>
    <script>
        alert("Username cannot be found.")
        history.back();
    </script>
    <?php

    die();
}

?>