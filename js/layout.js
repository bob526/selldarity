$(document).ready(() => {

  $("#tri_point").click(() => {
    $("#overall").css("display", "block");
  });

  $("#overall").click(() => {
      $("#overall").css("display", "none");
  });

  $("#signOut").click(() => {
    window.location.href = baseUrl+"user/signout";
  });

  $("#userName").click(() => {
    window.location.href = baseUrl+"user/userInfo";
  });
});
