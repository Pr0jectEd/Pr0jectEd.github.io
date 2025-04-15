document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#formClient");

    form.addEventListener("submit", async function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        const tbody = document.querySelector("#clientsOrdersTable tbody");
        tbody.innerHTML = ""; // Clear previous rows

        try {
            const response = await fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    "Accept": "application/json"
                }
            });

            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

            const result = await response.json();
            console.log("My answer arriving", result);

            if (result.success) {
                result.clientOrders.forEach(order => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${order.customerName}</td>
                        <td>${order.orderDate}</td>
                        <td>${order.shippedDate}</td>
                        <td>${order.status}</td>
                    `;
                    tbody.appendChild(row);
                });
            } else {
                document.querySelector("#answerClients").innerHTML = `<p style="color: red;"><b>${result.message || result.error}</b></p>`;
            }

        } catch (error) {
            console.error("Erreur:", error);
            document.querySelector("#answerClients").innerHTML = `<p style="color: red;"><b>Une erreur s'est produite: ${error.message}</b></p>`;
        }
    });
});
