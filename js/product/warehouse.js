$('#warehouse_store_checkAll').click(function() {
	let checkAll = $(this).parent().find("input[type='checkbox']");

	if (checkAll.prop('checked')) {
		$('.warehouse_store_checkProductItem').prop('checked', true);
	} else {
		$('.warehouse_store_checkProductItem').prop('checked', false);
	}
});

$('#warehouse_purchase_checkAll').click(function() {
	let checkAll = $(this).parent().find("input[type='checkbox']");

	if (checkAll.prop('checked')) {
		$('.warehouse_purchase_checkProductItem').prop('checked', true);
	} else {
		$('.warehouse_purchase_checkProductItem').prop('checked', false);
	}
});

function calcAmount() {
	const numOfItem = $('.warehouse_column .counter .counter__number');
	const	priceOfItem = $('.item_price b');
	const	numOfItemLen = numOfItem.length;
	let amount = 0;
	let num = 0;
	let price = 0;

	for (let i = 0; i < numOfItemLen; i += 1) {
		num = parseInt(numOfItem.eq(i).html(), 10);
		price = parseInt(priceOfItem.eq(i).html(), 10);
		amount += (num * price);
		if (i === (numOfItemLen - 1)) {
			$('#warehouse_item_total b').text(amount);
			break;
		}
	}
}

$('.warehouse_purchase_label').click(function() {
	$('.warehouse_purchase').css('display', 'block');
	$('.warehouse_store').css('display', 'none');

	$(this).attr('id', 'warehouse_label_selected');
	$('.warehouse_store_label').attr('id', '');
});

$('.warehouse_store_label').click(function() {
	$('.warehouse_store').css('display', 'block');
	$('.warehouse_purchase').css('display', 'none');

	$(this).attr('id', 'warehouse_label_selected');
	$('.warehouse_purchase_label').attr('id', '');
});
