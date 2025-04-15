$(document).ready(function () {
    $("#array_form").submit(function (event) {
      // On desactive les comportements par defaut
        event.preventDefault();
        $.ajax({
          // $(this) est le formulaire #login_form
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            dataType: "json", // Expect JSON response
        }).done(function (data) {
            let dataProcessed = "Hello " + data.user + " this is the result of your:<table><tr><th>Index</th><th>Fruits</th></tr>";
            for (let i = 0; i < data.fruits.length; i++) {
                dataProcessed += "<tr><td>" + (i + 1) + "</td><td>" + data.fruits[i] + "</td></tr>";
            }
            dataProcessed += "</table>";
            $("#result").html(dataProcessed);
        });
    });
  });