$(document).ready(() => {
  $("#logout").click(() => {
    window.location.href = baseUrl+"Authority/logout";
  });

  $("#userName").click(() => {
    window.location.href = baseUrl+"user/userInfo/1";
  });
});
