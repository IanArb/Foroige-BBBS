var mailgunURL;
 
mailgunURL = 'register.php';
 
$('#mailgun').on('submit',function(e) {
  e.preventDefault();
 
  $('#mailgun *').fadeOut(200);
  $('#mailgun').prepend('Thanks we will in touch!');
 
  $.ajax({
    type     : 'POST',
    cache    : false,
    url      : mailgunURL,
    data     : $(this).serialize(),
    success  : function(data) {
      responseSuccess(data);
      console.log(data);
    },
    error  : function(data) {
      console.log('Silent failure.');
    }
  });
 
  return false;
 
});
 
function responseSuccess(data) {
 
  data = JSON.parse(data);
 
  if(data.status === 'success') {
    $('#mailgun').html('Submission sent succesfully.');
  } else {
    $('#mailgun').html('Submission failed, please contact directly.');
  }
 
}