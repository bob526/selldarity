$(document).ready(() => {
  $("#logout").click(() => {
    window.location.href = baseUrl+"Authority/logout";
  });

  $("#userName").click(() => {
    window.location.href = baseUrl+"user/userInfo/1";
  });

	$("#close").click(() => {
		$("#dialogArea").css("display", "none");
		$("#dialogWindow_content div").remove();
		$("body").css("overflow", "auto");
	});
});
