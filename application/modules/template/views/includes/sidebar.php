<div class="sidebar-header">
    <a href="<?php echo base_url('dashboard/home') ?>" class="sidebar-brand">
        <img class="sidebar-brand_icon"
            src="<?php echo html_escape(base_url((!empty($setting->logo)?$setting->logo:'assets/img/sidebar-logo.png'))) ?>"
            alt="">
    </a>
</div>
<!--/.sidebar header-->
<?php $image = $this->session->userdata('image'); 
                $fullname = $this->session->userdata('fullname'); 
                ?>
<div class="profile-element d-flex align-items-center flex-shrink-0">
    <div class="avatar online">
        <img src="<?php echo html_escape(base_url((!empty($image)?$image:'assets/img/user-icon.png'))) ?>"
            class="img-fluid rounded-circle" alt="">
    </div>
    <div class="profile-text">
        <h6 class="m-0"><?php echo html_escape($fullname);?></h6>
    </div>
</div>
<!--/.profile element-->
<div class="sidebar-body">
    <nav class="sidebar-nav">
        <ul class="metismenu">
            <li class="<?php echo (($this->uri->segment(1)=="dashboard")?"mm-active":null) ?>">
                <a href="<?php echo base_url('dashboard/home') ?>"><i class="ti-home"></i>
                    <?php echo display('dashboard')?></a>
            </li>

            <?php  
                                
                // module name
                $HmvcMenu2["accounts"] = array(
                    //set icon
                    "icon"           => "<i class='ti-bag'></i>", 

                    // stockmovment
                "financial_year" => array( 
                        "controller" => "accounts",
                        "method"     => "fin_yearlist",
                        "url"		 => "accounts/financial-year",
                        "permission" => "read"
                    ), 
                "financial_year_end" => array( 
                        "controller" => "accounts",
                        "method"     => "fin_yearend",
                        "url"		 => "accounts/financial-year-end",
                        "permission" => "read"
                    ), 
                "c_o_a" => array( 
                        "controller" => "accounts",
                        "method"     => "show_tree",
                        "url"		 => "accounts/chart-of-account",
                        "permission" => "read"
                    ), 
                "opening_balance" => array( 
                    "controller" => "accounts",
                    "method"     => "opening_balanceform",
                    "url"		 => "accounts/opening-balance",
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
                                    
                                        "coa_print" => array( 
                                            "controller" => "accounts",
                                            "method"     => "coa_print",
                                            "url"		 => "accounts/coa-print",
                                            "permission" => "read"
                                        ),  
                                        "balance_sheet" => array( 
                                            "controller" => "accounts",
                                            "method"     => "balance_sheet",
                                            "url"		 => "accounts/balance-sheet",
                                            "permission" => "read"
                                        ),  
                    ), 
                );
                // module name
                $HmvcMenu2["customer"] = array(
                    //set icon
                    "icon"           => "<i class='typcn typcn-user'></i>
                ", 
                //group level name
                    "customer_list" => array(
                        //menu name
                            "controller" => "customer_info",
                            "method"     => "index",
                            "url"        => "customer/customer-list",
                            "permission" => "read"
                        
                    ),
                    "guest_list" => array(
                        //menu name
                            "controller" => "customer_info",
                            "method"     => "guestlist",
                            "url"        => "customer/guest-list",
                            "permission" => "read"
                        
                    ),
                    "wakeup_call_list" => array(
                        //menu name
                            "controller" => "customer_info",
                            "method"     => "wakeup_call",
                            "url"        => "customer/wakeup-call",
                            "permission" => "read"
                        
                    )
                );
                $HmvcMenu2["hrm"] = array(
                    //set icon
                    "icon"           => "<i class='fa fa-users'></i>", 

                //group level name
                "attendance" => array( 
                        'atn_form'    => array( 
                            "controller" => "Home",
                            "method"     => "index",
                            "url"        => "hrm/attendance-list",
                            "permission" => "read"
                        ), 
                        'atn_report'  => array( 
                            "controller" => "Home",
                            "method"     => "attenlist",
                            "url"        => "hrm/attendance-report",
                            "permission" => "read"
                        ), 
                    ),
                    "award" => array(
                    "new_award" => array(
                        //menu name
                            "controller" => "Award_controller",
                            "method"     => "create_award",
                            "url"        => "hrm/award-list",
                            "permission" => "create"
                        
                    ),
                    ),
                    "circularprocess" => array(
                    'add_canbasic_info'  => array( 
                            "controller" => "Candidate",
                            "method"     => "caninfo_create",
                            "url"        => "hrm/new-candidate",
                            "permission" => "create"
                        ), 
                    'can_basicinfo_list' => array( 
                            "controller" => "Candidate",
                            "method"     => "candidateinfo_view",
                            "url"        => "hrm/manage-candidate",
                            "permission" => "read"
                        ),
                    "candidate_shortlist" => array(
                            "controller" => "Candidate_select",
                            "method"     => "create_shortlist",
                            "url"        => "hrm/candidate-shortlist",
                            "permission" => "create"
                    
                    ), 
                    "candidate_interview" => array(
                        //menu name
                            "controller" => "Candidate_select",
                            "method"     => "create_interview",
                            "url"        => "hrm/interview",
                            "permission" => "create"
                        
                    ),     
                    "candidate_selection" => array(
                
                            "controller" => "Candidate_select",
                            "method"     => "create_selection",
                            "url"        => "hrm/candidate-selection",
                            "permission" => "create"
                    
                    ),
                    ),
                    "department" => array(
                    "department_list" => array(
                        //menu name
                            "controller" => "Department_controller",
                            "method"     => "create_dept",
                            "url"        => "hrm/department",
                            "permission" => "create"
                    ), 
                    "add_division" => array(
                        //menu name
                            "controller" => "Division_controller",
                            "method"     => "division_form",
                            "url"        => "hrm/add-division",
                            "permission" => "create"
                        
                    ), 
                    "division_list" => array(
                        //menu name
                            "controller" => "Division_controller",
                            "method"     => "index",
                            "url"        => "hrm/manage-division",
                            "permission" => "read"
                        
                    ), 
                ),  
                "employee" => array(
                    "position" => array(
                            "controller" => "Employees",
                            "method"     => "create_position",
                            "url"        => "hrm/position-list-details",
                            "permission" => "create"
                    ), 
                    "add_employee" => array(
                            "controller" => "Employees",
                            "method"     => "viewEmhistory",
                            "url"        => "hrm/add-employee",
                            "permission" => "create"
                    ), 
                    "manage_employee" => array(
                            "controller" => "Employees",
                            "method"     => "manageemployee",
                            "url"        => "hrm/manage-employee",
                            "permission" => "read"
                    ), 
                    "emp_performance" => array(
                            "controller" => "Employees",
                            "method"     => "create_emp_performance",
                            "url"        => "hrm/employee-perfomance",
                            "permission" => "create"
                    ),     
                    "emp_sal_payment" => array(
                            "controller" => "Employees",
                            "method"     => "emp_payment_view",
                            "url"        => "hrm/employee-payment",
                            "permission" => "read"
                    ), 
                ),
                "leave" => array(
                "weekly_holiday" => array(
                            "controller" => "Leave",
                            "method"     => "create_weekleave",
                            "url"        => "hrm/weekly-holiday",
                            "permission" => "read"
                        
                    ), 
                    "holiday" => array(
                            "controller" => "Leave",
                            "method"     => "holiday_view",
                            "url"        => "hrm/holiday",
                            "permission" => "read"
                    ), 
                    "add_leave_type" => array(  
                        "controller" => "Leave",
                                "method"     => "add_leave_type",
                                "url"        => "hrm/leave-type",
                        "permission" => "read"
                    ),
                    "leave_application" => array(  
                        "controller" => "Leave",
                                "method"     => "others_leave",
                                "url"        => "hrm/leave-application",
                        "permission" => "read"
                    ),
                ),
                "loan" => array(
                    "loan_grand" => array(
                            "controller" => "Loan",
                            "method"     => "create_grandloan",
                            "url"        => "hrm/grant-loan",
                            "permission" => "read"
                    ), 
                    "loan_installment" => array(
                                "controller" => "Loan",
                                                "method"     => "create_installment",
                                                "url"        => "hrm/loan-installment",
                                "permission" => "read"
                        ), 
                    "loan_report" => array(
                                "controller" => "Loan",
                                                "method"     => "loan_report",
                                                "url"        => "hrm/loan-report",
                                "permission" => "read"  
                        ), 
                ),
                "payroll" => array(
                "salary_type_setup" => array(
                        //menu name
                            "controller" => "Payroll",
                            "method"     => "create_salary_setup",
                            "url"        => "hrm/salary-type-setup",
                            "permission" => "read"     
                    ), 
                    "salary_setup" => array(
                        //menu name
                            "controller" => "Payroll",
                            "method"     => "create_s_setup",
                            "url"        => "hrm/salary-setup",
                            "permission" => "create"
                    
                    ), 
                    "salary_generate" => array(
                        //menu name
                            "controller" => "Payroll",
                            "method"     => "create_salary_generate",
                            "url"        => "hrm/salary-generate",
                            "permission" => "create"
                    
                    ), 
                ),
                );
                // module name
                $HmvcMenu2["payment_setting"] = array(
                    //set icon
                    "icon"           => "<i class='ti-money'></i>
                ", 
                //group level name
                    "paymentmethod_list" => array(
                        //menu name
                            "controller" => "paymentmethod",
                            "method"     => "index",
                            "url"        => "payment_setting/payment-method-list",
                            "permission" => "read"
                        
                    ),
                    "currency_list" => array(
                        "controller" => "paymentmethod",
                        "method"     => "currency_list",
                        "url"        => "payment_setting/currency-list",
                        "permission" => "read"
                    
                    ),
                    "paymentmethod_setup" => array(
                        //menu name
                            "controller" => "paymentmethod",
                            "method"     => "paymentsetup",
                            "url"        => "payment_setting/payment-setup",
                            "permission" => "read"                        
                    )
                );
                // module name
                $HmvcMenu2["purchase"] = array(
                    //set icon
                    "icon"           => "<i class='ti-shopping-cart' aria-hidden='true'></i>
                ", 

                "purchase_item" => array( 
                        "controller" => "purchase",
                        "method"     => "index",
                        "url"        => "purchase/purchase-list",
                        "permission" => "read"
                    ),
                    "purchase_add" => array( 
                        "controller" => "purchase",
                        "method"     => "create",
                        "url"        => "purchase/purchase-create",
                        "permission" => "create"
                    ),
                    "purchase_return" => array( 
                        "controller" => "purchase",
                        "method"     => "return_form",
                        "url"        => "purchase/purchase-return",
                        "permission" => "create"
                    ),
                    "return_invoice" => array( 
                        "controller" => "purchase",
                        "method"     => "return_invoice",
                        "url"        => "purchase/invoice-return-list",
                        "permission" => "create"
                    ),
                );
                // module name
                $HmvcMenu2["reports"] = array(
                    //set icon
                    "icon"           => "<i class='ti-bar-chart' aria-hidden='true'></i>
                ", 

                "booking_report" => array( 
                        "controller" => "report",
                        "method"     => "index",
                        "url"        => "reports/booking-report",
                        "permission" => "read"
                    ),
                "purchase_report" => array( 
                        "controller" => "report",
                        "method"     => "productreport",
                        "url"        => "reports/purchase-report",
                        "permission" => "read"
                    ),
                    "stock_report" => array( 
                        "controller" => "report",
                        "method"     => "stockreport",
                        "url"        => "reports/stock-report",
                        "permission" => "read"
                    ),
                    
                );
                // module name
                $HmvcMenu2["room_facilities"] = array(
                    //set icon
                    "icon"           => "<i class='ti-view-grid'></i>
                ", 

                //group level name
                    "faciliti_list" => array(
                        //menu name
                            "controller" => "room_facilities",
                            "method"     => "index",
                            "url"        => "room_facilities/room-facilities-list",
                            "permission" => "read"
                        
                    ),
                    "faciliti_details_list" => array(
                        //menu name
                            "controller" => "room_facilitidetails",
                            "method"     => "index",
                            "url"        => "room_facilities/room-facilities-details-list",
                            "permission" => "read"
                        
                    ), 
                    "roomsize_list" => array(
                        //menu name
                            "controller" => "room_size",
                            "method"     => "index",
                            "url"        => "room_facilities/room-size-list",
                            "permission" => "read"
                        
                    ), 
                );
                // module name
                $HmvcMenu2["room_reservation"] = array(
                    //set icon
                    "icon"           => "<i class='ti-layout-slider-alt'></i>
                ", 
                //group level name
                    "booking_list" => array(
                        //menu name
                            "controller" => "room_reservation",
                            "method"     => "index",
                            "url"        => "room_reservation/booking-list",
                            "permission" => "read"
                        
                    ),
                    "checkin" => array(
                        //menu name
                            "controller" => "room_reservation",
                            "method"     => "checkin",
                            "url"        => "room_reservation/checkin-list",
                            "permission" => "read"
                        
                    ),
                    "checkout" => array(
                        //menu name
                            "controller" => "room_reservation",
                            "method"     => "checkin",
                            "url"        => "room_reservation/checkout-list",
                            "permission" => "read"
                        
                    ),
                    "room_status" => array(
                        //menu name
                            "controller" => "room_reservation",
                            "method"     => "room_status",
                            "url"        => "room_reservation/room-status",
                            "permission" => "read"
                        
                    ),
                );

                // module name
                $HmvcMenu2["ordermanage"] = array(
                    //set icon
                    "icon"           => "<i class='fab fa-first-order' aria-hidden='true'></i>
                    ", 


                    "pos_invoice"    => array( 
                        "controller" => "order",
                        "method"     => "pos_invoice",
                        "url"        =>"ordermanage/pos-invoice",
                        "permission" => "read"
                    ),
                    "order_list"     => array( 
                        "controller" => "order",
                        "method"     => "orderlist",
                        "url"        =>"ordermanage/order-list",
                        "permission" => "read"
                    ),
                    "pending_order"  => array( 
                        "controller" => "order",
                        "method"     => "pendingorder",
                        "url"        =>"ordermanage/pending-order",
                        "permission" => "read"
                    ),
                    "complete_order" => array( 
                        "controller" => "order",
                        "method"     => "completelist",
                        "url"        =>"ordermanage/complete-list",
                        "permission" => "read"
                    ),
                    "cancel_order"   => array( 
                        "controller" => "order",
                        "method"     => "cancellist",
                        "url"        =>"ordermanage/cancel-list",
                        "permission" => "read"
                    ),
                    "counter_dashboard" => array(
                        "controller" => "order",
                        "method"     => "counterboard",
                        "url"        =>"ordermanage/counter-board",
                        "permission" => "read"
                        ), 
                    "pos_setting"    => array(
                        "controller" => "order",
                        "method"     => "possetting",
                        "url"        =>"ordermanage/pos-setting",
                        "permission" => "read"
                    ),
                    "sound_setting"  => array(
                        "controller" => "order",
                        "method"     => "soundsetting",
                        "url"        =>"ordermanage/sound-setting",
                        "permission" => "read"

                    ),
                    "table_manage"       => array(
                        "table_list"     => array(
                            "controller" => "restauranttable",
                            "method"     => "index",
                            "url"        =>"ordermanage/table-list",
                            "permission" => "read"
                        ), 
                        
                        "table_setting"  => array(
                            "controller" => "restauranttable",
                            "method"     => "tablesetting",
                            "url"        =>"ordermanage/table-setting",
                            "permission" => "read"
                            )
                    ), 
                    "customer_type" => array(
                        "customertype_list" => array(
                            "controller"    => "customertype",
                            "method"        => "index",
                            "url"           =>"ordermanage/customer-type",
                            "permission"    => "read"
                        ), 
                        "list_of_card_terminal" => array(
                            "controller" => "card_terminal",
                            "method"     => "index",
                            "url"        =>"ordermanage/card-terminal",
                            "permission" => "read"
                        ), 
                    ),

                    //group level name
                    "manage_category" => array(
                        //menu name
                    "add_category" => array(
                        //menu name
                            "controller" => "item_category",
                            "method"     => "create",
                            "url"        =>"ordermanage/category-create",
                            "permission" => "create"
                        
                    ), 
                    "category_list" => array(
                        //menu name
                            "controller" => "item_category",
                            "method"     => "index",
                            "url"        =>"ordermanage/category-list",
                            "permission" => "read"
                        
                    ), 
                        
                    ),  
                    //group level name
                    "manage_food" => array(
                    "add_food" => array(
                        //menu name
                            "controller" => "item_food",
                            "method"     => "create",
                            "url"        =>"ordermanage/food-create",
                            "permission" => "create"
                    ), 
                    "food_list" => array(
                        //menu name
                            "controller" => "item_food",
                            "method"     => "index",
                            "url"        =>"ordermanage/food-list",
                            "permission" => "read"
                        
                    ),
                    "add_group_item" => array(
                        //menu name
                        "controller" => "item_food",
                        "method"     => "addgroupfood",
                        "url"        =>"ordermanage/food-groop-create",
                        "permission" => "read"
                    ),
                    "food_varient" => array(
                        //menu name
                            "controller" => "item_food",
                            "method"     => "foodvarientlist",
                            "url"        =>"ordermanage/food-varient-list",
                            "permission" => "read"
                        
                    ), 
                    "food_availablity" => array(
                        //menu name
                            "controller" => "item_food",
                            "method"     => "availablelist",
                            "url"        =>"ordermanage/food-available-list",
                            "permission" => "read"
                        
                    ),
                    "menu_type" => array(
                        //menu name
                        "controller" => "item_food",
                        "method"     => "todaymenutype",
                        "url"        =>"ordermanage/today-menu-type",
                        "permission" => "read"
                    ) 
                    ),
                    //group level name
                    "manage_addons" => array(
                    "add_adons" => array(
                        //menu name
                            "controller" => "menu_addons",
                            "method"     => "create",
                            "url"        =>"ordermanage/menu-addons-create",
                            "permission" => "create"
                    ), 
                    "addons_list" => array(
                        //menu name
                            "controller" => "menu_addons",
                            "method"     => "index",
                            "url"        =>"ordermanage/menu-addons-list",
                            "permission" => "read"
                        
                    ),
                    "assign_adons_list" => array(
                        //menu name
                            "controller" => "menu_addons",
                            "method"     => "assignaddons",
                            "url"        =>"ordermanage/assign-menu-addons",
                            "permission" => "read"
                        
                    ),    
                    ),
                    
                );
                // module name
                $HmvcMenu2["units"] = array(
                    //set icon
                    "icon"           => "<i class='ti-pin-alt' aria-hidden='true'></i>
                ", 

                //group level name
                    "unit_list" => array(
                        //menu name
                            "controller" => "unitmeasurement",
                            "method"     => "index",
                            "url"        => "units/unit-measurement-list",
                            "permission" => "read"
                        
                    ), 
                //group level name
                    "ingradient_list" => array(
                        //menu name
                            "controller" => "products",
                            "method"     => "index",
                            "url"        => "units/product-list",
                            "permission" => "read"
                        
                    ),
                    "destroyed_list" => array(
                        //menu name
                            "controller" => "products",
                            "method"     => "destroyed_product",
                            "url"        => "units/product-destroyed",
                            "permission" => "read"
                        
                    ), 
                    "categorylist" => array(
                        //menu name
                            "controller" => "category",
                            "method"     => "index",
                            "url"        => "units/category",
                            "permission" => "read"
                        
                    ), 
                    "supplier_list" => array(
                        //menu name
                            "controller" => "supplierlist",
                            "method"     => "index",
                            "url"        => "units/supplier-list",
                            "permission" => "read"
                        
                    ), 
                
                ); 
                $HmvcMenu2["house_keeping"] = array(
                    //set icon
                    "icon"           => "<i class='ti-brush'></i>
                ", 
                //group level name
                    "assign_room_cleaning" => array(
                        //menu name
                            "controller" => "house_keeping",
                            "method"     => "assign_room_cleaning",
                            "url"        => "house_keeping/assign-room-cleaning",
                            "permission" => "read"
                        
                    ),
                    "room_cleaning" => array(
                        //menu name
                            "controller" => "house_keeping",
                            "method"     => "room_cleaning",
                            "url"        => "house_keeping/room-cleaning",
                            "permission" => "read"
                        
                    ),
                    "checklist" => array(
                        //menu name
                            "controller" => "checklist",
                            "method"     => "index",
                            "url"        => "house_keeping/checklist",
                            "permission" => "read"
                        
                    ),
                    "roomqr_list" => array(
                        //menu name
                            "controller" => "qrmodule",
                            "method"     => "roomqrcode",
                            "url"        => "house_keeping/room-qrcode",
                            "permission" => "read"
                        
                    ),
                    "laundry" => array(
                        "reuse_list" => array(
                            //menu name
                                "controller" => "products",
                                "method"     => "reuse_stock",
                                "url"        => "house_keeping/product-laundry",
                                "permission" => "read"
                            
                        ), 
                        "item_cost" => array(
                            //menu name
                                "controller" => "house_keeping",
                                "method"     => "item_cost",
                                "url"        => "house_keeping/item_cost",
                                "permission" => "read"
                            
                        ),
                        "laundry_list" => array(
                            //menu name
                                "controller" => "house_keeping",
                                "method"     => "laundry",
                                "url"        => "house_keeping/laundry",
                                "permission" => "read"
                            
                        ),
                        "payment" => array(
                            //menu name
                                "controller" => "house_keeping",
                                "method"     => "laundry_payment",
                                "url"        => "house_keeping/payment_record",
                                "permission" => "read"
                            
                        ),
                    ),
                    "records" => array(
                        //menu name
                            "controller" => "report",
                            "method"     => "cleaningreport",
                            "url"        => "house_keeping/all-records",
                            "permission" => "read"
                        
                    ),
                    "reports" => array(
                        //menu name
                            "controller" => "report",
                            "method"     => "cleaningreport",
                            "url"        => "house_keeping/cleaning-report",
                            "permission" => "read"
                        
                    ),
                );
                $HmvcMenu2["pool_booking"] = array(
                    //set icon
                    "icon"           => "<i class='typcn typcn-waves'></i>
                ", 
                //group level name

                "pool_booking_list" => array(
                    //menu name
                        "controller" => "pool_setting",
                        "method"     => "booking_add",
                        "url"        => "pool_booking/add-booking",
                        "permission" => "read"
                    
                ),
                    "pool_package" => array(
                        //menu name
                            "controller" => "pool_setting",
                            "method"     => "pool_package",
                            "url"        => "pool_booking/pool-package",
                            "permission" => "read"
                        
                    ),
                    "swimming_pool" => array(
                        //menu name
                            "controller" => "pool_setting",
                            "method"     => "swimming_pool",
                            "url"        => "pool_booking/swimming-pool",
                            "permission" => "read"
                        
                    ),
                    "pool_type" => array(
                        //menu name
                            "controller" => "pool_setting",
                            "method"     => "pool_type_list",
                            "url"        => "pool_booking/pool-type",
                            "permission" => "read"
                        
                    ),
                    
                );
                $HmvcMenu2["duty_roster"] = array(
                    //set icon
                    "icon"           => "<i class='ti-calendar' ></i>
                ", 
                //group level name
                
                    'attendance_dashboard'    => array(
                        "controller" => "Shift_management",
                        "method"     => "attendance_dashboard",
                        "url"        => "duty_roster/attendance-dashboard",
                        "permission" => "read"
                    ), 
                    'shift_assign'    => array(
                        "controller" => "Shift_management",
                        "method"     => "shift_assign_list",
                        "url"        => "duty_roster/shift-assign",
                        "permission" => "read"
                    ), 
                    'shift_list'  => array( 
                        "controller" => "Shift_management",
                        "method"     => "index",
                        "url"        => "duty_roster/shift-list",
                        "permission" => "read"
                    ), 
                    'roster_list'  => array( 
                        "controller" => "Shift_management",
                        "method"     => "roster_list",
                        "url"        => "duty_roster/create-roster",
                        "permission" => "read"
                    ), 
                    
                );
                // module name
                $HmvcMenu2["transport_facility"] = array(
                    //set icon
                    "icon"           => "<i class='ti-car'></i>
                ", 
                //group level name 

                    "flight_details_list" => array(
                        //menu name
                            "controller" => "transport_setting",
                            "method"     => "index",
                            "url"        => "transport_facility/flight-list",
                            "permission" => "read"
                        
                    ),
                    "vehicle_details_list" => array(
                        //menu name
                            "controller" => "transport_setting",
                            "method"     => "index",
                            "url"        => "transport_facility/vehicle-list",
                            "permission" => "read"
                        
                    ),
                    "vehicle_booking_list" => array(
                        //menu name
                            "controller" => "transport_setting",
                            "method"     => "index",
                            "url"        => "transport_facility/vehicle-booking-list",
                            "permission" => "read"
                        
                    )
                    
                    
                );
                $HmvcMenu2["room_setting"] = array(
                    //set icon
                    "icon"           => "<i class='typcn typcn-spanner'></i>
                ", 
                //group level name
                    "bed_list" => array(
                        //menu name
                            "controller" => "bed_type",
                            "method"     => "index",
                            "url"        => "room_setting/bed-list",
                            "permission" => "read"
                        
                    ),
                    "bookingtype_list" => array(
                        //menu name
                            "controller" => "booking_type",
                            "method"     => "index",
                            "url"        => "room_setting/booking-type-list",
                            "permission" => "read"
                        
                    ), 
                    "booking_source" => array(
                        //menu name
                            "controller" => "booking_type",
                            "method"     => "btype_details",
                            "url"        => "room_setting/booking-type-details",
                            "permission" => "read"
                        
                    ), 
                    "complementary" => array(
                        //menu name
                            "controller" => "booking_type",
                            "method"     => "complementary",
                            "url"        => "room_setting/complementary-list",
                            "permission" => "read"
                        
                    ), 
                    "floorplan_list" => array(
                        //menu name
                            "controller" => "floorplan",
                            "method"     => "index",
                            "url"        => "room_setting/floor-plan-list",
                            "permission" => "read"
                        
                    ),
                    "room_list" => array(
                        //menu name
                            "controller" => "room_details",
                            "method"     => "index",
                            "url"        => "room_setting/room-list",
                            "permission" => "read"
                        
                    ),
                    "room_image" => array(
                        //menu name
                        "controller" => "room_images",
                        "method"     => "index",
                        "url"        => "room_setting/room-images",
                        "permission" => "read"
                        
                    ),
                    "promocode" => array(
                        //menu name
                            "controller" => "Promo_code",
                            "method"     => "index",
                            "url"        => "room_setting/promo-code",
                            "permission" => "read"
                        
                    ), 
                );
                $HmvcMenu2["tax_management"] = array(
                    //set icon
                    "icon"           => "<i class='ti-receipt'></i>
                ", 
                //group level name
                    "tax_list" => array(
                        //menu name
                            "controller" => "tax",
                            "method"     => "index",
                            "url"        => "tax_management/tax-list",
                            "permission" => "read"
                        
                    ),
                );
                    $path = 'application/modules/';
                    $map  = directory_map($path);
                    $HmvcMenu   = array();
                    if (is_array($map) && sizeof($map) > 0)
                    foreach ($map as $key => $value) {
                        $menu = str_replace("\\", '/', $path.$key.'config/menu.php'); 
                        if (file_exists($menu)) {
                            @include($menu);
                        }
        
                    }

                                if(isset($HmvcMenu2) && $HmvcMenu2!=null && sizeof($HmvcMenu2) > 0)
                                foreach ($HmvcMenu2 as $moduleName => $moduleData) {
                            
                                // check module permission 
                                if (file_exists(APPPATH.'modules/'.$moduleName.'/assets/data/env'))
                                if ($this->permission->module($moduleName)->access()) {
                        
                                $this->permission->module($moduleName)->access();
                                $allmenu = ['dashboard','accounts','customer','hrm','payment_setting','purchase','reports','room_facilities','room_reservation','room_setting','tax_management','units','addon','template'];
                            ?>
            <li class="<?php echo (($this->uri->segment(1)==$moduleName)?"mm-active":null) ?>">
                <a class="has-arrow material-ripple"
                    href="#"><?php echo (($moduleData['icon']!=null)?$moduleData['icon']:null) ?><?php echo display($moduleName); ?><span class="<?php echo (!in_array($moduleName,$allmenu)?"badges badges-inline badges-danger text-white mt-1 mr-4":"") ?>"><?php echo (!in_array($moduleName,$allmenu)?" Addon":""); ?></span></a>
                <ul class="nav-second-level <?php echo (($this->uri->segment(1)==$moduleName)?"mm-show":null) ?>">
                    <?php foreach ($moduleData as $groupLabel => $label) {
									if ($groupLabel!='icon') 
									if((isset($label['controller']) && $label['controller']!=null) && ($label['method']!=null)) {
									   if($this->permission->check_label($groupLabel)->access()){ 
									   ?>
                    <li
                        class="<?php $url=explode('/',$label['url']); echo (($this->uri->segment(2)==$url[1])?"active":null) ?>">
                        <a href="<?php echo base_url($label['url']) ?>"><?php echo display($groupLabel) ?></a>
                    </li>
                    <?php  } 
                            	} else { 
								if($this->permission->check_label($groupLabel)->access()){
								foreach ($label as $url)
								$liclass='';
                                $ulclass='';
								if(($this->uri->segment(1)==$moduleName)||(($moduleName.'/'.$this->uri->segment(2))==$url['url'])){
								$liclass='mm-active';
								   $ulclass='mm-show';
									}
								?>
                    <li class="">
                        <a class="has-arrow" href="#" aria-expanded="false"><?php echo display($groupLabel) ?></a>
                        <ul class="mm-collapse<?php echo $ulclass; ?> secondl">
                            <?php foreach ($label as $name => $value) {
                                            if($this->permission->check_label($name)->access()){ ?>
                            <li
                                class="<?php $url=explode('/',$value['url']); echo (($this->uri->segment(2)==$url[1])?"active":null) ?>">
                                <a href="<?php echo base_url($value['url']) ?>"><?php echo display($name) ?></a>
                            </li>
                            <?php 
                                            } //endif
                                        } //endforeach
                                        ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <!-- endif -->
                    <?php } ?>
                    <!-- endforeach -->
                    <?php } ?>
                </ul>
            </li>
            <!-- end if -->
            <?php } ?>
            <!-- end foreach -->
            <?php } ?>
            <?php if($this->session->userdata('isAdmin')) {?>
            <li class="<?php echo (($this->uri->segment(1)=="module")?"mm-active":null) ?>"><a
                    href="<?php echo base_url('module') ?>"><i
                        class="ti-widgetized"></i><span><?php echo display('moduless')?></span> </a></li>
            <li class="<?php echo (($this->uri->segment(1)=="autoupdate")?"mm-active":null) ?>"><a href="<?php echo base_url('autoupdate') ?>"><i class="ti-reload"></i><?php echo display("autoupdate");?></a></li>
            <li class="<?php echo (($this->uri->segment(1)=="setting")?"mm-active":null) ?>"><a
                    href="<?php echo base_url('setting') ?>"><i
                        class="ti-settings"></i><?php echo display('settings')?></a></li>
            <?php } ?>
        </ul>
    </nav>
</div><!-- sidebar-body -->