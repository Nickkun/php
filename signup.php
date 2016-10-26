<?php
  include './database.php';
  include './session.php';
?>

<?php include './header.php'; ?>
<section class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <h3>회원가입 <small>사용자 정보를 입력하세요</small></h3>
      <hr>
      <form id="signup" class="form-horizontal" action="./add_user.php" method="POST">
        <div class="form-group">
          <label for="id" class="col-sm-4 control-label">ID</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="id" name="id" placeholder="ID">
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-4 control-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="password_check" class="col-sm-4 control-label">Password Check</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="password_check" name="passowrd_check" placeholder="Password">
            <p class=""><strong id="check_msg"></strong></p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-8">
            <a href="#" id="signup_submit" class="btn btn-danger disabled">Sign Up</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<?php include './footer.php'; ?>
