<?php
    require("condb/condb.php");
    ?>

    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Smarthome Dashboard</title>
    <link rel="icon" href="https://lh3.googleusercontent.com/oKsgcsHtHu_nIkpNd-mNCAyzUD8xo68laRPOfvFuO0hqv6nDXVNNjEMmoiv9tIDgTj8=w170"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">
    <link href="justified.css" rel="stylesheet">
    </head>
    <body>
    <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Thiết bị</th>
                  <th>Trạng thái</th>
                  <th>Thời gian</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $equip = $_GET['equip'];
                    $query = "SELECT * FROM smarthome WHERE equipments='$equip' ORDER BY time DESC;";
                    $result = mysqli_query($conn,$query);
                    for ($x = 1; $x < 11; $x++) {
                        $row = mysqli_fetch_assoc($result);
                        switch($equip){
                          case 'light':
                            $tb = 'Đèn';
                            break;
                          case 'aircon':
                            $tb = 'Máy lạnh';
                            break;
                          case 'fireplace':
                            $tb = 'Là sưởi';
                            break; 
                        }
                        if ($row['state']==1){
                          $state = 'Bật';
                        }
                        else {
                          $state = 'Tắt';
                        }
                        $time = $row['time'];
                        echo "<tr>";
                        echo "<td>$x</td>";
                        echo "<td>$tb</td>";
                        echo "<td>$state</td>";
                        echo "<td>$time</td>";
                        echo "</tr>";
                    } 
                    mysqli_free_result($result);
                ?>
              </tbody>
            </table> 
    </body>
    </html>