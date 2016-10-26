<?php include './session.php'; ?>
<?php include './header.php'; ?>

<section class="container">
  <div class="row">
    <div class="col-sm-8">
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel" data-slide-to="0" class="active"></li>
          <li data-target="#carousel" data-slide-to="1"></li>
          <li data-target="#carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="./img/image1.jpg" alt="Overwatch 1">
            <div class="carousel-caption">
              <h3>오버워치 콜렉션</h3>
              <p>Logo for Overwatch</p>
            </div>
          </div>
          <div class="item">
            <img src="./img/image2.jpg" alt="Overwatch 2">
            <div class="carousel-caption">
              <h3>오버워치</h3>
              <p>금주의 PC방 점유율 1위</p>
            </div>
          </div>
          <div class="item">
            <img src="./img/image3.jpg" alt="Overwatch 3">
            <div class="carousel-caption">
              <h3>앙~ 메르시</h3>
              <p>Overwatch's Main Healer</p>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="col-sm-4">
      <div id="log_info" class="panel panel-danger">
        <div class="panel-heading">로그인</div>
        <div class="panel-body">
          <p class="text-danger error_msg hide">일치하는 회원정보가 없습니다</p>
          <form id="login_panel" class="form-horizontal">
            <div class="form-group">
              <label for="loginid" class="col-sm-4 control-label">ID</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Login ID">
              </div>
            </div>
            <div class="form-group">
              <label for="loginpw" class="col-sm-4 control-label">Password</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="loginpw" name="loginpw" placeholder="Login Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8">
                <a href="#" id="submit" class="btn btn-success">로그인</a>
                <a href="./signup.php" class="btn btn-danger">회원가입</a>
              </div>
            </div>
          </form>
          <div id="user_info" class="hide">
            <p>ID : <span id="user_id"></span></p>
            <p>권한 : <span id="user_role"></span></p>
            <p>등록일 : <span id="user_timestamp"></span></p>
            <a href="./logout.php" class="btn btn-danger">로그아웃</a>
          </div>
        </div>
      </div>
      <img src="./img/banner.jpg" class="banner" alt="banner" />
    </div>
  </div>
</section>
<section class="container no_first">
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading">공지사항</div>
        <ul class="list-group">
          <li class="list-group-item">관리자 오버워치 배틀태그 공개</li>
          <li class="list-group-item">게시판 운영규칙 입니다</li>
        </ul>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-warning">
        <div class="panel-heading">자주 묻는 질문</div>
        <div class="panel-body">
          <p>FAQ 를 통해 자주 묻는 질문을 확인하시기 바랍니다</p>
          <a href="./faq.php" class="btn btn-warning"><i class="fa fa-comments" aria-hidden="true"></i> FAQ 바로가기</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="container-fluid no_first">
  <div class="section_bg">
    <img src="./img/section_bg.jpg" alt="">
    <div class="overlay">
      <article>
        <h3>영웅은 죽지 않아요</h3>
        <p>댓가를 치를뿐. 오버워치의 영웅들이여</p>
      </article>
    </div>
  </div>
</section>

<?php include './footer.php'; ?>
