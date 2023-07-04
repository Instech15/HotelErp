<?php

// module name
$HmvcMenu["accounts"] = array(
    //set icon
    "icon"           => "<i class='ti-bag'></i>", 

    // stockmovment
   "c_o_a" => array( 
        "controller" => "accounts",
		"method"     => "show_tree",
		"url"		 => "accounts/chart-of-account",
        "permission" => "read"
    ), 
   
      "debit_voucher" => array( 
        "controller" => "accounts",
		"method"     => "debit_voucher",
		"url"		 => "accounts/debit-voucher",
        "permission" => "create"
    ), 
   "credit_voucher" => array( 
        "controller" => "accounts",
		"method"     => "credit_voucher",
		"url"		 => "accounts/credit-voucher",
        "permission" => "read"
    ), 
    "contra_voucher" => array( 
        "controller" => "accounts",
		"method"     => "contra_voucher",
		"url"		 => "accounts/contra-voucher",
        "permission" => "read"
    ),
     "journal_voucher" => array( 
        "controller" => "accounts",
		"method"     => "journal_voucher",
		"url"		 => "accounts/journal-voucher",
        "permission" => "read"
    ),  
      "voucher_approval" => array( 
        "controller" => "accounts",
		"method"     => "aprove_v",
		"url"		 => "accounts/voucher-approval",
        "permission" => "create"
    ), 
      
       "account_report" => array( 
				        "voucher_report" => array( 
				          "controller" => "accounts",
						  "method"     => "voucher_report",
						  "url"		 => "accounts/voucher-report",
				          "permission" => "read"
				   		 ), 

				         "cash_book" => array( 
					        "controller" => "accounts",
							"method"     => "cash_book",
							"url"		 => "accounts/cash-book",
					        "permission" => "read"
					    ), 
				          "bank_book" => array( 
					        "controller" => "accounts",
							"method"     => "bank_book",
							"url"		 => "accounts/bank-book",
					        "permission" => "read"
					    ), 
				     
				          "general_ledger" => array( 
					        "controller" => "accounts",
							"method"     => "general_ledger",
							"url"		 => "accounts/general-ledger",
					        "permission" => "read"
					    ), 
				           "trial_balance" => array( 
					        "controller" => "accounts",
							"method"     => "trial_balance",
							"url"		 => "accounts/trial-balance",
					        "permission" => "read"
					    ),
					     "profit_loss" => array( 
					        "controller" => "accounts",
							"method"     => "profit_loss_report",
							"url"		 => "accounts/profit-loss",
					        "permission" => "read"
					    ),
					   
					   "cash_flow" => array( 
					        "controller" => "accounts",
							"method"     => "cash_flow_report",
							"url"		 => "accounts/cash-flow",
					        "permission" => "read"
					    ),
					  
					    "coa_print" => array( 
					        "controller" => "accounts",
							"method"     => "coa_print",
							"url"		 => "accounts/coa-print",
					        "permission" => "read"
					    ),  
    ), 
);
   

 