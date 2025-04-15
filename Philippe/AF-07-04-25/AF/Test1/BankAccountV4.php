<?php
declare(strict_types=1);
class BankAccount{
    private float $bankBalance;
    private string $ownerAccount;
    private int $ownerAccountNumber;
    public $file;
    

    public function __construct(float $clientAccountBalance, string $nameOwner, int $clientNumber)
    {
        $this->bankBalance = $clientAccountBalance;
        $this->ownerAccount = $nameOwner;
        $this->ownerAccountNumber = $clientNumber;
        $this->file=fopen("account_details.txt","a");
        if($this->file){
            fwrite($this->file, "Creation of $clientAccountBalance | $nameOwner | $clientNumber.\n");
            fclose($this->file);
        } else {
            echo "Unable to open output.txt for writing";
        }
    }

    public function deposit(float $valueDeposit): void{
        $this->bankBalance = $this->bankBalance + $valueDeposit;
        $this->file=fopen("account_details.txt","a");
        if($this->file){
            fwrite($this->file, "Deposit of $this->ownerAccount : $valueDeposit.\n");
            fclose($this->file);
        } else {
            echo "Unable to open output.txt for writing";
        }

    }

    public function withdraw(float $valueWithdraw): void {
        $difference = $this->bankBalance - $valueWithdraw;

        if ($difference < -200) {
            echo "fondos insuficientes.";
            return;
        }

        if( $difference < 0 && $difference > - 100){
            $penalization = $valueWithdraw*0.1;
            $this->bankBalance = $this->bankBalance - ($valueWithdraw + $penalization);
            $this->file=fopen("account_details.txt","a");
            if($this->file){
                fwrite($this->file, "Retire de $this->ownerAccount :($valueWithdraw + $penalization)  .\n");
                fclose($this->file);
            } else {
                echo "Unable to open output.txt for writing";
            }

    
        } elseif($difference < -100 && $difference >-200){
            $penalization = $valueWithdraw*0.3;
            $this->bankBalance = $this->bankBalance - ($valueWithdraw + $penalization);
            $this->file=fopen("account_details.txt","a");
            if($this->file){
                fwrite($this->file, "Retire de $this->ownerAccount :($valueWithdraw + $penalization)  .\n");
                fclose($this->file);
            } else {
                echo "Unable to open output.txt for writing";
            }
        } else {
            $this->bankBalance = $this->bankBalance - $valueWithdraw;
            $this->file=fopen("account_details.txt","a");
            if($this->file){
                fwrite($this->file, "Retire de $this->ownerAccount :($valueWithdraw)  .\n");
                fclose($this->file);
            } else {
                echo "Unable to open output.txt for writing";
            }
        }
        
    }

    public function getAccountBalance (): float{
        return $this->bankBalance;
    }

    public function getOwner ():string{
        return $this->ownerAccount;
    }
    public function transfer(float $valueTransfer,BankAccount $targetAccount):string{
     $valueApresTaux = $valueTransfer +($valueTransfer *0.2);
     $this->withdraw($valueApresTaux);
     $targetAccount->deposit($valueTransfer);
     $this->file=fopen("account_details.txt","a");
     if($this->file){
        fwrite($this->file, "Transference de . $this->ownerAccount :($valueTransfer) vers $targetAccount->ownerAccount  .\n");
        fclose($this->file);
    } else {
        echo "Unable to open output.txt for writing";
    }
       return "Transference reussi";
    }
}




?>