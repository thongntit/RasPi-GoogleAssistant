<?php
    require("condb/condb.php");
?>
<!DOCTYPE html>
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

  <div class="container">

    <header class="masthead">
      <h3 class="text-muted" style="text-align: center">Bảng theo dõi nhà thông minh</h3>
      <nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav text-md-center nav-justified w-100">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Phòng Khách</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Nhà bếp</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Phòng ngủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <main role="main">

      <!-- Jumbotron -->
      <div class="jumbotron">
        <img src="https://i.ytimg.com/vi/0Muhsg4hZZ0/maxresdefault.jpg" width="100%" height="480px" style="text-align: center">
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Đèn</h2>
          <?php
            $query = "select * from smarthome where equipments='light' order by time DESC;";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            if ($row['state'] == 1){
              echo '<div class="alert alert-success" role="alert">Đèn đang bật</div>';
            }
            else{
              echo '<div class="alert alert-dark" role="alert">Đèn đang tắt</div>';
            }
          ?>

          <p>
            <a class="btn btn-primary" href="/thesis/showvalue.php?equip=light" role="button">Xem chi tiết &raquo;</a>
          </p>
        </div>
        <div class="col-lg-4">
          <h2>Điều hòa</h2>
          <?php
            $query = "select * from smarthome where equipments='aircon' order by time DESC;";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            if ($row['state'] == 1){
              echo '<div class="alert alert-success" role="alert">Điều hòa đang bật</div>';
            }
            else{
              echo '<div class="alert alert-dark" role="alert">Điều hòa đang tắt</div>';
            }
          ?>
          <p>
            <a class="btn btn-primary" href="/thesis/showvalue.php?equip=aircon" role="button">Xem chi tiết &raquo;</a>
          </p>
        </div>
        <div class="col-lg-4">
          <h2>Lò Sưởi</h2>
          <?php
            $query = "select * from smarthome where equipments='fireplace' order by time DESC;";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            if ($row['state'] == 1){
              echo '<div class="alert alert-success" role="alert">Lò sưởi đang bật</div>';
            }
            else{
              echo '<div class="alert alert-dark" role="alert">Lò sưởi đang tắt</div>';
            }
          ?>
          <p>
            <a class="btn btn-primary" href="/thesis/showvalue.php?equip=fireplace" role="button">Xem chi tiết &raquo;</a>
          </p>
        </div>
      </div>

    </main>

    <!-- Site footer -->
    <footer class="footer">
      <p>&copy; Company 2017</p>
    </footer>

  </div>
  <!-- /container -->



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>
</body>
</html>