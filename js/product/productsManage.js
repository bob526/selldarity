$('.checkmark').click(function() {
	let checkBox = $(this).parent().find("input[type='checkbox']");

	if (checkBox.prop('checked')) {
		checkBox.prop('checked', false);
	} else {
		checkBox.prop('checked', true);
	}
});

$(".delete_item").click(function() {
	let storeProductIdx = $(this).data("storeproduct");
	$(this).parent().remove();
	$.post(bridge.baseUrl + "product/ajaxDeleteStoreProduct", {
		idx: storeProductIdx
	}, calcAmount());
});

$(document).on('click', '.counter__button', function counter() {
	const counterNum = $(this).parent().children('.counter__number');
	const price = $(this).parent().parent().parent().find('.item_price b').html();
	let itemTotal = $(this).parent().parent().parent().find(".item_total b");
	let insertNum = 0;

	if ($(this).html() == "+") {
		insertNum = parseInt(counterNum.html()) + 1;
	} else {
		insertNum = parseInt(counterNum.html()) - 1;
		if (insertNum < 0) insertNum = 0;
	}

	$(this).parent().parent().parent().find('.item_total b').html(insertNum * price);
  counterNum.html(insertNum)
  .promise()
  .done(calcAmount());
});

$(".item_show").click(function() {
	let windowDom = $(".productDetailInfo").clone();
	let parentNode = $(this).parent();
	let Pidx = parentNode.data("pid");

	windowDom.find(".detailInfo__left__mainImg .mainImg").attr('src', bridge.PRODUCT_IMG + Pidx + "/1");
	windowDom.find(".detailInfo__left__otherImg .otherImg").each(function(index) {
		$(this).find("img").attr('src', bridge.PRODUCT_IMG + Pidx + "/" + (index + 1));
	});
	windowDom.find(".detailInfo__left__ship > p > b").append(parentNode.find(".otherInfo .item_toShip").html());
	windowDom.find(".detailInfo__left__ship_range > div").css("width", parseInt(parentNode.find(".otherInfo .item_toShipPencent").html(), 10) + "%");
	windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(1)").append(parentNode.find(".item_name").html());
	windowDom.find(".detailInfo__discount > b").append(parentNode.find(".otherInfo .item_highestDiscount").html());
	windowDom.find(".prodcut_manage_detailInfo_description").append(parentNode.find(".otherInfo .item_description").html());
	if (bridge.uid !== "") {
		windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(2) > del").append(parentNode.find(".otherInfo .item_oriPrice").html());
		windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(2) > b").append(parentNode.find(".otherInfo .item_offPrice").html());
		windowDom.find(".detailInfo__productInfo__title__right > b").append(parentNode.find(".otherInfo .item_off").html());
	} else {
		windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(2) > b").append(parentNode.find(".otherInfo .item_oriPrice").html());
	}
	windowDom.css("display", "block");
	$("#dialogWindow_content").append(windowDom);
	$("#dialogArea").css("display", "block");
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
