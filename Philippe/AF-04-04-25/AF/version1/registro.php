<?php
header('Content-Type: application/json'); // Important: Set JSON content type
require 'config.php'; // Make sure this file correctly initializes a PDO connection in $pdo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customerName'] ?? '';
    $password = $_POST['password'] ?? '';

    $customerName = $_POST['customerName'] ;
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'] ;
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];

    if (empty($user)  || empty($password)    || empty($customerName) || empty($contactLastName)|| empty($contactFirstName) ||
        empty($phone) || empty($addresLine1) || empty($city) || empty($state) || empty($postalCode) || empty($country) || 
        empty($salesRepEmployeeNumber)|| empty($creditLimit)) {
        echo json_encode(['success' => false, 'error' => 'Please fill in all fields.']);
        exit;
    }

    try {
        // Hash the password for security
        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO usuarios (email, password, fecha_registro) VALUES (:email, :password, NOW())");
        
        // Bind parameters
        $stmt->bindParam(':email', $user, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        
        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'User registered successfully!']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Database error: Could not insert user.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>