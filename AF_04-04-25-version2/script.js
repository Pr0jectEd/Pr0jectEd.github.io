// script.js
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#formRegister");

    form.addEventListener("submit", async function (event) {
        event.preventDefault(); // Stop default form submission

        const formData = new FormData(form); // Gather form data

        try {
            const response = await fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    "Accept": "application/json"
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const result = await response.json(); // Parse JSON

            // Show message in #answer
            const answerDiv = document.querySelector("#answer");

            if (result.success) {
                answerDiv.innerHTML = `<p style="color: green;"><b>Success de L'enregistrement du client:${result.message}</b></p>`;
                form.reset(); // Optional: Clear the form
            } else {
                answerDiv.innerHTML = `<p style="color: red;"><b>${result.message || result.error}</b></p>`;
            }

        } catch (error) {
            console.error("Erreur:", error);
            document.querySelector("#answer").innerHTML = `<p style="color: red;"><b>Une erreur s'est produite: ${error.message}</b></p>`;
        }
    });
});
