$(document).ready(function () {
  $("#loginForm").submit(function (evt) {
    evt.preventDefault();

    if ($(this).form("is valid")) {
      var data = new FormData();

      data.append("email", $("#email").val());
      data.append("password", $("#password").val());

      var xhr = new XMLHttpRequest();

      xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
          response = JSON.parse(this.responseText);

          if (response.status != 200) {
            alert("Tratar e informar erro");
            return;
          }

          localStorage.setItem("jwt", response.jwt);

          window.location = '/task';
        }
      });

      xhr.open("POST", "source/controller/auth/login");

      xhr.send(data);
    }
  });
});
