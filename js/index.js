$(document).ready(function() {
  var userinfo = {};
  $.ajax({
    url: 'login_check.php',
    dataType: 'json'
  }).done(function(response) {
    userinfo = response;
    console.log(userinfo);
    if (userinfo.is_logged) {
      // 1. 로그인 -> 회원정보
      $('#log_info .panel-heading').html('회원정보');
      // 2. 로그인 폼 태그 -> 회원정보를 표시하는 태그
      $('#user_id').html(userinfo.user_id);
      $('#user_role').html(userinfo.role);
      $('#user_timestamp').html(userinfo.timestamp);

      $('#user_info').removeClass('hide');
      $('#login_panel').addClass('hide');
      $('#log_info .error_msg').addClass('hide');
    }
  });

  $('#submit').on('click', function() {
    $.ajax({
      url : 'login.php',
      method : 'POST',
      data : {
        loginid : $('#loginid').val(),
        loginpw : $('#loginpw').val()
      },
      dataType : 'json'
    }).done(function(response) {
      location.href = '/';
    });
  });

});
