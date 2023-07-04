<?php
// module directory name
$HmvcConfig['hrm']["_title"]     = "HR Measurement";
$HmvcConfig['hrm']["_description"] = "HR Measurement";


// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['hrm']['_database'] = true;
$HmvcConfig['hrm']["_tables"] = array( 
	'emp_attendance',
	'award',
	'candidate_basic_info',
	'candidate_education_info',
	'candidate_workexperience',
	'candidate_shortlist',
	'candidate_interview',
	'candidate_selection',
	'job_advertisement',
	'department',
	'position',
	'employee_performance',
	'employee_salary_payment',
	'employee_history',
	'weekly_holiday',
	'payroll_holiday',
	'leave_apply',
	'grand_loan',
	'loan_installment',
	'salary_type',
	'salary_sheet_generate',
	'employee_salary_setup',
	'salary_setup_header'
	
);
