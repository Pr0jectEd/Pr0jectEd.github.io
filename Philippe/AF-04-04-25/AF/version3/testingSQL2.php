<?php

require 'config.php'; // Include your database connection file

try {
    $sql = " SELECT 
                c.customerName, 
                o.orderDate, 
                o.shippedDate, 
                o.status 
                FROM customers c 
                JOIN orders o ON o.customerNumber = c.customerNumber 
                WHERE c.customerNumber = 119; 
            LIMIT 25";

    $statement = $pdo->prepare($sql);
    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    var_dump($results);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>