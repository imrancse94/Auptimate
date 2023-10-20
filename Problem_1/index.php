<?php

require_once 'Investor.php';

// Sample dataset (replace this with your actual data)
$transactions = [
    ['investor_id' => 1, 'syndicate_id' => 101, 'transaction_amount' => 1000, 'transaction_date' => '2023-01-15'],
    ['investor_id' => 1, 'syndicate_id' => 102, 'transaction_amount' => 500, 'transaction_date' => '2023-02-20'],
    ['investor_id' => 3, 'syndicate_id' => 101, 'transaction_amount' => 200, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 2, 'syndicate_id' => 105, 'transaction_amount' => 400, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 1, 'syndicate_id' => 102, 'transaction_amount' => 600, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 3, 'syndicate_id' => 103, 'transaction_amount' => 100, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 1, 'syndicate_id' => 101, 'transaction_amount' => 50, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 2, 'syndicate_id' => 102, 'transaction_amount' => 150, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 1, 'syndicate_id' => 103, 'transaction_amount' => 900, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 7, 'syndicate_id' => 105, 'transaction_amount' => 500, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 9, 'syndicate_id' => 106, 'transaction_amount' => 500, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 10, 'syndicate_id' => 106, 'transaction_amount' => 700, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 8, 'syndicate_id' => 106, 'transaction_amount' => 200, 'transaction_date' => '2023-03-10'],
    ['investor_id' => 12, 'syndicate_id' => 106, 'transaction_amount' => 300, 'transaction_date' => '2023-03-10'],
    // ... (more transaction records)
];


// Get Top 5 investors list
$top_investors = (new Investor())
                    ->setTransactionList($transactions)
                    ->getInvestorList(5);


// Showing the results
foreach ($top_investors as $investor_id => $data) {
    echo "Investor ID: <strong>$investor_id</strong><br/>";
    // echo "Total number of unique Syndicates: " . count($data['syndicates']) . "<br/>";
    echo "Total Investment Amount: <strong>" . $data['total_amount'] . "</strong><br/>";
    echo "<br/>";
}
?>
