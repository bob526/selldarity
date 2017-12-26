$(document).ready(() => {
  $(window).resize(function () {
    //$(".logo").css("width", $(".leftHeader").width());
  });

  $("#register").click(() => {
   $("#registerArea").css("display", "block");
  });

  $("#close").click(() => {
   $("#registerArea").css("display", "none");
  });

  $("#registerSubmit").click(() => {
    var email = $("#email").val(), reEmail = $("#reEmail").val(), password = $("#password").val(), userName = $("#userName").val();
    if (checkInputData(email, reEmail, password, userName)) {
      $.post(baseUrl+"user/ajaxRegister", {email: email, password: password, userName: userName}, function(rtn) {
        if(rtn == 1) {
          $("#notification").html("此電子郵件已註冊過</br>請使用其他電子郵件註冊"); 
        } else {
          $("#leftHeaderInfo").html("<p class='userName'>"+ rtn['name'] +"</p><p class='level'>LV."+ rtn["LV"] +"</p>");
          $("#registerInput").css("display", "none");
          $("#registeredInfo").css("display", "block");
        }
      });
    }
  });
});

function checkInputData(email, reEmail, password, userName) {
  var rtn = true, notification = "";

  if (email != reEmail) {
    rtn = false;
    notification = "電子郵件不同";
  }

  if (!rtn) $("#notification").html(notification);

  return rtn;
}
