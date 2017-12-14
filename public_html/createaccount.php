<?php
    require("condb/condb.php");
    if(isset($_POST["reg_form"])){
        $reg_username = $_POST["reg_username"];
        $checkusr = "select 1 from users where users.username = '$reg_username'";
        $result = mysqli_query($conn,$checkusr);
        $row = mysqli_fetch_assoc($result);
        if ($row["1"] == 1 ){
            echo "Đã có người đăng kí tên tài khoảng này";
        }
        else {
            $reg_email = $_POST["reg_email"];
            $reg_password = $_POST["reg_password"];
            $sql = "INSERT INTO users(username,password,email) 
            VALUES ('$reg_username','$reg_password','$reg_email')";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                die('Invalid query: ' . mysqli_error($conn));
            }
            else {
                echo "Đăng kí thành công";
                echo "<br/>";
                echo "Tài khoảng: $reg_username";
                echo "<br/>";
                echo "Email: $reg_email";
                echo "<br/>";
                echo "Mật khẩu: $reg_password";
            }
        }
    }
?>