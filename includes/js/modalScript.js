$(document).ready(function(){

});

// Sign In Modal Show
$("#signin").click(function(e){
  e.preventDefault();
  $("#signinModal").modal();
});

// Sign Up Modal show 
$("#signup").click(function(e){
e.preventDefault();
$("#signupModal").modal();
});

// Forget Password Modal show 
$("#forgetPwd").click(function(e){
  e.preventDefault();
  $('#signinModal').modal('hide')
  $("#fpModal").modal();
});
  

// clear field after closing modal

$('#signinModal, #signupModal, #fpModal').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
})