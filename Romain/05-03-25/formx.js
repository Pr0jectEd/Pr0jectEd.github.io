$(document).ready(function () {
  $("#array_form").submit(function (event) {
    // On desactive les comportements par defaut
    event.preventDefault();
    $.ajax({
      // $(this) est le formulaire #login_form
      type: $(this).attr("method"),
      url: $(this).attr("action"),
      data: $(this).serialize(),
    }).done(function (data) {
      $("#result").html(data); // innerhtml de la div
    });
  });
});
