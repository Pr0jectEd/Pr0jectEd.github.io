<?php

declare(strict_types=1);
class BankAccount
{
    private static int $nextAccountNumber = 1; // Auto-incrementa con cada instancia
    private float $bankBalance;
    private string $ownerAccount;
    private int $ownerAccountNumber;//Asignación de la incrementación de instancia.
    public $file;

    public function __construct(float $clientAccountBalance = 100, string $nameOwner)
    {
        $this->bankBalance = $clientAccountBalance;
        $this->ownerAccount = $nameOwner;
        $this->ownerAccountNumber = self::$nextAccountNumber++; // asignar y luego incrementar
        $this->file = fopen("transactions.txt", "a");

        if ($this->file) {
            fwrite($this->file, 
            "CREATION| Client:  $nameOwner |" .
            "Montant $clientAccountBalance €|". 
            "Numero de compte: {$this->ownerAccountNumber}.
            \n---------------------------------------------------------------\n"
            );
            fclose($this->file);
        } else {
            echo "Unable to open transactions.txt for writing";
        }
    }

    public function deposit(float $valueDeposit): void
    {
        $this->bankBalance = $this->bankBalance + $valueDeposit;
        $this->file = fopen("transactions.txt", "a");
        if ($this->file) {
            fwrite($this->file, 
            "   DEPOSIT | Account: {$this->ownerAccount} | " .
            "Amount: {$valueDeposit} € | " .
            "Balance: {$this->bankBalance} € 
            \n---------------------------------------------------------------\n"
        );
            fclose($this->file);
        } else {
            echo "Unable to open output.txt for writing";
        }
    }

    public function withdraw(float $valueWithdraw): void
    {
        
        $difference = $this->bankBalance - $valueWithdraw;

        if ($difference < -200) {//Quand le retire depasse le credit du bank (200) transaction Impossible
            //echo "fondos insuficientes.";
            $this->file = fopen("transactions.txt", "a");
            if ($this->file) {
                fwrite($this->file, "   RETIRE >erreur<|". 
                $this->ownerAccount ."valeur de $valueWithdraw €".
                " impossible. Fondos Insuficientes:$this->bankBalance €.
                \n---------------------------------------------------------------\n");
                fclose($this->file);
            } else {
                echo "Uncapable d'ouvrir output.txt";
            }
            return;
        }

        if ($difference < 0 && $difference > -100) {// Quand le retire depasse jusqu'au -100 penalty 10%
            $penalization = $valueWithdraw * 0.1;
            $this->bankBalance = $this->bankBalance - ($valueWithdraw + $penalization);
            $this->file = fopen("transactions.txt", "a");
            if ($this->file) {
                fwrite($this->file, "   RETIRE >pen:10%<| de $this->ownerAccount :($valueWithdraw € + $penalization €)|".
                "Balance :$this->bankBalance €.Vous avez une penalization de: 10%  .
                \n---------------------------------------------------------------\n");
                fclose($this->file);
            } else {
                echo "Uncapable d'ouvrir output.txt";
            }
        } elseif ($difference < -100 && $difference > -200) {//Quand le retire depasse les -100 et arrive jusqu'au -200 penalty 30%
            $penalization = $valueWithdraw * 0.3;
            $this->bankBalance = $this->bankBalance - ($valueWithdraw + $penalization);
            $this->file = fopen("transactions.txt", "a");
            if ($this->file) {
                fwrite($this->file, "   RETIRE >pen:20%<| de $this->ownerAccount :($valueWithdraw € + $penalization €)|".
                "Balance :$this->bankBalance €.Vous avez une penalization de: 30%  .
                \n---------------------------------------------------------------\n");
                fclose($this->file);
            } else {
                echo "Uncapable d'ouvrir output.txt";
            }
        } else {//not penalty
            $this->bankBalance = $this->bankBalance - $valueWithdraw;
            $this->file = fopen("transactions.txt", "a");
            if ($this->file) {
                fwrite($this->file, "   RETIRE >success<|". ($valueWithdraw)." $this->ownerAccount :($valueWithdraw €)|".
                " Balance: $this->bankBalance .
                \n---------------------------------------------------------------\n");
                fclose($this->file);
            } else {
                echo "Uncapable d'ouvrir output.txt";
            }
        }
    }

    public function getAccountBalance(): float
    {
        $this->file = fopen("transactions.txt", "a");
        if ($this->file) {
            fwrite($this->file, "CONSULTATION| $this->ownerAccount |".
            "Compte Numero:{$this->ownerAccountNumber} |".
            " Balance: $this->bankBalance €.
            \n---------------------------------------------------------------\n");
            fclose($this->file);
        } else {
            echo "Uncapable d'ouvrir output.txt";
        }
        return $this->bankBalance;
    }

    public function getOwner(): string
    {
        
        return $this->ownerAccount." ".$this->ownerAccountNumber;
    }
    public function transfer(float $valueTransfer, BankAccount $targetAccount): string
    {
        $originalValue= $valueTransfer;
        $this->file = fopen("transactions.txt", "a");
        if ($this->file) {
            fwrite($this->file, "\nTRANSFERENCE | \nClient: $this->ownerAccount \nValeur:($originalValue €)".
             "\nFrais Bancaire:".($originalValue*0.2)."€".
              "\nTotal:".($originalValue-($originalValue*0.2))."€".
            "\nTransaction: ".($originalValue-($originalValue*0.2))." € vers la compte de: $targetAccount->ownerAccount.
            \n---------------------------------------------------------------\n");
            fclose($this->file);
        } else {
            echo "Uncapable d'ouvrir output.txt";
        }
        $valueApresTaux = $valueTransfer - ($valueTransfer * 0.2);
        $this->withdraw($valueApresTaux);
        $targetAccount->deposit($valueApresTaux);

        return "Transference reussi";
    }
}
