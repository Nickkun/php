<?php
  include './database.php';
  $request = $_SERVER['REQUEST_URI'];
  $path = explode('?', $request);
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Over Watch</title>

    <!-- Bootstrap -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./lib/font-awesome/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <img src="./img/brand.jpg" alt="brand logo" style="width:90px;"/>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="<?php echo ($path[0] == '/') ? 'active' : ''; ?>"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a></li>
            <li class="<?php echo ($path[0] == '/introduce.php') ? 'active' : '' ?>"><a href="./introduce.php"><i class="fa fa-user-secret" aria-hidden="true"></i> Introduce</a></li>
            <li class="<?php echo ($path[0] == '/board.php') ? 'active' : '' ?>"><a href="./board.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Board</a></li>
            <li class="<?php echo ($path[0] == '/faq.php') ? 'active' : '' ?>"><a href="./faq.php"><i class="fa fa-comments" aria-hidden="true"></i> FAQ</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if ($is_logged) : ?>
              <?php if ($_SESSION['role'] == 0) : ?>
              <li>
                <a href="#">
                  <span class="label label-danger">관리자 </span>
                  <?php
                    $sql = 'SELECT * FROM point WHERE min<="'.$_SESSION['point'].'" AND max>="'.$_SESSION['point'].'"';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $point_icon = $stmt->fetchAll();
                    echo (count($point_icon) > 0) ? $point_icon[0]['icon'] : '';
                  ?>
                  <?php echo $_SESSION['user_id'] ?>
                </a>
              </li>
              <?php else : ?>
              <li>
                <a href="#">
                  <span class="label label-info">일반 </span>
                  <?php
                    $sql = 'SELECT * FROM point WHERE min<="'.$_SESSION['point'].'" AND max>="'.$_SESSION['point'].'"';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $point_icon = $stmt->fetchAll();
                    echo (count($point_icon) > 0) ? $point_icon[0]['icon'] : '';
                  ?>
                  <?php echo $_SESSION['user_id'] ?>
                </a>
              </li>
              <?php endif; ?>
              <li><a href="./logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            <?php else : ?>
            <li><a href="./login_view.php"><i class="fa fa-sign-in"></i> Sign In</a></li>
            <li><a href="./signup.php"><i class="fa fa-user-plus"></i> Sign Up</a></li>
            <?php endif; ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
