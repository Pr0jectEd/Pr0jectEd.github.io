<?php
if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];
    
file_put_contents("calculator_log.txt", $expression . "\n", FILE_APPEND);
    echo "Data received!"; // Send a response back to the JavaScript
} else {
    echo "No data received.";
}
?>