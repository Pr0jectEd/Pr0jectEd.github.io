<?php

require 'config.php'; // Include your database connection file

try {
    $sql = "SELECT 
        o.orderNumber,
        o.orderDate,
        o.requiredDate,
        o.status,
        c.customerName
    FROM customers c
    JOIN orders o ON c.customerNumber = o.customerNumber
    LIMIT 25;";

    $statement = $pdo->prepare($sql);
    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    var_dump($results);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>