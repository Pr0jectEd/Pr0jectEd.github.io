$(document).ready(function () {
    $("#translation-form").submit(function (event) {
        console.log("its working");
      // On desactive les comportements par defaut
      event.preventDefault();
      $.ajax({
        // $(this) est le formulaire #login_form
        type: $(this).attr("method"),
        url: $(this).attr("action"),
        data: $(this).serialize(),
      }).done(function (data) {
        $("#example").html(data); // innerhtml de la div
      });
    });
  });
  