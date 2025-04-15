<?php 
require "BankAccountProduction.php";
echo"Clients Transactions";
$cliente1 = new BankAccount(100,"Emilia");
$cliente2 = new BankAccount(200, "James");
$cliente3 = new BankAccount(300, "Edward");
$cliente1->deposit(400);
$cliente1->deposit(1000);
$cliente1->transfer(400,$cliente2);
$cliente1->withdraw(100);
$cliente3->deposit(1000);
$cliente2->getAccountBalance();
$cliente2->withdraw(100);
$cliente2->withdraw(100);
$cliente2->transfer(400,$cliente1);
;




if (file_exists("transactions.txt")) {
    echo"<br>";
    echo "Presentation de Comptes.<br>";
    
    $contents = file_get_contents("transactions.txt");
    echo "Details:<br><pre>$contents</pre>";
} else {
    echo "File 'transactions.txt' n'etait pas cree.";
}

file_put_contents("transactions.txt", "");//Avec cette ligne je vire tous les lignes de mon .txt
echo "<br>Netoyage de fichier.";
?>