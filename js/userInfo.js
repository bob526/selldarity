$(document).ready(function() {
  //$(".bank_info").hide();
  $(".receiptAddr").hide();
  $(".pwChange").hide();

  $(".userInfo_type").each(function() {
    if ($(this).attr("href") == location.href) {
      $(this).addClass('userInfo_type_focus'); 
      return false;
    }
  });

  $("#user_data").click(function() {
    $(".user_data").show();
    //$(".bank_info").hide();
    $(".receiptAddr").hide();
    $(".pwChange").hide();
  });

  /*$("#bank_info").click(function() {
    $(".user_data").hide();
    $(".bank_info").show();
    $(".receiptAddr").hide();
    $(".pwChange").hide();
  });*/
  
  $("#receiptAddr").click(function() {
    $(".user_data").hide();
    //$(".bank_info").hide();
    $(".receiptAddr").show();
    $(".pwChange").hide();
  });

  $("#pwChange").click(function() {
    $(".user_data").hide();
    //$(".bank_info").hide();
    $(".receiptAddr").hide();
    $(".pwChange").show();
  });

  $(".user_account_menu div").click(function() {
    $(".user_account_menu div").removeClass("user_account_menu_focus"); 
    $(this).addClass("user_account_menu_focus"); 
  });

});
