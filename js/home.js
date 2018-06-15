$(document).ready(() => {

  $("#register").click(() => {
    $.post(baseUrl+"home/ajaxGetRegisterWindow", function(rtn) {
      $("#dialogWindow__inside").append(rtn); 
      $("#dialogArea").css("display", "block");
    });
  });

  $("#signIn").click(() => {
    $.post(baseUrl+"home/ajaxGetSignInWindow", function(rtn) {
      $("#dialogWindow__inside").append(rtn); 
      $("#dialogArea").css("display", "block");
    });
  });

  $("#close").click(() => {
    $("#dialogArea").css("display", "none");
    $("#dialogWindow__inside div").remove();
    $("body").css("overflow", "auto");
  });

  $(".classification__list ul li").click(function() {
    $(".classification__list ul li").removeClass("select"); 
    $(this).addClass("select");
  });

  $(".manage_cla_item").click(function() {
    $(".manage_cla_item").removeClass("manage_select_cal"); 
    $(this).addClass("manage_select_cal");
  });

  $(".item_show").click(function() {
    let Pidx = $(this).data("pidx");
    $.post(baseUrl+"home/ajaxGetProductInfo", {Pidx: Pidx}, function(rtn) {
      $("#dialogWindow__inside").append(rtn); 
      $("#dialogArea").css("display", "block");
      $("body").css("overflow", "hidden");
    });
  });

  $("#shoppingCar_item").click(function() {
    $(".drop_warehouse_item:not(.drop_shoppingCar_item)").hide();
    $(".drop_personalStore_item:not(.drop_shoppingCar_item)").hide();
    $(".drop_shoppingCar_item").show();

    $("#shoppingCar_submit").css("display", "block");
    $("#warehouse_submit").css("display", "none");
    $("#personalStore_submit").css("display", "none");
  });

  $("#warehouse_item").click(function() {
    $(".drop_shoppingCar_item:not(.drop_warehouse_item)").hide();
    $(".drop_personalStore_item:not(.drop_warehouse_item)").hide();
    $(".drop_warehouse_item").show();

    $("#shoppingCar_submit").css("display", "none");
    $("#warehouse_submit").css("display", "block");
    $("#personalStore_submit").css("display", "none");
  });

  $("#personalStore_item").click(function() {
    $(".drop_warehouse_item:not(.drop_personalStore_item)").hide();
    $(".drop_shoppingCar_item:not(.drop_personalStore_item)").hide();
    $(".drop_personalStore_item").show();

    $("#shoppingCar_submit").css("display", "none");
    $("#warehouse_submit").css("display", "none");
    $("#personalStore_submit").css("display", "block");
  });

  let claScrTop = $("#classification__container").offset().top;
  $(window).scroll(function() {
    let scrollVal = $(this).scrollTop();

    if (scrollVal > claScrTop) {
      $("#classification__container").css({"position": "fixed", "top": "65px"});
      $("#show_products").css({"margin": "0 0 0 15.3%"});
      $("#products_manage").css({"position": "fixed", "top": "65px", "right": "0px"});
    } else {
      $("#classification__container").css({"position": "static", "top": ""});
      $("#show_products").css({"margin": "0 auto"});
      $("#products_manage").css({"position": "static", "top": "", "right": ""});
    }
  });
});


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
    var $selected = $li.filter('.selected'),no = $selected.index();

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
  
  priceUp = 40000;
  priceBottom = 0;
  $( "#slider-range-one" ).slider({
    step: 1,
    range: true,
    min: 0,
    max: 40000,
    values: [ 0, 40000 ],
    slide: function( event, ui ) {
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
  $( "#slider-range-two" ).slider({
    step: 1,
    range: true,
    min: 0,
    max: 60,
    values: [ 0, 60 ],
    slide: function( event, ui ) {
      $("#amount-2-1").html(ui.values[0]+"%");
      $("#amount-2-2").html(ui.values[1]+"%");
      
      offUp = ui.values[1];
      offBottom = ui.values[0];
      showHideProducts();
    }
  });
  $("#amount-2-1").html($("#slider-range-two").slider("values", 0)+"%");
  $("#amount-2-2").html($("#slider-range-two").slider("values", 1)+"%");

  toShipUp = 120;
  toShipBottom = 1;
  $( "#slider-range-three" ).slider({
    step: 1,
    range: true,
    min: 1,
    max: 120,
    values: [ 1, 120 ],
    slide: function( event, ui ) {
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
  if (checkSignIn()) {
    $.post(baseUrl+"home/ajaxGetDropProduct", {Pidx: pid, Uidx: uid}, function(rtn) {
      let selected = $(".manage_select_cal").attr('id');

      $("#drop__store").append(rtn); 
      if (selected == "shoppingCar_item") {
        $(".drop_warehouse_item:not(.drop_shoppingCar_item)").hide();
        $(".drop_personalStore_item:not(.drop_shoppingCar_item)").hide();
        $(".drop_shoppingCar_item").show();

        $("#shoppingCar_submit").css("display", "block");
        $("#warehouse_submit").css("display", "none");
        $("#personalStore_submit").css("display", "none");
      } else if (selected == "warehouse_item") {
        $(".drop_shoppingCar_item:not(.drop_warehouse_item)").hide();
        $(".drop_personalStore_item:not(.drop_warehouse_item)").hide();
        $(".drop_warehouse_item").show();

        $("#shoppingCar_submit").css("display", "none");
        $("#warehouse_submit").css("display", "block");
        $("#personalStore_submit").css("display", "none");
      } else if (selected == "personalStore_item") {
        $(".drop_warehouse_item:not(.drop_personalStore_item)").hide();
        $(".drop_shoppingCar_item:not(.drop_personalStore_item)").hide();
        $(".drop_personalStore_item").show();

        $("#shoppingCar_submit").css("display", "none");
        $("#warehouse_submit").css("display", "none");
        $("#personalStore_submit").css("display", "block");
      }
    });
  }
}

function checkSignIn() {
  let rtn = false;

  if (uid == "") {
    alert("請先登入");
  } else {
    rtn = true;
  }

  return rtn;
}

function showHideProducts() {
  $(".item_show").each(function(idx, el) {
    let price = $(el).find(".item_price b").html();
    let off = $(el).find(".item_off").html();
    let toShip = $(el).find(".item_toShip").html();

    if ((price <= priceUp && price >= priceBottom) && 
      (off <= offUp && off >= offBottom) && 
      (toShip <= toShipUp && toShip >= toShipBottom)) {
      
      $(el).show();
    } else {
      $(el).hide();
    }
  })
}
