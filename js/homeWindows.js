$("#registerSubmit").click(() => {
  var email = $("#registerEmail").val(), reEmail = $("#registerReEmail").val(), password = $("#registerPassword").val(), userName = $("#registerUserName").val();
  if (checkInputData(email, reEmail, password, userName)) {
    $.post(baseUrl+"user/ajaxRegister", {email: email, password: password, userName: userName}, function(rtn) {
      if(rtn === 1) {
        $("#registerNotification").html("此電子郵件已註冊過</br>請使用其他電子郵件註冊"); 
      } else if (rtn === true) {
        $("#registerInput").css("display", "none");
        $("#verMailInfo").css("display", "block");
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
    } else if(rtn == 4) {
      $("#signInNotification").html("請先驗證在登入");
    } else {
      window.location.href = baseUrl;
    }
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

$("#counter-reduce").click(function() {
  let counterNum = $("#counter-number").html();
  if (counterNum != 0) {
    $("#counter-number").text(parseInt($("#counter-number").html()) - 1);
  }
});

$("#counter-add").click(function() {
  $("#counter-number").text(parseInt($("#counter-number").html()) + 1);
});

$("#detailInfo__leftArrow").click(function() {
  console.log(1);
  let otherImg = $(".otherImg img"); 
  let num = findSelectedIndex(otherImg) - 1;
  otherImg.removeClass();
  num = (num >= 0) ? num : num + 4;
  otherImg.eq(num).addClass("selected");
  $("#mainImg").attr("src", otherImg.eq(num).attr("src"));
});

$("#detailInfo__rightArrow").click(function() {
  let otherImg = $(".otherImg img"); 
  let num = findSelectedIndex(otherImg) + 1;
  otherImg.removeClass();
  num = (num < 4) ? num : 0;
  otherImg.eq(num).addClass("selected");
  $("#mainImg").attr("src", otherImg.eq(num).attr("src"));
});

function findSelectedIndex(otherImg) {
  var rtn = 0;

  for (let i = 0, length = otherImg.length; i < length; i++) {
    if (otherImg[i].className == "selected") {
      rtn = i;
      break;
    }
  }

  return rtn;
}
