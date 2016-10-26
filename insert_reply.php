<?php
  include './database.php';
  include './session.php';

  $user_id = $_GET['id'];
  $board_id = $_GET['board_id'];
  $author = $_GET['reply_author'];
  $content = $_GET['reply_content'];

  /* Data 삽입을 위한 Query 작성 */
  $stmt = $conn->prepare(
  'INSERT INTO reply (user_id, board_id, author, content)
              VALUES ("'.$user_id.'", "'.$board_id.'", "'.$author.'", "'.$content.'")');
        //        ("123", "3213", "123")
  /* Query 실행 */
  $stmt->execute();

?>
<?php include './header.php'; ?>

<section class="container">
  <h3>댓글이 성공적으로 등록되었습니다</h3>
  <a href="./board_detail.php?id=<?php echo $board_id?>" class="btn btn-primary"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
</section>

<?php include './footer.php'; ?>
