<?php
header('Content-Type: application/json');
require 'config.php'; // Should define $dbo = new PDO(...);

try {
    $stmt = $dbo->query("
        SELECT 
            o.orderNumber,
            o.orderDate,
            o.requiredDate,
            o.status,
            c.customerName
        FROM customers c
        JOIN orders o ON c.customerNumber = o.customerNumber
        LIMIT 25
    ");

    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'orders' => $orders]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
