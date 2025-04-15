document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#formRegister").addEventListener("submit", async function (event) {
        console.log("working");
        event.preventDefault();

        // Get form data
        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: form.method, // Retrieve method from the form (POST)
                body: formData, // Send the form data
                headers: {
                    "Accept": "application/json", // Expecting JSON response
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const data = await response.json(); // Parse response as JSON
            console.log(data);
            
            // Display response data
            //document.querySelector("#answer").innerHTML = JSON.stringify(data);
            document.querySelector("#answer").innerHTML = `<p> Register for:  <b>${data.message}</p>`;
            
        } catch (error) {
            console.error("Error:", error);
        }
    });
});
