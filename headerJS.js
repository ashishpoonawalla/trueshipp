  //// Load at start
  ////$(document).ready(function(){
  ////  readRecords();
  ////});


  //// New User Signup
  function SignupUser(){
    var signupEmail = $('#signupEmail').val();
    var signupPassword = $('#signupPassword').val();
    var signupName = $('#signupName').val();
    var signupPhone = $('#signupPhone').val();

    $.ajax({
      url:"headerCD.php",
      type:'post',
      data: { 
        signupEmail: signupEmail,
        signupPassword: signupPassword,
        signupName: signupName,
        signupPhone: signupPhone
      },
      success:function(data, status){
       // readRecords(); 
       location.href = "a1.php";
      },
      error: function(err, status){
        location.href = "a2.php";
      }

    });
  }



//// Login User
function LoginUser(){
  var loginEmail = $('#loginEmail').val();
  var loginPassword = $('#loginPassword').val();
 

  $.ajax({
    url:"headerCD.php",
    type:'post',
    data: { 
      loginEmail: loginEmail,
      loginPassword: loginPassword
    },

    success:function(data, status){
       // readRecords(); 
       location.href = "a1.php";
    },
    error: function(err, status){
      location.href = "a2.php";
    }

  });
}


 /* 
  //// Delete Record
  function DeleteUser(deleteid){

    var conf = confirm("Are You Sure?");
    if (conf == true){
      $.ajax({
          url:"backend1.php",
          type:'post',
          data: { deleteid: deleteid},

          success:function(data, status){
            readRecords(); 
          }

        });
    }

  }

//// Get Single Record for EDIT/UPDATE
function GetUserDetails(id){
    
    $('#hidden_user_id').val(id);

      $.post("backend1.php", {
        id: id
      }, function (data, status)
      {
        var user = JSON.parse(data);
        $('#update_firstname').val(user.firstname);
        $('#update_lastname').val(user.lastname);
        $('#update_email').val(user.email);
        $('#update_mobile').val(user.mobile);
          
      }
    );
    $('#update_user_modal').modal("show");

  }

  //// Update Record
  function updateuserdetail(){
    var firstname = $('#update_firstname').val();
    var lastname = $('#update_lastname').val();
    var email = $('#update_email').val();
    var mobile = $('#update_mobile').val();

    var hidden_user_id = $('#hidden_user_id').val();

    $.post("backend1.php", {

        hidden_user_id: hidden_user_id,
        update_firstname: firstname,
        update_lastname: lastname,
        update_email: email,
        update_mobile: mobile,
        
      },
      function (data, status)
      {
        
        $('#update_user_modal').modal("hide");
        readRecords(); 

      },

    );
   
  }

  */
