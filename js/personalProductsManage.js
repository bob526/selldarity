$(document).ready(() => {
  $(".warehouse_type").hide();
  $(".warehouse_purchase").hide();
  $(".personal_sale_type").hide();
  $(".personal_sale_state").hide();

  $(".product_type").click(function() {
    $(".product_type").removeClass("product_type_focus");
    $(this).addClass("product_type_focus");
  });

  $(".checkmark").click(function() {
    let checkBox = $(this).parent().find("input[type='checkbox']");

    if (checkBox.prop('checked')) {
      checkBox.prop('checked', false);
    } else {
      checkBox.prop('checked', true);
    }  
  });

  $("#shoppingCar_checkAll").click(function() {
    let checkAll = $(this).parent().find("input[type='checkbox']");

    if (checkAll.prop("checked")) {
      $(".shoppingCar_checkProductItem").prop("checked", true);
    } else {
      $(".shoppingCar_checkProductItem").prop("checked", false);
    }
  });

  $("#warehouse_store_checkAll").click(function() {
    let checkAll = $(this).parent().find("input[type='checkbox']");

    if (checkAll.prop("checked")) {
      $(".warehouse_store_checkProductItem").prop("checked", true);
    } else {
      $(".warehouse_store_checkProductItem").prop("checked", false);
    }
  });

  $("#warehouse_purchase_checkAll").click(function() {
    let checkAll = $(this).parent().find("input[type='checkbox']");

    if (checkAll.prop("checked")) {
      $(".warehouse_purchase_checkProductItem").prop("checked", true);
    } else {
      $(".warehouse_purchase_checkProductItem").prop("checked", false);
    }
  });

  $(".delete_item").click(function() {
    let storeProductIdx = $(this).data("storeproduct");
    $(this).parent().remove();
    $.post(baseUrl+"product/ajaxDeleteStoreProduct", {idx: storeProductIdx});
  });

  $(".counter__button").click(function() {
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

  $("#shoppingCar_type").click(function() {
    $(".shoppingCar_type").show();
    $(".warehouse_type").hide();
    $(".personal_sale_type").hide();
  });


  $("#warehouse_type").click(function() {
    $(".warehouse_type").show();
    $(".shoppingCar_type").hide();
    $(".personal_sale_type").hide();
  });

  $("#personal_sale_type").click(function() {
    $(".personal_sale_type").show();
    $(".shoppingCar_type").hide();
    $(".warehouse_type").hide();
  });

  $(".warehouse_purchase_label").click(function() {
    $(".warehouse_purchase").show();
    $(".warehouse_store").hide();

    $(this).attr("id", "warehouse_label_selected");
    $(".warehouse_store_label").attr("id", "");
  });

  $(".warehouse_store_label").click(function() {
    $(".warehouse_store").show();
    $(".warehouse_purchase").hide();

    $(this).attr("id", "warehouse_label_selected");
    $(".warehouse_purchase_label").attr("id", "");
  });

  $(".personal_sale_manage_label").click(function() {
    $(".personal_sale_manage").show();
    $(".personal_sale_state").hide();

    $(this).attr("id", "personal_sale_label_selected");
    $(".personal_sale_state_label").attr("id", "");
  });

  $(".personal_sale_state_label").click(function() {
    $(".personal_sale_state").show();
    $(".personal_sale_manage").hide();

    $(this).attr("id", "personal_sale_label_selected");
    $(".personal_sale_manage_label").attr("id", "");
  });
});
