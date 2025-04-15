<?php
header('Content-Type: application/json'); // Important: Set JSON content type
require 'config.php'; // Make sure this file correctly initializes a PDO connection in $pdo


    $customerName = $_POST['customerName'] ;
    $customerLastName = $_POST['customerLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'] ;
    $addresLine1 = $_POST['addresLine1'];
    $addresLine2 = $_POST['addresLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];



    echo json_encode(['success' => true, 
                      'message' => 'Datos ingresados correctamente.',
                      'name' => $customerName,
                      'lastname'=> $customerLastName,
                      'contact'=> $contactFirstName,
                      'phone' => $phone,
                      'addres1' => $addresLine1,
                      'addres2' => $addresLine2,
                      'city' => $city,
                      'state'=> $state,
                      'postalCode' => $postalCode,
                      'country' => $country,
                      'salesRepEmployeeNumber' => $salesRepEmployeeNumber,
                      'creditLimit' => $creditLimit

                    ]);

?>