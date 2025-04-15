$(document).ready(function () {
  $("#array_form").submit(function (event) {
    // On desactive les comportements par defaut
    event.preventDefault();
    $.ajax({
      // $(this) est le formulaire #login_form
      type: $(this).attr("method"),
      url: $(this).attr("action"),
      data: $(this).serialize(),
      //dataType:"json",
    }).done(function (data) {
      /*
      let html = "Hello " + data.user + " this is the createTable3 function:<table><tr><th>Index</th><th>Fruits</th></tr>";
          for (let i = 0; i < data.fruits.length; i++) {
              html += "<tr><td>" + (i + 1) + "</td><td>" + data.fruits[i] + "</td></tr>";
          }
          html += "</table>"; */
      $("#result").html(data,console.log(data)); // innerhtml de la div
    });
  });
});
