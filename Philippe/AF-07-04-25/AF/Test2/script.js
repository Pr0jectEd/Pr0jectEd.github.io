/* //  Inside the createAccountButton event listener (replace the JS account creation)
fetch('/your-php-script.php', {
    method: 'POST',
    body: JSON.stringify({ action: 'createAccount', ownerName: ownerName, initialBalance: initialBalance })
})
.then(response => response.json()) // Assuming PHP returns JSON
.then(data => {
    if (data.success) {
        const newAccount = data.account; // Account data from PHP
        accounts.push(newAccount);
        displayAccountDetails(newAccount);
        logTransaction(data.message); // Transaction message from PHP
        ownerNameInput.value = '';
        initialBalanceInput.value = '100';
    } else {
        alert(data.error); // Show error message from PHP
    }
})
.catch(error => {
    console.error('Error:', error);
    alert('An error occurred.');
});

//  Your PHP script (your-php-script.php)
<?php
//  ... Your BankAccount class ...

header('Content-Type: application/json'); // Set header for JSON response

$data = json_decode(file_get_contents('php://input'), true);

if ($data['action'] === 'createAccount') {
    $ownerName = $data['ownerName'];
    $initialBalance = $data['initialBalance'];

    $account = new BankAccount($initialBalance, $ownerName);

    $response = [
        'success' => true,
        'account' => [
            'ownerName' => $account->getOwner(),
            'accountNumber' => $account->ownerAccountNumber,
            'balance' => $account->getAccountBalance()
        ],
        'message' => "Creation of {$initialBalance} | {$ownerName} | {$account->ownerAccountNumber}."
    ];

    echo json_encode($response);

} elseif ($data['action'] === 'deposit') {
    //  ... Handle deposit logic ...
} elseif ($data['action'] === 'withdraw') {
    //  ... Handle withdraw logic ...
} elseif ($data['action'] === 'transfer') {
    //  ... Handle transfer logic ...
}
?> */