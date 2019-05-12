$(document).on('click', "#dialogWindow_content .registerSubmit", function() {
	$(this).attr('disabled', true);

	const userName = $('#registerUserName').val();
	const email = $('#registerEmail').val();
	const password = $('#registerPassword').val();
	const rePassword = $('#registerRePassword').val();

	if (checkValue(userName, email, password, rePassword)) {
		$("#registerNotification").html("請稍後");
		$.post(baseUrl + "home/ajaxRegister", {
				email: email,
				password: password,
				userName: userName
			}, function(rtn) {
				if (rtn !== "") {
					$("#registerNotification").html(rtn);
				} else {
					$("#registerNotification").html("驗證信已寄至您的信箱");
					$('#register').unbind('click');
					setTimeout(() => {
						$('#dialogWindow__inside #close').trigger('click');
					}, 1500);
				}
			})
			.done(function(msg) {})
			.fail(function(xhr, status, error) {
				console.log(xhr);
				console.log(status);
				console.log(error);
			});
	} else {
		$('#dialogWindow_content .registerSubmit').attr('disabled', false);
	}
});

$(document).on('click', '#dialogWindow_content .loginSubmit', function() {
	var email = $("#dialogWindow_content .loginEmail").val(),
		password = $("#dialogWindow_content .loginPassword").val();
	$.post(baseUrl + "home/ajaxLogin", {
		email: email,
		password: password
	}, function(rtn) {
		console.log(rtn);
		if (rtn !== '') {
			$("#dialogWindow_content .loginNotification").html('<b style="color:#f22;">' + rtn + '</b>');
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
	openWindow('registerWindow__inside__content');
});

$(document).on('click', '#dialogWindow_content .ToSignIn', function() {
	$("#dialogWindow_content div").remove();
	openWindow('loginWindow__inside__content');
});

$(document).on('keyup', '#registerPassword', function() {
	let password = $('#registerPassword').val();

	if (checkLen(password) && checkContent(password)) {
		$("#registerNotification").html("");
		$('#dialogWindow_content .registerSubmit').attr('disabled', false);
	}
});

$(document).on('click', '#searchRandomMarket', () => {
	$.post(baseUrl + "home/ajaxGetMarket", function(rtn) {
		let randomMarket = $('#dialogWindow_content .randomMarketWindow .randomMarket');

		randomMarket.data("market", rtn.market);
		randomMarket.find('img').attr('src', USER_IMG + rtn.user_img);
		randomMarket.find('.personal_market p:nth-child(2)').text(rtn.off_percent + '% off');
		$('.searchMarket').hide();
		$('.randomMarket').removeAttr('hidden');
	});
})

$(document).on('click', '#shareMarketInfo', () => {
	$("#dialogWindow_content div").remove();
	openWindow('shareWindow');
});

function checkLen(password) {
	let rtn = true;

	if (password.length < 8 || password.length > 16) {
		rtn = false;
		$("#registerNotification").html("密碼長度不對");
	}

	return rtn;
}

function checkContent(password) {
	let rtn = true,
		regExp = /^[\d	|a-zA-Z]+$/;

	if (!regExp.test(password)) {
		rtn = false;
		$("#registerNotification").html("密碼包含非英數字元");
	}

	return rtn;
}

function checkValue(userName, email, password, rePassword) {
	let rtn = true;

	if (userName.length == 0) {
		rtn = false;
		$("#registerNotification").html("請讓我們知道怎麼稱呼您");
	} else {
		if (email.length == 0) {
			rtn = false;
			$("#registerNotification").html("請輸入您的Email");
		} else {
			if (password.length == 0) {
				rtn = false;
				$("#registerNotification").html("請輸入密碼");
			} else {
				if (password != rePassword) {
					rtn = false;
					$("#registerNotification").html("確認密碼不符");
				}
			}
		}
	}

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
