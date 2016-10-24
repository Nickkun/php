$(document).ready(function() {
  $('#submit').on('click', function() {
    $.ajax({
      url : 'login.php',
      method : 'POST',
      data : {
        loginid : $('#loginid').val(),
        loginpw : $('#loginpw').val()
      }
    }).done(function(response) {
      console.log(response);
    });
  });

});
