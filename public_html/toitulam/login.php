<?php
    require("condb/condb.php");
    if (isset($_POST['login_form'])){
        $log_username = $_POST["log_username"];
        $log_password = $_POST["log_password"];
        $checkusr = "select 1 from users where users.username = '$log_username' and users.password = '$log_password'";
        $result = mysqli_query($conn,$checkusr);
        $row = mysqli_fetch_assoc($result);
        if ($row["1"] == 1 ){
            echo "Xin chào $log_username";
        }
    }
?>