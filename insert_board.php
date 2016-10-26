<?php
  include './database.php';
  include './session.php';

  $user_id = $_GET['id'];
  $title = $_GET['title'];
  $content = $_GET['content'];
  $author = $_GET['author'];
  $notice = (isset($_GET['notice'])) ? $_GET['notice'] : '' ;
  // (조건식) ? TRUE : FALSE;
  //
  if ($notice == 'on') {
    $notice = 1;
  } else {
    $notice = 0;
  }

  /* Data 삽입을 위한 Query 작성 */
  $stmt = $conn->prepare(
  'INSERT INTO board (user_id, title, content, author, notice)
   VALUES ("'.$user_id.'", "'.$title.'", "'.$content.'", "'.$author.'", "'.$notice.'")');
  /* Query 실행 */
  $stmt->execute();

?>
<?php include './header.php'; ?>

<section class="container">
  <h3>성공적으로 등록되었습니다</h3>
  <a href="./board.php" class="btn btn-primary"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
</section>

<?php include './footer.php'; ?>
