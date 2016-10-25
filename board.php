<?php
  include './database.php';
  // 페이지네이션 변수
  $limit = 5;
  $offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;

  // 공지사항 게시물 리스트
  $stmt = $conn->prepare('SELECT * FROM board WHERE notice=1 ORDER BY id DESC');
  $stmt->execute();
  $notice_list = $stmt->fetchAll();

  // 일반 게시물 리스트
  $stmt = $conn->prepare('SELECT * FROM board WHERE notice=0 ORDER BY id DESC LIMIT '.$offset.','.$limit);
  $stmt->execute();
  $list = $stmt->fetchAll();

  // 일반 게시물의 총 개수
  $stmt = $conn->prepare('SELECT * FROM board WHERE notice=0');
  $stmt->execute();
  $list_count = $stmt->fetchAll();

  $total_count = count($list_count);
  $total_page_count = ceil($total_count / $limit);
  // $page = $offset; 

  echo "limit : ".$limit;
  echo "offset : ".$offset;
  echo "total_count : ".$total_count;
  echo "total_page_count : ".$total_page_count;

  // 현재시간
  $now = date('Y-m-d H:i:s', time() + 32400);
  // echo time();

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
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th width="10%">No.</th>
            <th width="50%">제목</th>
            <th width="20%">작성자</th>
            <th width="20%">작성일</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($notice_list as $item) { ?>
          <tr class="notice_bg">
            <td><span class="label label-danger label-lg">공지</span></td>
            <td>
              <a href="./board_detail.php?id=<?php echo $item['id'] ?>"><?php echo $item['title'] ?></a>
              <?php
                $stmt = $conn->prepare('SELECT * FROM reply WHERE board_id='.$item['id']);
                $stmt->execute();
                $reply_count = $stmt->fetchAll();
              ?>
              <?php if (count($reply_count) > 0) : ?>
                <span class="badge"><?php echo count($reply_count)?></span>
              <?php endif; ?>
              <?php if ((strtotime($now)-strtotime($item['timestamp'])) < 86400) { ?>
                <span class="label label-danger">HOT</span>
              <?php } ?>
            </td>
            <td><?php echo $item['author'] ?></td>
            <td><?php echo $item['timestamp'] ?></td>
          </tr>
          <?php } ?>
          <?php foreach($list as $item) { ?>
          <tr>
            <td><?php echo $item['id'] ?></td>
            <td>
              <a href="./board_detail.php?id=<?php echo $item['id'] ?>"><?php echo $item['title'] ?></a>
              <?php
                $stmt = $conn->prepare('SELECT * FROM reply WHERE board_id='.$item['id']);
                $stmt->execute();
                $reply_count = $stmt->fetchAll();
              ?>
              <?php if (count($reply_count) > 0) : ?>
                <span class="badge"><?php echo count($reply_count)?></span>
              <?php endif; ?>
              <?php if ((strtotime($now)-strtotime($item['timestamp'])) < 86400) { ?>
                <span class="label label-success">New</span>
              <?php } ?>
            </td>
            <td><?php echo $item['author'] ?></td>
            <td><?php echo $item['timestamp'] ?></td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3" class="text-center">
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo; prev</span>
                    </a>
                  </li>
                  <?php for($i = 1; $i <= $total_page_count; $i++) :?>
                  <li><a href="./board.php?offset=<?php echo $limit*($i-1)?>"><?php echo $offset + $i ?></a></li>
                  <?php endfor; ?>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo; next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </td>
            <td class="text-right">
              <a href="./board_write.php" class="btn btn-primary"><i class="fa fa-pencil"></i> 글쓰기</a>
            </td>
          </tr>
        </tfoot>
      </table>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
