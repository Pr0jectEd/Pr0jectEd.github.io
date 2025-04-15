<?php
header('Content-Type: application/json'); // Important: Set JSON content type
require 'config.php'; // Make sure this file correctly initializes a PDO connection in $pdo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $customerName = $_POST['customerName'] ;
    $contactFirstName = $_POST['contactFirstName'];
    $contactLastName = $_POST['contactLastName'];
    $phone = $_POST['phone'] ;
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
    } else{
        try{


        // Preparing the SQL statement
        $stmt = $pdo->prepare('INSERT INTO customers (customerName,contactLastName,contactFirstName, phone,addressLine1,addressLine2,city,state,postalCode,country,salesRepEmployeeNumber,creditLimit)
        VALUES (?, ?, ?, ?,?, ?, ?, ?,?, ?, ?)');
        $success = $stmt->execute([$customerName, $contactLastName,$contactFirstName,$phone,$addressLine1,$addressLine2,$city,$state,$postalCode,$country,$salesRepEmployeeNumber,$creditLimit]);
        
      
        // Execute the query
        if ($success) {
            echo json_encode(['success' => true, 'message' => 'User registered successfully!']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Database error: Could not insert user.']);
        }
    

        }
        catch(PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);

        }
        echo json_encode(['success' => true, 'message' => 'the register was a success.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
/*
INSERT into customers (customerName,contactLastName,contactFirstName, phone,addressLine1,addressLine2,city,state,postalCode,country,salesRepEmployeeNumber,creditLimit)
VALUES ("Clement Chauffage","Germaan","Clement",0755987820,"Carrera1","Carrera2","Marseille","L'Aude",45000,"France",1370,22000);
*/

?>