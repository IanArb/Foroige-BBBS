var mailgunURL;
 
mailgunURL = 'register.php';
 
$('#mailgun').on('submit',function(e) {
  e.preventDefault();
 
 var response = "Thanks we will be in touch!";

  $('#mailgun *').fadeOut(200);
  $('#mailgun').prepend('<div class="form-group>'+
                           '<div class="row center-block">'+
                              '<div class="col-md-4 col-md-push-5">'+
                                '<div>'+'<h4 class="text-center">'+response+'</h4>'+'</div>'+
                              '</div>'+
                            '</div>'+
                         '</div>');
 
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