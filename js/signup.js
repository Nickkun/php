$(document).ready(function() {
  $('#submit').on('click', function() {
    var id = $('#id').val();
    var password = $('#password').val();

    if (id && password) {
      $('#signup').submit();
    }
  });

  $('#password_check').on('keyup', function() {
    if ($('#password').val() == $(this).val()) {
      $('#submit').removeClass('disabled');
      $('#check_msg').html('가입 가능');
      $('#check_msg').removeClass('text-danger');
      if(!$('#check_msg').hasClass('text-success')) {
        $('#check_msg').addClass('text-success');
      }
    } else {
      if (!$('#submit').hasClass('disabled')) {
        $('#submit').addClass('disabled');
      }
      $('#check_msg').html('비밀번호 불일치!');
      $('#check_msg').removeClass('text-success');

      if(!$('#check_msg').hasClass('text-danger')) {
        $('#check_msg').addClass('text-danger');
      }
    }
  });
});
