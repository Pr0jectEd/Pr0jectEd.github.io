<?php

require 'BankAccountV4.php';  

$client0 = new BankAccount(0,"Mike",2);

echo"ouverture de compte d'Emilia avec 200€";
$client1 = new BankAccount(200,"Emilia",1);
echo"<br>";
echo "balance:".$client1->getOwner()." ".$client1->getAccountBalance()."€";
echo"<br>";
echo"Deposit de 200.50";
$client1->deposit(200.50);
echo"<br>";
echo "balance:".$client1->getOwner()." ".$client1->getAccountBalance()."€";
echo"<br>";
echo"Retire de 45.50€";
$client1->withdraw(45.50);
echo"<br>";
echo "balance:".$client1->getOwner()." ".$client1->getAccountBalance()."€";
echo"<br>";
echo"Emilia transfere 90€ a Mike";
echo"<br>";
echo $client1->transfer(90,$client0);
echo"<br>";
echo "balance:".$client1->getOwner()." ".$client1->getAccountBalance()."€";
echo"<br>";
echo "balance:".$client0->getOwner()." ".$client0->getAccountBalance()."€";
echo"<br>";
echo"Emilia transfere 90€ a Mike";
echo"<br>";
echo $client1->transfer(205.9,$client0);
echo"<br>";
echo "balance:".$client1->getOwner()." ".$client1->getAccountBalance()."€";

// Check if the file was created
if (file_exists("account_details.txt")) {
    echo "File 'account_details.txt' was created successfully.<br>";
    
    // Optionally, read and display its contents
    $contents = file_get_contents("account_details.txt");
    echo "File contents:<br><pre>$contents</pre>";
} else {
    echo "File 'account_details.txt' was NOT created.";
}
?>
