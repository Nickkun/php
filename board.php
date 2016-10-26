<?php
  include './database.php';
  include './session.php';
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

  // echo "limit : ".$limit;
  // echo " offset : ".$offset;
  // echo " total_count : ".$total_count;
  // echo " total_page_count : ".$total_page_count;

  // 현재시간
  $now = date('Y-m-d H:i:s', time() + 32400);
  // echo time();

?>
<?php include './header.php'; ?>

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
      <?php foreach($notice_list as $item) : ?>
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
          <?php if ((strtotime($now)-strtotime($item['timestamp'])) < 86400) : ?>
            <span class="label label-danger">HOT</span>
          <?php endif; ?>
        </td>
        <td><?php echo $item['author'] ?></td>
        <td><?php echo $item['timestamp'] ?></td>
      </tr>
      <?php endforeach; ?>
      <?php if (count($list) > 0) : ?>
        <?php foreach($list as $item) : ?>
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
          <td>
            <?php
              // 게시물 작성자의 정보 가져오기
              $sql = 'SELECT * FROM user WHERE id="'.$item['user_id'].'"';
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $author_info = $stmt->fetchAll();

              // 게시물 작성자의 point에 따라 아이콘 표시하기
              $sql = 'SELECT * FROM point WHERE min<="'.$author_info[0]['point'].'" AND max>="'.$author_info[0]['point'].'"';
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $point_icon = $stmt->fetchAll();
              echo (count($point_icon) > 0) ? $point_icon[0]['icon'] : '';
            ?>
            <?php echo $item['author'] ?>
          </td>
          <td><?php echo $item['timestamp'] ?></td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="4" class="text-center">
            <p class="text-danger"><strong>등록된 게시물이 없습니다</strong></p>
          </td>
        </tr>
      <?php endif; ?>
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
        <?php if ($is_logged) : ?>
        <td class="text-right">
          <a href="./board_write.php" class="btn btn-primary"><i class="fa fa-pencil"></i> 글쓰기</a>
        </td>
        <?php endif; ?>
      </tr>
    </tfoot>
  </table>
</section>

<?php include './footer.php'; ?>
