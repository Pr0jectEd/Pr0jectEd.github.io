$(document).ready(function () {
    $("#Articles").on("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "articles.php",
            type: "POST",
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting content-type
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#Affichage-articles").html(data);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });

    // Fetch articles on page load
    $.ajax({
        url: "articles.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
            $("#Affichage-articles").html(data);
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        }
    });
});
