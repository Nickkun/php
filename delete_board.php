<?php
  include './database.php';
  include './session.php';

  $id = $_GET['id'];

  /* Data 삭제를 위한 Query 작성 */
  $stmt = $conn->prepare('DELETE FROM board WHERE id='.$id);
  /* Query 실행 */
  $stmt->execute();
  /* 댓글 Data 삭제를 위한 Query 작성 */
  $stmt = $conn->prepare('DELETE FROM reply WHERE board_id='.$id);
  /* Query 실행 */
  $stmt->execute();

?>
<?php include './header.php'; ?>

<section class="container">
  <h3>성공적으로 삭제되었습니다</h3>
  <a href="./board.php" class="btn btn-primary"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
</section>

<?php include './footer.php'; ?>
