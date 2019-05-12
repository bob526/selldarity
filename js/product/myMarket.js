$("#myMarket_checkAll").click(function() {
	let checkAll = $(this).parent().find("input[type='checkbox']");

	if (checkAll.prop("checked")) {
		$(".myMarket_checkProductItem").prop("checked", true);
	} else {
		$(".myMarket_checkProductItem").prop("checked", false);
	}
});

$('.myMarket_manage_label').click(function() {
	$('.myMarket_manage').css('display', 'block');
	$('.myMarket_state').css('display', 'none');

	$(this).attr('id', 'myMarket_label_selected');
	$('.myMarket_state_label').attr('id', '');
});

$(".myMarket_state_label").click(function() {
	$(".myMarket_state").css('display', 'block');
	$(".myMarket_manage").css('display', 'none');

	$(this).attr("id", "myMarket_label_selected");
	$(".myMarket_manage_label").attr("id", "");
});
