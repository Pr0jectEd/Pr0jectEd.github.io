<?php

header('Content-Type: application/json');
require 'config.php'; // Should define $pdo = new PDO(...);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = $_POST['customerId'];
    //$customerId = filter_input(INPUT_POST, 'customerId', FILTER_SANITIZE_NUMBER_INT); //Remplace the previous line to sanitize the field.

    if (empty($customerId)) {
    echo json_encode(['success' => false, 'message' => 'Please fill the field Customer Id.']);
    exit;
}else{

    try {
        $stmt = $pdo->prepare("
    
            SELECT 
                c.customerName, 
                o.orderDate, 
                o.shippedDate, 
                o.status 
                FROM customers c 
                JOIN orders o ON o.customerNumber = c.customerNumber 
                WHERE c.customerNumber = :customerId 
            LIMIT 25
        ");

        $stmt->bindParam(':customerId',$customerId, PDO:: PARAM_INT);
        $stmt->execute();
    
        $clientOrder = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        echo json_encode(['success' => true, 'clientOrders' => $clientOrder]);
    
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

}
}



//SELECT c.customerName, o.orderDate, o.shippedDate, o.status FROM customers c JOIN orders o ON o.customerNumber = c.customerNumber WHERE c.customerNumber = 119; 
?>