$(document).ready(function () {
    $("#array_form").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            dataType: "json",
        }).done(function (data) {
            $("#result").empty(); // Clear previous results

            let resultDiv = $("#result");
            let helloMessage = $("<p>").text("Hello " + data.user + " this is the result of your Table:");
            resultDiv.append(helloMessage);

            let table = $("<table>");
            let headerRow = $("<tr>");
            headerRow.append($("<th>").text("Index"));
            headerRow.append($("<th>").text("Fruits"));
            table.append(headerRow);

            for (let i = 0; i < data.fruits.length; i++) {
                let row = $("<tr>");
                row.append($("<td>").text(i + 1));
                row.append($("<td>").text(data.fruits[i]));
                table.append(row);
            }
            resultDiv.append(table);
        });
    });
});