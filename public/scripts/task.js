$(document).ready(function () {
  search();

  $("#search").click(function (evt) {
    evt.preventDefault();
    search();
  });
});

function search() {
  var xhr = new XMLHttpRequest();

  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
      response = JSON.parse(this.responseText);

      if (response.status != 200) {
        alert("Tratar e informar erro");
        return;
      }

      $("#tasks").empty();

      $.each(response.data, function (i, task) {
        let cardTask = `
        <div class="card">
            <div class="content">
                <div class="header">Veronika Ossi</div>
                <div class="description">
                    ${task.description}
                </div>
            </div>
            <div class="ui bottom attached button">
                <i class="add icon"></i>
                Add Friend
            </div>
        </div>`;

        setTimeout(function () {
          $("#tasks").append(cardTask);
        }, i * 50);
      });
    }
  });

  const urlParams = {
    date: "2021-05-13",
  };

  xhr.open(
    "GET",
    `source/controller/task/index?${new URLSearchParams(urlParams).toString()}`
  );

  xhr.setRequestHeader(
    "Authorization",
    `Bearer ${localStorage.getItem("jwt")}`
  );

  xhr.send();
}
