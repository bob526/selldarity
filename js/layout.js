$(document).ready(() => {

  $("#tri_point").click(() => {
    $("#overall").css("display", "block");
  });

  $("#overall").click(() => {
      $("#overall").css("display", "none");
  });

  $("#logout").click(() => {
    window.location.href = baseUrl+"Authority/logout";
  });

  $("#userName").click(() => {
    window.location.href = baseUrl+"user/userInfo/1";
  });
});
