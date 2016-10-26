$(document).ready(function() {
  $('#login_submit').on('click', function() {
    $.ajax({
      url : 'login.php',
      method : 'POST',
      data : {
        loginid : $('#loginid').val(),
        loginpw : $('#loginpw').val()
      },
      dataType : 'json'
    }).done(function(response) {
      if (response.hasOwnProperty('user_id')) {
        location.href = "/";
      } else {
        alert('일치하는 회원정보가 없습니다');
        $('#loginpw').val('');
      }
    });
  });

});
