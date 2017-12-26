$(document).ready(() => {
  $(window).resize(function () {
    //$(".logo").css("width", $(".leftHeader").width());
  });

  $("#register").click(() => {
    $("#dialogArea").css("display", "block");
    $("#registerWindow__inside__content").css("display", "block");
  });
  
  $("#signIn").click(() => {
    $("#dialogArea").css("display", "block");
    $("#signInWindow__inside__content").css("display", "block");
  });

  $("#close").click(() => {
    $("#dialogArea").css("display", "none");
    $("#signInWindow__inside__content").css("display", "none");
    $("#registerWindow__inside__content").css("display", "none");
  });

  $("#registerSubmit").click(() => {
    var email = $("#registerEmail").val(), reEmail = $("#registerReEmail").val(), password = $("#registerPassword").val(), userName = $("#registerUserName").val();
    if (checkInputData(email, reEmail, password, userName)) {
      $.post(baseUrl+"user/ajaxRegister", {email: email, password: password, userName: userName}, function(rtn) {
        if(rtn == 1) {
          $("#registerNotification").html("此電子郵件已註冊過</br>請使用其他電子郵件註冊"); 
        } else {
          $("#leftHeaderInfo").html("<p class='userName'>"+ rtn['name'] +"</p><p class='level'>LV."+ rtn["LV"] +"</p>");
          $("#registerInput").css("display", "none");
          $("#registeredInfo").css("display", "block");
        }
      });
    }
  });

  $("#signInSubmit").click(() => {
    var email = $("#signInEmail").val(), password = $("#signInPassword").val();
    $.post(baseUrl+"user/ajaxSignIn", {email: email, password: password}, function(rtn) {
      if (rtn == 2) {
        $("#signInNotification").html("無此帳號，請註冊後再登入");
      } else if (rtn == 3) {
        $("#signInNotification").html("密碼錯誤");
      } else {
        window.location.href = baseUrl;
      }
    });
  });
});

function checkInputData(email, reEmail, password, userName) {
  var rtn = true, notification = "";

  if (email != reEmail) {
    rtn = false;
    notification = "電子郵件不同";
  }

  if (!rtn) $("#registerNotification").html(notification);

  return rtn;
}
