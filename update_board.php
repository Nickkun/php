<?php
  include './database.php';
  include './session.php';

  $user_id = $_GET['user_id'];
  $board_id = $_GET['board_id'];
  $title = $_GET['title'];
  $content = $_GET['content'];
  $author = $_GET['author'];

  /* Data 수정을 위한 Query 작성 */
  $stmt = $conn->prepare('UPDATE board SET title="'.$title.'", content="'.$content.'", author="'.$author.'" WHERE id='.$board_id);
  /* Query 실행 */
  $stmt->execute();
?>
<?php include './header.php'; ?>

<section class="container">
  <h3>성공적으로 수정되었습니다</h3>
  <a href="./board.php" class="btn btn-primary"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
</section>

<?php include './footer.php'; ?>
