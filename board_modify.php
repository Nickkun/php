<?php
  include './database.php';
  include './session.php';

  $id = $_GET['id'];

  /* Data 조회를 위한 Query 작성 */
  $stmt = $conn->prepare('SELECT * FROM board WHERE id='.$id);
  /* Query 실행 */
  $stmt->execute();
  /* 조회한 Data를 배열(Array) 형태로 모두 저장 */
  $item = $stmt->fetchAll();

?>
<?php include './header.php'; ?>
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
        <input type="text" class="form-control" id="author" name="author" value="<?php echo $item[0]['author']?>" readonly="true">
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

<?php include './footer.php'; ?>
