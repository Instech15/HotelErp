<?php

// module name
$HmvcMenu["hrm"] = array(
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
   

 