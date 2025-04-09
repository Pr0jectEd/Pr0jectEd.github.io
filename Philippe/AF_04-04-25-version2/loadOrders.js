async function loadOrders() {
    try {
        const response = await fetch('getOrders.php');

        if (!response.ok) {
            throw new Error(`HTTP error: ${response.status}`);
        }

        const result = await response.json();

        const tbody = document.querySelector("#ordersTable tbody");
        tbody.innerHTML = ""; // Clear previous rows

        if (result.success) {
            result.orders.forEach(order => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${order.orderNumber}</td>
                    <td>${order.orderDate}</td>
                    <td>${order.requiredDate}</td>
                    <td>${order.status}</td>
                `;
                tbody.appendChild(row);
            });
        } else {
            tbody.innerHTML = `<tr><td colspan="4" style="color: red;">Erreur: ${result.error}</td></tr>`;
        }

    } catch (error) {
        console.error("Erreur lors du chargement des commandes:", error);
        const tbody = document.querySelector("#ordersTable tbody");
        tbody.innerHTML = `<tr><td colspan="4" style="color: red;">Erreur de chargement</td></tr>`;
    }
}