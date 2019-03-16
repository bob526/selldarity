$(document).on('click', "#dialogWindow_content .registerSubmit", function() {
	let email = $("#registerEmail").val(),
		reEmail = $("#registerReEmail").val(),
		password = $("#registerPassword").val(),
		userName = $("#registerUserName").val();

	if (checkInputData(email, reEmail, password, userName)) {
		$.post(baseUrl + "authority/ajaxRegister", {
			email: email,
			password: password,
			userName: userName
		}, function(rtn) {
			if (rtn === 1) {
				$("#registerNotification").html("此電子郵件已註冊過</br>請使用其他電子郵件註冊");
			} else if (rtn === true) {
				$("#registerInput").css("display", "none");
				$("#verMailInfo").css("display", "block");
			}
		});
	}
});

$(document).on('click', '#dialogWindow_content .loginSubmit', function() {
	var email = $("#dialogWindow_content .loginEmail").val(),
		password = $("#dialogWindow_content .loginPassword").val();
	$.post(baseUrl + "Authority/ajaxLogin", {
		email: email,
		password: password
	}, function(rtn) {
		if (rtn == 2) {
			$("#dialogWindow_content .loginNotification").html("無此帳號，請註冊後再登入");
		} else if (rtn == 3) {
			$("#dialogWindow_content .loginNotification").html("密碼錯誤");
		} else if (rtn == 4) {
			$("#dialogWindow_content .loginNotification").html("請先驗證在登入");
		} else {
			window.location.href = baseUrl;
		}
	});
});

$(document).on('click', '#dialogWindow_content .detailInfo__leftArrow', function() {
	let otherImg = $(".otherImg img"),
		num = findSelectedIndex(otherImg) - 1;
	otherImg.removeClass();
	num = (num >= 0) ? num : num + 4;
	otherImg.eq(num).addClass("selected");
	$("#dialogWindow_content .mainImg").attr("src", otherImg.eq(num).attr("src"));
});

$(document).on('click', '#dialogWindow_content .detailInfo__rightArrow', function() {
	let otherImg = $(".otherImg img"),
		num = findSelectedIndex(otherImg) + 1;
	otherImg.removeClass();
	num = (num < 4) ? num : 0;
	otherImg.eq(num).addClass("selected");
	$("#dialogWindow_content .mainImg").attr("src", otherImg.eq(num).attr("src"));
});

$(document).on('click', '#dialogWindow_content .loginToRegister', function() {
	$("#dialogWindow_content div").remove();
	openWindow('register');
});

$(document).on('click', '#dialogWindow_content .ToSignIn', function() {
	$("#dialogWindow_content div").remove();
	openWindow('login');
});

function checkInputData(email, reEmail, password, userName) {
	var rtn = true,
		notification = "";

	if (email != reEmail) {
		rtn = false;
		notification = "電子郵件不同";
	}

	if (!rtn) $("#registerNotification").html(notification);

	return rtn;
}

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
