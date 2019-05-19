$(document).ready(() => {
	const originWindowInfo = {
		layoutHeigh: $('header').height(),
		claScrTop: $('#classification__container').offset().top - $('header').height(),
		showProductLeft: $('#show_products').offset().left - 10,
	};

	$(window).scroll(function() {
		if (window.pageYOffset > originWindowInfo.claScrTop) {
			$('#classification__container').css({
				position: 'fixed',
				top: originWindowInfo.layoutHeigh + 'px'
			});
			$('#show_products').css({
				'margin-left': `${originWindowInfo.showProductLeft}px`
			});
			$('#products_manage').css({
				position: 'fixed',
				top: originWindowInfo.layoutHeigh + 'px',
				right: '10px'
			});
		} else {
			$('#classification__container').css({
				position: 'relative',
				top: ''
			});
			$('#show_products').css({
				margin: '0px auto'
			});
			$('#products_manage').css({
				position: 'relative',
				top: '',
				right: ''
			});
		}
	});

	(function resizeHeight(classification, productsManage) {
		const stickyArea = document.body.clientHeight - originWindowInfo.layoutHeigh
		const productsManageStickArea = stickyArea -
			productsManage.find('#directToPersonalProduct').height() -
			productsManage.find('.manage_title_gap').height() -
			productsManage.find('.manage_cla').height() -
			productsManage.find('#shoppingCar_submit').height();

		classification.css({
			height: `${stickyArea}px`
		});
		productsManage.css({
			height: `${stickyArea}px`
		});
		productsManage.find('#manage_drop').css({
			height: `${productsManageStickArea}px`
		});
		productsManage.find('.drop__store').css({
			height: `${productsManageStickArea - 20}px`
		});
	})($('#classification__container'), $('#products_manage'));

	setTimeout(() => {
		$('.showRandomMarketWindow').trigger('click');
	}, 5000);
});

$('#register').click(() => {
	openWindow('registerWindow__inside__content');
});

$('#login').click(() => {
	openWindow('loginWindow__inside__content');
});

$('#returnProduct').click(function() {
	openWindow('returnWindow');
})

$('#newProductSearch').click(function() {
	openWindow('newProductSearchWindow');
})

$('.manage_cla_item').click(function() {
	$('.manage_cla_item').removeClass('manage_select_cal');
	$(this).addClass('manage_select_cal');
});

$('.item_show').click(function() {
	let thisNode = $(this);
	const windowDom = $('.productDetailInfo').clone();
	const Pidx = thisNode.data('pidx');

	windowDom.data('pidx', Pidx);
	windowDom.find('.detailInfo__left__mainImg .mainImg').attr('src', PRODUCT_IMG + Pidx + "/1");
	windowDom.find(".detailInfo__left__otherImg .otherImg").each((index, element) => {
		$(element).find("img").attr('src', PRODUCT_IMG + Pidx + "/" + (index + 1));
	});
	windowDom.find(".detailInfo__left__ship > p > b").append(thisNode.find(".item_toShip").html());
	windowDom.find(".detailInfo__left__ship_range > div").css("width", thisNode.find(".ship_range div").width() + "%");
	windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(1)").append(thisNode.find(".item_name").html());
	windowDom.find(".detailInfo__discount > b").append(thisNode.find(".otherInfo .item_highestDiscount").html());
	windowDom.find(".detailInfo__wareHouse > b").append(thisNode.find(".otherInfo .item_storageCost").html());
	windowDom.find(".detailInfo__description").append(thisNode.find(".otherInfo .item_description").html());
	if (uid !== "") {
		windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(2) > del").append(thisNode.find(".item_price del").html());
		windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(2) > b").append(thisNode.find(".item_price b").html());
		windowDom.find(".detailInfo__productInfo__title__right > b").append(thisNode.find(".item_off").html());
	} else {
		windowDom.find(".detailInfo__productInfo__title__left > p:nth-child(2) > b").append(thisNode.find(".item_price b").html());
	}
	windowDom.css("display", "block");
	$("#dialogWindow_content").append(windowDom);
	$("#dialogArea").css("display", "block");
});

$("#shoppingCar_item").click(() => {
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

$("#warehouse_item").click(() => {
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

$("#personalStore_item").click(() => {
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

	if ($(this).html() === '+') {
		insertNum = parseInt(counterNum.html()) + 1;
	} else {
		insertNum = parseInt(counterNum.html()) - 1;
		if (insertNum < 0) insertNum = 0;
	}

	counterNum.html(insertNum);
});

$(document).on('click', '#directToPersonalProduct', () => {
	saveStoreProducts().then(() => {
		window.location = baseUrl + "product/shoppingCar";
	})
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

$(document).on('click', '.showRandomMarketWindow', () => {
	$('.showRandomMarketWindow').remove();
	//$('#dialogWindow__inside #close').unbind();
	openWindow('randomMarketWindow');
});

function setDropItem(category_id, product) {
	return new Promise((resolve) => {
		let droppedItem = $("." + $(".manage_select_cal").data("store_area") + " .drop_item");
		let dragItemExisted = false;
		let dropItem = null;
		const dropItemId = "dropItem_" + product.idx;
		const droppedItemLen = droppedItem.length;

		for (let i = 0; i < droppedItemLen; i += 1) {
			if (droppedItem.eq(i).attr('id') === dropItemId) {
				dragItemExisted = true;
			}
		}

		if (dragItemExisted) return;

		let getDropItem = (dropItem, product, storeProductId) => {
			dropItem.removeClass('drop_item_format');
			dropItem.addClass('drop_item');
			dropItem.find('.drop_item_close').data('storeproduct', storeProductId);
			dropItem.find('.drop_item').data('productid', product.idx);
			dropItem.find("img").attr('src', PRODUCT_IMG + product.idx + "/1");
			dropItem.find(".drop_item_info > p:first-child").html(product.name);
			return dropItem;
		}

		$.post(baseUrl + "home/ajaxStoreProduct", {
			pid: product.idx,
			distinct_id: distinctId,
			category_id: category_id
		}, function(storeProductId) {
			switch (category_id) {
				case 1:
					dropItem = getDropItem($("#drop__store_shoppingCar .drop_item_format").clone(), product, storeProductId);
					dropItem.find(".drop_item_info .drop_item_number .counter>.counter__number").html(1);
					dropItem.attr('style', 'display:block;');
					dropItem.attr('id', dropItemId);
					if (uid !== "") {
						dropItem.find(".drop_item_info .drop_item_highligh del").html(product.ori_price);
						dropItem.find(".drop_item_info .drop_item_highligh b").html(product.off_price);
					} else {
						dropItem.find(".drop_item_info .drop_item_highligh").append(product.ori_price);
					}
					$("#drop__store_shoppingCar").append(dropItem);
					resolve(true);
					break;
				case 2:
					dropItem = getDropItem($("#drop__store_warehouse .drop_item_format").clone(), product, storeProductId);
					dropItem.find(".drop_item_info .drop_warehouse_storeCost b").html(product.storage_cost);
					dropItem.find(".drop_item_info .drop_item_number .counter>.counter__number").html(1);
					dropItem.attr('style', 'display:block;');
					dropItem.attr('id', dropItemId);
					$("#drop__store_warehouse").append(dropItem);
					resolve(true);
					break;
				case 3:
					dropItem = getDropItem($("#drop__store_personal .drop_item_format").clone(), product, storeProductId);
					dropItem.find(".drop_item_info .drop_personalStore_oriPrice b").html(product.ori_price);
					dropItem.attr('style', 'display:block;');
					dropItem.attr('id', dropItemId);
					$("#drop__store_personal").append(dropItem);
					resolve(true);
					break;
				default:
					resolve(true);
					break;
			}
		});
	});
}
function AllowDrop(event) {
	event.preventDefault();
}

function Drag(event, productId) {
	event.dataTransfer.setData('id', productId);
}

function Drop(event) {
	const dragItem = $("#product_" + event.dataTransfer.getData('id'));
	const category_id = parseInt($(".manage_select_cal").data("item"), 10);
	let product = {
		idx: dragItem.data("pidx"),
		toShip: dragItem.find(".item_toShip").html(),
		name: dragItem.find(".item_name").html(),
		storage_cost: dragItem.find(".otherInfo .item_storageCost").html(),
	};

	if (uid !== "") {
		product.ori_price = dragItem.find(".item_price del").html();
		product.off_price = dragItem.find(".item_price b").html();
	} else {
		product.ori_price = dragItem.find(".item_price b").html();
	}

	setDropItem(category_id, product);
}

function dragToStore(category_id) {
	const detailProduct = $('#dialogWindow_content .productDetailInfo');
	const product = {
		idx: detailProduct.data('pidx'),
		toShip: detailProduct.find('.detailInfo__left__ship > p > b').html(),
		name: detailProduct.find('.detailInfo__productInfo__title__left > p:nth-child(1)').html(),
		storage_cost: detailProduct.find('.detailInfo__wareHouse > b').html(),
	}

	if (uid !== "") {
		product.ori_price = detailProduct.find('.detailInfo__productInfo__title__left > p:nth-child(2) > del').html();
		product.off_price = detailProduct.find('.detailInfo__productInfo__title__left > p:nth-child(2) > b').html();
	} else {
		product.ori_price = detailProduct.find('.detailInfo__productInfo__title__left > p:nth-child(2) > b').html();
	}

	setDropItem(category_id, product)
		.then(() => {
				$('#dialogWindow__inside #close').trigger('click');
		});
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

function saveStoreProducts() {
	return new Promise((resolve) => {
		let items = $('#manage_drop .drop_item');
		let data = [];
		const itemsLen = items.length;

		if (itemsLen === 0) {
			resolve(true);
			return;
		}

		for (let i = 0; i < itemsLen; i += 1) {
			data.push({
				'idx': items.eq(i).find('.drop_item_close').data('storeproduct'),
				'number': items.eq(i).find('.counter__number').html()
			});
			if (data.length == itemsLen) {
				$.post(baseUrl + "home/ajaxSetStoreProductNum", {
					data: JSON.stringify(data)
				}, function(rtn) {
					resolve(true);
				});
			}
		}
	});
}
