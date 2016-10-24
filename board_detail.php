<?php
  $board_id = $_GET['id'];

/* Database 연결 */
  $host = 'mysql:host=localhost;dbname=test';
  $user = 'test';
  $password = '1234';
  $conn = new PDO($host, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

  /* Data 조회를 위한 Query 작성 */
  $stmt = $conn->prepare('SELECT * FROM board WHERE id='.$board_id);
  /* Query 실행 */
  $stmt->execute();
  /* 조회한 Data를 배열(Array) 형태로 모두 저장 */
  $item = $stmt->fetchAll();


  /* Data 조회를 위한 Query 작성 */
  $stmt_reply = $conn->prepare('SELECT * FROM reply WHERE board_id='.$board_id.' ORDER BY id ASC');
  /* Query 실행 */
  $stmt_reply->execute();
  /* 조회한 Data를 배열(Array) 형태로 모두 저장 */
  $reply_list = $stmt_reply->fetchAll();

  // 현재시간
  $now = date('Y-m-d H:i:s', time() + 32400);

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
      <table class="table table-striped table-hover table-condensed">
        <thead>
          <tr>
            <th width="10%">
              <p>제목</p>
            </th>
            <th width="90%">
              <p><?php echo $item[0]['title']?></p>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>내용</td>
            <td>
              <p><?php echo $item[0]['content']?></p>
              <br><br>
            </td>
          </tr>
          <tr>
            <td>작성자</td>
            <td><?php echo $item[0]['author']?></td>
          </tr>
          <tr>
            <td>작성일</td>
            <td><?php echo $item[0]['timestamp']?></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2">
              <a href="#" class="btn btn-danger pull-right" data-toggle="modal" data-target="#remove_board"><i class="fa fa-trash"></i> 삭제</a>
              <a href="./board_modify.php?id=<?php echo $item[0]['id']?>" class="btn btn-warning pull-right"><i class="fa fa-pencil"></i> 수정</a>
              <a href="./board.php" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
            </td>
          </tr>
        </tfoot>
      </table>
    </section>

    <section class="container" id="reply_add">
      <form action="./insert_reply.php" method="get">
        <div class="row">
          <div class="col-sm-12">
            <hr>
            <h4><i class="fa fa-commenting-o" aria-hidden="true"></i> 댓글(Reply)</h4>
          </div>
          <div class="col-sm-3">
            <!-- 댓글 작성자 -->
            <div class="input-group">
              <span class="input-group-addon" id="reply_author">작성자</span>
              <input type="text" class="form-control" name="reply_author" placeholder="댓글 작성자" aria-describedby="reply_author">
            </div>
          </div>
          <div class="col-sm-9">
            <!-- 댓글 내용 -->
            <div class="input-group">
              <span class="input-group-addon" id="reply_content">내용</span>
              <input type="text" class="form-control" name="reply_content" placeholder="댓글 내용을 입력하세요" aria-describedby="reply_content">
              <span class="input-group-btn">
                <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane"></i> 전송</button>
              </span>
            </div>
          </div>
        </div>
        <input type="hidden" name="board_id" value="<?php echo $item[0]['id']?>">
      </form>
    </section>

    <section class="container" id="reply_list">
      <table class="table table-condensed table-hover table-striped">
        <thead>
          <tr>
            <td width="5%"></td>
            <td width="10%">작성자</td>
            <td width="65%">내용</td>
            <td width="20%" class="text-right">작성일</td>
          </tr>
        </thead>
        <tbody>
          <?php if (count($reply_list) > 0) { ?>
            <?php foreach($reply_list as $reply_item) { ?>
            <tr>
              <td><i class="fa fa-reply fa-rotate-180" aria-hidden="true"></i></td>
              <td><?php echo $reply_item['author']?></td>
              <td>
                <?php echo $reply_item['content']?>
                <?php if ((strtotime($now) - strtotime($reply_item['timestamp'])) < 86400) : ?>
                  <span class="label label-success">NEW</span>
                <?php endif; ?>
              </td>
              <td class="text-right"><?php echo $reply_item['timestamp']?></td>
            </tr>
            <?php } ?>
          <?php } else { ?>
            <tr>
              <td colspan="4" class="text-center">등록된 댓글이 없습니다</td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4">
              <p class="text-danger bg-danger"><i class="fa fa-star" aria-hidden="true"></i> 건전한 커뮤니케이션 문화를 만듭시다</p>
            </td>
          </tr>
        </tfoot>
      </table>
    </section>

    <div class="modal fade" id="remove_board" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">게시물 삭제</h4>
          </div>
          <div class="modal-body">
            <p>정말 삭제하시겠습니까?</p>
          </div>
          <div class="modal-footer">
            <form class="" action="./delete_board.php" method="get">
              <input type="hidden" name="id" value="<?php echo $item[0]['id']?>">
              <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
              <button type="submit" class="btn btn-danger">삭제</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
