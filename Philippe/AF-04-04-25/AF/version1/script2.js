

async function loadOrders() {
    const response = await fetch("get_orders.php");
    const orders = await response.json();
    //const list = document.getElementById("articlesList");
    const tbody = document.querySelector('#ordersTable tbody')
    list.innerHTML = "";

    orders.forEach(order => {
        const row = document.createElement('tr');
                
        row.innerHTML = `
            <td>${order.commande}</td>
            <td>${order.dateCommande}</td>
            <td>${order.dateLivraison}</td>
            <td>${order.statut}</td>
        `;
        tbody.appendChild(li);
    });
}