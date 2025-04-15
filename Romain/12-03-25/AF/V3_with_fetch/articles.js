document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("Articles").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("articles.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            document.getElementById("Affichage-articles").innerHTML = data;
        })
        .catch(error => console.error("Error:", error));
    });

    // Fetch articles on page load
    fetch("articles.php", { method: "POST" })
        .then(response => response.json())
        .then(data => {
            document.getElementById("Affichage-articles").innerHTML = data;
        })
        .catch(error => console.error("Error:", error));
});
