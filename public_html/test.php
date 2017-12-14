<?php
require("condb/condb.php");

// $sql = "INSERT INTO users(
//     username,
//     password,
//     email
// ) VALUES (
//     'nanolove95',
//     'thong46',
//     'nanolove95@gmail.com'
// )";
// // thực thi câu $sql với biến conn lấy từ file connection.php
// mysqli_query($conn,$sql);
$sql = "SELECT * FROM users";
$sql = "select 1
from users
where users.username = 'nanolove95'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
echo "id: " . $row["1"];
if ($row["1"] == 1 ){
    echo "Sai";
}
 
// Xóa kết quả khỏi bộ nhớ
mysqli_free_result($result);

?>