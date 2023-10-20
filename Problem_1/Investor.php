<?php

// Investor class
class Investor {

    private $transaction_list = [];

    public function setTransactionList($transaction_list){
        $this->transaction_list = $transaction_list;

        return $this;
    }

    public function getTransactionList(){
       return $this->transaction_list;
    }

    // Get unique syndicates list with tolal invested amount 
    public function getInvestorList($limit = 0)
    {
        $investors = [];
        $result = [];
        $transactions = $this->getTransactionList();

        // Iterate through the transaction records
        if(!empty($transactions)){
            foreach ($transactions as $transaction) {
                $investor_id = $transaction['investor_id'];
                $syndicate_id = $transaction['syndicate_id'];
                $transaction_amount = $transaction['transaction_amount'];

                // Track the syndicate count and total amount for each investor
                if (!isset($investors[$investor_id])) {
                    $investors[$investor_id] = [
                        'syndicates' => [], 
                        'total_amount' => 0
                    ];
                }

                if (!isset($investors[$investor_id]['syndicates'][$syndicate_id])) {
                    $investors[$investor_id]['syndicates'][$syndicate_id] = 1;
                    $investors[$investor_id]['total_amount'] += $transaction_amount;
                }
            }
        }

        // Sort investors by the number of unique syndicates they have invested in
        uasort($investors, function ($a, $b) {
            return count($b['syndicates']) - count($a['syndicates']);
        });

        // Get the top investors by limit
        if($limit > 0){
            $result = array_slice($investors, 0, $limit, true);
        }else{
            $result = $investors;
        }

        return $result;
    }

}

