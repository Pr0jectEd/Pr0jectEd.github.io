<?php
header('Content-Type: application/json');
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $customerName = $_POST['customerName'];
    $contactFirstName = $_POST['contactFirstName'];
    $contactLastName = $_POST['contactLastName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];

    if (empty($customerName) || empty($contactLastName)|| empty($contactFirstName) ||
        empty($phone) || empty($addressLine1) || empty($addressLine2) || empty($city) || empty($state) || empty($postalCode) || empty($country) || 
        empty($salesRepEmployeeNumber)|| empty($creditLimit)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
        exit;
    } else {
        try {
            $stmt = $pdo->prepare('INSERT INTO customers (customerName,contactLastName,contactFirstName, phone,addressLine1,addressLine2,city,state,postalCode,country,salesRepEmployeeNumber,creditLimit)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            
            $success = $stmt->execute([$customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit]);

            if ($success) {
                echo json_encode(['success' => true, 'message' => $customerName]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Could not insert user.']);
            }

        } catch(PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
        }
    }

} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}

/* function populateTable(orders) {
    const tbody = document.querySelector('#ordersTable tbody');
    tbody.innerHTML = ''; // Clear existing rows
    
    orders.forEach(order => {
        const row = document.createElement('tr');
        
        row.innerHTML = `
            <td>${order.commande}</td>
            <td>${order.dateCommande}</td>
            <td>${order.dateLivraison}</td>
            <td>${order.statut}</td>
        `;
        
        tbody.appendChild(row);
    });
} */