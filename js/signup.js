$(document).ready(function() {
  $('#signup_submit').on('click', function() {
    var id = $('#id').val();
    var name = $('#name').val();
    var password = $('#password').val();

    if (id && name && password) {
      $('#signup').submit();
    } else {
      alert('모든 항목을 입력하셔야 합니다');
    }
  });

  $('#password_check').on('keyup', function() {
    if ($('#password').val() == $(this).val()) {
      $('#signup_submit').removeClass('disabled');
      $('#check_msg').html('가입 가능');
      $('#check_msg').removeClass('text-danger');
      if(!$('#check_msg').hasClass('text-success')) {
        $('#check_msg').addClass('text-success');
      }
    } else {
      if (!$('#signup_submit').hasClass('disabled')) {
        $('#signup_submit').addClass('disabled');
      }
      $('#check_msg').html('비밀번호 불일치!');
      $('#check_msg').removeClass('text-success');

      if(!$('#check_msg').hasClass('text-danger')) {
        $('#check_msg').addClass('text-danger');
      }
    }
  });
});
