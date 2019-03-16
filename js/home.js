$(document).ready(() => {

	$("#register").click(() => {
		openWindow('registerWindow__inside__content');
	});

	$("#login").click(() => {
		openWindow('loginWindow__inside__content');
	});

	$("#returnProduct").click(function() {
		openWindow('returnWindow');
	})

	$("#newProductSearch").click(function() {
		openWindow('newProductSearchWindow');
	})

	$("#close").click(() => {
		$("#dialogArea").css("display", "none");
		$("#dialogWindow_content div").remove();
		$("body").css("overflow", "auto");
	});

	$(".manage_cla_item").click(function() {
		$(".manage_cla_item").removeClass("manage_select_cal");
		$(this).addClass("manage_select_cal");
	});

	$(".item_show").click(function() {
		let windowDom = $(".productDetailInfo").clone(),
			Pidx = $(this).data("pidx");

		$.post(baseUrl + "home/ajaxGetProductInfo", {
			Pidx: Pidx
		}, function(rtn) {
			let freightOption = '';
			rtn.freight.forEach(function(element) {
				freightOption += "<option value='" + element.fee + "'>" +
					element.mode + ": " + element.fee + "</option>";
			})
			windowDom.find(".detailInfo__left__mainImg .mainImg").attr('src', baseUrl + "products/" + rtn.product.idx + "/1");
			windowDom.find(".detailInfo__left__otherImg .otherImg").each(function(index) {
				$(this).find("img").attr('src', baseUrl + "products/" + rtn.product.idx + "/" + (index + 1));
			})
			windowDom.find(".detailInfo__left__ship > p > b").append(rtn.product.to_Ship);
			windowDom.find(".detailInfo__left__ship_range > div").css("width", rtn.product.toShipPercent + "%");
			windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(1)").append(rtn.product.name);
			windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(2) > del").append(rtn.product.ori_Price);
			windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(2) > b").append(rtn.product.off_Price);
			windowDom.find(".detailInfo__productInfo__title__right > b").append(rtn.product.off_Percent);
			windowDom.find(".detailInfo__discount > b").append(rtn.product.highest_discount);
			windowDom.find(".detailInfo__feight > select").html(freightOption);
			windowDom.find(".detailInfo__wareHouse > b").append(rtn.product.storage_Cost);
			windowDom.find(".detailInfo__description").append(rtn.product.description);
			windowDom.css("display", "block");
			$("#dialogWindow_content").append(windowDom);
			$("#dialogArea").css("display", "block");
		});
	});

	$("#shoppingCar_item").click(function() {
		$(".drop_warehouse_item:not(.drop_shoppingCar_item)").hide();
		$(".drop_personalStore_item:not(.drop_shoppingCar_item)").hide();
		$(".drop_shoppingCar_item").show();

		$("#shoppingCar_submit").css("display", "block");
		$("#warehouse_submit").css("display", "none");
		$("#personalStore_submit").css("display", "none");

		$("#drop__store_shoppingCar").css("display", "block");
		$("#drop__store_warehouse").css("display", "none");
		$("#drop__store_personal").css("display", "none");
	});

	$("#warehouse_item").click(function() {
		$(".drop_shoppingCar_item:not(.drop_warehouse_item)").hide();
		$(".drop_personalStore_item:not(.drop_warehouse_item)").hide();
		$(".drop_warehouse_item").show();

		$("#shoppingCar_submit").css("display", "none");
		$("#warehouse_submit").css("display", "block");
		$("#personalStore_submit").css("display", "none");

		$("#drop__store_shoppingCar").css("display", "none");
		$("#drop__store_warehouse").css("display", "block");
		$("#drop__store_personal").css("display", "none");
	});

	$("#personalStore_item").click(function() {
		$(".drop_warehouse_item:not(.drop_personalStore_item)").hide();
		$(".drop_shoppingCar_item:not(.drop_personalStore_item)").hide();
		$(".drop_personalStore_item").show();

		$("#shoppingCar_submit").css("display", "none");
		$("#warehouse_submit").css("display", "none");
		$("#personalStore_submit").css("display", "block");

		$("#drop__store_shoppingCar").css("display", "none");
		$("#drop__store_warehouse").css("display", "none");
		$("#drop__store_personal").css("display", "block");
	});

	let claScrTop = $("#classification__container").offset().top;
	$(window).scroll(function() {
		let scrollVal = $(this).scrollTop();

		if (scrollVal > claScrTop) {
			$("#classification__container").css({
				"position": "fixed",
				"top": "50px"
			});
			$("#show_products").css({
				"margin": "0 0 0 15.3%"
			});
			$("#products_manage").css({
				"position": "fixed",
				"top": "50px",
				"right": "0px"
			});
		} else {
			$("#classification__container").css({
				"position": "static",
				"top": ""
			});
			$("#show_products").css({
				"margin": "0 auto"
			});
			$("#products_manage").css({
				"position": "static",
				"top": "",
				"right": ""
			});
		}
	});

	$(document).on('click', '.drop_item_close', function() {
		let storeProductIdx = $(this).data("storeproduct");
		$(this).parent().remove();
		$.post(baseUrl + "product/ajaxDeleteStoreProduct", {
			idx: storeProductIdx
		});
	});

	$(document).on('click', '.counter__button', function() {
		let counterNum = $(this).parent().children(".counter__number");
		let insertNum = 0;

		if ($(this).html() == "+") {
			insertNum = parseInt(counterNum.html()) + 1;
		} else {
			insertNum = parseInt(counterNum.html()) - 1;
			if (insertNum < 0) insertNum = 0;
		}

		counterNum.html(insertNum);
	});
});


$(() => {
	var $slider = $("#leftBigAD"),
		$li = $('ul li', $slider).not(':first').css('opacity', 0).end(),
		arrowWidth = 48 * -1,
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

	$arrows.click(function() {
		var $selected = $li.filter('.selected'),
			no = $selected.index();

		no = (this.className == 'prev') ? no - 1 : no + 1;
		$li.eq(no).stop().fadeTo(fadeSpeed + 100, 1, () => {
			arrowAction(no > 0 ? "block" : "none", no < $li.length - 1 ? "block" : "none");
		}).addClass('selected').siblings().fadeTo(fadeSpeed, 0).removeClass('selected');

		return false;
	}).focus(() => {
		this.blur();
	});

	function arrowAction(l, r) {
		$prev.stop().css({
			display: l
		});
		$next.stop().css({
			display: r
		});
	}

	priceUp = 40000;
	priceBottom = 0;
	$("#slider-range-one").slider({
		step: 1,
		range: true,
		min: 0,
		max: 40000,
		values: [0, 40000],
		slide: function(event, ui) {
			$("#amount-1-1").html(ui.values[0]);
			$("#amount-1-2").html(ui.values[1]);

			priceUp = ui.values[1];
			priceBottom = ui.values[0];
			showHideProducts();
		}
	});
	$("#amount-1-1").html($("#slider-range-one").slider("values", 0));
	$("#amount-1-2").html($("#slider-range-one").slider("values", 1));

	offUp = 60;
	offBottom = 0;
	$("#slider-range-two").slider({
		step: 1,
		range: true,
		min: 0,
		max: 60,
		values: [0, 60],
		slide: function(event, ui) {
			$("#amount-2-1").html(ui.values[0] + "%");
			$("#amount-2-2").html(ui.values[1] + "%");

			offUp = ui.values[1];
			offBottom = ui.values[0];
			showHideProducts();
		}
	});
	$("#amount-2-1").html($("#slider-range-two").slider("values", 0) + "%");
	$("#amount-2-2").html($("#slider-range-two").slider("values", 1) + "%");

	toShipUp = 120;
	toShipBottom = 1;
	$("#slider-range-three").slider({
		step: 1,
		range: true,
		min: 1,
		max: 120,
		values: [1, 120],
		slide: function(event, ui) {
			$("#amount-3-1").html(ui.values[0]);
			$("#amount-3-2").html(ui.values[1]);

			toShipUp = ui.values[1];
			toShipBottom = ui.values[0];
			showHideProducts();
		}
	});
	$("#amount-3-1").html($("#slider-range-three").slider("values", 0));
	$("#amount-3-2").html($("#slider-range-three").slider("values", 1));
});

function AllowDrop(event) {
	event.preventDefault();
}

function Drag(productId) {
	pid = productId;
}

function Drop() {
	if (checkLogin()) {
		let storeType = $(".manage_select_cal").data("item"),
				dropItem;

		if (storeType == 1) {
			dropItem = $("#drop__store_shoppingCar .drop_item:first-child").clone();
		} else if (storeType == 2) {
			dropItem = $("#drop__store_warehouse .drop_item:first-child").clone();
		} else if (storeType == 3) {
			dropItem = $("#drop__store_personal .drop_item:first-child").clone();
		}

		$.post(baseUrl + "home/ajaxGetDropProduct", {
			Pidx: pid,
			Uidx: uid,
			type: storeType
		}, function(rtn) {
			if (storeType == 1) {
				dropItem.find(".drop_item_close").data('storeproduct', rtn.product.storeProductId);
				dropItem.find("img").attr('src', baseUrl + "products/" + rtn.product.idx + "/1"	);
				dropItem.find(".drop_item_info > p:first-child").html(rtn.product.name);
				dropItem.find(".drop_item_info .drop_item_highligh del").html(rtn.product.ori_Price);
				dropItem.find(".drop_item_info .drop_item_highligh b").html(rtn.product.off_Price);
				dropItem.find(".drop_item_info .drop_item_number .counter>.counter__number").html(rtn.product.number);
				dropItem.attr('style', 'display:block;');
				$("#drop__store_shoppingCar").append(dropItem);
			} else if (storeType == 2) {
				dropItem.find(".drop_item_close").data('storeproduct', rtn.product.storeProductId);
				dropItem.find("img").attr('src', baseUrl + "products/" + rtn.product.idx + "/1"	);
				dropItem.find(".drop_item_info > p:first-child").html(rtn.product.name);
				dropItem.find(".drop_item_info .drop_warehouse_storeCost b").html(rtn.product.storage_Cost);
				dropItem.find(".drop_item_info .drop_item_number .counter>.counter__number").html(rtn.product.number);
				dropItem.attr('style', 'display:block;');
				$("#drop__store_warehouse").append(dropItem);
			} else if (storeType == 3) {
				dropItem.find(".drop_item_close").data('storeproduct', rtn.product.storeProductId);
				dropItem.find("img").attr('src', baseUrl + "products/" + rtn.product.idx + "/1"	);
				dropItem.find(".drop_item_info > p:first-child").html(rtn.product.name);
				dropItem.find(".drop_item_info .drop_personalStore_item b:first-child").html(rtn.product.ori_Price);
				dropItem.find(".drop_item_info .drop_personalStore_item b:nth-child(2)").html('');
				dropItem.find(".drop_item_info .drop_personalStore_offPercent b").html(rtn.product.off_Percent);
				dropItem.attr('style', 'display:block;');
				$("#drop__store_personal").append(dropItem);
			}
		});
	} else {
		alert("請先登入");
	}
}

function checkLogin() {
	return (uid == "") ? false : true;
}

function showHideProducts() {
	$(".item_show").each(function(idx, el) {
		let price = $(el).find(".item_price b").html(),
			off = $(el).find(".item_off").html(),
			toShip = $(el).find(".item_toShip").html();

		if ((price <= priceUp && price >= priceBottom) &&
			(off <= offUp && off >= offBottom) &&
			(toShip <= toShipUp && toShip >= toShipBottom)) {

			$(el).show();
		} else {
			$(el).hide();
		}
	})
}

function openWindow(winName) {
	let windowDom = $("." + winName).clone();
	windowDom.css("display", "block");
	$("#dialogWindow_content").append(windowDom);
	$("#dialogArea").css("display", "block");
}
