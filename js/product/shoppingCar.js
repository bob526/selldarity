$("#shoppingCar_checkAll").click(function() {
	let checkAll = $(this).parent().find("input[type='checkbox']");

	if (checkAll.prop("checked")) {
		$(".shoppingCar_checkProductItem").prop("checked", true);
	} else {
		$(".shoppingCar_checkProductItem").prop("checked", false);
	}
});

function calcAmount() {
	const allItemTotal = $('.item_total b');
	const	itemFrieght = parseInt($('#shoppingCar_item_freight b').html(), 10);
	const numOfItem = allItemTotal.length;
	let amount = 0;

	for (let i = 0; i < numOfItem; i += 1) {
		amount += parseInt(allItemTotal.eq(i).html(), 10);
		if (i === (numOfItem - 1)) {
			$('#shoppingCar_item_total b').text(amount);
			$('#shoppingCar_item_amount b').text(amount === 0 ? amount : amount + itemFrieght);
			break;
		}
	}
}
