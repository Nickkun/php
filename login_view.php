<?php
  include './session.php';
  include './header.php';
?>

<section class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <h3>로그인 <small>가입한 사용자 정보를 입력하세요</small></h3>
      <hr>
      <form class="form-horizontal">
        <div class="form-group">
          <label for="loginid" class="col-sm-4 control-label">ID</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="loginid" name="loginid" placeholder="ID">
          </div>
        </div>
        <div class="form-group">
          <label for="loginpw" class="col-sm-4 control-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="loginpw" name="loginpw" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-8">
            <a id="login_submit" href="#" class="btn btn-danger">Sign In</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<?php include './footer.php'; ?>
