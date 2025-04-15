<?php
declare(strict_types=1);

class BankAccount
{
    private static int $nextAccountNumber = 1; // Auto-increment with each instance
    private float $bankBalance;
    private string $ownerAccount;
    public int $ownerAccountNumber; // Made public for access in PHP
    public $file;

    public function __construct(float $clientAccountBalance = 100, string $nameOwner)
    {
        $this->bankBalance = $clientAccountBalance;
        $this->ownerAccount = $nameOwner;
        $this->ownerAccountNumber = self::$nextAccountNumber++; // assign and then increment
        $this->file = fopen("transactions.txt", "a");

        if ($this->file) {
            fwrite($this->file, "Creation of $clientAccountBalance | $nameOwner | {$this->ownerAccountNumber}.\n");
            fclose($this->file);
        } else {
            error_log("Unable to open transactions.txt for writing"); // Log the error
            //  Don't echo to the browser here, as it interferes with JSON output.
        }
    }

    public function deposit(float $valueDeposit): void
    {
        $this->bankBalance += $valueDeposit;
        $this->logTransaction("Deposit of $this->ownerAccount: $valueDeposit.");
    }

    public function withdraw(float $valueWithdraw): bool // Return true on success, false on failure
    {
        $difference = $this->bankBalance - $valueWithdraw;

        if ($difference < -200) {
            return false; // Indicate insufficient funds
        }

        $penalty = 0.0;
        if ($difference < 0 && $difference > -100) {
            $penalty = $valueWithdraw * 0.1;
        } elseif ($difference <= -100 && $difference > -200) {
            $penalty = $valueWithdraw * 0.3;
        }

        $this->bankBalance -= ($valueWithdraw + $penalty);
        $this->logTransaction("Withdrawal from $this->ownerAccount: $valueWithdraw" . ($penalty > 0 ? ", penalty: $penalty" : ""));
        return true;
    }

    public function getAccountBalance(): float
    {
        return $this->bankBalance;
    }

    public function getOwner(): string
    {
        return $this->ownerAccount;
    }

    public function transfer(float $valueTransfer, BankAccount $targetAccount): bool // Return true/false
    {
        $transferTax = $valueTransfer * 0.2;
        $totalAmount = $valueTransfer + $transferTax;

        if (!$this->withdraw($totalAmount)) {
            return false; // Insufficient funds
        }

        $targetAccount->deposit($valueTransfer);
        $this->logTransaction("Transfer of $valueTransfer from $this->ownerAccount to $targetAccount->ownerAccount, tax: $transferTax.");
        return true;
    }

    private function logTransaction(string $message): void
    {
        $this->file = fopen("transactions.txt", "a");
        if ($this->file) {
            fwrite($this->file, $message . "\n");
            fclose($this->file);
        } else {
            error_log("Unable to open transactions.txt for writing");
            //  Don't echo to the browser.
        }
    }
}

//  ---  Handle AJAX requests  ---
header('Content-Type: application/json'); // Set header for JSON response

$data = json_decode(file_get_contents('php://input'), true);

$accounts = []; // Store accounts in a session or database in a real app

session_start(); //  Start the session (if you use sessions)

if (!isset($_SESSION['accounts'])) {
    $_SESSION['accounts'] = [];
}
$accounts = &$_SESSION['accounts'];  //  Reference to session array

function findAccount(int $accountNumber, array &$accounts): ?BankAccount {
    foreach ($accounts as &$account) {
        if ($account->ownerAccountNumber === $accountNumber) {
            return $account;
        }
    }
    return null;
}

$response = ['success' => false]; // Default response

if ($data['action'] === 'createAccount') {
    $ownerName = $data['ownerName'];
    $initialBalance = (float)$data['initialBalance'];

    $account = new BankAccount($initialBalance, $ownerName);
    $accounts[] = $account;

    $response = [
        'success' => true,
        'account' => [
            'ownerName' => $account->getOwner(),
            'accountNumber' => $account->ownerAccountNumber,
            'balance' => $account->getAccountBalance()
        ],
        'message' => "Creation of {$initialBalance} | {$ownerName} | {$account->ownerAccountNumber}."
    ];

} elseif ($data['action'] === 'deposit') {
    $accountNumber = (int)$data['accountNumber'];
    $amount = (float)$data['amount'];

    $account = findAccount($accountNumber, $accounts);
    if ($account) {
        $account->deposit($amount);
        $response = [
            'success' => true,
            'message' => "Deposit of {$amount} to {$account->getOwner()}.",
            'balance' => $account->getAccountBalance()
        ];
    } else {
        $response['error'] = "Account not found.";
    }

} elseif ($data['action'] === 'withdraw') {
    $accountNumber = (int)$data['accountNumber'];
    $amount = (float)$data['amount'];

    $account = findAccount($accountNumber, $accounts);
    if ($account) {
        if ($account->withdraw($amount)) {
            $response = [
                'success' => true,
                'message' => "Withdrawal of {$amount} from {$account->getOwner()}.",
                'balance' => $account->getAccountBalance()
            ];
        } else {
            $response['error'] = "Insufficient funds.";
        }
    } else {
        $response['error'] = "Account not found.";
    }

} elseif ($data['action'] === 'transfer') {
    $fromAccountNumber = (int)$data['fromAccountNumber'];
    $toAccountNumber = (int)$data['toAccountNumber'];
    $amount = (float)$data['amount'];

    $fromAccount = findAccount($fromAccountNumber, $accounts);
    $toAccount = findAccount($toAccountNumber, $accounts);

    if ($fromAccount && $toAccount) {
        if ($fromAccount->transfer($amount, $toAccount)) {
            $response = [
                'success' => true,
                'message' => "Transfer of {$amount} from {$fromAccount->getOwner()} to {$toAccount->getOwner()} successful.",
                'fromBalance' => $fromAccount->getAccountBalance(),
                'toBalance' => $toAccount->getAccountBalance()
            ];
        } else {
            $response['error'] = "Insufficient funds for transfer.";
        }
    } else {
        $response['error'] = "One or both accounts not found.";
    }

} elseif ($data['action'] === 'getAccounts') {
    $accountData = [];
    foreach ($accounts as $account) {
        $accountData[] = [
            'ownerName' => $account->getOwner(),
            'accountNumber' => $account->ownerAccountNumber,
            'balance' => $account->getAccountBalance()
        ];
    }
    $response = [
        'success' => true,
        'accounts' => $accountData
    ];

} elseif ($data['action'] === 'getTransactions') {
    $transactions = [];
    if (file_exists("transactions.txt")) {
        $transactions = file("transactions.txt", FILE_IGNORE_NEW_LINES);
    }
    $response = [
        'success' => true,
        'transactions' => $transactions
    ];
}

echo json_encode($response);
?>