<?php include './session.php'; ?>
<?php include './header.php'; ?>

<?php
  if (!$is_logged) {
    echo '<script>location.href = "/login_view.php";</script>';
  }
?>

<section class="container">
  <form class="form-horizontal" action="./insert_board.php" method="get">
    <div class="form-group">
      <label for="title" class="col-sm-2 control-label">제목</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title" placeholder="제목을 입력하세요">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-sm-2 control-label">내용</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="content" name="content" rows="5"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="author" class="col-sm-2 control-label">작성자</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="author" name="author" value="<?php echo $_SESSION['user_name']?>" readonly="true">
      </div>
    </div>
    <?php if ($is_logged && $_SESSION['role'] == 0) : ?>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox" id="notice" name="notice"> 공지사항
          </label>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">등록</button>
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
  </form>
</section>


<?php include './footer.php'; ?>
