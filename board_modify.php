<?php
  $id = $_GET['id'];

  /* Database 연결 */
  $host = 'mysql:host=localhost;dbname=test';
  $user = 'test';
  $password = '1234';
  $conn = new PDO($host, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

  /* Data 조회를 위한 Query 작성 */
  $stmt = $conn->prepare('SELECT * FROM board WHERE id='.$id);
  /* Query 실행 */
  $stmt->execute();
  /* 조회한 Data를 배열(Array) 형태로 모두 저장 */
  $item = $stmt->fetchAll();

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
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">OverWatch</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
            <li><a href="./introduce.php"><i class="fa fa-user-secret" aria-hidden="true"></i> Introduce</a></li>
            <li class="active"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Board  <span class="sr-only">(current)</span></a></li>
            <li><a href="./faq.php"><i class="fa fa-comments" aria-hidden="true"></i> FAQ</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <section class="container">
      <form class="form-horizontal" action="./update_board.php" method="get">
        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">제목</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="제목을 입력하세요" value="<?php echo $item[0]['title']?>">
          </div>
        </div>
        <div class="form-group">
          <label for="content" class="col-sm-2 control-label">내용</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="content" name="content" rows="5"><?php echo $item[0]['content']?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="author" class="col-sm-2 control-label">작성자</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="author" name="author" placeholder="작성자를 입력하세요" value="<?php echo $item[0]['author']?>">
          </div>
        </div>
        <div class="form-group">
          <label for="timestamp" class="col-sm-2 control-label">작성일</label>
          <div class="col-sm-10">
            <p id="timestamp"><?php echo $item[0]['timestamp']?></p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i> 수정</button>
            <a href="./board.php" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
          </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $item[0]['id']?>">
      </form>
    </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
