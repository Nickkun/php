<?php
  include './database.php';
  include './session.php';

  $board_id = $_GET['id'];

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
<?php include './header.php'; ?>
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
          <?php if ($is_logged) : ?>
            <?php if ($item[0]['user_id'] == $_SESSION['id'] || $_SESSION['role'] == 0) : ?>
              <a href="#" class="btn btn-danger pull-right" data-toggle="modal" data-target="#remove_board"><i class="fa fa-trash"></i> 삭제</a>
              <a href="./board_modify.php?id=<?php echo $item[0]['id']?>" class="btn btn-warning pull-right"><i class="fa fa-pencil"></i> 수정</a>
            <?php endif; ?>
          <?php endif; ?>
          <a href="./board.php" class="btn btn-success pull-right"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
        </td>
      </tr>
    </tfoot>
  </table>
</section>

<?php if ($is_logged) : ?>
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
          <input type="text" class="form-control" name="reply_author"  aria-describedby="reply_author" value="<?php echo $_SESSION['user_name']?>" readonly="true">
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
    <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
  </form>
</section>
<?php endif; ?>

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

<?php include './footer.php'; ?>
