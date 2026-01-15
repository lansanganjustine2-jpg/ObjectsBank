<?php
require_once 'classes/Account.php';
require_once 'classes/Customer.php';

$accounts = [
    new Account('20626219', 'Savings', 45200.00),
    new Account('20626220', 'Checking', 6200.50),
    new Account('20626221', 'Current', -320.75),
    new Account('20626222', 'Deposit', 250000.00)
];

$customer = new Customer('KJustine', 'Lansangan', 'KJLansangan@email.com', $accounts);

include 'includes/header.php';
?>

<main class="container">
    <div class="card accounts-info">
        <h2>Name: <?php echo $customer->getFullName(); ?></h2>
        <p>Email: <?php echo $customer->email; ?></p>
    </div>

    <div class="card">
        <h3>Account Summary</h3>
        <table>
            <thead>
                <tr>
                    <th>Account No.</th>
                    <th>Type</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer->accounts as $account): ?>
                <tr>
                    <td><?php echo $account->number; ?></td>
                    <td><?php echo $account->type; ?></td>
                    <td class="<?php echo $account->balance >= 0 ? 'credit' : 'overdrawn'; ?>">
                        ₱<?php echo $account->getBalance(); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
