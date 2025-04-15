<?php
declare(strict_types=1);
class BankAccount{
    private float $bankBalance;
    private string $ownerAccount;
    private int $ownerAccountNumber;

    public function __construct(float $clientAccountBalance, string $nameOwner, int $clientNumber)
    {
        $this->bankBalance = $clientAccountBalance;
        $this->ownerAccount = $nameOwner;
        $this->ownerAccountNumber = $clientNumber;
    }

    public function deposit(float $valueDeposit): void{
        $this->bankBalance = $this->bankBalance + $valueDeposit;
    }

    public function withdraw(float $valueWithdraw): void {
        $this->bankBalance = $this->bankBalance - $valueWithdraw;
    }

    public function getAccountBalance (): float{
        return $this->bankBalance;
    }

    public function getOwner ():string{
        return $this->ownerAccount;
    }
    public function transfer(float $valueTransfer,object $client):string{
        $valueApresTaux = $valueTransfer +($valueTransfer *0.2);
        $this->withdraw($valueApresTaux);
        $client->deposit($valueTransfer);
          return "success";
       }
}

$client0 = new BankAccount(0,"Mike",2);

echo"ouverture de compte d'Emilia avec 200€";
$client1 = new BankAccount(200,"Emilia",1);
echo"<br>";
echo "balance:".$client1->getAccountBalance();
echo"<br>";
echo"Deposit de 200.50";
$client1->deposit(200.50);
echo"<br>";
echo "balance:".$client1->getAccountBalance();
echo"<br>";
echo"Retire de 45.50€";
$client1->withdraw(45.50);
echo"<br>";
echo "balance:".$client1->getAccountBalance();
echo"<br>";
echo"Emilia transfere 90€ a Mike";
echo"<br>";
echo $client1->transfer(90,$client0);
echo"<br>";
echo "balance:".$client1->getOwner()." ".$client1->getAccountBalance()."€";
echo"<br>";
echo "balance:".$client0->getOwner()." ".$client0->getAccountBalance()."€";


?>