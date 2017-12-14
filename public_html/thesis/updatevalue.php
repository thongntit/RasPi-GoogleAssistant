<?php
    require("condb/condb.php");
    $equip = $_GET["equip"];
    $state = $_GET["state"];
    $time = $_GET["time"];
    $query = "insert into smarthome values('$equip',$state,$time);";
    $result = mysqli_query($conn,$query);
    echo $result;
?>