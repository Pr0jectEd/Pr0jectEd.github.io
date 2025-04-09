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

/* async function loadArticles() {
    const response = await fetch("get_articles.php");
    const articles = await response.json();
    const list = document.getElementById("articlesList");
    list.innerHTML = "";

    articles.forEach(article => {
        const li = document.createElement("li");
        li.innerHTML = `<strong>${article.titulo}</strong><br> 
                        <p>${article.contenido}</p> 
                        <em>Publicado el: ${article.fecha_publicacion}</em>`;
        list.appendChild(li);
    });
} */