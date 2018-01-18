$(document).ready(() => {

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

$(() => {
  var $slider = $("#leftBigAD"),
    $li = $('ul li', $slider).not(':first').css('opacity', 0).end(),
    arrowWidth = 48*-1,
    arrowOpacity = .3,
    $arrows = $('<a href="#" class="prev"></a><a href="#" class="next"></a>').css('opacity', arrowOpacity),
    $prev = $arrows.filter('.prev'),
    $next = $arrows.filter('.next'),
    fadeSpeed = 400;

  $slider.append($arrows).hover(() => {
    var no = $li.filter('.selected').index();
    arrowAction(no > 0 ? "block" : "none", no < $li.length - 1 ? "block" : "none");
  }, () => {
    arrowAction("none", "none");
  });

  $arrows.click(function () {
    var $selected = $li.filter('.selected'),
      no = $selected.index();

    no = (this.className=='prev') ? no - 1 : no + 1;
    $li.eq(no).stop().fadeTo(fadeSpeed + 100, 1, () => {
      arrowAction(no > 0 ? "block" : "none", no < $li.length - 1 ? "block" : "none");
    }).addClass('selected').siblings().fadeTo(fadeSpeed, 0).removeClass('selected');

    return false;
  }).focus(() => {
    this.blur();
  });

  function arrowAction(l, r) {
    $prev.stop().css({ display: l });
    $next.stop().css({ display: r });
  }
});
