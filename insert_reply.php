<?php
  include './database.php';
  include './session.php';

  $user_id = $_GET['user_id'];
  $board_id = $_GET['board_id'];
  $author = $_GET['reply_author'];
  $content = $_GET['reply_content'];
  $ipaddress = $_SERVER['REMOTE_ADDR'];

  /* Data 삽입을 위한 Query 작성 */
  $stmt = $conn->prepare(
  'INSERT INTO reply (user_id, board_id, author, content, ipaddress)
              VALUES ("'.$user_id.'", "'.$board_id.'", "'.$author.'", "'.$content.'", "'.$ipaddress.'")');
        //        ("123", "3213", "123")
  /* Query 실행 */
  $stmt->execute();

  /* User Data 수정을 위한 Query 작성 */
  $stmt = $conn->prepare('SELECT * FROM user WHERE id="'.$user_id.'"');
  $stmt->execute();
  $user_info = $stmt->fetchAll();

  $stmt = $conn->prepare('UPDATE user SET point="'.($user_info[0]['point'] + 3).'" WHERE id="'.$user_id.'"');
  /* Query 실행 */
  $stmt->execute();

?>
<?php include './header.php'; ?>

<section class="container">
  <h3>댓글이 성공적으로 등록되었습니다</h3>
  <a href="./board_detail.php?id=<?php echo $board_id?>" class="btn btn-primary"><i class="fa fa-list" aria-hidden="true"></i> 목록</a>
</section>

<?php include './footer.php'; ?>
