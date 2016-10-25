<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Over Watch</title>

    <!-- Bootstrap -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./lib/font-awesome/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">OverWatch</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a></li>
            <li><a href="./introduce.php"><i class="fa fa-user-secret" aria-hidden="true"></i> Introduce</a></li>
            <li><a href="./board.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Board</a></li>
            <li><a href="./faq.php"><i class="fa fa-comments" aria-hidden="true"></i> FAQ</a></li>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

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
  </div>
</div>
</section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/login.js">

    </script>
  </body>
</html>
