#
# TABLE STRUCTURE FOR: acc_account_name
#

DROP TABLE IF EXISTS `acc_account_name`;

CREATE TABLE `acc_account_name` (
  `account_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) NOT NULL,
  `account_type` int(11) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `acc_account_name` (`account_id`, `account_name`, `account_type`) VALUES ('1', 'Employee Salary', '0');
INSERT INTO `acc_account_name` (`account_id`, `account_name`, `account_type`) VALUES ('3', 'Example', '1');
INSERT INTO `acc_account_name` (`account_id`, `account_name`, `account_type`) VALUES ('4', 'Loan Expense', '0');
INSERT INTO `acc_account_name` (`account_id`, `account_name`, `account_type`) VALUES ('5', 'Loan Income', '1');


#
# TABLE STRUCTURE FOR: acc_coa
#

DROP TABLE IF EXISTS `acc_coa`;

CREATE TABLE `acc_coa` (
  `HeadCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PHeadName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadLevel` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsTransaction` tinyint(1) NOT NULL,
  `IsGL` tinyint(1) NOT NULL,
  `HeadType` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `IsBudget` tinyint(1) NOT NULL,
  `IsDepreciation` tinyint(1) NOT NULL,
  `DepreciationRate` decimal(18,2) NOT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL,
  PRIMARY KEY (`HeadName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000001', '145454-HmIsahaq', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2018-12-17 15:10:19', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021403', 'AC', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:33:55', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50202', 'Account Payable', 'Current Liabilities', '2', '1', '0', '1', 'L', '0', '0', '0.00', 'admin', '2015-10-15 19:50:43', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10203', 'Account Receivable', 'Current Asset', '2', '1', '0', '0', 'A', '0', '0', '0.00', '', '0000-00-00 00:00:00', 'admin', '2013-09-18 15:29:35');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020201', 'Advance', 'Advance, Deposit And Pre-payments', '3', '1', '0', '1', 'A', '0', '0', '0.00', 'Zoherul', '2015-05-31 13:29:12', 'admin', '2015-12-31 16:46:32');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102020103', 'Advance House Rent', 'Advance', '4', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-10-02 16:55:38', 'admin', '2016-10-02 16:57:32');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10202', 'Advance, Deposit And Pre-payments', 'Current Asset', '2', '1', '0', '0', 'A', '0', '0', '0.00', '', '0000-00-00 00:00:00', 'admin', '2015-12-31 16:46:24');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020602', 'Advertisement and Publicity', 'Promonational Expence', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:51:44', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010410', 'Air Cooler', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-05-23 12:13:55', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020603', 'AIT Against Advertisement', 'Promonational Expence', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:52:09', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1', 'Assets', 'COA', '0', '1', '0', '0', 'A', '0', '0', '0.00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010204', 'Attendance Machine', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:49:31', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40216', 'Audit Fee', 'Other Expenses', '2', '1', '1', '1', 'E', '0', '0', '0.00', 'admin', '2017-07-18 12:54:30', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010202', 'Bank AlFalah', 'Cash At Bank', '4', '1', '1', '1', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:32:37', 'admin', '2015-10-15 15:32:52');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021002', 'Bank Charge', 'Financial Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:21:03', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30203', 'Bank Interest', 'Other Income', '2', '1', '1', '1', 'I', '0', '0', '0.00', 'Obaidul', '2015-01-03 14:49:54', 'admin', '2016-09-25 11:04:19');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010104', 'Book Shelf', 'Furniture & Fixturers', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:46:11', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010407', 'Books and Journal', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:45:37', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10201020301', 'Branch 1', 'Standard Bank', '5', '1', '1', '1', 'A', '0', '0', '0.00', '2', '2018-07-19 13:44:33', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020604', 'Business Development Expenses', 'Promonational Expence', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:52:29', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020606', 'Campaign Expenses', 'Promonational Expence', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:52:57', 'admin', '2016-09-19 14:52:48');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020502', 'Campus Rent', 'House Rent', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:46:53', 'admin', '2017-04-27 17:02:39');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40212', 'Car Running Expenses', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:28:43', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10201', 'Cash & Cash Equivalent', 'Current Asset', '2', '1', '0', '0', 'A', '0', '0', '0.00', '', '0000-00-00 00:00:00', 'admin', '2015-10-15 15:57:55');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020102', 'Cash At Bank', 'Cash & Cash Equivalent', '3', '1', '0', '0', 'A', '0', '0', '0.00', '2', '2018-07-19 13:43:59', 'admin', '2015-10-15 15:32:42');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020101', 'Cash In Hand', 'Cash & Cash Equivalent', '3', '1', '1', '1', 'A', '0', '0', '0.00', '2', '2018-07-31 12:56:28', 'admin', '2016-05-23 12:05:43');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30101', 'Cash Sale', 'Store Income', '1', '1', '1', '1', 'I', '0', '0', '0.00', '2', '2018-07-08 07:51:26', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010207', 'CCTV', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:51:24', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102020102', 'CEO Current A/C', 'Advance', '4', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-09-25 11:54:54', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010101', 'Class Room Chair', 'Furniture & Fixturers', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:45:29', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021407', 'Close Circuit Cemera', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:35:35', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020601', 'Commision on Admission', 'Promonational Expence', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:51:21', 'admin', '2016-09-19 14:42:54');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010206', 'Computer', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:51:09', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021410', 'Computer (R)', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'Zoherul', '2016-03-24 12:38:52', 'Zoherul', '2016-03-24 12:41:40');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010102', 'Computer Table', 'Furniture & Fixturers', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:45:44', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('301020401', 'Continuing Registration fee - UoL (Income)', 'Registration Fee (UOL) Income', '4', '1', '1', '0', 'I', '0', '0', '0.00', 'admin', '2015-10-15 17:40:40', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020904', 'Contratuall Staff Salary', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:12:34', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('403', 'Cost of Sale', 'Expence', '0', '1', '1', '0', 'E', '0', '0', '0.00', '2', '2018-07-08 10:37:16', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30102', 'Credit Sale', 'Store Income', '1', '1', '1', '1', 'I', '0', '0', '0.00', '2', '2018-07-08 07:51:34', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020709', 'Cultural Expense', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'nasmud', '2017-04-29 12:45:10', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102', 'Current Asset', 'Assets', '1', '1', '0', '0', 'A', '0', '0', '0.00', '2', '2018-12-06 13:54:42', 'admin', '2018-07-07 11:23:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502', 'Current Liabilities', 'Liabilities', '1', '1', '0', '0', 'L', '0', '0', '0.00', 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030101', 'cus-0001-Walkin', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '2', '2019-01-08 09:14:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030102', 'cus-0002-Kawsar Ahmed', 'Customer Receivable', '4', '1', '0', '1', 'A', '0', '0', '0.00', '2', '2018-12-15 06:25:53', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030103', 'cus-0003-test', 'Customer Receivable', '4', '1', '0', '0', 'A', '0', '0', '0.00', '2', '2019-01-08 09:18:54', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030104', 'cus-0004-Ripon', 'Customer Receivable', '4', '1', '0', '1', 'A', '0', '0', '0.00', '2', '2018-12-15 06:26:51', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030105', 'cus-0005-ghfg', 'Customer Receivable', '4', '1', '0', '1', 'A', '0', '0', '0.00', '2', '2018-12-15 06:27:14', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030106', 'cus-0006-Jaman', 'Customer Receivable', '4', '1', '0', '0', 'A', '0', '0', '0.00', '2', '2019-01-08 09:15:28', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030107', 'cus-0007-Kamrul', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '2', '2018-12-15 06:45:44', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030108', 'cus-0008-Arafat', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '2', '2018-12-15 06:58:36', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030109', 'cus-0012-Jamil Hassan', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '14', '2019-02-03 19:42:47', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030110', 'cus-0013- nbmbm bmbnm', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '15', '2019-02-03 19:46:19', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030111', 'cus-0014- nbmbm bmbnm', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '16', '2019-02-04 10:14:44', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030112', 'cus-0015-jhon lio', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '17', '2019-02-04 10:23:42', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030113', 'cus-0016-jhon lio', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '18', '2019-02-04 10:25:24', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030114', 'cus-0017-test fgdhgf', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '19', '2019-02-04 11:08:05', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030115', 'cus-0018-jhon lio', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '20', '2019-02-04 11:25:51', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030116', 'cus-0019-jhon fgdhgf', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '21', '2019-02-04 11:26:45', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030117', 'cus-0020-jhsdfgsd dfgfdgd', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '22', '2019-02-04 11:29:29', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030118', 'cus-0021-fhfd dgdf ', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '23', '2019-02-04 11:30:16', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030119', 'cus-0022-naeem sdf', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '24', '2019-02-04 11:34:17', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030120', 'cus-0023-jhsdfgsd fgdhgf', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '25', '2019-02-04 11:40:22', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030121', 'cus-0030-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '32', '2019-02-10 09:29:09', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030122', 'cus-0031-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '33', '2019-02-10 11:05:56', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030123', 'cus-0032-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '34', '2019-02-10 11:06:18', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030124', 'cus-0033-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '35', '2019-02-10 11:08:27', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030125', 'cus-0034-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '36', '2019-02-10 11:08:38', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030126', 'cus-0035-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '37', '2019-02-10 11:08:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030127', 'cus-0036-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '38', '2019-02-10 11:09:36', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030128', 'cus-0037-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '39', '2019-02-10 11:10:26', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030129', 'cus-0038-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '40', '2019-02-10 11:11:11', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030130', 'cus-0039-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '41', '2019-02-10 11:11:28', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030131', 'cus-0040-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '42', '2019-02-10 11:12:43', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030132', 'cus-0041-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '43', '2019-02-10 11:13:14', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030133', 'cus-0042-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '44', '2019-02-10 11:14:43', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030134', 'cus-0043-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '45', '2019-02-10 11:21:14', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030135', 'cus-0044-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '46', '2019-02-10 14:00:27', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030136', 'cus-0045-teasdfdf kklama', 'Customer Receivable', '4', '1', '1', '0', 'A', '0', '0', '0.00', '47', '2019-02-10 14:09:05', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020301', 'Customer Receivable', 'Account Receivable', '3', '1', '0', '1', 'A', '0', '0', '0.00', '2', '2019-01-08 09:15:08', 'admin', '2018-07-07 12:31:42');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40100002', 'cw-Chichawatni', 'Store Expenses', '2', '1', '1', '0', 'E', '0', '0', '0.00', '2', '2018-08-02 16:30:41', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020202', 'Deposit', 'Advance, Deposit And Pre-payments', '3', '1', '0', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:40:42', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020605', 'Design & Printing Expense', 'Promonational Expence', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:55:00', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020404', 'Dish Bill', 'Utility Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:58:21', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40215', 'Dividend', 'Other Expenses', '2', '1', '1', '1', 'E', '0', '0', '0.00', 'admin', '2016-09-25 14:07:55', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020403', 'Drinking Water Bill', 'Utility Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:58:10', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010211', 'DSLR Camera', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:53:17', 'admin', '2016-01-02 16:23:25');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000007', 'E3Y1WJMB-John Maria', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2019-01-27 05:55:58', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000010', 'E4Y91CAX-onlineorder', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2019-02-03 11:20:44', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000004', 'E97E9SJT-Manik Hassan', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2019-01-09 14:32:22', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020908', 'Earned Leave', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:13:38', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000006', 'EBK2UPRA-John Carlos', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2019-01-27 05:51:09', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020607', 'Education Fair Expenses', 'Promonational Expence', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:53:42', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000011', 'EK9BYZVY-test sdafdssdfds', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2019-02-24 14:07:53', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010602', 'Electric Equipment', 'Electrical Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:44:51', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010203', 'Electric Kettle', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:49:07', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10106', 'Electrical Equipment', 'Non Current Assets', '2', '1', '0', '1', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:43:44', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020407', 'Electricity Bill', 'Utility Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:59:31', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10202010501', 'employ', 'Salary', '5', '1', '0', '0', 'A', '0', '0', '0.00', 'admin', '2018-07-05 11:47:10', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40201', 'Entertainment', 'Other Expenses', '2', '1', '1', '1', 'E', '0', '0', '0.00', 'admin', '2013-07-08 16:21:26', 'anwarul', '2013-07-17 14:21:47');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000002', 'EQLAJFUW-AinalHaque', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2018-12-17 15:08:43', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('2', 'Equity', 'COA', '0', '1', '0', '0', 'L', '0', '0', '0.00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000009', 'EU3APTYY-JohnDoe', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2019-01-27 06:02:46', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000005', 'EW9PM201-test emp', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2019-01-09 14:38:15', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000008', 'EXL9WSCL-Mitchel Santner', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2019-01-27 05:58:55', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4', 'Expence', 'COA', '0', '1', '0', '0', 'E', '0', '0', '0.00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020000003', 'EY2T1OWA-jahangirAhmad', 'Account Payable', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'John Doe', '2018-12-17 15:11:13', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020903', 'Faculty,Staff Salary & Allowances', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:12:21', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021404', 'Fax Machine', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:34:15', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020905', 'Festival & Incentive Bonus', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:12:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010103', 'File Cabinet', 'Furniture & Fixturers', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:46:02', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40210', 'Financial Expenses', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'anwarul', '2013-08-20 12:24:31', 'admin', '2015-10-15 19:20:36');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010403', 'Fire Extingushier', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:39:32', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021408', 'Furniture', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:35:47', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10101', 'Furniture & Fixturers', 'Non Current Assets', '2', '1', '0', '1', 'A', '0', '0', '0.00', 'anwarul', '2013-08-20 16:18:15', 'anwarul', '2013-08-21 13:35:40');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020406', 'Gas Bill', 'Utility Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:59:20', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('20201', 'General Reserve', 'Reserve & Surplus', '2', '1', '1', '0', 'L', '0', '0', '0.00', 'admin', '2016-09-25 14:07:12', 'admin', '2016-10-02 17:48:49');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10105', 'Generator', 'Non Current Assets', '2', '1', '1', '1', 'A', '0', '0', '0.00', 'Zoherul', '2016-02-27 16:02:35', 'admin', '2016-05-23 12:05:18');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021414', 'Generator Repair', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'Zoherul', '2016-06-16 10:21:05', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40213', 'Generator Running Expenses', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:29:29', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10103', 'Groceries and Cutleries', 'Non Current Assets', '2', '1', '1', '1', 'A', '0', '0', '0.00', '2', '2018-07-12 10:02:55', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010408', 'Gym Equipment', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:46:03', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020907', 'Honorarium', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:13:26', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40205', 'House Rent', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'anwarul', '2013-08-24 10:26:56', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40100001', 'HP-Hasilpur', 'Academic Expenses', '2', '1', '1', '0', 'E', '0', '0', '0.00', '2', '2018-07-29 03:44:23', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020702', 'HR Recruitment Expenses', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2016-09-25 12:55:49', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020703', 'Incentive on Admission', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2016-09-25 12:56:09', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('3', 'Income', 'COA', '0', '1', '0', '0', 'I', '0', '0', '0.00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30204', 'Income from Photocopy & Printing', 'Other Income', '2', '1', '1', '1', 'I', '0', '0', '0.00', 'Zoherul', '2015-07-14 10:29:54', 'admin', '2016-09-25 11:04:28');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020302', 'Income Tax Payable', 'Liabilities for Expenses', '3', '1', '0', '1', 'L', '0', '0', '0.00', 'admin', '2016-09-19 11:18:17', 'admin', '2016-09-28 13:18:35');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102020302', 'Insurance Premium', 'Prepayment', '4', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-09-19 13:10:57', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021001', 'Interest on Loan', 'Financial Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:20:53', 'admin', '2016-09-19 14:53:34');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020401', 'Internet Bill', 'Utility Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:56:55', 'admin', '2015-10-15 18:57:32');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10107', 'Inventory', 'Non Current Assets', '1', '1', '0', '0', 'A', '0', '0', '0.00', '2', '2018-07-07 15:21:58', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10205010101', 'Jahangir', 'Hasan', '1', '1', '0', '0', 'A', '0', '0', '0.00', '2', '2018-07-07 10:40:56', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010210', 'LCD TV', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:52:27', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30103', 'Lease Sale', 'Store Income', '1', '1', '1', '1', 'I', '0', '0', '0.00', '2', '2018-07-08 07:51:52', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5', 'Liabilities', 'COA', '0', '1', '0', '0', 'L', '0', '0', '0.00', 'admin', '2013-07-04 12:32:07', 'admin', '2015-10-15 19:46:54');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50203', 'Liabilities for Expenses', 'Current Liabilities', '2', '1', '0', '0', 'L', '0', '0', '0.00', 'admin', '2015-10-15 19:50:59', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020707', 'Library Expenses', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2017-01-10 15:34:54', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021409', 'Lift', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:36:12', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50101', 'Long Term Borrowing', 'Non Current Liabilities', '2', '1', '0', '1', 'L', '0', '0', '0.00', 'admin', '2013-07-04 12:32:26', 'admin', '2015-10-15 19:47:40');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020608', 'Marketing & Promotion Exp.', 'Promonational Expence', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:53:59', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020901', 'Medical Allowance', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:11:33', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010411', 'Metal Ditector', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'Zoherul', '2016-08-22 10:55:22', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021413', 'Micro Oven', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'Zoherul', '2016-05-12 14:53:51', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30202', 'Miscellaneous (Income)', 'Other Income', '2', '1', '1', '1', 'I', '0', '0', '0.00', 'anwarul', '2014-02-06 15:26:31', 'admin', '2016-09-25 11:04:35');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020909', 'Miscellaneous Benifit', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:13:53', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020701', 'Miscellaneous Exp', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2016-09-25 12:54:39', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40207', 'Miscellaneous Expenses', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'anwarul', '2014-04-26 16:49:56', 'admin', '2016-09-25 12:54:19');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010401', 'Mobile Phone', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-01-29 10:43:30', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102020101', 'Mr Ashiqur Rahman', 'Advance', '4', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-12-31 16:47:23', 'admin', '2016-09-25 11:55:13');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010212', 'Network Accessories', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-01-02 16:23:32', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020408', 'News Paper Bill', 'Utility Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2016-01-02 15:55:57', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('101', 'Non Current Assets', 'Assets', '1', '1', '0', '0', 'A', '0', '0', '0.00', '', '0000-00-00 00:00:00', 'admin', '2015-10-15 15:29:11');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('501', 'Non Current Liabilities', 'Liabilities', '1', '1', '0', '0', 'L', '0', '0', '0.00', 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010404', 'Office Decoration', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:40:02', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10102', 'Office Equipment', 'Non Current Assets', '2', '1', '0', '1', 'A', '0', '0', '0.00', 'anwarul', '2013-12-06 18:08:00', 'admin', '2015-10-15 15:48:21');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021401', 'Office Repair & Maintenance', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:33:15', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30201', 'Office Stationary (Income)', 'Other Income', '2', '1', '1', '1', 'I', '0', '0', '0.00', 'anwarul', '2013-07-17 15:21:06', 'admin', '2016-09-25 11:04:50');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('402', 'Other Expenses', 'Expence', '1', '1', '0', '0', 'E', '0', '0', '0.00', '2', '2018-07-07 14:00:16', 'admin', '2015-10-15 18:37:42');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('302', 'Other Income', 'Income', '1', '1', '0', '0', 'I', '0', '0', '0.00', '2', '2018-07-07 13:40:57', 'admin', '2016-09-25 11:04:09');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40211', 'Others (Non Academic Expenses)', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'Obaidul', '2014-12-03 16:05:42', 'admin', '2015-10-15 19:22:09');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30205', 'Others (Non-Academic Income)', 'Other Income', '2', '1', '0', '1', 'I', '0', '0', '0.00', 'admin', '2015-10-15 17:23:49', 'admin', '2015-10-15 17:57:52');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10104', 'Others Assets', 'Non Current Assets', '2', '1', '0', '1', 'A', '0', '0', '0.00', 'admin', '2016-01-29 10:43:16', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020910', 'Outstanding Salary', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'Zoherul', '2016-04-24 11:56:50', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021405', 'Oven', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:34:31', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021412', 'PABX-Repair', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'Zoherul', '2016-04-24 14:40:18', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020902', 'Part-time Staff Salary', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:12:06', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010202', 'Photocopy & Fax Machine', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:47:27', 'admin', '2016-05-23 12:14:40');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021411', 'Photocopy Machine Repair', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'Zoherul', '2016-04-24 12:40:02', 'admin', '2017-04-27 17:03:17');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('3020503', 'Practical Fee', 'Others (Non-Academic Income)', '3', '1', '1', '1', 'I', '0', '0', '0.00', 'admin', '2017-07-22 18:00:37', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020203', 'Prepayment', 'Advance, Deposit And Pre-payments', '3', '1', '0', '1', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:40:51', 'admin', '2015-12-31 16:49:58');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010201', 'Printer', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:47:15', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40202', 'Printing and Stationary', 'Other Expenses', '2', '1', '1', '1', 'E', '0', '0', '0.00', 'admin', '2013-07-08 16:21:45', 'admin', '2016-09-19 14:39:32');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('3020502', 'Professional Training Course(Oracal-1)', 'Others (Non-Academic Income)', '3', '1', '1', '0', 'I', '0', '0', '0.00', 'nasim', '2017-06-22 13:28:05', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30207', 'Professional Training Course(Oracal)', 'Other Income', '2', '1', '0', '1', 'I', '0', '0', '0.00', 'nasim', '2017-06-22 13:24:16', 'nasim', '2017-06-22 13:25:56');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010208', 'Projector', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:51:44', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40206', 'Promonational Expence', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'anwarul', '2013-07-11 13:48:57', 'anwarul', '2013-07-17 14:23:03');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40214', 'Repair and Maintenance', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:32:46', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('202', 'Reserve & Surplus', 'Equity', '1', '1', '0', '1', 'L', '0', '0', '0.00', 'admin', '2016-09-25 14:06:34', 'admin', '2016-10-02 17:48:57');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('20102', 'Retained Earnings', 'Share Holders Equity', '2', '1', '1', '1', 'L', '0', '0', '0.00', 'admin', '2016-05-23 11:20:40', 'admin', '2016-09-25 14:05:06');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020708', 'River Cruse', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2017-04-24 15:35:25', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102020105', 'Salary', 'Advance', '4', '1', '0', '0', 'A', '0', '0', '0.00', 'admin', '2018-07-05 11:46:44', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40209', 'Salary & Allowances', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'anwarul', '2013-12-12 11:22:58', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('404', 'Sale Discount', 'Expence', '1', '1', '1', '0', 'E', '0', '0', '0.00', '2', '2018-07-19 10:15:11', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010406', 'Security Equipment', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:41:30', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('20101', 'Share Capital', 'Share Holders Equity', '2', '1', '0', '1', 'L', '0', '0', '0.00', 'anwarul', '2013-12-08 19:37:32', 'admin', '2015-10-15 19:45:35');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('201', 'Share Holders Equity', 'Equity', '1', '1', '0', '0', 'L', '0', '0', '0.00', '', '0000-00-00 00:00:00', 'admin', '2015-10-15 19:43:51');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50201', 'Short Term Borrowing', 'Current Liabilities', '2', '1', '0', '1', 'L', '0', '0', '0.00', 'admin', '2015-10-15 19:50:30', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40208', 'Software Development Expenses', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'anwarul', '2013-11-21 14:13:01', 'admin', '2015-10-15 19:02:51');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020906', 'Special Allowances', 'Salary & Allowances', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:13:13', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50102', 'Sponsors Loan', 'Non Current Liabilities', '2', '1', '0', '1', 'L', '0', '0', '0.00', 'admin', '2015-10-15 19:48:02', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020706', 'Sports Expense', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'nasmud', '2016-11-09 13:16:53', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010203', 'Standard Bank', 'Cash At Bank', '4', '1', '1', '1', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:33:33', 'admin', '2015-10-15 15:33:48');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010204', 'State Bank', 'Cash At Bank', '4', '1', '1', '1', 'A', '0', '0', '0.00', 'admin', '2015-12-31 16:44:14', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('401', 'Store Expenses', 'Expence', '1', '1', '0', '0', 'E', '0', '0', '0.00', '2', '2018-07-07 13:38:59', 'admin', '2015-10-15 17:58:46');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('301', 'Store Income', 'Income', '1', '1', '0', '0', 'I', '0', '0', '0.00', '2', '2018-07-07 13:40:37', 'admin', '2015-09-17 17:00:02');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('3020501', 'Students Info. Correction Fee', 'Others (Non-Academic Income)', '3', '1', '1', '0', 'I', '0', '0', '0.00', 'admin', '2015-10-15 17:24:45', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010601', 'Sub Station', 'Electrical Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:44:11', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020501', 'sup_001-Md. Kamal Hossain', 'Suppliers', '4', '1', '1', '1', 'L', '0', '0', '0.00', '2', '2018-12-10 10:17:16', '2', '2018-11-15 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020502', 'sup_002-Ilias Ali', 'Suppliers', '4', '1', '1', '0', 'L', '0', '0', '0.00', '2', '2018-11-15 00:00:00', '2', '2018-11-15 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020503', 'sup_003-Helal Uddin', 'Suppliers', '4', '1', '1', '0', 'L', '0', '0', '0.00', '2', '2018-11-15 00:00:00', '2', '2018-11-15 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020504', 'sup_004-jack1', 'Suppliers', '4', '1', '1', '0', 'L', '0', '0', '0.00', '2', '2018-11-15 00:00:00', '2', '2018-12-10 11:40:05');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020206', 'sup_005-owen', 'Suppliers', '4', '1', '1', '0', 'L', '0', '0', '0.00', '2', '2018-12-10 11:48:07', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020506', 'sup_006-Md. Rahman', 'Suppliers', '4', '1', '1', '0', 'L', '0', '0', '0.00', '2', '2018-12-15 06:34:19', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020505', 'sup_006-owen', 'Suppliers', '4', '1', '1', '0', 'L', '0', '0', '0.00', '2', '2018-12-09 06:57:02', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020507', 'sup_007-testsuppp', 'Suppliers', '4', '1', '1', '0', 'L', '0', '0', '0.00', '2', '2019-01-08 10:38:25', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020205', 'Suppliers', 'Account Payable', '3', '1', '0', '1', 'L', '0', '0', '0.00', '2', '2018-12-15 06:50:12', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020704', 'TB Care Expenses', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2016-10-08 13:03:04', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30206', 'TB Care Income', 'Other Income', '2', '1', '1', '1', 'I', '0', '0', '0.00', 'admin', '2016-10-08 13:00:56', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020501', 'TDS on House Rent', 'House Rent', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:44:07', 'admin', '2016-09-19 14:40:16');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502030201', 'TDS Payable House Rent', 'Income Tax Payable', '4', '1', '1', '0', 'L', '0', '0', '0.00', 'admin', '2016-09-19 11:19:42', 'admin', '2016-09-28 13:19:37');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502030203', 'TDS Payable on Advertisement Bill', 'Income Tax Payable', '4', '1', '1', '0', 'L', '0', '0', '0.00', 'admin', '2016-09-28 13:20:51', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502030202', 'TDS Payable on Salary', 'Income Tax Payable', '4', '1', '1', '0', 'L', '0', '0', '0.00', 'admin', '2016-09-28 13:20:17', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021402', 'Tea Kettle', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:33:45', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020402', 'Telephone Bill', 'Utility Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:57:59', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010209', 'Telephone Set & PABX', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:51:57', 'admin', '2016-10-02 17:10:40');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102020104', 'Test', 'Advance', '4', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2018-07-05 11:42:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40203', 'Travelling & Conveyance', 'Other Expenses', '2', '1', '1', '1', 'E', '0', '0', '0.00', 'admin', '2013-07-08 16:22:06', 'admin', '2015-10-15 18:45:13');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4021406', 'TV', 'Repair and Maintenance', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 19:35:07', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010205', 'UPS', 'Office Equipment', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:50:38', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40204', 'Utility Expenses', 'Other Expenses', '2', '1', '0', '1', 'E', '0', '0', '0.00', 'anwarul', '2013-07-11 16:20:24', 'admin', '2016-01-02 15:55:22');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020503', 'VAT on House Rent Exp', 'House Rent', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:49:22', 'admin', '2016-09-25 14:00:52');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020301', 'VAT Payable', 'Liabilities for Expenses', '3', '1', '0', '1', 'L', '0', '0', '0.00', 'admin', '2015-10-15 19:51:11', 'admin', '2016-09-28 13:23:53');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010409', 'Vehicle A/C', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'Zoherul', '2016-05-12 12:13:21', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010405', 'Voltage Stablizer', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-03-27 10:40:59', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010105', 'Waiting Sofa - Steel', 'Furniture & Fixturers', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2015-10-15 15:46:29', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020405', 'WASA Bill', 'Utility Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2015-10-15 18:58:51', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1010402', 'Water Purifier', 'Others Assets', '3', '1', '1', '0', 'A', '0', '0', '0.00', 'admin', '2016-01-29 11:14:11', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4020705', 'Website Development Expenses', 'Miscellaneous Expenses', '3', '1', '1', '0', 'E', '0', '0', '0.00', 'admin', '2016-10-15 12:42:47', '', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: acc_customer_income
#

DROP TABLE IF EXISTS `acc_customer_income`;

CREATE TABLE `acc_customer_income` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_Id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `VNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: acc_glsummarybalance
#

DROP TABLE IF EXISTS `acc_glsummarybalance`;

CREATE TABLE `acc_glsummarybalance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `COAID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `FYear` int(11) DEFAULT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: acc_income_expence
#

DROP TABLE IF EXISTS `acc_income_expence`;

CREATE TABLE `acc_income_expence` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Student_Id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Paymode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Perpose` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Narration` text COLLATE utf8_unicode_ci NOT NULL,
  `StoreID` int(11) NOT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `IsApprove` tinyint(4) NOT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: acc_temp
#

DROP TABLE IF EXISTS `acc_temp`;

CREATE TABLE `acc_temp` (
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Debit` decimal(18,2) NOT NULL,
  `Credit` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: acc_transaction
#

DROP TABLE IF EXISTS `acc_transaction`;

CREATE TABLE `acc_transaction` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vtype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Narration` text COLLATE utf8_unicode_ci,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `StoreID` int(11) NOT NULL,
  `IsPosted` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `IsAppove` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('1', '04536', 'PO', '2019-01-08', '10107', 'PO Receive Receive No 20190108103000', '3200.00', '0.00', '0', '1', '2', '2019-01-08 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('2', '04536', 'PO', '2019-01-08', '502020501', 'PO received For PO No.04536 Receive No.20190108103000', '0.00', '3200.00', '0', '1', '2', '2019-01-08 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('3', '04536', 'PO', '2019-01-08', '502020501', 'Paid For PO No.04536 Receive No.20190108103000', '3200.00', '0.00', '0', '1', '2', '2019-01-08 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('4', '04536', 'PO', '2019-01-08', '1020101', 'Paid For PO No.04536 Receive No.20190108103000', '0.00', '3200.00', '0', '1', '2', '2019-01-08 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('5', '543212', 'PO', '2019-01-08', '10107', 'PO Receive Receive No 20190108112758', '1048.00', '0.00', '0', '1', '2', '2019-01-08 00:00:00', '2', '2019-01-08 00:00:00', '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('6', '543212', 'PO', '2019-01-08', '502020502', 'PO received For PO No.543212 Receive No.20190108112758', '0.00', '1048.00', '0', '1', '2', '2019-01-08 00:00:00', '2', '2019-01-08 00:00:00', '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('7', '543212', 'PO', '2019-01-08', '502020502', 'Paid For PO No.543212 Receive No.20190108112758', '1048.00', '0.00', '0', '1', '2', '2019-01-08 00:00:00', '2', '2019-01-08 00:00:00', '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('8', '543212', 'PO', '2019-01-08', '1020101', 'Paid For PO No.543212 Receive No.20190108112758', '0.00', '1048.00', '0', '1', '2', '2019-01-08 00:00:00', '2', '2019-01-08 00:00:00', '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('9', '0084', 'CIV', '2019-01-08', '102030101', 'Customer debit for Product Invoice#0084', '805.00', '0.00', '0', '1', '2', '2019-01-08 14:56:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('10', '0084', 'CIV', '2019-01-08', '10107', 'Inventory Credit for Product Invoice#0084', '0.00', '805.00', '0', '1', '2', '2019-01-08 14:56:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('11', '0084', 'CIV', '2019-01-08', '102030101', 'Customer Credit for Product Invoice#0084', '0.00', '805.00', '0', '1', '2', '2019-01-08 14:56:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('12', '0084', 'CIV', '2019-01-08', '1020101', 'Cash in hand Debit For Invoice#0084', '805.00', '0.00', '0', '1', '2', '2019-01-08 14:56:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('13', '0083', 'CIV', '2019-01-08', '102030101', 'Customer debit for Product Invoice#0083', '805.00', '0.00', '0', '1', '2', '2019-01-08 14:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('14', '0083', 'CIV', '2019-01-08', '10107', 'Inventory Credit for Product Invoice#0083', '0.00', '805.00', '0', '1', '2', '2019-01-08 14:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('15', '0083', 'CIV', '2019-01-08', '102030101', 'Customer Credit for Product Invoice#0083', '0.00', '805.00', '0', '1', '2', '2019-01-08 14:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('16', '0083', 'CIV', '2019-01-08', '1020101', 'Cash in hand Debit For Invoice#0083', '805.00', '0.00', '0', '1', '2', '2019-01-08 14:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('21', '15', 'Salary', '2019-01-09', '1020101', 'Cash in hand Debit For Employee IdEQLAJFUW', '8.54', '0.00', '0', '1', '2', '2019-01-09 14:39:33', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('22', '15', 'Salary', '2019-01-09', '502020000002', 'Salary For Employee IdEQLAJFUW', '0.00', '8.54', '0', '1', '2', '2019-01-09 14:39:33', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('23', '14', 'Salary', '2019-01-09', '1020101', 'Cash in hand Debit For Employee Id145454', '17.69', '0.00', '0', '1', '2', '2019-01-09 14:39:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('24', '14', 'Salary', '2019-01-09', '502020000001', 'Salary For Employee Id145454', '0.00', '17.69', '0', '1', '2', '2019-01-09 14:39:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('25', '0089', 'CIV', '2019-01-23', '102030101', 'Customer debit for Product Invoice#0089', '1550.00', '0.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('26', '0089', 'CIV', '2019-01-23', '10107', 'Inventory Credit for Product Invoice#0089', '0.00', '1550.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('27', '0089', 'CIV', '2019-01-23', '102030101', 'Customer Credit for Product Invoice#0089', '0.00', '1550.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('28', '0089', 'CIV', '2019-01-23', '1020101', 'Cash in hand Debit For Invoice#0089', '1550.00', '0.00', '0', '1', NULL, '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('29', '0090', 'CIV', '2019-01-23', '102030101', 'Customer debit for Product Invoice#0090', '1550.00', '0.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('30', '0090', 'CIV', '2019-01-23', '10107', 'Inventory Credit for Product Invoice#0090', '0.00', '1550.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('31', '0090', 'CIV', '2019-01-23', '102030101', 'Customer Credit for Product Invoice#0090', '0.00', '1550.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('32', '0090', 'CIV', '2019-01-23', '1020101', 'Cash in hand Debit For Invoice#0090', '1550.00', '0.00', '0', '1', NULL, '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('33', '0091', 'CIV', '2019-01-23', '102030101', 'Customer debit for Product Invoice#0091', '1550.00', '0.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('34', '0091', 'CIV', '2019-01-23', '10107', 'Inventory Credit for Product Invoice#0091', '0.00', '1550.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('35', '0091', 'CIV', '2019-01-23', '102030101', 'Customer Credit for Product Invoice#0091', '0.00', '1550.00', '0', '1', '166', '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('36', '0091', 'CIV', '2019-01-23', '1020101', 'Cash in hand Debit For Invoice#0091', '1550.00', '0.00', '0', '1', NULL, '2019-01-23 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('37', '0092', 'CIV', '2019-01-23', '102030101', 'Customer debit for Product Invoice#0092', NULL, '0.00', '0', '1', '166', '2019-02-11 13:49:46', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('38', '0092', 'CIV', '2019-01-23', '10107', 'Inventory Credit for Product Invoice#0092', '0.00', NULL, '0', '1', '166', '2019-02-11 13:50:13', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('39', '0092', 'CIV', '2019-01-23', '102030101', 'Customer Credit for Product Invoice#0092', '0.00', NULL, '0', '1', '166', '2019-02-11 13:49:46', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('40', '0092', 'CIV', '2019-01-23', '1020101', 'Cash in hand Debit For Invoice#0092', NULL, '0.00', '0', '1', '166', '2019-02-11 13:50:13', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('41', '0100', 'CIV', '2019-02-03', '102030108', 'Customer debit for Product Invoice#0100', '2009.25', '0.00', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('42', '0100', 'CIV', '2019-02-03', '10107', 'Inventory Credit for Product Invoice#0100', '0.00', '2009.25', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('43', '0100', 'CIV', '2019-02-03', '102030108', 'Customer Credit for Product Invoice#0100', '0.00', '2009.25', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('44', '0100', 'CIV', '2019-02-03', '1020101', 'Cash in hand Debit For Invoice#0100', '2009.25', '0.00', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('45', '0101', 'CIV', '2019-02-03', '102030109', 'Customer debit for Product Invoice#0101', '2112.75', '0.00', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('46', '0101', 'CIV', '2019-02-03', '10107', 'Inventory Credit for Product Invoice#0101', '0.00', '2112.75', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('47', '0101', 'CIV', '2019-02-03', '102030109', 'Customer Credit for Product Invoice#0101', '0.00', '2112.75', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('48', '0101', 'CIV', '2019-02-03', '1020101', 'Cash in hand Debit For Invoice#0101', '2112.75', '0.00', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('49', '0102', 'CIV', '2019-02-03', '102030110', 'Customer debit for Product Invoice#0102', '692.50', '0.00', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('50', '0102', 'CIV', '2019-02-03', '10107', 'Inventory Credit for Product Invoice#0102', '0.00', '692.50', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('51', '0102', 'CIV', '2019-02-03', '102030110', 'Customer Credit for Product Invoice#0102', '0.00', '692.50', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('52', '0102', 'CIV', '2019-02-03', '1020101', 'Cash in hand Debit For Invoice#0102', '692.50', '0.00', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('53', '0103', 'CIV', '2019-02-03', '102030110', 'Customer debit for Product Invoice#0103', '692.50', '0.00', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('54', '0103', 'CIV', '2019-02-03', '10107', 'Inventory Credit for Product Invoice#0103', '0.00', '692.50', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('55', '0103', 'CIV', '2019-02-03', '102030110', 'Customer Credit for Product Invoice#0103', '0.00', '692.50', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('56', '0103', 'CIV', '2019-02-03', '1020101', 'Cash in hand Debit For Invoice#0103', '692.50', '0.00', '0', '1', '2', '2019-02-03 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('57', '0104', 'CIV', '2019-02-04', '102030111', 'Customer debit for Product Invoice#0104', '807.50', '0.00', '0', '1', '2', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('58', '0104', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0104', '0.00', '807.50', '0', '1', '2', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('59', '0104', 'CIV', '2019-02-04', '102030111', 'Customer Credit for Product Invoice#0104', '0.00', '807.50', '0', '1', '2', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('60', '0104', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0104', '807.50', '0.00', '0', '1', '2', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('61', '0106', 'CIV', '2019-02-04', '102030113', 'Customer debit for Product Invoice#0106', '778.75', '0.00', '0', '1', '18', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('62', '0106', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0106', '0.00', '778.75', '0', '1', '18', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('63', '0106', 'CIV', '2019-02-04', '102030113', 'Customer Credit for Product Invoice#0106', '0.00', '778.75', '0', '1', '18', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('64', '0106', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0106', '778.75', '0.00', '0', '1', '18', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('65', '0107', 'CIV', '2019-02-04', '102030114', 'Customer debit for Product Invoice#0107', '778.75', '0.00', '0', '1', '19', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('66', '0107', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0107', '0.00', '778.75', '0', '1', '19', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('67', '0107', 'CIV', '2019-02-04', '102030114', 'Customer Credit for Product Invoice#0107', '0.00', '778.75', '0', '1', '19', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('68', '0107', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0107', '778.75', '0.00', '0', '1', '19', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('69', '0108', 'CIV', '2019-02-04', '102030115', 'Customer debit for Product Invoice#0108', '748.75', '0.00', '0', '1', '20', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('70', '0108', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0108', '0.00', '748.75', '0', '1', '20', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('71', '0108', 'CIV', '2019-02-04', '102030115', 'Customer Credit for Product Invoice#0108', '0.00', '748.75', '0', '1', '20', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('72', '0108', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0108', '748.75', '0.00', '0', '1', '20', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('73', '0109', 'CIV', '2019-02-04', '102030116', 'Customer debit for Product Invoice#0109', '778.75', '0.00', '0', '1', '21', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('74', '0109', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0109', '0.00', '778.75', '0', '1', '21', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('75', '0109', 'CIV', '2019-02-04', '102030116', 'Customer Credit for Product Invoice#0109', '0.00', '778.75', '0', '1', '21', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('76', '0109', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0109', '778.75', '0.00', '0', '1', '21', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('77', '0110', 'CIV', '2019-02-04', '102030117', 'Customer debit for Product Invoice#0110', '801.75', '0.00', '0', '1', '22', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('78', '0110', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0110', '0.00', '801.75', '0', '1', '22', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('79', '0110', 'CIV', '2019-02-04', '102030117', 'Customer Credit for Product Invoice#0110', '0.00', '801.75', '0', '1', '22', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('80', '0110', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0110', '801.75', '0.00', '0', '1', '22', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('81', '0111', 'CIV', '2019-02-04', '102030118', 'Customer debit for Product Invoice#0111', '968.75', '0.00', '0', '1', '23', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('82', '0111', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0111', '0.00', '968.75', '0', '1', '23', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('83', '0111', 'CIV', '2019-02-04', '102030118', 'Customer Credit for Product Invoice#0111', '0.00', '968.75', '0', '1', '23', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('84', '0111', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0111', '968.75', '0.00', '0', '1', '23', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('85', '0112', 'CIV', '2019-02-04', '102030119', 'Customer debit for Product Invoice#0112', '865.00', '0.00', '0', '1', '24', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('86', '0112', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0112', '0.00', '865.00', '0', '1', '24', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('87', '0112', 'CIV', '2019-02-04', '102030119', 'Customer Credit for Product Invoice#0112', '0.00', '865.00', '0', '1', '24', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('88', '0112', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0112', '865.00', '0.00', '0', '1', '24', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('89', '0113', 'CIV', '2019-02-04', '102030120', 'Customer debit for Product Invoice#0113', '692.50', '0.00', '0', '1', '25', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('90', '0113', 'CIV', '2019-02-04', '10107', 'Inventory Credit for Product Invoice#0113', '0.00', '692.50', '0', '1', '25', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('91', '0113', 'CIV', '2019-02-04', '102030120', 'Customer Credit for Product Invoice#0113', '0.00', '692.50', '0', '1', '25', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('92', '0113', 'CIV', '2019-02-04', '1020101', 'Cash in hand Debit For Invoice#0113', '692.50', '0.00', '0', '1', '25', '2019-02-04 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('93', '0114', 'CIV', '2019-02-05', '102030110', 'Customer debit for Product Invoice#0114', '843.00', '0.00', '0', '1', '15', '2019-02-05 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('94', '0114', 'CIV', '2019-02-05', '10107', 'Inventory Credit for Product Invoice#0114', '0.00', '843.00', '0', '1', '15', '2019-02-05 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('95', '0114', 'CIV', '2019-02-05', '102030110', 'Customer Credit for Product Invoice#0114', '0.00', '843.00', '0', '1', '15', '2019-02-05 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('96', '0114', 'CIV', '2019-02-05', '1020101', 'Cash in hand Debit For Invoice#0114', '843.00', '0.00', '0', '1', '15', '2019-02-05 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('97', '0115', 'CIV', '2019-02-06', '102030119', 'Customer debit for Product Invoice#0115', '889.00', '0.00', '0', '1', '24', '2019-02-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('98', '0115', 'CIV', '2019-02-06', '10107', 'Inventory Credit for Product Invoice#0115', '0.00', '889.00', '0', '1', '24', '2019-02-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('99', '0115', 'CIV', '2019-02-06', '102030119', 'Customer Credit for Product Invoice#0115', '0.00', '889.00', '0', '1', '24', '2019-02-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('100', '0115', 'CIV', '2019-02-06', '1020101', 'Cash in hand Debit For Invoice#0115', '889.00', '0.00', '0', '1', '24', '2019-02-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('101', '0117', 'CIV', '2019-02-06', '102030101', 'Customer debit for Product Invoice#0117', '1457.50', '0.00', '0', '1', '2', '2019-02-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('102', '0117', 'CIV', '2019-02-06', '10107', 'Inventory Credit for Product Invoice#0117', '0.00', '1457.50', '0', '1', '2', '2019-02-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('103', '0117', 'CIV', '2019-02-06', '102030101', 'Customer Credit for Product Invoice#0117', '0.00', '1457.50', '0', '1', '2', '2019-02-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('104', '0117', 'CIV', '2019-02-06', '1020101', 'Cash in hand Debit For Invoice#0117', '1457.50', '0.00', '0', '1', '2', '2019-02-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('105', '0118', 'CIV', '2019-02-10', '102030121', 'Customer debit for Product Invoice#0118', '500.00', '0.00', '0', '1', '32', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('106', '0118', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0118', '0.00', '500.00', '0', '1', '32', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('107', '0118', 'CIV', '2019-02-10', '102030121', 'Customer Credit for Product Invoice#0118', '0.00', '500.00', '0', '1', '32', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('108', '0118', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0118', '500.00', '0.00', '0', '1', '32', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('109', '0119', 'CIV', '2019-02-10', '102030122', 'Customer debit for Product Invoice#0119', '500.00', '0.00', '0', '1', '33', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('110', '0119', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0119', '0.00', '500.00', '0', '1', '33', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('111', '0119', 'CIV', '2019-02-10', '102030122', 'Customer Credit for Product Invoice#0119', '0.00', '500.00', '0', '1', '33', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('112', '0119', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0119', '500.00', '0.00', '0', '1', '33', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('113', '0120', 'CIV', '2019-02-10', '102030123', 'Customer debit for Product Invoice#0120', '500.00', '0.00', '0', '1', '34', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('114', '0120', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0120', '0.00', '500.00', '0', '1', '34', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('115', '0120', 'CIV', '2019-02-10', '102030123', 'Customer Credit for Product Invoice#0120', '0.00', '500.00', '0', '1', '34', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('116', '0120', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0120', '500.00', '0.00', '0', '1', '34', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('117', '0121', 'CIV', '2019-02-10', '102030124', 'Customer debit for Product Invoice#0121', '500.00', '0.00', '0', '1', '35', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('118', '0121', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0121', '0.00', '500.00', '0', '1', '35', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('119', '0121', 'CIV', '2019-02-10', '102030124', 'Customer Credit for Product Invoice#0121', '0.00', '500.00', '0', '1', '35', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('120', '0121', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0121', '500.00', '0.00', '0', '1', '35', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('121', '0122', 'CIV', '2019-02-10', '102030125', 'Customer debit for Product Invoice#0122', '500.00', '0.00', '0', '1', '36', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('122', '0122', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0122', '0.00', '500.00', '0', '1', '36', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('123', '0122', 'CIV', '2019-02-10', '102030125', 'Customer Credit for Product Invoice#0122', '0.00', '500.00', '0', '1', '36', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('124', '0122', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0122', '500.00', '0.00', '0', '1', '36', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('125', '0123', 'CIV', '2019-02-10', '102030126', 'Customer debit for Product Invoice#0123', '500.00', '0.00', '0', '1', '37', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('126', '0123', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0123', '0.00', '500.00', '0', '1', '37', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('127', '0123', 'CIV', '2019-02-10', '102030126', 'Customer Credit for Product Invoice#0123', '0.00', '500.00', '0', '1', '37', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('128', '0123', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0123', '500.00', '0.00', '0', '1', '37', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('129', '0124', 'CIV', '2019-02-10', '102030127', 'Customer debit for Product Invoice#0124', '500.00', '0.00', '0', '1', '38', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('130', '0124', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0124', '0.00', '500.00', '0', '1', '38', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('131', '0124', 'CIV', '2019-02-10', '102030127', 'Customer Credit for Product Invoice#0124', '0.00', '500.00', '0', '1', '38', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('132', '0124', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0124', '500.00', '0.00', '0', '1', '38', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('133', '0125', 'CIV', '2019-02-10', '102030128', 'Customer debit for Product Invoice#0125', '500.00', '0.00', '0', '1', '39', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('134', '0125', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0125', '0.00', '500.00', '0', '1', '39', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('135', '0125', 'CIV', '2019-02-10', '102030128', 'Customer Credit for Product Invoice#0125', '0.00', '500.00', '0', '1', '39', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('136', '0125', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0125', '500.00', '0.00', '0', '1', '39', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('137', '0126', 'CIV', '2019-02-10', '102030129', 'Customer debit for Product Invoice#0126', '500.00', '0.00', '0', '1', '40', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('138', '0126', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0126', '0.00', '500.00', '0', '1', '40', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('139', '0126', 'CIV', '2019-02-10', '102030129', 'Customer Credit for Product Invoice#0126', '0.00', '500.00', '0', '1', '40', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('140', '0126', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0126', '500.00', '0.00', '0', '1', '40', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('141', '0127', 'CIV', '2019-02-10', '102030130', 'Customer debit for Product Invoice#0127', '500.00', '0.00', '0', '1', '41', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('142', '0127', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0127', '0.00', '500.00', '0', '1', '41', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('143', '0127', 'CIV', '2019-02-10', '102030130', 'Customer Credit for Product Invoice#0127', '0.00', '500.00', '0', '1', '41', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('144', '0127', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0127', '500.00', '0.00', '0', '1', '41', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('145', '0128', 'CIV', '2019-02-10', '102030131', 'Customer debit for Product Invoice#0128', '500.00', '0.00', '0', '1', '42', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('146', '0128', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0128', '0.00', '500.00', '0', '1', '42', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('147', '0128', 'CIV', '2019-02-10', '102030131', 'Customer Credit for Product Invoice#0128', '0.00', '500.00', '0', '1', '42', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('148', '0128', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0128', '500.00', '0.00', '0', '1', '42', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('149', '0129', 'CIV', '2019-02-10', '102030132', 'Customer debit for Product Invoice#0129', '500.00', '0.00', '0', '1', '43', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('150', '0129', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0129', '0.00', '500.00', '0', '1', '43', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('151', '0129', 'CIV', '2019-02-10', '102030132', 'Customer Credit for Product Invoice#0129', '0.00', '500.00', '0', '1', '43', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('152', '0129', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0129', '500.00', '0.00', '0', '1', '43', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('153', '0130', 'CIV', '2019-02-10', '102030133', 'Customer debit for Product Invoice#0130', '500.00', '0.00', '0', '1', '44', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('154', '0130', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0130', '0.00', '500.00', '0', '1', '44', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('155', '0130', 'CIV', '2019-02-10', '102030133', 'Customer Credit for Product Invoice#0130', '0.00', '500.00', '0', '1', '44', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('156', '0130', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0130', '500.00', '0.00', '0', '1', '44', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('157', '0131', 'CIV', '2019-02-10', '102030134', 'Customer debit for Product Invoice#0131', '500.00', '0.00', '0', '1', '45', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('158', '0131', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0131', '0.00', '500.00', '0', '1', '45', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('159', '0131', 'CIV', '2019-02-10', '102030134', 'Customer Credit for Product Invoice#0131', '0.00', '500.00', '0', '1', '45', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('160', '0131', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0131', '500.00', '0.00', '0', '1', '45', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('161', '0132', 'CIV', '2019-02-10', '102030119', 'Customer debit for Product Invoice#0132', '819.00', '0.00', '0', '1', '24', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('162', '0132', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0132', '0.00', '819.00', '0', '1', '24', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('163', '0132', 'CIV', '2019-02-10', '102030119', 'Customer Credit for Product Invoice#0132', '0.00', '819.00', '0', '1', '24', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('164', '0132', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0132', '819.00', '0.00', '0', '1', '24', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('165', '0133', 'CIV', '2019-02-10', '102030135', 'Customer debit for Product Invoice#0133', '500.00', '0.00', '0', '1', '46', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('166', '0133', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0133', '0.00', NULL, '0', '1', '1', '2019-02-11 13:41:17', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('167', '0133', 'CIV', '2019-02-10', '102030135', 'Customer Credit for Product Invoice#0133', '0.00', '500.00', '0', '1', '46', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('168', '0133', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0133', NULL, '0.00', '0', '1', '1', '2019-02-11 13:41:17', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('169', '0134', 'CIV', '2019-02-10', '102030136', 'Customer debit for Product Invoice#0134', '500.00', '0.00', '0', '1', '47', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('170', '0134', 'CIV', '2019-02-10', '10107', 'Inventory Credit for Product Invoice#0134', '0.00', '805.00', '0', '1', '2', '2019-02-18 06:20:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('171', '0134', 'CIV', '2019-02-10', '102030136', 'Customer Credit for Product Invoice#0134', '0.00', '500.00', '0', '1', '47', '2019-02-10 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('172', '0134', 'CIV', '2019-02-10', '1020101', 'Cash in hand Debit For Invoice#0134', '805.00', '0.00', '0', '1', '2', '2019-02-18 06:20:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('173', '0135', 'CIV', '2019-02-11', '102030110', 'Customer debit for Product Invoice#0135', '692.50', '0.00', '0', '1', '15', '2019-02-11 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('174', '0135', 'CIV', '2019-02-11', '10107', 'Inventory Credit for Product Invoice#0135', '0.00', '692.50', '0', '1', '15', '2019-02-11 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('175', '0135', 'CIV', '2019-02-11', '102030110', 'Customer Credit for Product Invoice#0135', '0.00', '692.50', '0', '1', '15', '2019-02-11 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('176', '0135', 'CIV', '2019-02-11', '1020101', 'Cash in hand Debit For Invoice#0135', '692.50', '0.00', '0', '1', '15', '2019-02-11 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('177', '0136', 'CIV', '2019-02-18', '102030119', 'Customer debit for Product Invoice#0136', '865.00', '0.00', '0', '1', '24', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('178', '0136', 'CIV', '2019-02-18', '10107', 'Inventory Credit for Product Invoice#0136', '0.00', '865.00', '0', '1', '24', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('179', '0136', 'CIV', '2019-02-18', '102030119', 'Customer Credit for Product Invoice#0136', '0.00', '865.00', '0', '1', '24', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('180', '0136', 'CIV', '2019-02-18', '1020101', 'Cash in hand Debit For Invoice#0136', '865.00', '0.00', '0', '1', '24', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('181', '0137', 'CIV', '2019-02-18', '102030136', 'Customer debit for Product Invoice#0137', '865.00', '0.00', '0', '1', '47', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('182', '0137', 'CIV', '2019-02-18', '10107', 'Inventory Credit for Product Invoice#0137', '0.00', '865.00', '0', '1', '47', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('183', '0137', 'CIV', '2019-02-18', '102030136', 'Customer Credit for Product Invoice#0137', '0.00', '865.00', '0', '1', '47', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('184', '0137', 'CIV', '2019-02-18', '1020101', 'Cash in hand Debit For Invoice#0137', '865.00', '0.00', '0', '1', '47', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('185', '0138', 'CIV', '2019-02-18', '102030111', 'Customer debit for Product Invoice#0138', '865.00', '0.00', '0', '1', '16', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('186', '0138', 'CIV', '2019-02-18', '10107', 'Inventory Credit for Product Invoice#0138', '0.00', '865.00', '0', '1', '16', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('187', '0138', 'CIV', '2019-02-18', '102030111', 'Customer Credit for Product Invoice#0138', '0.00', '865.00', '0', '1', '16', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('188', '0138', 'CIV', '2019-02-18', '1020101', 'Cash in hand Debit For Invoice#0138', '865.00', '0.00', '0', '1', '16', '2019-02-18 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('189', '0139', 'CIV', '2019-02-20', '102030101', 'Customer debit for Product Invoice#0139', '669.25', '0.00', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('190', '0139', 'CIV', '2019-02-20', '10107', 'Inventory Credit for Product Invoice#0139', '0.00', '669.25', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('191', '0139', 'CIV', '2019-02-20', '102030101', 'Customer Credit for Product Invoice#0139', '0.00', '669.25', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('192', '0139', 'CIV', '2019-02-20', '1020101', 'Cash in hand Debit For Invoice#0139', '669.25', '0.00', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('193', '0140', 'CIV', '2019-02-20', '102030101', 'Customer debit for Product Invoice#0140', '1029.25', '0.00', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('194', '0140', 'CIV', '2019-02-20', '10107', 'Inventory Credit for Product Invoice#0140', '0.00', '1029.25', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('195', '0140', 'CIV', '2019-02-20', '102030101', 'Customer Credit for Product Invoice#0140', '0.00', '1029.25', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('196', '0140', 'CIV', '2019-02-20', '1020101', 'Cash in hand Debit For Invoice#0140', '1029.25', '0.00', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('197', '0141', 'CIV', '2019-02-20', '102030101', 'Customer debit for Product Invoice#0141', '1437.50', '0.00', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('198', '0141', 'CIV', '2019-02-20', '10107', 'Inventory Credit for Product Invoice#0141', '0.00', '1437.50', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('199', '0141', 'CIV', '2019-02-20', '102030101', 'Customer Credit for Product Invoice#0141', '0.00', '1437.50', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('200', '0141', 'CIV', '2019-02-20', '1020101', 'Cash in hand Debit For Invoice#0141', '1437.50', '0.00', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('201', '0142', 'CIV', '2019-02-20', '102030101', 'Customer debit for Product Invoice#0142', '1437.50', '0.00', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('202', '0142', 'CIV', '2019-02-20', '10107', 'Inventory Credit for Product Invoice#0142', '0.00', '1437.50', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('203', '0142', 'CIV', '2019-02-20', '102030101', 'Customer Credit for Product Invoice#0142', '0.00', '1437.50', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `StoreID`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES ('204', '0142', 'CIV', '2019-02-20', '1020101', 'Cash in hand Debit For Invoice#0142', '1437.50', '0.00', '0', '1', '2', '2019-02-20 00:00:00', NULL, NULL, '1');


#
# TABLE STRUCTURE FOR: accesslog
#

DROP TABLE IF EXISTS `accesslog`;

CREATE TABLE `accesslog` (
  `sl_no` bigint(20) NOT NULL AUTO_INCREMENT,
  `action_page` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_done` text COLLATE utf8_unicode_ci,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=662 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('1', 'Add Category', 'Insert Data', 'Category is Created', 'Jhon  Doe', '2018-11-04 13:33:19');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('2', 'Category List', 'Delete Data', 'Category Deleted', 'Jhon  Doe', '2018-11-04 13:34:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('3', 'Category List', 'Update Data', 'Category Updated', 'Jhon  Doe', '2018-11-04 13:41:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('4', 'Category List', 'Delete Data', 'Category Deleted', 'Jhon  Doe', '2018-11-04 13:41:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('5', 'Category List', 'Delete Data', 'Category Deleted', 'Jhon  Doe', '2018-11-04 13:41:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('6', 'Add Add-ons', 'Insert Data', 'New Add-ons is Created', 'Jhon  Doe', '2018-11-04 14:27:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('7', 'Add Add-ons', 'Insert Data', 'New Add-ons is Created', 'Jhon  Doe', '2018-11-04 14:27:52');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('8', 'Add Add-ons', 'Insert Data', 'New Add-ons is Created', 'Jhon  Doe', '2018-11-04 14:28:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('9', 'Add Add-ons', 'Insert Data', 'New Add-ons is Created', 'Jhon  Doe', '2018-11-04 14:28:48');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('10', 'Add Add-ons', 'Insert Data', 'New Add-ons is Created', 'Jhon  Doe', '2018-11-04 14:29:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('11', 'Add-ons List', 'Update Data', 'Add-ons Updated', 'Jhon  Doe', '2018-11-04 14:33:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('12', 'Add-ons List', 'Update Data', 'Add-ons Updated', 'Jhon  Doe', '2018-11-04 14:34:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('13', 'Add-ons List', 'Update Data', 'Add-ons Updated', 'Jhon  Doe', '2018-11-04 14:34:34');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('14', 'Add Add-ons', 'Insert Data', 'New Add-ons is Created', 'Jhon  Doe', '2018-11-04 14:34:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('15', 'Add-ons List', 'Delete Data', 'Add-ons Deleted', 'Jhon  Doe', '2018-11-04 14:34:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('16', 'Category List', 'Update Data', 'Category Updated', 'Jhon  Doe', '2018-11-05 09:19:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('17', 'Category List', 'Update Data', 'Category Updated', 'Jhon  Doe', '2018-11-05 09:19:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('18', 'Category List', 'Update Data', 'Category Updated', 'Jhon  Doe', '2018-11-05 09:21:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('19', 'Category List', 'Update Data', 'Category Updated', 'Jhon  Doe', '2018-11-05 09:21:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('20', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-05 13:35:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('21', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-05 13:37:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('22', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-05 13:41:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('23', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-05 13:43:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('24', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-05 13:44:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('25', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-05 13:46:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('26', 'Unit List', 'Update Data', 'Unit Updated', 'Jhon  Doe', '2018-11-06 06:41:19');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('27', 'Unit List', 'Update Data', 'Unit Updated', 'Jhon  Doe', '2018-11-06 07:10:03');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('28', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-06 07:24:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('29', 'Units List', 'Delete Data', 'Unit Deleted', 'Jhon  Doe', '2018-11-06 07:25:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('30', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-06 08:43:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('31', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-06 08:49:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('32', 'Ingredient List', 'Delete Data', 'Ingredient Deleted', 'Jhon  Doe', '2018-11-06 08:49:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('33', 'Ingredient List', 'Update Data', 'Ingredient Updated', 'Jhon  Doe', '2018-11-06 08:50:26');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('34', 'Ingredient List', 'Update Data', 'Ingredient Updated', 'Jhon  Doe', '2018-11-06 08:50:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('35', 'Ingredient List', 'Update Data', 'Ingredient Updated', 'Jhon  Doe', '2018-11-06 08:50:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('36', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-06 09:34:03');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('37', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-06 09:59:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('38', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-06 09:59:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('39', 'Add Food', 'Insert Data', 'New Food Added', 'Jhon  Doe', '2018-11-06 11:56:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('40', 'Food List', 'Update Data', 'Food Updated', 'Jhon  Doe', '2018-11-06 11:58:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('41', 'Food List', 'Update Data', 'Food Updated', 'Jhon  Doe', '2018-11-06 11:58:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('42', 'Add Food', 'Insert Data', 'New Food Added', 'Jhon  Doe', '2018-11-06 11:59:46');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('43', 'Add Food', 'Insert Data', 'New Food Added', 'Jhon  Doe', '2018-11-06 12:01:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('44', 'Food List', 'Delete Data', 'Food Deleted', 'Jhon  Doe', '2018-11-06 12:01:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('45', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-06 13:26:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('46', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-06 13:31:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('47', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-06 13:34:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('48', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-06 13:51:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('49', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-06 13:51:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('50', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-06 13:54:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('51', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-06 13:56:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('52', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-06 13:56:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('53', 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'Jhon  Doe', '2018-11-06 13:56:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('54', 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'Jhon  Doe', '2018-11-06 13:56:30');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('55', 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'Jhon  Doe', '2018-11-06 13:56:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('56', 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'Jhon  Doe', '2018-11-06 13:56:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('57', 'Add-ons Assign List', 'Update Data', 'Add-ons Assign List Updated', 'Jhon  Doe', '2018-11-06 13:58:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('58', 'Add-ons Assign List', 'Update Data', 'Add-ons Assign List Updated', 'Jhon  Doe', '2018-11-06 13:58:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('59', 'Add-ons Assign List', 'Update Data', 'Add-ons Assign List Updated', 'Jhon  Doe', '2018-11-06 14:06:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('60', 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'Jhon  Doe', '2018-11-06 14:06:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('61', 'Unit List', 'Insert Data', 'New unit Created', 'AB Doe', '2018-11-06 14:36:26');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('62', 'Units List', 'Delete Data', 'Unit Deleted', 'Jhon  Doe', '2018-11-06 14:36:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('63', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-07 06:38:53');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('64', 'Add-ons Assign List', 'Update Data', 'Add-ons Assign List Updated', 'Jhon  Doe', '2018-11-07 06:39:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('65', 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'Jhon  Doe', '2018-11-07 06:39:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('66', 'Add-ons Assign List', 'Update Data', 'Add-ons Assign List Updated', 'Jhon  Doe', '2018-11-07 06:42:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('67', 'Add-ons Assign List', 'Update Data', 'Add-ons Assign List Updated', 'Jhon  Doe', '2018-11-07 06:42:31');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('68', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-07 06:48:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('69', 'Add-ons Assign List', 'Update Data', 'Add-ons Assign List Updated', 'Jhon  Doe', '2018-11-07 06:48:46');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('70', 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'Jhon  Doe', '2018-11-07 06:48:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('71', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-07 06:49:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('72', 'Add-ons Assign List', 'Update Data', 'Add-ons Assign List Updated', 'Jhon  Doe', '2018-11-07 06:49:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('73', 'Add-ons List', 'Delete Data', 'Add-ons Assign Menu Deleted', 'Jhon  Doe', '2018-11-07 06:49:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('74', 'Unit List', 'Update Data', 'Unit Updated', 'Jhon  Doe', '2018-11-07 06:52:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('75', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-07 06:52:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('76', 'Units List', 'Delete Data', 'Unit Deleted', 'Jhon  Doe', '2018-11-07 06:52:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('77', 'Unit List', 'Update Data', 'Unit Updated', 'Jhon  Doe', '2018-11-07 06:52:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('78', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-07 06:54:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('79', 'Ingredient List', 'Update Data', 'Ingredient Updated', 'Jhon  Doe', '2018-11-07 06:54:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('80', 'Ingredient List', 'Delete Data', 'Ingredient Deleted', 'Jhon  Doe', '2018-11-07 06:54:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('81', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-07 10:01:08');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('82', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-07 10:12:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('83', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-07 10:12:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('84', 'Varient List', 'Update Data', 'Varient Updated', 'Jhon  Doe', '2018-11-07 10:15:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('85', 'Varient List', 'Delete Data', 'Varient Deleted', 'Jhon  Doe', '2018-11-07 10:17:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('86', 'Food Availablity', 'Insert Data', 'New Food Availablity Created', 'Jhon  Doe', '2018-11-07 10:58:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('87', 'Food Availablity', 'Insert Data', 'New Food Availablity Created', 'Jhon  Doe', '2018-11-07 11:01:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('88', 'Food Availablity', 'Insert Data', 'New Food Availablity Created', 'Jhon  Doe', '2018-11-07 11:33:45');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('89', 'Food Availablity', 'Update Data', 'Food Availablity Updated', 'Jhon  Doe', '2018-11-07 11:40:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('90', 'Food Availablity', 'Delete Data', 'Food Availablity Deleted', 'Jhon  Doe', '2018-11-07 11:40:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('91', 'Membership List', 'Insert Data', 'New Membership Created', 'Jhon  Doe', '2018-11-07 14:16:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('92', 'Membership List', 'Insert Data', 'New Membership Created', 'Jhon  Doe', '2018-11-07 14:17:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('93', 'Membership List', 'Insert Data', 'New Membership Created', 'Jhon  Doe', '2018-11-07 14:17:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('94', 'Membership List', 'Insert Data', 'New Membership Created', 'Jhon  Doe', '2018-11-07 14:17:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('95', 'Membership List', 'Update Data', 'Membership Updated', 'Jhon  Doe', '2018-11-07 14:21:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('96', 'Membership List', 'Update Data', 'Membership Updated', 'Jhon  Doe', '2018-11-07 14:22:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('97', 'Membership List', 'Update Data', 'Membership Updated', 'Jhon  Doe', '2018-11-07 14:22:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('98', 'Membership List', 'Delete Data', 'Membership Deleted', 'Jhon  Doe', '2018-11-07 14:23:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('99', 'Payment Method List', 'Insert Data', 'New Payment Method Created', 'Jhon  Doe', '2018-11-07 14:51:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('100', 'Payment Method List', 'Update Data', 'Payment Method Updated', 'Jhon  Doe', '2018-11-07 14:57:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('101', 'Payment Method List', 'Update Data', 'Payment Method Updated', 'Jhon  Doe', '2018-11-07 14:57:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('102', 'Payment Method List', 'Update Data', 'Payment Method Updated', 'Jhon  Doe', '2018-11-07 14:57:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('103', 'Payment Method List', 'Insert Data', 'New Payment Method Created', 'Jhon  Doe', '2018-11-07 14:57:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('104', 'Payment Method List', 'Insert Data', 'New Payment Method Created', 'Jhon  Doe', '2018-11-07 14:57:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('105', 'Payment Method List', 'Insert Data', 'New Payment Method Created', 'Jhon  Doe', '2018-11-07 14:57:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('106', 'Payment Method List', 'Insert Data', 'New Payment Method Created', 'Jhon  Doe', '2018-11-07 14:58:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('107', 'Payment Method List', 'Delete Data', 'Payment Method Deleted', 'Jhon  Doe', '2018-11-07 14:58:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('108', 'Shipping Method List', 'Insert Data', 'New Shipping Method Created', 'Jhon  Doe', '2018-11-08 06:48:19');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('109', 'Shipping Method List', 'Update Data', 'Shipping Method Updated', 'Jhon  Doe', '2018-11-08 06:52:48');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('110', 'Shipping Method List', 'Insert Data', 'New Shipping Method Created', 'Jhon  Doe', '2018-11-08 06:53:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('111', 'Shipping Method List', 'Insert Data', 'New Shipping Method Created', 'Jhon  Doe', '2018-11-08 06:55:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('112', 'Shipping Method List', 'Insert Data', 'New Shipping Method Created', 'Jhon  Doe', '2018-11-08 06:56:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('113', 'Shipping Method List', 'Delete Data', 'Shipping Method Deleted', 'Jhon  Doe', '2018-11-08 06:56:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('114', 'Supplier List', 'Insert Data', 'New Supplier Created', 'Jhon  Doe', '2018-11-08 07:49:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('115', 'Supplier List', 'Update Data', 'Supplier Updated', 'Jhon  Doe', '2018-11-08 07:57:51');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('116', 'Supplier List', 'Insert Data', 'New Supplier Created', 'Jhon  Doe', '2018-11-08 08:01:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('117', 'Supplier List', 'Insert Data', 'New Supplier Created', 'Jhon  Doe', '2018-11-08 08:02:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('118', 'Supplier List', 'Delete Data', 'Supplier Deleted', 'Jhon  Doe', '2018-11-08 08:02:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('119', 'Purchase List', 'Insert Data', 'New Purchase Created', 'Jhon  Doe', '2018-11-08 11:02:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('120', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-10 13:30:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('121', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-11 08:23:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('122', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-11 08:43:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('123', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'Jhon  Doe', '2018-11-11 09:26:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('124', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'Jhon  Doe', '2018-11-11 09:28:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('125', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'Jhon  Doe', '2018-11-11 09:29:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('133', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'Jhon  Doe', '2018-11-11 10:02:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('146', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'Jhon  Doe', '2018-11-11 10:44:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('147', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-11 11:44:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('148', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-11 11:44:59');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('149', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'Jhon  Doe', '2018-11-11 11:58:59');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('150', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'Jhon  Doe', '2018-11-11 11:59:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('151', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-11 12:36:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('152', 'Purchase List', 'Delete Data', 'Purchase Deleted', 'Jhon  Doe', '2018-11-11 12:40:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('153', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-11 12:43:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('154', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-11 12:45:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('155', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-11 12:47:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('156', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-11 12:48:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('157', 'Purchase List', 'Delete Data', 'Purchase Deleted', 'Jhon  Doe', '2018-11-11 12:49:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('158', 'Add Food', 'Insert Data', 'New Food Added', 'Jhon  Doe', '2018-11-12 11:50:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('159', 'Add Food', 'Insert Data', 'New Food Added', 'Jhon  Doe', '2018-11-12 11:51:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('160', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-13 06:18:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('161', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-13 06:21:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('162', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-13 06:21:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('163', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-13 06:22:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('164', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-13 06:23:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('165', 'Unit List', 'Insert Data', 'New unit Created', 'Jhon  Doe', '2018-11-13 06:25:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('166', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-13 06:25:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('167', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-13 06:27:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('168', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-13 06:27:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('169', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-13 06:29:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('170', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'Jhon  Doe', '2018-11-13 06:29:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('171', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-13 06:35:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('172', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'Jhon  Doe', '2018-11-13 06:36:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('173', 'Add Production', 'Insert Data', 'Item Production Created', 'Jhon  Doe', '2018-11-13 07:04:31');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('174', 'Table List', 'Insert Data', 'New table Created', 'Jhon  Doe', '2018-11-13 10:08:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('175', 'Table List', 'Insert Data', 'New table Created', 'Jhon  Doe', '2018-11-13 10:10:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('176', 'Table List', 'Insert Data', 'New table Created', 'Jhon  Doe', '2018-11-13 10:10:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('177', 'Table List', 'Insert Data', 'New table Created', 'Jhon  Doe', '2018-11-13 10:10:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('178', 'Table List', 'Insert Data', 'New table Created', 'Jhon  Doe', '2018-11-13 10:17:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('179', 'Table List', 'Update Data', 'Table Updated', 'Jhon  Doe', '2018-11-13 10:18:30');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('180', 'Table List', 'Insert Data', 'New table Created', 'Jhon  Doe', '2018-11-13 10:28:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('181', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 11:56:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('182', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 11:56:38');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('183', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 11:56:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('184', 'Customer Type List', 'Delete Data', 'Customer Type Deleted', 'Jhon  Doe', '2018-11-13 11:58:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('185', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 11:58:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('186', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 11:58:48');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('187', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 11:58:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('188', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 12:05:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('189', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 12:05:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('190', 'Customer Type List', 'Update Data', 'Customer Type Updated', 'Jhon  Doe', '2018-11-13 12:05:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('191', 'Customer Type List', 'Update Data', 'Customer Type Updated', 'Jhon  Doe', '2018-11-13 12:06:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('192', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-13 12:06:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('193', 'Customer Type List', 'Update Data', 'Customer Type Updated', 'Jhon  Doe', '2018-11-13 12:06:51');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('194', 'Customer Type List', 'Delete Data', 'Customer Type Deleted', 'Jhon  Doe', '2018-11-13 12:06:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('195', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-14 06:09:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('196', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-14 06:09:30');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('197', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-14 06:09:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('198', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-15 10:57:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('199', 'Add Food', 'Insert Data', 'New Food Added', 'Jhon  Doe', '2018-11-15 11:40:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('200', 'Add Food', 'Insert Data', 'New Food Added', 'Jhon  Doe', '2018-11-15 11:43:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('201', 'Add Add-ons', 'Insert Data', 'New Add-ons is Created', 'Jhon  Doe', '2018-11-15 11:44:51');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('202', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-15 11:45:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('203', 'Add-ons Assign', 'Insert Data', 'Assign New Add-ons To Menu', 'Jhon  Doe', '2018-11-15 11:45:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('204', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-15 11:47:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('205', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-15 11:47:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('206', 'Varient List', 'Insert Data', 'New Varient Created', 'Jhon  Doe', '2018-11-15 11:47:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('207', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-17 06:06:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('208', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-17 06:46:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('209', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-17 06:50:03');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('210', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-17 07:25:52');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('211', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-17 07:44:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('212', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-17 10:22:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('213', 'Add Customer', 'Insert Data', 'Customer is Created', 'Jhon  Doe', '2018-11-18 13:55:53');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('214', 'Add Customer', 'Insert Data', 'Customer is Created', 'Jhon  Doe', '2018-11-20 07:18:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('215', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-20 07:28:59');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('216', 'Customer Type List', 'Insert Data', 'New Customer Type Created', 'Jhon  Doe', '2018-11-20 10:24:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('217', 'Customer Type List', 'Update Data', 'Customer Type Updated', 'Jhon  Doe', '2018-11-20 10:24:48');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('218', 'Customer Type List', 'Delete Data', 'Customer Type Deleted', 'Jhon  Doe', '2018-11-20 10:24:52');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('219', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-20 10:53:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('220', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-20 10:55:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('221', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-20 11:46:46');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('222', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-20 11:49:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('223', 'Add New Order', 'Insert Data', 'Item New Order Created', 'Jhon  Doe', '2018-11-20 11:58:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('224', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'Jhon  Doe', '2018-11-20 14:16:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('225', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'Jhon  Doe', '2018-11-20 14:18:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('226', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'Jhon  Doe', '2018-11-20 14:19:45');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('227', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'Jhon  Doe', '2018-11-20 14:20:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('228', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'Jhon  Doe', '2018-11-20 14:20:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('229', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:13:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('230', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:14:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('231', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:14:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('232', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:18:38');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('233', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:19:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('234', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:20:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('235', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:21:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('236', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:21:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('237', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:21:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('238', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:21:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('239', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:23:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('240', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:23:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('241', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 06:26:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('242', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:28:46');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('243', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:30:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('244', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 06:42:46');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('245', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 10:49:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('246', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-22 11:14:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('247', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:28:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('248', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:30:59');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('249', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:37:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('250', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:38:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('251', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:38:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('252', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:41:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('253', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:41:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('254', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:42:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('255', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-22 11:42:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('256', 'Currency List', 'Insert Data', 'New Currency Created', 'John Doe', '2018-11-22 13:41:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('257', 'Currency List', 'Insert Data', 'New Currency Created', 'John Doe', '2018-11-22 13:41:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('258', 'Currency List', 'Insert Data', 'New Currency Created', 'John Doe', '2018-11-22 13:42:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('259', 'Currency List', 'Update Data', 'Currency Updated', 'John Doe', '2018-11-22 13:44:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('260', 'Currency List', 'Update Data', 'Currency Updated', 'John Doe', '2018-11-22 13:44:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('261', 'Currency List', 'Update Data', 'Currency Updated', 'John Doe', '2018-11-22 13:44:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('262', 'Currency List', 'Delete Data', 'Currency Deleted', 'John Doe', '2018-11-22 13:46:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('263', 'Currency List', 'Update Data', 'Currency Updated', 'John Doe', '2018-11-24 06:15:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('264', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2018-11-24 09:44:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('265', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2018-11-24 09:45:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('266', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-11-25 05:51:48');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('267', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2018-11-25 05:53:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('268', 'Add Production', 'Insert Data', 'Item Production Created', 'John Doe', '2018-11-25 05:55:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('269', 'Add Production', 'Insert Data', 'Item Production Created', 'John Doe', '2018-11-25 05:57:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('270', 'Add Production', 'Insert Data', 'Item Production Created', 'John Doe', '2018-11-25 05:58:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('271', 'Add Production', 'Insert Data', 'Item Production Created', 'John Doe', '2018-11-25 06:01:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('272', 'Add Production', 'Insert Data', 'Item Production Created', 'John Doe', '2018-11-25 06:54:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('273', 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2018-11-25 11:28:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('274', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-26 06:39:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('275', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-26 06:40:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('276', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-26 06:46:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('277', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-26 06:47:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('278', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-26 06:49:34');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('279', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-26 06:50:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('280', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-26 06:55:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('281', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2018-11-26 06:56:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('282', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-11-26 07:03:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('283', 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2018-11-26 11:33:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('284', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2018-11-28 09:31:53');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('285', 'Food Availablity', 'Insert Data', 'New Food Availablity Created', 'John Doe', '2018-11-28 10:41:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('286', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-11-29 06:42:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('287', 'Ingredient List', 'Update Data', 'Ingredient Updated', 'John Doe', '2018-11-29 06:43:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('288', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-11-29 06:43:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('289', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-11-29 06:44:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('290', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-11-29 06:45:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('291', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-11-29 06:46:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('292', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-11-29 06:47:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('293', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'John Doe', '2018-11-29 07:09:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('294', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'John Doe', '2018-11-29 07:10:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('295', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'John Doe', '2018-11-29 07:10:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('296', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2018-11-29 07:56:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('297', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-11-29 10:11:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('298', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-11-29 10:23:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('299', 'Update Set production Unit', 'Update Data', 'Set production Unit Updated', 'John Doe', '2018-12-01 06:52:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('300', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-12-01 06:55:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('301', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-12-01 07:15:53');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('302', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-01 07:30:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('303', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-12-01 08:07:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('304', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-12-01 08:17:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('305', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-12-01 08:23:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('306', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-12-01 08:24:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('307', 'set Production Unit', 'Insert Data', 'set Production Unit Created', 'John Doe', '2018-12-01 08:25:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('308', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2018-12-01 12:58:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('309', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-12-01 13:01:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('310', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-12-01 13:02:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('311', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-12-01 13:02:34');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('312', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-12-01 13:04:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('313', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-12-01 13:05:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('314', 'Ingredient List', 'Insert Data', 'New Ingredient Created', 'John Doe', '2018-12-01 13:05:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('315', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2018-12-01 13:09:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('316', 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2018-12-01 14:54:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('317', 'Customer Type List', 'Update Data', 'Customer Type Updated', 'John Doe', '2018-12-02 06:52:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('318', 'Add Customer', 'Insert Data', 'Customer is Created', 'John Doe', '2018-12-02 12:50:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('319', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-02 14:57:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('320', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-02 14:59:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('321', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-02 15:08:31');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('322', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-03 06:30:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('323', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-03 06:43:52');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('324', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2018-12-03 10:23:14');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('325', 'Reservation List', 'Insert Data', 'New Reservation Created', 'John Doe', '2018-12-03 14:23:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('326', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-03 14:34:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('327', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-03 14:34:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('328', 'Reservation List', 'Insert Data', 'New Reservation Created', 'John Doe', '2018-12-03 14:34:48');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('329', 'reservation List', 'Delete Data', 'reservation Deleted', 'John Doe', '2018-12-03 14:34:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('330', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-04 07:02:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('331', 'Table List', 'Insert Data', 'New table Created', 'John Doe', '2018-12-04 10:16:15');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('332', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-04 10:57:08');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('333', 'Reservation List', 'Insert Data', 'New Reservation Created', 'John Doe', '2018-12-04 11:36:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('334', 'Reservation List', 'Insert Data', 'New Reservation Created', 'John Doe', '2018-12-04 11:37:52');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('335', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:25:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('336', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:28:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('337', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:30:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('338', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:30:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('339', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:30:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('340', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:38:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('341', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:38:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('342', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:39:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('343', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:40:15');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('344', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:40:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('345', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:49:26');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('346', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:54:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('347', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:55:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('348', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:55:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('349', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 07:55:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('350', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:08:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('351', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:10:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('352', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:10:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('353', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:17:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('354', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:17:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('355', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:17:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('356', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:17:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('357', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:18:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('358', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-06 08:18:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('359', 'Table List', 'Insert Data', 'New table Created', 'John Doe', '2018-12-06 11:39:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('360', 'Table List', 'Insert Data', 'New table Created', 'John Doe', '2018-12-06 11:44:51');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('361', 'Table List', 'Delete Data', 'Table Deleted', 'John Doe', '2018-12-06 11:48:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('362', 'Table List', 'Insert Data', 'New table Created', 'John Doe', '2018-12-06 11:49:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('363', 'Table List', 'Delete Data', 'Table Deleted', 'John Doe', '2018-12-06 11:49:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('364', 'Reservation List', 'Insert Data', 'New Reservation Created', 'John Doe', '2018-12-09 11:20:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('365', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-09 11:21:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('366', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-09 11:26:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('367', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-09 11:27:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('368', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-09 11:28:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('369', 'Reservation List', 'Update Data', 'Reservation Updated', 'John Doe', '2018-12-09 11:30:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('370', 'Reservation List', 'Insert Data', 'New Reservation Created', 'John Doe', '2018-12-09 11:31:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('371', 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2018-12-10 08:14:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('372', 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2018-12-10 08:16:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('373', 'Supplier List', 'Update Data', 'Supplier Updated', 'John Doe', '2018-12-10 11:40:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('374', 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2018-12-10 11:48:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('375', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2018-12-11 07:40:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('376', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2018-12-12 07:03:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('377', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2018-12-12 07:32:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('378', 'Purchase List', 'Delete Data', 'Purchase Deleted', 'John Doe', '2018-12-13 06:47:31');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('379', 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2018-12-15 06:34:19');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('380', 'Add Customer', 'Insert Data', 'Customer is Created', 'John Doe', '2018-12-15 06:45:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('381', 'Add Customer', 'Insert Data', 'Customer is Created', 'John Doe', '2018-12-15 06:58:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('382', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-15 12:19:30');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('383', 'Food Availablity', 'Insert Data', 'New Food Availablity Created', 'John Doe', '2018-12-17 06:30:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('384', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 10:58:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('385', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 10:58:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('386', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:18:08');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('387', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:19:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('388', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:21:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('389', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:21:15');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('390', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:21:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('391', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:21:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('392', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:21:38');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('393', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:21:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('394', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:21:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('395', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:21:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('396', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:22:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('397', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:22:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('398', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2018-12-19 11:22:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('399', 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2018-12-20 05:30:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('400', 'Payment Method List', 'Insert Data', 'New Payment Method Created', 'John Doe', '2018-12-20 05:31:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('401', 'Payment Setup List', 'Insert Data', 'New Payment Method Setup', 'John Doe', '2018-12-20 08:27:34');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('402', 'Payment Setup List', 'Update Data', 'Payment Method Setup Updated', 'John Doe', '2018-12-20 08:44:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('403', 'Payment Setup List', 'Insert Data', 'New Payment Method Setup', 'John Doe', '2018-12-20 08:44:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('404', 'Payment Setup List', 'Delete Data', 'Payment Setup Deleted', 'John Doe', '2018-12-20 08:44:52');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('405', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-20 11:38:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('406', 'Payment Setup List', 'Insert Data', 'New Payment Method Setup', 'John Doe', '2018-12-22 07:23:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('407', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 07:52:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('408', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 07:54:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('409', 'Payment Setup List', 'Update Data', 'Payment Method Setup Updated', 'John Doe', '2018-12-22 09:24:15');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('410', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 09:24:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('411', 'Payment Setup List', 'Update Data', 'Payment Method Setup Updated', 'John Doe', '2018-12-22 10:42:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('412', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 10:43:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('413', 'Payment Method List', 'Update Data', 'Payment Method Updated', 'John Doe', '2018-12-22 13:03:15');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('414', 'Payment Setup List', 'Insert Data', 'New Payment Method Setup', 'John Doe', '2018-12-22 13:04:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('415', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 13:09:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('416', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 13:16:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('417', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 13:37:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('418', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 13:47:26');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('419', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 13:50:19');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('420', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 15:19:14');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('421', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 15:26:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('422', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-22 15:28:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('423', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-23 06:15:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('424', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-23 08:39:51');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('425', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-23 08:41:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('426', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-23 08:43:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('427', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-23 09:45:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('428', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-23 11:10:53');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('429', 'Payment Setup List', 'Update Data', 'Payment Method Setup Updated', 'John Doe', '2018-12-23 11:14:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('430', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-23 11:14:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('431', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-23 12:56:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('432', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-24 07:16:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('433', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-24 15:32:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('434', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-25 10:04:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('435', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2018-12-25 12:47:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('436', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-01 13:31:14');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('437', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-01 13:32:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('438', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-01 13:32:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('439', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:03:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('440', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:04:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('441', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:09:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('442', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:12:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('443', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:15:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('444', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:16:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('445', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:17:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('446', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:18:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('447', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:19:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('448', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:20:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('449', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:22:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('450', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:38:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('451', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:41:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('452', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:43:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('453', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:44:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('454', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:49:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('455', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:51:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('456', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 10:59:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('457', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:16:30');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('458', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:16:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('459', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:16:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('460', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:17:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('461', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:19:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('462', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:29:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('463', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:37:52');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('464', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:43:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('465', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:43:59');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('466', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:44:45');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('467', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 11:45:51');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('468', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:09:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('469', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:16:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('470', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:18:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('471', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:19:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('472', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:21:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('473', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:24:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('474', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:25:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('475', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:25:38');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('476', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:25:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('477', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:26:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('478', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:28:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('479', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:32:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('480', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:33:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('481', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 12:33:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('482', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-03 13:06:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('483', 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2019-01-05 09:57:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('484', 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2019-01-05 10:02:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('485', 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2019-01-05 10:02:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('486', 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2019-01-05 10:16:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('487', 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2019-01-05 10:16:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('488', 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2019-01-05 10:16:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('489', 'Category List', 'Delete Data', 'Category Deleted', 'John Doe', '2019-01-05 12:06:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('490', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-05 12:54:34');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('491', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-06 06:31:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('492', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-06 06:31:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('493', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-06 06:31:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('494', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-06 06:31:44');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('495', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-06 06:31:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('496', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-06 06:32:03');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('497', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-07 06:06:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('498', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-07 07:21:19');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('499', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-07 07:28:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('500', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-07 07:32:08');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('501', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-07 10:57:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('502', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-07 12:05:19');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('503', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2019-01-08 10:30:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('504', 'Supplier List', 'Insert Data', 'New Supplier Created', 'John Doe', '2019-01-08 10:38:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('505', 'Add Purchase', 'Insert Data', 'Item Purchase Created', 'John Doe', '2019-01-08 11:27:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('506', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'John Doe', '2019-01-08 12:34:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('507', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'John Doe', '2019-01-08 12:48:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('508', 'Update Purchase', 'Update Data', 'Item Purchase Updated', 'John Doe', '2019-01-08 14:30:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('509', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-08 14:41:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('510', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-01-08 14:42:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('511', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-01-08 14:47:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('512', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-01-08 14:48:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('513', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-01-08 14:56:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('514', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-01-08 14:59:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('515', 'Add Production', 'Insert Data', 'Add Production Created', 'John Doe', '2019-01-09 07:42:38');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('516', 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2019-01-22 11:15:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('517', 'Add Category', 'Insert Data', 'Category is Created', 'John Doe', '2019-01-22 11:15:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('518', 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2019-01-22 11:23:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('519', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-01-23 08:03:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('520', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2019-01-27 11:18:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('521', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2019-01-27 11:20:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('522', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2019-01-27 11:20:31');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('523', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2019-01-27 11:20:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('524', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2019-01-27 11:23:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('525', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2019-01-27 11:23:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('526', 'Table List', 'Update Data', 'Table Updated', 'John Doe', '2019-01-27 11:23:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('527', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 05:18:31');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('528', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 05:18:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('529', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 05:19:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('530', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 05:19:26');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('531', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 05:19:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('532', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 05:19:57');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('533', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 05:20:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('534', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 09:45:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('535', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 09:46:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('536', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 09:46:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('537', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 09:56:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('538', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 09:59:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('539', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:00:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('540', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:02:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('541', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:02:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('542', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:03:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('543', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:03:33');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('544', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:03:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('545', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:04:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('546', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:04:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('547', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:05:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('548', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:05:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('549', 'Add Food', 'Insert Data', 'New Food Added', 'John Doe', '2019-01-28 10:10:40');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('550', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:11:08');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('551', 'Food List', 'Delete Data', 'Food Deleted', 'John Doe', '2019-01-28 10:12:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('552', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:15:45');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('553', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 10:33:15');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('554', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 11:44:18');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('555', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 11:47:34');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('556', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 11:54:26');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('557', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 11:55:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('558', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 11:58:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('559', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 12:13:07');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('560', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 12:18:36');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('561', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 12:28:31');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('562', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 12:29:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('563', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 12:34:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('564', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 12:37:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('565', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 12:48:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('566', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 13:03:02');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('567', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 13:04:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('568', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 13:08:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('569', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 13:09:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('570', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 13:10:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('571', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 13:12:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('572', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 13:59:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('573', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 13:59:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('574', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-28 14:04:34');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('575', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-29 06:02:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('576', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-29 07:07:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('577', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-29 07:08:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('578', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-29 07:08:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('579', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-29 07:09:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('580', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-29 07:09:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('581', 'Food List', 'Update Data', 'Food Updated', 'John Doe', '2019-01-29 07:10:30');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('582', 'Category List', 'Update Data', 'Category Updated', 'John Doe', '2019-01-29 08:05:11');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('583', 'Varient List', 'Insert Data', 'New Varient Created', 'John Doe', '2019-01-29 08:31:17');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('584', 'Food Availablity', 'Update Data', 'Food Availablity Updated', 'John Doe', '2019-01-30 07:01:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('585', 'Food Availablity', 'Update Data', 'Food Availablity Updated', 'John Doe', '2019-01-30 07:04:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('586', 'Food Availablity', 'Update Data', 'Food Availablity Updated', 'John Doe', '2019-01-30 07:05:51');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('587', 'Food Availablity', 'Update Data', 'Food Availablity Updated', 'John Doe', '2019-01-30 07:12:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('588', 'Currency List', 'Update Data', 'Currency Updated', 'John Doe', '2019-01-31 06:16:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('589', 'Currency List', 'Update Data', 'Currency Updated', 'John Doe', '2019-01-31 06:16:37');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('590', 'Add Token', 'Insert Data', 'New Token Added', 'John Doe', '2019-02-05 07:32:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('591', 'Add Token', 'Insert Data', 'New Token Added', 'John Doe', '2019-02-05 07:38:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('592', 'Add Token', 'Insert Data', 'New Token Added', 'John Doe', '2019-02-05 07:57:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('593', 'Add Token', 'Insert Data', 'New Token Added', 'John Doe', '2019-02-05 08:01:35');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('594', 'Token List', 'Update Data', 'Token Updated', 'John Doe', '2019-02-05 08:02:20');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('595', 'Token List', 'Update Data', 'Token Updated', 'John Doe', '2019-02-05 08:02:28');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('596', 'Token List', 'Delete Data', 'Token Deleted', 'John Doe', '2019-02-05 08:03:49');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('597', 'Token List', 'Update Data', 'Token Updated', 'John Doe', '2019-02-05 10:27:16');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('598', 'Token List', 'Update Data', 'Token Updated', 'John Doe', '2019-02-05 10:48:29');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('599', 'Payment Setup List', 'Update Data', 'Payment Method Setup Updated', 'John Doe', '2019-02-05 13:51:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('600', 'Rating List', 'Update Data', 'Rating Updated', 'John Doe', '2019-02-06 11:07:59');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('601', 'Rating List', 'Delete Data', 'Rating Deleted', 'John Doe', '2019-02-06 11:08:25');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('602', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-02-06 12:49:08');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('603', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-06 12:50:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('604', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-02-06 12:52:38');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('605', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-06 12:53:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('606', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-06 12:54:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('607', 'Payment Setup List', 'Update Data', 'Payment Method Setup Updated', 'John Doe', '2019-02-12 13:53:03');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('608', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-18 05:40:46');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('609', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-18 05:45:41');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('610', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-18 05:47:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('611', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-18 05:48:06');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('612', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-18 05:52:43');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('613', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-18 06:19:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('614', 'Pending Order', 'Insert Data', 'Pending Order is Update', 'John Doe', '2019-02-18 06:20:15');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('615', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-02-20 06:52:26');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('616', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-02-20 07:07:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('617', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-02-20 07:11:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('618', 'Add New Order', 'Insert Data', 'Item New Order Created', 'John Doe', '2019-02-20 07:16:01');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('619', 'Country List', 'Insert Data', 'New Country Created', 'John Doe', '2019-02-24 06:35:45');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('620', 'Country List', 'Insert Data', 'New Country Created', 'John Doe', '2019-02-24 06:36:03');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('621', 'Country List', 'Insert Data', 'New Country Created', 'John Doe', '2019-02-24 06:36:15');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('622', 'Country List', 'Insert Data', 'New Country Created', 'John Doe', '2019-02-24 06:36:24');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('623', 'Country List', 'Update Data', 'Country Updated', 'John Doe', '2019-02-24 06:37:56');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('624', 'Country List', 'Update Data', 'Country Updated', 'John Doe', '2019-02-24 06:38:04');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('625', 'Country List', 'Insert Data', 'New Country Created', 'John Doe', '2019-02-24 06:38:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('626', 'country List', 'Delete Data', 'Country Deleted', 'John Doe', '2019-02-24 06:38:12');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('627', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:08:54');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('628', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:14:00');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('629', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:14:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('630', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:14:26');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('631', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:14:46');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('632', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:14:59');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('633', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:15:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('634', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:15:45');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('635', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:15:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('636', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:16:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('637', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:16:32');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('638', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:17:55');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('639', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:18:08');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('640', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:18:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('641', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:18:47');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('642', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:19:08');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('643', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:19:21');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('644', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:19:52');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('645', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:20:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('646', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:21:45');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('647', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:22:51');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('648', 'State List', 'Update Data', 'State Updated', 'John Doe', '2019-02-24 11:22:58');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('649', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:23:22');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('650', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:23:39');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('651', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:23:53');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('652', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:24:05');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('653', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:24:23');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('654', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:24:42');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('655', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:25:10');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('656', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:25:27');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('657', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:25:50');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('658', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 11:26:13');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('659', 'State List', 'Insert Data', 'New State Created', 'John Doe', '2019-02-24 12:16:03');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('660', 'State List', 'Update Data', 'State Updated', 'John Doe', '2019-02-24 12:16:09');
INSERT INTO `accesslog` (`sl_no`, `action_page`, `action_done`, `remarks`, `user_name`, `entry_date`) VALUES ('661', 'country List', 'Delete Data', 'Country Deleted', 'John Doe', '2019-02-24 12:17:19');


#
# TABLE STRUCTURE FOR: acn_account_transaction
#

DROP TABLE IF EXISTS `acn_account_transaction`;

CREATE TABLE `acn_account_transaction` (
  `account_tran_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `transaction_description` varchar(255) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `tran_date` date NOT NULL,
  `payment_id` int(11) NOT NULL,
  `create_by_id` varchar(25) NOT NULL,
  PRIMARY KEY (`account_tran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO `acn_account_transaction` (`account_tran_id`, `account_id`, `transaction_description`, `amount`, `tran_date`, `payment_id`, `create_by_id`) VALUES ('12', '1', 'jhk', '20000', '2017-08-28', '45', 'Jhon  Doe');
INSERT INTO `acn_account_transaction` (`account_tran_id`, `account_id`, `transaction_description`, `amount`, `tran_date`, `payment_id`, `create_by_id`) VALUES ('15', '1', 'fgfdg', '18000', '2017-08-29', '234', 'Jhon  Doe');
INSERT INTO `acn_account_transaction` (`account_tran_id`, `account_id`, `transaction_description`, `amount`, `tran_date`, `payment_id`, `create_by_id`) VALUES ('19', '3', 'Example transaction', '150000', '2017-09-11', '0', 'Jhon  Doe');
INSERT INTO `acn_account_transaction` (`account_tran_id`, `account_id`, `transaction_description`, `amount`, `tran_date`, `payment_id`, `create_by_id`) VALUES ('20', '3', 'fsdf', '2000', '2018-09-15', '3244', 'Jhon  Doe');
INSERT INTO `acn_account_transaction` (`account_tran_id`, `account_id`, `transaction_description`, `amount`, `tran_date`, `payment_id`, `create_by_id`) VALUES ('21', '4', 'Loan payment Loan ID20Employee ID145454', '6000', '2018-10-09', '145454', 'Jhon  Doe');
INSERT INTO `acn_account_transaction` (`account_tran_id`, `account_id`, `transaction_description`, `amount`, `tran_date`, `payment_id`, `create_by_id`) VALUES ('22', '5', 'Loan installment Loan ID17Employee ID145454', '522', '2018-10-08', '12', 'Jhon  Doe');


#
# TABLE STRUCTURE FOR: add_ons
#

DROP TABLE IF EXISTS `add_ons`;

CREATE TABLE `add_ons` (
  `add_on_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_on_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`add_on_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `add_ons` (`add_on_id`, `add_on_name`, `price`, `is_active`) VALUES ('1', 'BBQ Sauce', '25.00', '1');
INSERT INTO `add_ons` (`add_on_id`, `add_on_name`, `price`, `is_active`) VALUES ('2', 'French Fries', '20.00', '1');
INSERT INTO `add_ons` (`add_on_id`, `add_on_name`, `price`, `is_active`) VALUES ('3', 'Pepperoni', '20.00', '1');
INSERT INTO `add_ons` (`add_on_id`, `add_on_name`, `price`, `is_active`) VALUES ('4', 'Mayo', '30.00', '1');
INSERT INTO `add_ons` (`add_on_id`, `add_on_name`, `price`, `is_active`) VALUES ('5', 'Cheese', '20.00', '1');
INSERT INTO `add_ons` (`add_on_id`, `add_on_name`, `price`, `is_active`) VALUES ('6', 'Mayo', '25.00', '1');


#
# TABLE STRUCTURE FOR: award
#

DROP TABLE IF EXISTS `award`;

CREATE TABLE `award` (
  `award_id` int(11) NOT NULL AUTO_INCREMENT,
  `award_name` varchar(50) NOT NULL,
  `aw_description` varchar(200) NOT NULL,
  `awr_gift_item` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `awarded_by` varchar(30) NOT NULL,
  PRIMARY KEY (`award_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `award` (`award_id`, `award_name`, `aw_description`, `awr_gift_item`, `date`, `employee_id`, `awarded_by`) VALUES ('2', 'PriceMoney', 'sdfasdf', '1000tk', '2017-09-09', 'EVJ77XOI', 'Isahq');
INSERT INTO `award` (`award_id`, `award_name`, `aw_description`, `awr_gift_item`, `date`, `employee_id`, `awarded_by`) VALUES ('3', 'fdg', 'dfg', 'dfg', '2017-09-08', 'EVJ77XOI', 'dfg');
INSERT INTO `award` (`award_id`, `award_name`, `aw_description`, `awr_gift_item`, `date`, `employee_id`, `awarded_by`) VALUES ('4', 'Gift', 'fsdf', 'Laptop', '2017-09-10', '4324', 'Bdtask');
INSERT INTO `award` (`award_id`, `award_name`, `aw_description`, `awr_gift_item`, `date`, `employee_id`, `awarded_by`) VALUES ('5', 'World Cup', 'sdfasdfdftest', 'Money Price', '2018-10-15', 'EY2T1OWA', 'Isahaq');


#
# TABLE STRUCTURE FOR: bill
#

DROP TABLE IF EXISTS `bill`;

CREATE TABLE `bill` (
  `bill_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `total_amount` float NOT NULL,
  `discount` float NOT NULL,
  `service_charge` float NOT NULL,
  `VAT` float NOT NULL,
  `bill_amount` float NOT NULL,
  `bill_date` date NOT NULL,
  `bill_time` time NOT NULL,
  `bill_status` tinyint(1) NOT NULL COMMENT '0=unpaid, 1=paid',
  `payment_method_id` tinyint(4) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('1', '3', '5', '1437.5', '0', '0', '0', '1437.5', '2018-12-03', '06:43:52', '1', '3', '2', '2018-12-03', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('2', '1', '6', '1437.5', '0', '0', '0', '1437.5', '2018-12-15', '12:19:30', '1', '4', '2', '2018-12-15', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('3', '1', '7', '1437.5', '0', '23', '0', '1460.5', '2018-12-20', '11:38:21', '0', '5', '2', '2018-12-20', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('4', '1', '8', '805', '0', '0', '0', '805', '2018-12-22', '07:52:07', '1', '3', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('5', '1', '9', '805', '0', '0', '0', '805', '2018-12-22', '07:54:16', '1', '3', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('6', '1', '10', '805', '0', '0', '0', '805', '2018-12-22', '09:24:44', '1', '3', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('7', '1', '11', '805', '0', '0', '0', '805', '2018-12-22', '10:43:50', '1', '3', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('8', '1', '12', '805', '0', '0', '0', '805', '2018-12-22', '13:09:02', '1', '2', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('9', '1', '13', '1437.5', '0', '0', '0', '1437.5', '2018-12-22', '13:16:41', '1', '2', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('10', '1', '14', '1437.5', '0', '0', '0', '1437.5', '2018-12-22', '13:37:36', '1', '2', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('11', '1', '15', '632.5', '0', '0', '0', '632.5', '2018-12-22', '13:47:26', '1', '2', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('12', '1', '16', '805', '0', '0', '0', '805', '2018-12-22', '13:50:19', '1', '2', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('13', '1', '17', '805', '0', '0', '0', '805', '2018-12-22', '15:19:14', '0', '2', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('14', '1', '18', '632.5', '0', '0', '0', '632.5', '2018-12-22', '15:26:43', '0', '2', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('15', '1', '19', '632.5', '0', '0', '0', '632.5', '2018-12-22', '15:28:27', '0', '2', '2', '2018-12-22', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('16', '1', '20', '805', '0', '0', '0', '805', '2018-12-23', '06:15:23', '0', '2', '2', '2018-12-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('17', '1', '21', '632.5', '0', '0', '0', '632.5', '2018-12-23', '08:39:51', '0', '2', '2', '2018-12-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('18', '1', '22', '805', '0', '0', '0', '805', '2018-12-23', '08:41:40', '0', '2', '2', '2018-12-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('19', '1', '23', '805', '0', '0', '0', '805', '2018-12-23', '08:43:10', '0', '2', '2', '2018-12-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('20', '1', '24', '805', '0', '0', '0', '805', '2018-12-23', '09:45:00', '0', '2', '2', '2018-12-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('21', '1', '25', '805', '0', '0', '0', '805', '2018-12-23', '11:10:53', '1', '2', '2', '2018-12-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('22', '1', '26', '632.5', '0', '0', '0', '632.5', '2018-12-23', '11:14:58', '1', '3', '2', '2018-12-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('23', '1', '27', '632.5', '0', '0', '0', '632.5', '2018-12-23', '12:56:13', '0', '2', '2', '2018-12-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('24', '1', '28', '805', '0', '0', '0', '805', '2018-12-24', '07:16:49', '1', '3', '2', '2018-12-24', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('25', '1', '29', '1437.5', '0', '0', '0', '1437.5', '2018-12-24', '15:32:12', '0', '2', '2', '2018-12-24', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('26', '1', '30', '632.5', '0', '0', '0', '632.5', '2018-12-25', '10:04:32', '1', '3', '2', '2018-12-25', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('27', '1', '31', '805', '0', '0', '0', '805', '2018-12-25', '12:47:25', '1', '3', '2', '2018-12-25', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('28', '1', '32', '350.75', '0', '0', '0', '350.75', '2019-01-01', '13:31:15', '1', '4', '2', '2019-01-01', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('29', '1', '79', '805', '0', '0', '0', '805', '2019-01-05', '12:54:34', '1', '3', '2', '2019-01-05', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('30', '1', '85', '875', '0', '0', '0', '1006.25', '2019-01-08', '14:42:55', '1', '4', '2', '2019-01-08', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('31', '1', '84', '700', '0', '0', '0', '805', '2019-01-08', '14:56:00', '1', '4', '2', '2019-01-08', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('32', '1', '83', '700', '0', '0', '0', '805', '2019-01-08', '14:59:24', '1', '4', '2', '2019-01-08', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('33', '1', '89', '1400', '20', '50', '120', '1550', '2019-01-23', '10:59:34', '0', '1', '166', '2019-01-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('34', '1', '90', '1400', '20', '50', '120', '1550', '2019-01-23', '11:51:55', '0', '1', '166', '2019-01-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('35', '1', '91', '1400', '20', '50', '120', '1550', '2019-01-23', '11:54:37', '0', '1', '166', '2019-01-23', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('36', '1', '92', '1190', '5', '10', '209', '1404', '2019-01-23', '11:55:18', '0', '1', '166', '2019-01-23', '166', '2019-02-11');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('41', '8', '98', '1695', '0', '60', '254.25', '2009.25', '2019-02-03', '19:32:05', '1', '4', '2', '2019-02-03', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('42', '8', '99', '1695', '0', '60', '254.25', '2009.25', '2019-02-03', '19:32:30', '1', '4', '2', '2019-02-03', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('43', '14', '100', '1785', '0', '60', '267.75', '2112.75', '2019-02-03', '19:42:47', '1', '4', '2', '2019-02-03', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('44', '15', '101', '550', '0', '60', '82.5', '692.5', '2019-02-03', '19:46:20', '1', '3', '2', '2019-02-03', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('45', '15', '102', '550', '0', '60', '82.5', '692.5', '2019-02-03', '19:50:49', '1', '2', '2', '2019-02-03', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('46', '16', '103', '650', '0', '60', '97.5', '807.5', '2019-02-04', '10:14:44', '1', '2', '2', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('47', '18', '105', '625', '0', '60', '93.75', '778.75', '2019-02-04', '10:25:25', '1', '2', '18', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('48', '19', '106', '625', '0', '60', '93.75', '778.75', '2019-02-04', '11:08:05', '1', '2', '19', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('49', '20', '107', '625', '30', '60', '93.75', '748.75', '2019-02-04', '11:25:51', '1', '4', '20', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('50', '21', '108', '625', '0', '60', '93.75', '778.75', '2019-02-04', '11:26:45', '0', '2', '21', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('51', '22', '109', '645', '0', '60', '96.75', '801.75', '2019-02-04', '11:29:29', '1', '4', '22', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('52', '23', '110', '825', '40', '60', '123.75', '968.75', '2019-02-04', '11:30:16', '0', '2', '23', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('53', '24', '111', '700', '0', '60', '105', '865', '2019-02-04', '11:34:17', '0', '2', '24', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('54', '25', '112', '550', '0', '60', '82.5', '692.5', '2019-02-04', '11:40:22', '0', '2', '25', '2019-02-04', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('55', '15', '113', '700', '22', '60', '105', '843', '2019-02-05', '18:41:38', '1', '5', '15', '2019-02-05', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('56', '24', '114', '740', '22', '60', '111', '889', '2019-02-06', '17:18:26', '1', '4', '24', '2019-02-06', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('57', '1', '116', '1250', '0', '0', '0', '1437.5', '2019-02-06', '12:52:38', '1', '0', '0', '2019-02-06', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('58', '32', '117', '465', '5', '10', '20', '500', '2019-02-10', '09:29:10', '1', '4', '32', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('59', '33', '118', '465', '5', '10', '20', '500', '2019-02-10', '11:05:56', '1', '4', '33', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('60', '34', '119', '465', '5', '10', '20', '500', '2019-02-10', '11:06:18', '0', '2', '34', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('61', '35', '120', '465', '5', '10', '20', '500', '2019-02-10', '11:08:28', '0', '2', '35', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('62', '36', '121', '465', '5', '10', '20', '500', '2019-02-10', '11:08:39', '1', '4', '36', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('63', '37', '122', '465', '5', '10', '20', '500', '2019-02-10', '11:08:49', '0', '5', '37', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('64', '38', '123', '465', '5', '10', '20', '500', '2019-02-10', '11:09:36', '0', '3', '38', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('65', '39', '124', '465', '5', '10', '20', '500', '2019-02-10', '11:10:27', '0', '3', '39', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('66', '40', '125', '465', '5', '10', '20', '500', '2019-02-10', '11:11:12', '0', '3', '40', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('67', '41', '126', '465', '5', '10', '20', '500', '2019-02-10', '11:11:28', '0', '3', '41', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('68', '42', '127', '465', '5', '10', '20', '500', '2019-02-10', '11:12:43', '0', '3', '42', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('69', '43', '128', '465', '5', '10', '20', '500', '2019-02-10', '11:13:14', '0', '2', '43', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('70', '44', '129', '465', '5', '10', '20', '500', '2019-02-10', '11:14:43', '0', '3', '44', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('71', '45', '130', '465', '5', '10', '20', '500', '2019-02-10', '11:21:15', '0', '5', '45', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('72', '24', '131', '660', '0', '60', '99', '819', '2019-02-10', '16:25:20', '0', '2', '24', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('73', '46', '132', '465', '5', '10', '20', '500', '2019-02-10', '14:00:27', '0', '5', '46', '2019-02-10', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('74', '47', '133', '1190', '5', '10', '209', '1404', '2019-02-10', '14:09:05', '0', '5', '47', '2019-02-10', '1', '2019-02-11');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('75', '15', '134', '550', '0', '60', '82.5', '692.5', '2019-02-11', '15:09:15', '0', '3', '15', '2019-02-11', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('76', '24', '135', '700', '0', '0', '0', '865', '2019-02-18', '10:39:41', '1', '0', '2', '2019-02-18', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('77', '47', '136', '700', '0', '0', '0', '865', '2019-02-18', '10:51:40', '0', '3', '2', '2019-02-18', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('78', '16', '137', '700', '0', '0', '0', '805', '2019-02-18', '11:16:24', '0', '3', '2', '2019-02-18', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('79', '1', '138', '569.25', '0', '100', '0', '669.25', '2019-02-20', '06:52:26', '0', '5', '2', '2019-02-20', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('80', '1', '139', '1029.25', '0', '100', '0', '1029.25', '2019-02-20', '07:07:12', '0', '5', '2', '2019-02-20', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('81', '1', '140', '1437.5', '0', '100', '0', '1437.5', '2019-02-20', '07:11:14', '0', '5', '2', '2019-02-20', '0', '0000-00-00');
INSERT INTO `bill` (`bill_id`, `customer_id`, `order_id`, `total_amount`, `discount`, `service_charge`, `VAT`, `bill_amount`, `bill_date`, `bill_time`, `bill_status`, `payment_method_id`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('82', '1', '141', '1437.5', '0', '100', '0', '1437.5', '2019-02-20', '07:16:01', '0', '5', '2', '2019-02-20', '0', '0000-00-00');


#
# TABLE STRUCTURE FOR: bill_card_payment
#

DROP TABLE IF EXISTS `bill_card_payment`;

CREATE TABLE `bill_card_payment` (
  `row_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bill_id` bigint(20) NOT NULL,
  `card_no` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `issuer_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('1', '1', '3654564', 'Md.Kamal');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('2', '2', '2354367', 'Md.Kamal');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('3', '3', '235345758', 'Test');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('4', '4', '346456', 'dfg');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('5', '5', '64576578', 'Md.Kamal');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('6', '6', '35646', 'Md.Kamal');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('7', '7', 'sdsd', 'Md.Kamal');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('8', '8', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('9', '9', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('10', '10', 'ewr', 'Md.Kamal');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('11', '11', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('12', '12', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('13', '13', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('14', '14', '', 'Md.Kamal');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('15', '15', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('16', '16', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('17', '17', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('18', '18', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('19', '19', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('20', '20', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('21', '21', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('22', '22', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('23', '23', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('24', '24', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('25', '25', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('26', '26', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('27', '27', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('28', '28', 'test', 'Md.Kamal');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('29', '29', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('30', '30', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('31', '31', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('32', '32', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('37', '41', '1234567', ' nbmbm bmbnm');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('38', '42', '1234567', ' nbmbm bmbnm');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('39', '43', '1234567', 'Jamil Hassan');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('40', '44', '1234567', ' nbmbm bmbnm');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('41', '45', '1234567', ' nbmbm fdsf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('42', '46', '1234567', ' nbmbm bmbnm');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('43', '47', '1234567', 'jhon lio');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('44', '48', '1234567', 'test fgdhgf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('45', '49', '1234567', 'jhon lio');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('46', '50', '1234567', 'jhon fgdhgf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('47', '51', '1234567', 'jhsdfgsd dfgfdgd');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('48', '52', '1234567', 'fhfd dgdf ');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('49', '53', '1234567', 'naeem sdf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('50', '54', '1234567', 'jhsdfgsd fgdhgf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('51', '55', '1234567', ' nbmbm fdsf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('52', '56', '1234567', 'naeem sdf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('54', '58', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('55', '59', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('56', '60', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('57', '61', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('58', '62', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('59', '63', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('60', '64', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('61', '65', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('62', '66', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('63', '67', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('64', '68', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('65', '69', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('66', '70', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('67', '71', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('68', '72', '1234567', 'dsfdsf sfddsf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('69', '73', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('70', '74', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('71', '75', '1234567', 'dsfdsf fdsf');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('72', '76', '1234567', 'nbmbm bmbnm');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('73', '77', '1234567', 'teasdfdf kklama');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('74', '78', '1234567', ' nbmbm bmbnm');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('75', '79', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('76', '80', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('77', '81', '', '');
INSERT INTO `bill_card_payment` (`row_id`, `bill_id`, `card_no`, `issuer_name`) VALUES ('78', '82', '', '');


#
# TABLE STRUCTURE FOR: candidate_basic_info
#

DROP TABLE IF EXISTS `candidate_basic_info`;

CREATE TABLE `candidate_basic_info` (
  `can_id` varchar(20) NOT NULL,
  `first_name` varchar(11) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `alter_phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `present_address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `parmanent_address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `picture` text NOT NULL,
  `ssn` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`can_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `candidate_basic_info` (`can_id`, `first_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `ssn`, `state`, `city`, `zip`) VALUES ('150073689333S', 'Rishab ', 'Pant', 'pant@bdtask.com', '987654323456', '976544564567', 'South Ferri Ghat,Padma River,Chandpur', 'South Ferri Ghat,Padma River,Chandpur', './application/modules/circularprocess/assets/images/2017-07-22/hum1.jpg', '', '', '', '0');
INSERT INTO `candidate_basic_info` (`can_id`, `first_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `ssn`, `state`, `city`, `zip`) VALUES ('150078881074S', 'Mr', 'Kabir', 'kabir@gmail.com', '01955110016', '01730164623', 'Mirpur', 'Shariatpur', './application/modules/circularprocess/assets/images/2017-09-14/145.jpg', '', '', '', '0');
INSERT INTO `candidate_basic_info` (`can_id`, `first_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `ssn`, `state`, `city`, `zip`) VALUES ('150080778404S', 'Tory', 'Burhan', 'tory@bdtask.com', '123456789078', '876543456789', 'South Ferri Ghat,Padma River,Chandpur', '231,East Patalipur,Sonamuri', './application/modules/circularprocess/assets/images/2017-09-09/chr.jpg', '', '', '', '0');
INSERT INTO `candidate_basic_info` (`can_id`, `first_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `ssn`, `state`, `city`, `zip`) VALUES ('15052929747581L', 'Jasim', 'Uddin', 'jassim@gmail.com', '01621815163', '14645541', 'Barishal', 'Dhanmonci', './application/modules/circularprocess/assets/images/2017-09-18/1458.jpg', '', '', '', '0');
INSERT INTO `candidate_basic_info` (`can_id`, `first_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `ssn`, `state`, `city`, `zip`) VALUES ('15386317585979L', 'Md', 'Sala uddin', 'salauddin@gmail.com', '03123165', '5465464', 'ijlkjo', '555', './application/modules/circularprocess/assets/images/2018-10-04/isa.png', '1212313', '', '', '0');
INSERT INTO `candidate_basic_info` (`can_id`, `first_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `ssn`, `state`, `city`, `zip`) VALUES ('154020580259L', 'sdfsd', 'fsdf', 'fsdf@gmail.com', '234234', '234234', 'fsdf', 'sdfsdf', './application/modules/circularprocess/assets/images/2018-10-22/log.jpg', '234234', '', '', '0');
INSERT INTO `candidate_basic_info` (`can_id`, `first_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `ssn`, `state`, `city`, `zip`) VALUES ('15402730915417L', 'A.', 'Zabbar', 'jabbar@gmail.com', '03216456', '21545', 'khilkhet,dhaka', '545', './application/modules/circularprocess/assets/images/2018-10-23/ava.png', '12645', '', '', '0');


#
# TABLE STRUCTURE FOR: candidate_education_info
#

DROP TABLE IF EXISTS `candidate_education_info`;

CREATE TABLE `candidate_education_info` (
  `can_edu_id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` varchar(30) NOT NULL,
  `degree_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `university_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `cgp` varchar(30) CHARACTER SET latin1 NOT NULL,
  `comments` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `sequencee` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`can_edu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('47', '150073627021S', 'kkkkkkkkkk', 'University Of Mosco', '3.45', 'Lorem ipsum dolor sit amet, consectetur adipiscing', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('48', '150073627021S', 'Diploma in International Relat', 'University Of Mosco', '3.45', 'Lorem ipsum dolor sit amet, consectetur adipiscing', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('49', '150073627021S', 'Diploma in International Relat', 'University Of Mosco', '3.45', 'Lorem ipsum dolor sit amet, consectetur adipiscing', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('50', '150073627021S', 'Goood88', 'Nordan', '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('51', '150073627021S', 'MSceeeeeeeeee', 'National University', '3.30', 'Lorem ipsum dolor sit amet, consectetur adipiscing', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('52', '150073627021S', 'MMMMMMMMM', 'National University', '3.30', 'Lorem ipsum dolor sit amet, consectetur adipiscing', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('53', '150073627021S', 'hhhhhhhhhh', 'df', '3.30', 'Lorem ipsum dolor sit amet, consectetur adipiscing', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('54', '150080778404S', 'MBA', 'Dhaka University', '3.45', 'lorem ipasd orgat tugan rtuedr', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('55', '150080778404S', 'BBA', 'University Of South Amishapara', '3.47', 'lorem ipasd orgat tugan rtuedr', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('56', '150080778404S', '', '', '', 'lorem ipasd orgat tugan rtuedr', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('60', '15052932955274L', '', '', '', '', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('61', '15052932955274L', '', '', '', '', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('62', '15052932955274L', '', '', '', '', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('64', '15052929747581L', 'Ihave nothing to hide', 'Taker hat High School', '4', 'dfgdfgdfg', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('71', '150072625687S', 'Mizan Jamat', 'kowmi', '3.30', 'fghfghfgh', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('72', '150072625687S', 'csc', 'National University', '3.30', 'fghfghfgh', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('73', '150072625687S', 'Msc', 'National University', '3.30', 'fghfghfgh', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('74', '150073689333S', 'Ihave nothing to hide', 'Sayed Abul Hossain College', 'First Class', 'rtytry', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('76', '15386317585979L', 'ssc', 'khoajpur', '5', 'djflsdkjf', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('77', '154020580259L', 'Masters', 'National University', '4.80', 'dsfsdaf', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('78', '15402730915417L', 'Masters', 'National University', '3.7', 'fsdakfjlks', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('79', '15402730915417L', 'Honour\'s', 'Dhaka University', '3.8', 'fsdakfjlks', NULL);
INSERT INTO `candidate_education_info` (`can_edu_id`, `can_id`, `degree_name`, `university_name`, `cgp`, `comments`, `sequencee`) VALUES ('80', '15402730915417L', 'H.S.c', 'Sayed Abul Hossain college', '4.8', 'fsdakfjlks', NULL);


#
# TABLE STRUCTURE FOR: candidate_interview
#

DROP TABLE IF EXISTS `candidate_interview`;

CREATE TABLE `candidate_interview` (
  `can_int_id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `job_adv_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `interview_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `interviewer_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `interview_marks` varchar(50) CHARACTER SET latin1 NOT NULL,
  `written_total_marks` varchar(50) CHARACTER SET latin1 NOT NULL,
  `mcq_total_marks` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_marks` varchar(30) NOT NULL,
  `recommandation` varchar(50) CHARACTER SET latin1 NOT NULL,
  `selection` varchar(50) CHARACTER SET latin1 NOT NULL,
  `details` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`can_int_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `candidate_interview` (`can_int_id`, `can_id`, `job_adv_id`, `interview_date`, `interviewer_id`, `interview_marks`, `written_total_marks`, `mcq_total_marks`, `total_marks`, `recommandation`, `selection`, `details`) VALUES ('1', '150028880547S', 'Pk', '20-07-2017', 'test', '20', '32', '25', '91', 'ewr', 'ok', 'fgdfg');
INSERT INTO `candidate_interview` (`can_int_id`, `can_id`, `job_adv_id`, `interview_date`, `interviewer_id`, `interview_marks`, `written_total_marks`, `mcq_total_marks`, `total_marks`, `recommandation`, `selection`, `details`) VALUES ('2', '14995956377771L', 'management', '2017-07-23', 'ceo', '50', '100', '50', '200', 'na', 'ok', 'uyyh');
INSERT INTO `candidate_interview` (`can_int_id`, `can_id`, `job_adv_id`, `interview_date`, `interviewer_id`, `interview_marks`, `written_total_marks`, `mcq_total_marks`, `total_marks`, `recommandation`, `selection`, `details`) VALUES ('3', '150073610425S', 'Junior Executive ', '2017-07-27', 'Michele Kusu', '78', '70', '89', '237', 'Yes', 'ok', 'Lorem ipsum dolor sit amet, consectetur adipiscing');
INSERT INTO `candidate_interview` (`can_int_id`, `can_id`, `job_adv_id`, `interview_date`, `interviewer_id`, `interview_marks`, `written_total_marks`, `mcq_total_marks`, `total_marks`, `recommandation`, `selection`, `details`) VALUES ('4', '150073648921S', 'Junior Software Developer', '2017-07-28', 'Niranjan Khan Bin Latif', '50', '60', '70', '180', 'No', 'No', 'Lorem ipsum dolor sit amet, consectetur adipiscing');
INSERT INTO `candidate_interview` (`can_int_id`, `can_id`, `job_adv_id`, `interview_date`, `interviewer_id`, `interview_marks`, `written_total_marks`, `mcq_total_marks`, `total_marks`, `recommandation`, `selection`, `details`) VALUES ('5', '150078881074S', 'Chief Executive', '2017-07-23', 'MR', '25', '25', '20', '70', 'ewr', 'ok', 'ghfg');
INSERT INTO `candidate_interview` (`can_int_id`, `can_id`, `job_adv_id`, `interview_date`, `interviewer_id`, `interview_marks`, `written_total_marks`, `mcq_total_marks`, `total_marks`, `recommandation`, `selection`, `details`) VALUES ('6', '150073689333S', 'Lead Programmar Manager', '2017-07-17', 'MR', '10', '26', '23', '59', 'ewr', 'ok', 'sdfsdf');
INSERT INTO `candidate_interview` (`can_int_id`, `can_id`, `job_adv_id`, `interview_date`, `interviewer_id`, `interview_marks`, `written_total_marks`, `mcq_total_marks`, `total_marks`, `recommandation`, `selection`, `details`) VALUES ('7', '154020580259L', '8', '2018-10-22', 'isahaq mia', '34', '34', '54', '122', 'dfgdsfg', 'ok', 'oksdfd');


#
# TABLE STRUCTURE FOR: candidate_selection
#

DROP TABLE IF EXISTS `candidate_selection`;

CREATE TABLE `candidate_selection` (
  `can_sel_id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pos_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `selection_terms` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`can_sel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `candidate_selection` (`can_sel_id`, `can_id`, `employee_id`, `pos_id`, `selection_terms`) VALUES ('1', '150073610425S', 'STD897', 'Junior Executive ', 'Lorem ipsum dolor sit amet, consectetur adipiscing');
INSERT INTO `candidate_selection` (`can_sel_id`, `can_id`, `employee_id`, `pos_id`, `selection_terms`) VALUES ('3', '150078881074S', '1111', 'Chief Executive', 'Mango');
INSERT INTO `candidate_selection` (`can_sel_id`, `can_id`, `employee_id`, `pos_id`, `selection_terms`) VALUES ('4', '150073689333S', 'E6WBW7YD', '7', 'dfgdfg');
INSERT INTO `candidate_selection` (`can_sel_id`, `can_id`, `employee_id`, `pos_id`, `selection_terms`) VALUES ('5', '154020580259L', 'EJ721I8E', '8', 'sdfsdfsd');


#
# TABLE STRUCTURE FOR: candidate_shortlist
#

DROP TABLE IF EXISTS `candidate_shortlist`;

CREATE TABLE `candidate_shortlist` (
  `can_short_id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `job_adv_id` int(11) NOT NULL,
  `date_of_shortlist` varchar(50) CHARACTER SET latin1 NOT NULL,
  `interview_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`can_short_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `candidate_shortlist` (`can_short_id`, `can_id`, `job_adv_id`, `date_of_shortlist`, `interview_date`) VALUES ('5', '150073610425S', '4', '2017-07-22', '29-07-2017');
INSERT INTO `candidate_shortlist` (`can_short_id`, `can_id`, `job_adv_id`, `date_of_shortlist`, `interview_date`) VALUES ('6', '150072625687S', '5', '2017-07-22', '30-07-2017');
INSERT INTO `candidate_shortlist` (`can_short_id`, `can_id`, `job_adv_id`, `date_of_shortlist`, `interview_date`) VALUES ('7', '150073648921S', '6', '2017-07-22', '26-07-2017');
INSERT INTO `candidate_shortlist` (`can_short_id`, `can_id`, `job_adv_id`, `date_of_shortlist`, `interview_date`) VALUES ('8', '150073689333S', '7', '2017-07-22', '27-07-2017');
INSERT INTO `candidate_shortlist` (`can_short_id`, `can_id`, `job_adv_id`, `date_of_shortlist`, `interview_date`) VALUES ('9', '154020580259L', '8', '2018-10-22', '2018-10-22');


#
# TABLE STRUCTURE FOR: candidate_workexperience
#

DROP TABLE IF EXISTS `candidate_workexperience`;

CREATE TABLE `candidate_workexperience` (
  `can_workexp_id` int(11) NOT NULL AUTO_INCREMENT,
  `can_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `company_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 NOT NULL,
  `duties` varchar(30) CHARACTER SET latin1 NOT NULL,
  `supervisor` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sequencee` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`can_workexp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('4', '150073610425S', 'ELIASH & ASSOCIATES', '03/22/2017 - 07/22/2017', '500', 'Mira Chetarjee ', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('5', '150073610425S', '', '07/22/2017 - 07/22/2017', '', '', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('6', '150073610425S', '', '07/22/2017 - 07/22/2017', '', '', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('7', '150073627021S', 'UTY BANG', '07/22/2017 - 07/22/2017', '670', 'Murat Rodriguaz', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('8', '150073627021S', 'MEDI LIVE', '07/22/2017 - 07/22/2017', '5000', 'Nicola Ogastin', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('9', '150073627021S', '', '07/22/2017 - 07/22/2017', '', '', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('22', '15052932955274L', 'Infinity', '2017-02-16-2018', 'Juniour Programmar', 'dfsdf', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('23', '15052932955274L', 'Infinity', '2017-05454', 'sdf', 'sadasd', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('24', '15052932955274L', 'Innovedious', '2017-02-16-2018', 'Lead programmar', 'dfsdf', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('25', '150073648921S', 'BDTASK', '01/22/2017 - 07/22/2017', '5000', 'Murat Rodriguaz', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('26', '150073648921S', 'ELIASH & ASSOCIATES', '07/22/2017 - 07/22/2017', '700', 'Murad Zadran', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('27', '150073648921S', 'Bangladesh', '07/22/2017 - 07/22/2017', 'senior Programmar', 'dfsdf', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('28', '15052929747581L', 'Bdtask', '2017-05454', 'Juniour Programmar', 'sadasd', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('35', '150072625687S', 'Bdtask', '07/22/2017 - 07/22/2017', 'Senior Programmar', 'Ok thanks', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('36', '150072625687S', 'Bdtask', '07/22/2017 - 07/22/2017', 'Senior Programmar', 'Ok thanks', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('37', '150072625687S', 'Bdtask', '07/22/2017 - 07/22/2017', 'Senior Programmar', 'Ok thanks', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('42', '15386317585979L', 'Bdtask', '2017-2018', 'Programmar', 'Tarek', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('43', '154020580259L', 'Bdtask', '2017-2018', 'sdff', 'dfasdf', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('44', '150073689333S', 'Other Co.', '01/22/2017 - 07/22/2017', 'Executive', 'Murad Zadran', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('45', '150073689333S', 'Michle Co.', '01/22/2017 - 07/22/2017', 'Executive', 'Murad Zadran', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('46', '150073689333S', 'Laser Co.', '01/22/2017 - 07/22/2017', 'Executive', 'Murad Zadran', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('50', '15402730915417L', 'Soft Ltd Dhaka', '2016-2017', 'Junior Programmar', 'Jahid', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('51', '15402730915417L', 'Orange  co', '2017-2017', 'Senior Programmar', 'Habib', '');
INSERT INTO `candidate_workexperience` (`can_workexp_id`, `can_id`, `company_name`, `working_period`, `duties`, `supervisor`, `sequencee`) VALUES ('52', '15402730915417L', 'Techno Bd', '2017-2018', 'Senior Programmar', 'M', '');


#
# TABLE STRUCTURE FOR: common_setting
#

DROP TABLE IF EXISTS `common_setting`;

CREATE TABLE `common_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `powerbytxt` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `common_setting` (`id`, `address`, `email`, `phone`, `logo`, `powerbytxt`) VALUES ('1', '98 Green Road, Farmgate, Dhaka-1215.', 'support@bdtask.com', '0123456789', 'assets/img/2019-01-26/l5.png', '© 2019 Hungry All Right Reserved. Developed by BDTASK.\r\n');


#
# TABLE STRUCTURE FOR: currency
#

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `currencyid` int(11) NOT NULL AUTO_INCREMENT,
  `currencyname` varchar(50) NOT NULL,
  `curr_icon` varchar(50) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1' COMMENT '1=left.2=right',
  `curr_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`currencyid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `currency` (`currencyid`, `currencyname`, `curr_icon`, `position`, `curr_rate`) VALUES ('1', 'BDT', '৳', '2', '83.00');
INSERT INTO `currency` (`currencyid`, `currencyname`, `curr_icon`, `position`, `curr_rate`) VALUES ('2', 'USD', '$', '1', '1.00');


#
# TABLE STRUCTURE FOR: custom_table
#

DROP TABLE IF EXISTS `custom_table`;

CREATE TABLE `custom_table` (
  `custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_field` varchar(100) NOT NULL,
  `custom_data_type` int(11) NOT NULL,
  `custom_data` text NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  PRIMARY KEY (`custom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('9', 'Teacher Name', '2', 'Abdul Halim', 'EF6MQRAX');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('12', 'Primary School', '1', 'Test Primary School', 'E4ZNFBIC');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('13', 'High School Name', '2', 'Taker Hat High school', 'E4ZNFBIC');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('14', 'Versity Name', '3', 'Nu', 'E4ZNFBIC');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('15', 'Company Name', '1', 'Bdtask', 'ER6RJAY8');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('16', 'House Name', '3', 'Shikder Bari', 'ER6RJAY8');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('17', 'Person name', '2', 'Tuhin', 'ER6RJAY8');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('21', 'customfield1', '1', 'custom value1', 'E0LHJ447');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('22', 'dsfsdf', '1', 'sdfdsf', 'E0LHJ447');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('23', 'dsfsd', '1', 'fdsfsdf', 'E0LHJ447');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('24', '', '1', '', 'E0LHJ447');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('25', '', '1', '', 'E0LHJ447');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('34', 'isahadf', '1', '23424', 'ELPGMMRL');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('35', 'dfsdf', '1', 'dfgdfg', 'ELPGMMRL');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('36', 'hhh', '1', 'sdfsdf', 'ELPGMMRL');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('37', 'fdfgdfg', '1', 'dfg', 'ELPGMMRL');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('38', 'dfgdfg', '1', '', 'ELPGMMRL');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('39', 'First isahaq', '1', 'sdfsdf', 'E4K0I0DA');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('40', 'sdfsadf', '1', 'sdfsdf', 'EYOBEEFQ');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('41', 'fsdfsadf', '1', '234234324', 'EHBEEFQQ');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('43', 'My Mother', '1', 'Ma', 'E4Y9T7CJ');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('44', 'rrrr', '2', '07-08-2018', 'E78PIKVA');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('45', 'Kitchen Lead', '1', 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EBK2UPRA');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('47', 'Chinese Cuisine', '1', 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'E3Y1WJMB');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('49', 'French Suicine', '1', 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EXL9WSCL');
INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES ('51', 'Chinese Cuisine', '1', 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EU3APTYY');


#
# TABLE STRUCTURE FOR: customer_info
#

DROP TABLE IF EXISTS `customer_info`;

CREATE TABLE `customer_info` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `cuntomer_no` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `favorite_delivery_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('1', 'cus-0001', 'Walkin', 'test@gmail.com', NULL, 'dhaka', '8801717426371', 'ddd', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('2', 'cus-0002', 'Kawsar Ahmed', 'test@gmail.com', NULL, 'Dhaka', '01713245341', 'dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('3', 'cus-0003', 'test', 'test@gmail.com', NULL, 'Dhaka', '01723451200', 'dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('4', 'cus-0004', 'Ripon', 'ripon@gmail.com', NULL, 'Dhaka', '01612991234', 'Dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('5', 'cus-0005', 'ghfg', 'admin@example.com', NULL, 'dghfgh', '01723451261', 'fgh', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('6', 'cus-0006', 'Jaman', 'briluceservices@gmail.com', NULL, 't', '01723451201', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('7', 'cus-0007', 'Kamrul', 'kamrul@gmail.com', NULL, 'Dhaka', '01921002345', 'Dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('8', 'cus-0008', 'Arafat', 'arafat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dhaka', '01128212991', 'Dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('11', 'cus-0009', 'jhon ab', 'jhonab@gmail.com', NULL, 't', '019213434543', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('12', 'cus-0010', 'kamal', 'kamal@gmail.com', NULL, 't', '019213434522', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('13', 'cus-0011', 'shihab', 'sihab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 't', '019213434511', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('14', 'cus-0012', 'Jamil Hassan', 'jamilh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dhaka', '8801717426371', 'Dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('15', 'cus-0013', ' nbmbm bmbnm', 'doctor@sebaghar.com', 'e10adc3949ba59abbe56e057f20f883e', 'fgdg', '8801717426371', 'fgdg', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('16', 'cus-0014', ' nbmbm bmbnm', 'mhkmusa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dfsf', '8801717426371', 'dfsf', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('17', 'cus-0015', 'jhon lio', 'jhonl@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '8801717426371', '', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('18', 'cus-0016', 'jhon lio', 'jhonl@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '8801717426371', '', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('19', 'cus-0017', 'test fgdhgf', 'ainalmaan@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dhaka', '8801717426371', 'Dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('20', 'cus-0018', 'jhon lio', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dhaka', '8801717426371', 'Dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('21', 'cus-0019', 'jhon fgdhgf', 'jhonasdal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Dhaka', '8801717426371', 'Dhaka', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('22', 'cus-0020', 'jhsdfgsd dfgfdgd', 'dfgfd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '8801717426371', '', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('23', 'cus-0021', 'fhfd dgdf ', 'tesafdd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '8801717426371', '', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('24', 'cus-0022', 'naeem sdf', 'naeem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '8801717426371', '', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('25', 'cus-0023', 'jhsdfgsd fgdhgf', 'doctowerr@sebaghar.com', 'e10adc3949ba59abbe56e057f20f883e', '', '8801717426371', '', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('26', 'cus-0024', 'Kamalttt', 'Kamalttt@gmail.com', NULL, 't', '01723456435', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('27', 'cus-0025', 'Kamalttt', 'Kamaleettt@gmail.com', NULL, 't', '017234561232', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('28', 'cus-0026', 'Kamalttt', 'Kamaleettt@gmail.com', NULL, 't', '0172345612322', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('29', 'cus-0027', 'Kamalttt', 'Kamaleettt@gmail.com', NULL, 't', '017234561211', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('30', 'cus-0028', 'Kamalttt', 'Kerereettt@gmail.com', NULL, 't', '017234561112', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('31', 'cus-0029', 'Kamalttt', 'Kerereettt@gmail.com', NULL, 't', '01723456123', 't', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('32', 'cus-0030', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('33', 'cus-0031', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('34', 'cus-0032', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('35', 'cus-0033', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('36', 'cus-0034', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('37', 'cus-0035', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('38', 'cus-0036', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('39', 'cus-0037', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('40', 'cus-0038', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('41', 'cus-0039', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('42', 'cus-0040', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('43', 'cus-0041', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('44', 'cus-0042', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('45', 'cus-0043', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('46', 'cus-0044', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');
INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_address`, `customer_phone`, `favorite_delivery_address`, `is_active`) VALUES ('47', 'cus-0045', 'teasdfdf kklama', 'testrrre@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dhaka', '017543634646', 'Order form ios', '1');


#
# TABLE STRUCTURE FOR: customer_membership_map
#

DROP TABLE IF EXISTS `customer_membership_map`;

CREATE TABLE `customer_membership_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `active_date` date NOT NULL,
  `active_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: customer_order
#

DROP TABLE IF EXISTS `customer_order`;

CREATE TABLE `customer_order` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `saleinvoice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cutomertype` int(11) NOT NULL,
  `waiter_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `table_no` int(11) NOT NULL,
  `totalamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `customer_note` text COLLATE utf8_unicode_ci,
  `order_status` tinyint(1) NOT NULL COMMENT '1=Pending, 2=Processing, 3=Ready, 4=Served,5=Cancel',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('1', '0001', '4', '1', '165', '2018-10-15', '15:08:31', '2', '1638.75', 'test', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('2', '0002', '2', '2', '165', '2018-10-06', '06:30:18', '3', '1437.50', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('3', '0003', '1', '1', '166', '2018-10-22', '06:30:56', '5', '1437.50', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('4', '0004', '3', '1', '165', '2018-11-03', '06:34:12', '2', '833.75', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('5', '0005', '3', '2', '166', '2018-11-04', '06:43:52', '4', '3047.50', NULL, '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('6', '0006', '1', '1', '165', '2018-11-15', '12:19:30', '6', '1437.50', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('7', '0007', '1', '1', '166', '2018-11-20', '11:38:20', '3', '1460.50', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('8', '0008', '5', '2', '166', '2018-11-22', '07:52:07', '3', '805.00', 'hffgj', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('9', '0009', '1', '1', '166', '2018-12-22', '07:54:16', '4', '805.00', 'fgfdgd', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('10', '0010', '1', '1', '166', '2018-12-22', '09:24:44', '6', '805.00', '', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('11', '0011', '1', '1', '166', '2018-12-22', '10:43:50', '6', '805.00', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('12', '0012', '1', '1', '166', '2018-12-22', '13:09:02', '7', '805.00', 'weqe', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('13', '0013', '1', '1', '166', '2018-12-22', '13:16:41', '3', '1437.50', 'dfgdg', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('14', '0014', '1', '1', '166', '2018-12-22', '13:37:36', '5', '1437.50', 'hffgj', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('15', '0015', '1', '1', '166', '2018-12-22', '13:47:26', '4', '632.50', 'rte', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('16', '0016', '1', '1', '166', '2018-12-22', '13:50:19', '2', '805.00', 'dfsd', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('17', '0017', '1', '1', '166', '2018-12-22', '15:19:14', '5', '805.00', 'ytryu', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('18', '0018', '1', '1', '166', '2018-12-22', '15:26:43', '4', '632.50', 'ryty', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('19', '0019', '8', '2', '166', '2018-12-22', '15:28:27', '4', '632.50', 'dhgdfh', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('20', '0020', '1', '1', '166', '2018-12-23', '06:15:23', '3', '805.00', 'vjhg', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('21', '0021', '1', '1', '166', '2018-12-23', '08:39:51', '2', '632.50', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('22', '0022', '1', '1', '166', '2018-12-23', '08:41:40', '2', '805.00', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('23', '0023', '1', '1', '166', '2018-12-23', '08:43:10', '4', '805.00', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('24', '0024', '1', '1', '166', '2018-12-23', '09:45:00', '3', '805.00', 'drt', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('25', '0025', '1', '1', '166', '2018-12-23', '11:10:53', '4', '805.00', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('26', '0026', '1', '1', '166', '2018-12-23', '11:14:58', '3', '632.50', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('27', '0027', '1', '1', '166', '2018-12-23', '12:56:13', '3', '632.50', 'ere', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('28', '0028', '1', '1', '166', '2018-12-24', '07:16:49', '2', '805.00', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('29', '0029', '1', '1', '166', '2018-12-24', '15:32:12', '3', '1437.50', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('30', '0030', '1', '1', '166', '2018-12-25', '10:04:32', '3', '632.50', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('31', '0031', '1', '1', '166', '2018-12-25', '12:47:25', '4', '805.00', 'retr', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('32', '0032', '1', '1', '165', '2019-01-01', '13:31:14', '3', '350.75', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('33', '0033', '1', '1', '165', '2019-01-01', '13:32:04', '5', '258.75', 'test', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('34', '0034', '1', '1', '167', '2019-01-01', '13:32:29', '4', '632.50', 'dfgdg', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('35', '0035', '1', '1', '166', '2019-01-03', '10:03:00', '2', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('36', '0036', '1', '1', '166', '2019-01-03', '10:04:32', '3', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('37', '0037', '1', '1', '166', '2019-01-03', '10:09:02', '2', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('38', '0038', '1', '1', '166', '2019-01-03', '10:12:40', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('39', '0039', '1', '1', '166', '2019-01-03', '10:15:12', '2', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('40', '0040', '1', '1', '166', '2019-01-03', '10:16:01', '3', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('41', '0041', '1', '1', '166', '2019-01-03', '10:17:49', '3', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('42', '0042', '1', '1', '166', '2019-01-03', '10:18:29', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('43', '0043', '1', '1', '166', '2019-01-03', '10:19:25', '2', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('44', '0044', '1', '1', '166', '2019-01-03', '10:20:29', '4', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('45', '0045', '1', '1', '166', '2019-01-03', '10:22:21', '6', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('46', '0046', '1', '1', '166', '2019-01-03', '10:38:58', '3', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('47', '0047', '1', '1', '166', '2019-01-03', '10:41:41', '5', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('48', '0048', '1', '1', '166', '2019-01-03', '10:43:41', '5', '126.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('49', '0049', '1', '1', '166', '2019-01-03', '10:44:33', '6', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('50', '0050', '1', '1', '166', '2019-01-03', '10:49:27', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('51', '0051', '1', '1', '166', '2019-01-03', '10:51:55', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('52', '0052', '1', '1', '166', '2019-01-03', '10:59:07', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('53', '0053', '1', '1', '166', '2019-01-03', '11:16:30', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('54', '0054', '1', '1', '166', '2019-01-03', '11:16:43', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('55', '0055', '1', '1', '166', '2019-01-03', '11:16:56', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('56', '0056', '1', '1', '166', '2019-01-03', '11:17:35', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('57', '0057', '1', '1', '166', '2019-01-03', '11:19:10', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('58', '0058', '1', '1', '166', '2019-01-03', '11:29:49', '6', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('59', '0059', '1', '1', '166', '2019-01-03', '11:37:52', '3', '971.75', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('60', '0060', '1', '1', '166', '2019-01-03', '11:43:17', '4', '851.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('61', '0061', '1', '1', '166', '2019-01-03', '11:43:59', '2', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('62', '0062', '1', '1', '166', '2019-01-03', '11:44:45', '3', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('63', '0063', '1', '1', '166', '2019-01-03', '11:45:51', '4', '1437.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('64', '0064', '1', '1', '166', '2019-01-03', '12:09:54', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('65', '0065', '1', '1', '166', '2019-01-03', '12:16:32', '2', '218.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('66', '0066', '1', '1', '166', '2019-01-03', '12:18:22', '2', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('67', '0067', '1', '1', '166', '2019-01-03', '12:19:02', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('68', '0068', '1', '1', '166', '2019-01-03', '12:21:21', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('69', '0069', '1', '1', '166', '2019-01-03', '12:24:36', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('70', '0070', '1', '1', '166', '2019-01-03', '12:25:21', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('71', '0071', '1', '1', '166', '2019-01-03', '12:25:38', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('72', '0072', '1', '1', '166', '2019-01-03', '12:25:44', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('73', '0073', '1', '1', '166', '2019-01-03', '12:26:50', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('74', '0074', '1', '1', '166', '2019-01-03', '12:28:56', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('75', '0075', '1', '1', '166', '2019-01-03', '12:32:02', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('76', '0076', '1', '1', '166', '2019-01-03', '12:33:28', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('77', '0077', '1', '1', '166', '2019-01-03', '12:33:57', '2', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('78', '0078', '1', '1', '166', '2019-01-03', '13:06:32', '2', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('79', '0079', '1', '1', '166', '2019-01-05', '12:54:34', '3', '805.00', 'fbdhgf', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('80', '0080', '1', '1', '165', '2019-01-07', '06:06:43', '3', '500.25', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('81', '0081', '1', '1', '166', '2019-01-07', '07:21:19', '5', '805.00', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('82', '0082', '1', '1', '165', '2019-01-07', '07:28:28', '3', '632.50', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('83', '0083', '1', '1', '166', '2019-01-07', '07:32:08', '4', '805.00', '', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('84', '0084', '1', '1', '166', '2019-01-07', '12:05:19', '3', '805.00', 'fbdhgf', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('85', '0085', '1', '1', '166', '2019-01-08', '14:41:28', '3', '1006.25', 'fbdhgf', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('86', '0086', '1', '1', '166', '2019-01-23', '08:03:05', '2', '1661.75', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('87', '0087', '1', '1', '166', '2019-01-23', '10:44:17', '3', '1550.00', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('88', '0088', '1', '1', '166', '2019-01-23', '10:58:08', '3', '1550.00', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('89', '0089', '1', '1', '166', '2019-01-23', '10:59:34', '3', '1550.00', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('90', '0090', '1', '1', '166', '2019-01-23', '11:51:55', '3', '1550.00', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('91', '0091', '1', '1', '166', '2019-01-23', '11:54:37', '3', '1550.00', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('92', '0092', '1', '1', '166', '2019-02-14', '10:16:23', '2', '1404.00', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('98', '0001', '8', '2', '174', '2019-02-03', '19:32:05', '0', '2009.25', 'fsdgfdhgfjghjk k jkjh k', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('99', '0001', '8', '2', '174', '2019-02-03', '19:32:30', '0', '2009.25', 'fsdgfdhgfjghjk k jkjh k', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('100', '0100', '14', '2', '174', '2019-02-03', '19:42:47', '0', '2112.75', 'test order', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('101', '0101', '15', '2', '174', '2019-02-03', '19:46:19', '0', '692.50', 'sfgfdghgf', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('102', '0001', '15', '2', '174', '2019-02-03', '19:50:49', '0', '692.50', 'fdsfdsf', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('103', '0103', '16', '2', '174', '2019-02-04', '10:14:44', '0', '807.50', 'ghgfhfg fghf', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('104', '0104', '17', '2', '174', '2019-02-04', '10:23:42', '0', '778.75', 'fdgdgfdg', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('105', '0105', '18', '2', '174', '2019-02-04', '10:25:24', '0', '778.75', 'fdgdgfdg', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('106', '0106', '19', '2', '174', '2019-02-04', '11:08:05', '0', '778.75', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('107', '0107', '20', '2', '174', '2019-02-04', '11:25:51', '0', '748.75', '5t46575b5 hhgert ', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('108', '0108', '21', '2', '174', '2019-02-04', '11:26:45', '0', '778.75', 'fdgd g dfg d', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('109', '0109', '22', '2', '174', '2019-02-04', '11:29:29', '0', '801.75', 'sfsfgfdg  hhg', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('110', '0110', '23', '2', '174', '2019-02-04', '11:30:16', '0', '968.75', 'fdgr hghd hgf', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('111', '0111', '24', '2', '174', '2019-02-04', '11:34:17', '0', '865.00', 'sdfsf  dsf dfg sdfg', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('112', '0112', '25', '2', '174', '2019-02-04', '11:40:22', '0', '692.50', 'test fdg g df', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('115', '0115', '1', '1', '168', '2019-02-06', '12:49:08', '2', '866.75', 'fbdhgf', '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('116', '0116', '1', '1', '168', '2019-02-06', '12:52:38', '3', '1437.50', 'fbdhgf', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('117', '0117', '32', '2', '174', '2019-02-10', '09:29:09', '0', '500.00', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('118', '0118', '33', '2', '174', '2019-02-10', '11:05:56', '0', '500.00', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('119', '0119', '34', '2', '174', '2019-02-10', '11:06:18', '0', '500.00', 'test', '2');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('120', '0120', '35', '2', '174', '2019-02-10', '11:08:27', '0', '500.00', 'test', '2');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('121', '0121', '36', '2', '174', '2019-02-10', '11:08:38', '0', '500.00', 'test', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('122', '0122', '37', '2', '174', '2019-02-10', '11:08:48', '0', '500.00', 'test', '5');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('123', '0123', '38', '2', '174', '2019-02-10', '11:09:36', '0', '500.00', 'test', '3');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('124', '0124', '39', '2', '174', '2019-02-10', '11:10:26', '0', '500.00', 'test', '3');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('125', '0125', '40', '2', '174', '2019-02-10', '11:11:11', '0', '500.00', 'test', '3');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('126', '0126', '41', '2', '174', '2019-02-10', '11:11:28', '0', '500.00', 'test', '3');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('127', '0127', '42', '2', '174', '2019-02-10', '11:12:43', '0', '500.00', 'test', '3');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('128', '0128', '43', '2', '174', '2019-02-10', '11:13:14', '0', '500.00', 'test', '2');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('129', '0129', '44', '2', '174', '2019-02-10', '11:14:43', '0', '500.00', 'test', '3');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('130', '0130', '45', '2', '174', '2019-02-10', '11:21:15', '0', '500.00', 'test', '5');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('132', '0132', '46', '2', '174', '2019-02-10', '14:00:27', '0', '500.00', 'test', '5');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('133', '0133', '47', '2', '174', '2019-02-11', '13:41:16', '2', '1404.00', NULL, '1');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('137', '0134', '16', '2', '174', '2019-02-18', '11:16:24', '0', '805.00', '', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('138', '0138', '1', '1', '166', '2019-02-20', '06:52:26', '2', '669.25', '', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('139', '0139', '1', '1', '166', '2019-02-20', '07:07:12', '2', '1029.25', '', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('140', '0140', '1', '1', '166', '2019-02-20', '07:11:13', '2', '1437.50', '', '4');
INSERT INTO `customer_order` (`order_id`, `saleinvoice`, `customer_id`, `cutomertype`, `waiter_id`, `order_date`, `order_time`, `table_no`, `totalamount`, `customer_note`, `order_status`) VALUES ('141', '0141', '1', '1', '166', '2019-02-20', '07:16:01', '2', '1437.50', '', '4');


#
# TABLE STRUCTURE FOR: customer_type
#

DROP TABLE IF EXISTS `customer_type`;

CREATE TABLE `customer_type` (
  `customer_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customer_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer_type` (`customer_type_id`, `customer_type`) VALUES ('1', 'Walk In Customer');
INSERT INTO `customer_type` (`customer_type_id`, `customer_type`) VALUES ('2', 'Online Customer');


#
# TABLE STRUCTURE FOR: department
#

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('8', 'ACCOUNTING', '0');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('9', 'Human Resource', '0');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('10', 'Delivery department', '0');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('11', 'Garage and Parking', '0');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('12', 'Manager', '0');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('13', 'Restaurant', '0');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('14', 'Waiter', '13');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('15', 'Senior Accountant', '8');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('16', 'Kitchen Manager', '12');
INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES ('17', 'Chef', '13');


#
# TABLE STRUCTURE FOR: duty_type
#

DROP TABLE IF EXISTS `duty_type`;

CREATE TABLE `duty_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `duty_type` (`id`, `type_name`) VALUES ('1', 'Full Time');
INSERT INTO `duty_type` (`id`, `type_name`) VALUES ('2', 'Part Time');
INSERT INTO `duty_type` (`id`, `type_name`) VALUES ('3', 'Contructual');
INSERT INTO `duty_type` (`id`, `type_name`) VALUES ('4', 'Other');


#
# TABLE STRUCTURE FOR: email_config
#

DROP TABLE IF EXISTS `email_config`;

CREATE TABLE `email_config` (
  `email_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `smtp_host` varchar(200) DEFAULT NULL,
  `smtp_port` varchar(200) DEFAULT NULL,
  `smtp_password` varchar(200) DEFAULT NULL,
  `protocol` text NOT NULL,
  `mailpath` text NOT NULL,
  `mailtype` text NOT NULL,
  `sender` text NOT NULL,
  `api_key` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`email_config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `email_config` (`email_config_id`, `smtp_host`, `smtp_port`, `smtp_password`, `protocol`, `mailpath`, `mailtype`, `sender`, `api_key`, `status`) VALUES ('1', 'ssl://smtp.googlemail.com', '465', '1234567890', 'smtp', '/usr/sbin/sendmail', 'html', 'ainalcse@gmail.com', '22c4c92a-e5a8-4293-b64c-befc9248521e', '1');


#
# TABLE STRUCTURE FOR: emp_attendance
#

DROP TABLE IF EXISTS `emp_attendance`;

CREATE TABLE `emp_attendance` (
  `att_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sign_in` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `sign_out` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `staytime` time DEFAULT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `emp_attendance` (`att_id`, `employee_id`, `date`, `sign_in`, `sign_out`, `staytime`) VALUES ('5', '145454', '2019-01-09', '01:28:09 pm', '01:38:57 pm', '00:10:48');
INSERT INTO `emp_attendance` (`att_id`, `employee_id`, `date`, `sign_in`, `sign_out`, `staytime`) VALUES ('6', 'EQLAJFUW', '2019-01-09', '01:28:15 pm', '01:38:53 pm', '00:10:38');


#
# TABLE STRUCTURE FOR: employee_benifit
#

DROP TABLE IF EXISTS `employee_benifit`;

CREATE TABLE `employee_benifit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bnf_cl_code` varchar(100) NOT NULL,
  `bnf_cl_code_des` varchar(250) NOT NULL,
  `bnff_acural_date` date NOT NULL,
  `bnf_status` tinyint(4) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `employee_benifit` (`id`, `bnf_cl_code`, `bnf_cl_code_des`, `bnff_acural_date`, `bnf_status`, `employee_id`) VALUES ('1', '234234', '23423sdfsdfs', '0000-00-00', '1', 'EYOBEEFQ');
INSERT INTO `employee_benifit` (`id`, `bnf_cl_code`, `bnf_cl_code_des`, `bnff_acural_date`, `bnf_status`, `employee_id`) VALUES ('2', '3243245', '43dfgdfsgdfg', '0000-00-00', '1', 'EYOBEEFQ');
INSERT INTO `employee_benifit` (`id`, `bnf_cl_code`, `bnf_cl_code_des`, `bnff_acural_date`, `bnf_status`, `employee_id`) VALUES ('3', '23423', '32432', '0000-00-00', '1', 'EHBEEFQQ');
INSERT INTO `employee_benifit` (`id`, `bnf_cl_code`, `bnf_cl_code_des`, `bnff_acural_date`, `bnf_status`, `employee_id`) VALUES ('4', '34532423', 'sdfsaf', '0000-00-00', '2', 'EHBEEFQQ');
INSERT INTO `employee_benifit` (`id`, `bnf_cl_code`, `bnf_cl_code_des`, `bnff_acural_date`, `bnf_status`, `employee_id`) VALUES ('5', 'sdf34234', '23dfsdfasdf', '0000-00-00', '1', 'EHBEEFQQ');


#
# TABLE STRUCTURE FOR: employee_history
#

DROP TABLE IF EXISTS `employee_history`;

CREATE TABLE `employee_history` (
  `emp_his_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) NOT NULL,
  `pos_id` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `alter_phone` varchar(30) NOT NULL,
  `present_address` varchar(100) DEFAULT NULL,
  `parmanent_address` varchar(100) DEFAULT NULL,
  `picture` text,
  `degree_name` varchar(30) DEFAULT NULL,
  `university_name` varchar(50) DEFAULT NULL,
  `cgp` varchar(30) DEFAULT NULL,
  `passing_year` varchar(30) DEFAULT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `working_period` varchar(30) DEFAULT NULL,
  `duties` varchar(30) DEFAULT NULL,
  `supervisor` varchar(30) DEFAULT NULL,
  `signature` text,
  `is_admin` int(2) NOT NULL DEFAULT '0',
  `dept_id` int(11) DEFAULT NULL,
  `division_id` int(11) NOT NULL,
  `maiden_name` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `citizenship` int(11) NOT NULL,
  `duty_type` int(11) NOT NULL,
  `hire_date` date NOT NULL,
  `original_hire_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `termination_reason` text NOT NULL,
  `voluntary_termination` int(11) NOT NULL,
  `rehire_date` date NOT NULL,
  `rate_type` int(11) NOT NULL,
  `rate` float NOT NULL,
  `pay_frequency` int(11) NOT NULL,
  `pay_frequency_txt` varchar(50) NOT NULL,
  `hourly_rate2` float NOT NULL,
  `hourly_rate3` float NOT NULL,
  `home_department` varchar(100) NOT NULL,
  `department_text` varchar(100) NOT NULL,
  `class_code` varchar(50) NOT NULL,
  `class_code_desc` varchar(100) NOT NULL,
  `class_acc_date` date NOT NULL,
  `class_status` tinyint(4) NOT NULL,
  `is_super_visor` int(11) DEFAULT NULL,
  `super_visor_id` varchar(30) NOT NULL,
  `supervisor_report` text NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `country` varchar(120) DEFAULT NULL,
  `marital_status` int(11) NOT NULL,
  `ethnic_group` varchar(100) NOT NULL,
  `eeo_class_gp` varchar(100) NOT NULL,
  `ssn` varchar(50) NOT NULL,
  `work_in_state` int(11) NOT NULL,
  `live_in_state` int(11) NOT NULL,
  `home_email` varchar(50) NOT NULL,
  `business_email` varchar(50) NOT NULL,
  `home_phone` varchar(30) NOT NULL,
  `business_phone` varchar(30) NOT NULL,
  `cell_phone` varchar(30) NOT NULL,
  `emerg_contct` varchar(30) NOT NULL,
  `emrg_h_phone` varchar(30) NOT NULL,
  `emrg_w_phone` varchar(30) NOT NULL,
  `emgr_contct_relation` varchar(50) NOT NULL,
  `alt_em_contct` varchar(30) NOT NULL,
  `alt_emg_h_phone` varchar(30) NOT NULL,
  `alt_emg_w_phone` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_his_id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('162', 'EY2T1OWA', '4', 'jahangir', NULL, 'Ahmad', 'jahangir@gmail.com', '0195511016', '234234', NULL, NULL, './application/modules/employee/assets/images/2018-09-20/pra.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '15', '3', 'Kala', 'New York', 'New', '234234', '0', '1', '2018-09-19', '2018-09-19', '2018-09-19', 'sdfasdf', '2', '2018-09-26', '1', '323', '2', '234', '324234', '2523', '234', '234532', '', '', '1970-01-01', '1', NULL, '0', 'dfasdfsdf', '2018-09-19', '1', NULL, '2', 'sunni', '234324', '23423', '1', '1', 'u@gmail.com', 'b@gmail.com', 'dsfsdf', 'dsfdsf', 'sdfsdf', '42342323', '234234', '234234', '2343', '234', '324234', '324324');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('165', '145454', '6', 'Hm', NULL, 'Isahaq', 'hmisahaq@gmail.com', '2344098234', '49023', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '14', '6', 'Yousuf', 'Alabama', 'deom', '3243', '0', '1', '2018-09-20', '2018-09-20', '2018-09-29', 'fsdf', '1', '2018-09-29', '1', '234', '3', '234', '0', '0', '', '', '', '', '1970-01-01', '1', NULL, '0', '324', '2018-09-29', '1', NULL, '1', 'sdfsdf', '', '23423', '1', '1', '234', 'sd', '82309423', '', '234', '324234', '34242', '546456', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('166', 'EQLAJFUW', '6', 'Ainal', '', 'Haque', 'ainal@gmail.com', '01715234991', '', NULL, NULL, './application/modules/hrm/assets/images/2019-01-22/u.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '14', '0', '', 'Alabama', '', '0', '1', '1', '2018-11-12', '2018-11-12', '2018-11-12', '', '1', '2018-11-12', '1', '100', '1', '', '0', '0', '', '', '', '', '2018-11-12', '1', NULL, '0', '', '2018-11-12', '1', NULL, '1', '', '', '3425', '1', '1', '', '', '017123657332', '', '017123657332', '017123657332', '017123657332', '017123657332', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('168', 'E97E9SJT', '6', 'Manik ', '', 'Hassan', 'manik@gmail.com', '01913251229', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '14', '0', '', 'Alabama', 'Dhaka', '143325', '1', '1', '2019-01-01', '2019-01-01', '2021-01-31', 'sdfs', '1', '2022-01-09', '1', '100', '1', '', '0', '0', '', '', '', '', '2019-01-09', '1', NULL, '1', '', '1970-01-01', '1', NULL, '1', '', '', 'e4dfg', '1', '1', '', '', '34353636', '', '3636', '345345', '3453', '3453', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('169', 'EW9PM201', '6', 'test emp', 'emp', '', 'testemp@gmail.com', '0193245345', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '14', '0', '', 'Alabama', 'D', '0', '1', '1', '2019-01-01', '2019-01-01', '2022-01-31', '', '1', '2022-01-09', '1', '100', '1', '', '0', '0', '', '', '', '', '2019-01-09', '1', NULL, '1', '', '1990-01-09', '1', NULL, '1', '', '', '6456457', '1', '1', '', '', '353', '', '34543', '3543535', '35345', '35345', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('170', 'EBK2UPRA', '1', 'John ', '', 'Carlos', 'jhonchef@gmail.com', '01812341009', '', NULL, NULL, './application/modules/hrm/assets/images/2019-01-27/1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '17', '0', '', 'Alabama', '', '0', '1', '1', '2019-01-01', '2019-01-26', '2020-01-27', '', '1', '2020-01-28', '2', '3', '2', '', '0', '0', '', '', '', '', '2019-01-27', '1', NULL, '1', '', '1995-01-18', '1', NULL, '2', '', '', '56756789', '1', '1', '', '', '46747568', '', '6797887', '789789', '789789', '6587686', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('171', 'E3Y1WJMB', '1', 'John ', 'Di ', 'Maria', 'dimaria@gmail.com', '01911234001', '', NULL, NULL, './application/modules/hrm/assets/images/2019-01-27/2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '17', '0', '', 'Alabama', '', '0', '1', '1', '2019-01-17', '2019-01-15', '2020-01-27', '', '1', '2019-01-27', '1', '2', '1', '', '0', '0', '', '', '', '', '2019-01-27', '1', NULL, '1', '', '2000-01-20', '1', NULL, '1', '', '', 'r6u878980', '1', '1', '', '', '23534575', '', '56878709', '35468', '89080', '324567', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('172', 'EXL9WSCL', '1', 'Mitchel ', '', 'Santner', 'michel', '01723456001', '', NULL, NULL, './application/modules/hrm/assets/images/2019-01-27/3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '17', '0', '', 'Alabama', '', '0', '1', '1', '2019-01-23', '2019-01-24', '2019-01-27', '', '1', '2019-01-27', '1', '4', '1', '', '0', '0', '', '', '', '', '2019-01-27', '1', NULL, '1', '', '2019-01-15', '1', NULL, '1', '', '', '436547', '1', '1', '', '', '6588678987', '', '789789', '789743534', '335356', '3253464', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('173', 'EU3APTYY', '1', 'John', '', 'Doe', 'doe@gmail.com', '01812876123', '', NULL, NULL, './application/modules/hrm/assets/images/2019-01-27/4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '17', '0', '', 'Alabama', '', '0', '1', '1', '2019-01-26', '2019-01-22', '2019-01-27', '', '1', '2019-01-27', '1', '5', '1', '', '0', '0', '', '', '', '', '2019-01-27', '1', NULL, '1', '', '1994-01-27', '1', NULL, '1', '', '', '679789784', '1', '1', '', '', '36477', '', '567578', '543654', '67869879', '34536467', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('174', 'E4Y91CAX', '6', 'online', '', 'order', 'online@gmail.com', '8801717400123', '', NULL, NULL, './application/modules/hrm/assets/images/2019-02-03/l.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '14', '0', '', 'Alabama', '', '0', '1', '1', '2019-02-03', '2019-02-03', '2019-02-03', '', '1', '2019-02-03', '1', '36', '1', '', '0', '0', '', '', '', '', '2019-02-03', '1', NULL, '1', '', '2019-02-19', '1', NULL, '1', '', '', '54647', '1', '1', '', '', '456464', '', '8978080', '234', '87900', '5687689679', '', '', '', '');
INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES ('175', 'EK9BYZVY', '3', 'test sdafds', 'sdfs', 'sdfds', 'sdf@gmail.com', '543564765', '', NULL, NULL, './application/modules/hrm/assets/images/2019-02-24/c.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '16', '0', 'sdf', 'Dhaka', 'sdfd', '21343', '1', '1', '2019-02-19', '2019-02-24', '2019-02-24', '', '1', '2019-02-13', '1', '3', '1', '', '0', '0', '', '', '', '', '2019-02-24', '1', NULL, '0', '', '2019-02-03', '1', 'Bangladesh', '1', '', '', '342546765', '1', '1', '', '', '3456', '', '456546', '46546', '46546', '45654', '', '', '', '');


#
# TABLE STRUCTURE FOR: employee_performance
#

DROP TABLE IF EXISTS `employee_performance`;

CREATE TABLE `employee_performance` (
  `emp_per_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `note` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `note_by` varchar(50) CHARACTER SET latin1 NOT NULL,
  `number_of_star` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `updated_by` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`emp_per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `employee_performance` (`emp_per_id`, `employee_id`, `note`, `date`, `note_by`, `number_of_star`, `status`, `updated_by`) VALUES ('1', '145454', 'ere', '2018-12-19', 'John Doe', '4', 'dgfhfh', '');


#
# TABLE STRUCTURE FOR: employee_sal_pay_type
#

DROP TABLE IF EXISTS `employee_sal_pay_type`;

CREATE TABLE `employee_sal_pay_type` (
  `emp_sal_pay_type_id` int(11) unsigned NOT NULL,
  `payment_period` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: employee_salary_payment
#

DROP TABLE IF EXISTS `employee_salary_payment`;

CREATE TABLE `employee_salary_payment` (
  `emp_sal_pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_salary` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_working_minutes` varchar(50) CHARACTER SET latin1 NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_due` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `paid_by` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`emp_sal_pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `employee_salary_payment` (`emp_sal_pay_id`, `employee_id`, `total_salary`, `total_working_minutes`, `working_period`, `payment_due`, `payment_date`, `paid_by`) VALUES ('14', '145454', '17.69', '0.06', '1', 'paid', '2019-01-09', 'John Doe');
INSERT INTO `employee_salary_payment` (`emp_sal_pay_id`, `employee_id`, `total_salary`, `total_working_minutes`, `working_period`, `payment_due`, `payment_date`, `paid_by`) VALUES ('15', 'EQLAJFUW', '8.54', '0.07', '3', 'paid', '2019-01-09', 'John Doe');


#
# TABLE STRUCTURE FOR: employee_salary_setup
#

DROP TABLE IF EXISTS `employee_salary_setup`;

CREATE TABLE `employee_salary_setup` (
  `e_s_s_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sal_type` varchar(30) NOT NULL,
  `salary_type_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` datetime(6) DEFAULT NULL,
  `update_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `gross_salary` float NOT NULL,
  PRIMARY KEY (`e_s_s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('1', 'EQLAJFUW', '1', '6', '2', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('2', 'EQLAJFUW', '1', '10', '2', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('3', 'EQLAJFUW', '1', '15', '10', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('4', 'EQLAJFUW', '1', '16', '1', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('5', 'EQLAJFUW', '1', '17', '2', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('6', 'EQLAJFUW', '1', '18', '3', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('7', 'EQLAJFUW', '1', '19', '4', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('8', 'EQLAJFUW', '1', '12', '1', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('9', 'EQLAJFUW', '1', '13', '1', '2018-12-19', NULL, '', '122');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('10', '145454', '1', '6', '2', '2018-12-19', NULL, '', '294.84');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('11', '145454', '1', '10', '10', '2018-12-19', NULL, '', '294.84');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('12', '145454', '1', '15', '5', '2018-12-19', NULL, '', '294.84');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('13', '145454', '1', '16', '5', '2018-12-19', NULL, '', '294.84');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('14', '145454', '1', '17', '2', '2018-12-19', NULL, '', '294.84');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('15', '145454', '1', '18', '2', '2018-12-19', NULL, '', '294.84');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('16', '145454', '1', '19', '0', '2018-12-19', NULL, '', '294.84');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('17', '145454', '1', '12', '0', '2018-12-19', NULL, '', '294.84');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES ('18', '145454', '1', '13', '0', '2018-12-19', NULL, '', '294.84');


#
# TABLE STRUCTURE FOR: foodvariable
#

DROP TABLE IF EXISTS `foodvariable`;

CREATE TABLE `foodvariable` (
  `availableID` int(11) NOT NULL AUTO_INCREMENT,
  `foodid` int(11) NOT NULL,
  `availtime` varchar(50) NOT NULL,
  `availday` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`availableID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `foodvariable` (`availableID`, `foodid`, `availtime`, `availday`, `is_active`) VALUES ('1', '1', '14:00:00-21:00:00', 'Saturday', '1');
INSERT INTO `foodvariable` (`availableID`, `foodid`, `availtime`, `availday`, `is_active`) VALUES ('2', '2', '11:30:00-19:00:00', 'Sunday', '1');
INSERT INTO `foodvariable` (`availableID`, `foodid`, `availtime`, `availday`, `is_active`) VALUES ('3', '6', '10:10:15-17:35:30', 'Wednesday', '1');
INSERT INTO `foodvariable` (`availableID`, `foodid`, `availtime`, `availday`, `is_active`) VALUES ('4', '1', '13:30:15-20:50:45', 'Wednesday', '1');


#
# TABLE STRUCTURE FOR: gender
#

DROP TABLE IF EXISTS `gender`;

CREATE TABLE `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `gender` (`id`, `gender_name`) VALUES ('1', 'Male');
INSERT INTO `gender` (`id`, `gender_name`) VALUES ('2', 'Female');
INSERT INTO `gender` (`id`, `gender_name`) VALUES ('3', 'Other');


#
# TABLE STRUCTURE FOR: grand_loan
#

DROP TABLE IF EXISTS `grand_loan`;

CREATE TABLE `grand_loan` (
  `loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `permission_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `loan_details` varchar(30) CHARACTER SET latin1 NOT NULL,
  `amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `interest_rate` varchar(30) CHARACTER SET latin1 NOT NULL,
  `installment` varchar(30) CHARACTER SET latin1 NOT NULL,
  `installment_period` varchar(30) CHARACTER SET latin1 NOT NULL,
  `repayment_amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `date_of_approve` varchar(30) CHARACTER SET latin1 NOT NULL,
  `repayment_start_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `created_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `updated_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `loan_status` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `grand_loan` (`loan_id`, `employee_id`, `permission_by`, `loan_details`, `amount`, `interest_rate`, `installment`, `installment_period`, `repayment_amount`, `date_of_approve`, `repayment_start_date`, `created_by`, `updated_by`, `loan_status`) VALUES ('1', 'EQLAJFUW', '145454', 'sd', '2000', '3', '172', '12', '2060', '2018-12-19', '2018-12-20', '', '', '1');
INSERT INTO `grand_loan` (`loan_id`, `employee_id`, `permission_by`, `loan_details`, `amount`, `interest_rate`, `installment`, `installment_period`, `repayment_amount`, `date_of_approve`, `repayment_start_date`, `created_by`, `updated_by`, `loan_status`) VALUES ('2', 'EQLAJFUW', '145454', 'dfsfd', '2000', '3', '172', '12', '2060', '2018-12-20', '2018-12-22', '', '', '1');
INSERT INTO `grand_loan` (`loan_id`, `employee_id`, `permission_by`, `loan_details`, `amount`, `interest_rate`, `installment`, `installment_period`, `repayment_amount`, `date_of_approve`, `repayment_start_date`, `created_by`, `updated_by`, `loan_status`) VALUES ('3', 'EQLAJFUW', '145454', 'dfsfd', '2000', '3', '172', '12', '2060', '2018-12-20', '2018-12-22', '', '', '1');
INSERT INTO `grand_loan` (`loan_id`, `employee_id`, `permission_by`, `loan_details`, `amount`, `interest_rate`, `installment`, `installment_period`, `repayment_amount`, `date_of_approve`, `repayment_start_date`, `created_by`, `updated_by`, `loan_status`) VALUES ('4', 'EU8EH6BY', 'EY2T1OWA', 'ht', '2000', '3', '172', '12', '2060', '2018-12-20', '2018-12-27', '', '', '1');


#
# TABLE STRUCTURE FOR: ingredients
#

DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uom_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('2', 'Oil', '2', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('3', 'Onion', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('4', 'Ginger', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('5', 'Beef Meat', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('6', 'Mutton', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('7', 'Sugar', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('8', 'Egg', '7', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('9', 'ground beef', '9', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('10', 'Worcestershire', '10', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('11', 'salt', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('12', 'hamburger buns', '7', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('13', 'mayonnaise', '3', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('14', 'tomato', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('15', 'Wheat', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('16', 'Corn Meal', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('17', 'soy oil', '2', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('18', 'yeast', '5', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('19', 'Soybean oil', '2', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('20', 'Sodium caseinate', '5', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('21', 'Pork and beef', '1', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('22', '7 UP', '2', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('23', 'COCA COLA', '2', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('24', 'Fizz UP', '2', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('25', 'Red Bull', '2', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('26', 'Pepsi', '2', '1');
INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES ('27', 'Rice', '1', '1');


#
# TABLE STRUCTURE FOR: item_category
#

DROP TABLE IF EXISTS `item_category`;

CREATE TABLE `item_category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `CategoryImage` varchar(255) DEFAULT NULL,
  `Position` int(11) DEFAULT NULL,
  `CategoryIsActive` int(11) DEFAULT NULL,
  `offerstartdate` date DEFAULT '0000-00-00',
  `offerendate` date NOT NULL DEFAULT '0000-00-00',
  `isoffer` int(11) DEFAULT '0',
  `parentid` int(11) DEFAULT '0',
  `UserIDInserted` int(11) NOT NULL DEFAULT '0',
  `UserIDUpdated` int(11) NOT NULL DEFAULT '0',
  `UserIDLocked` int(11) NOT NULL DEFAULT '0',
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('3', 'Appetizers', './application/modules/itemmanage/assets/images/2018-11-04/apa.jpg', NULL, '1', '2018-11-15', '0000-00-00', '1', '0', '2', '2', '2', '2018-11-04 11:51:52', '2018-11-04 12:00:02', '2018-11-04 11:51:52');
INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('4', 'Burger', './application/modules/itemmanage/assets/images/2018-11-04/bur1.jpg', NULL, '1', '2018-11-22', '2018-11-28', '1', '0', '2', '2', '2', '2018-11-04 12:03:46', '2018-11-05 09:21:56', '2018-11-04 12:03:46');
INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('5', 'Pizza', './application/modules/itemmanage/assets/images/2018-11-04/piz.jpg', NULL, '1', '0000-00-00', '0000-00-00', '0', '0', '2', '2', '2', '2018-11-04 12:04:19', '2018-11-04 12:04:19', '2018-11-04 12:04:19');
INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('6', 'Tandoori', './application/modules/itemmanage/assets/images/2018-11-04/tan.jpg', NULL, '1', '0000-00-00', '0000-00-00', '0', '3', '2', '2', '2', '2018-11-04 12:06:02', '2018-11-04 12:06:02', '2018-11-04 12:06:02');
INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('7', 'Indian', './application/modules/itemmanage/assets/images/2018-11-04/ind.jpg', NULL, '0', '0000-00-00', '0000-00-00', '0', '0', '2', '2', '2', '2018-11-04 12:07:02', '2018-11-04 12:07:02', '2018-11-04 12:07:02');
INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('9', 'Fast Food', './application/modules/itemmanage/assets/images/2018-11-04/fas.jpg', NULL, '1', '0000-00-00', '0000-00-00', '0', '4', '2', '2', '2', '2018-11-04 13:00:19', '2018-11-04 13:00:19', '2018-11-04 13:00:19');
INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('10', 'Chinese Mains', './application/modules/itemmanage/assets/images/2018-11-04/chi.jpg', NULL, '1', '0000-00-00', '0000-00-00', '0', '0', '2', '2', '2', '2018-11-04 13:07:23', '2019-01-29 08:05:11', '2018-11-04 13:07:23');
INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('12', 'Umami Burgers', './application/modules/itemmanage/assets/images/2019-01-22/b1.jpg', NULL, '1', '0000-00-00', '0000-00-00', '0', '4', '2', '2', '2', '2019-01-22 11:15:23', '2019-01-22 11:15:23', '2019-01-22 11:15:23');
INSERT INTO `item_category` (`CategoryID`, `Name`, `CategoryImage`, `Position`, `CategoryIsActive`, `offerstartdate`, `offerendate`, `isoffer`, `parentid`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('13', 'Pug Burger', './application/modules/itemmanage/assets/images/2019-01-22/c.jpg', NULL, '1', '0000-00-00', '0000-00-00', '0', '4', '2', '2', '2', '2019-01-22 11:15:36', '2019-01-22 11:15:36', '2019-01-22 11:15:36');


#
# TABLE STRUCTURE FOR: item_foods
#

DROP TABLE IF EXISTS `item_foods`;

CREATE TABLE `item_foods` (
  `ProductsID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductImage` varchar(200) DEFAULT NULL,
  `bigthumb` varchar(255) NOT NULL,
  `medium_thumb` varchar(255) NOT NULL,
  `small_thumb` varchar(255) NOT NULL,
  `component` text,
  `descrip` text,
  `itemnotes` varchar(255) DEFAULT NULL,
  `productvat` int(11) DEFAULT '0',
  `special` int(11) NOT NULL DEFAULT '0',
  `OffersRate` int(11) NOT NULL DEFAULT '0' COMMENT '1=offer rate',
  `offerIsavailable` int(11) NOT NULL DEFAULT '0' COMMENT '1=offer available,0=No Offer',
  `offerstartdate` date DEFAULT '0000-00-00',
  `offerendate` date DEFAULT '0000-00-00',
  `Position` int(11) DEFAULT NULL,
  `ProductsIsActive` int(11) DEFAULT NULL,
  `UserIDInserted` int(11) NOT NULL DEFAULT '0',
  `UserIDUpdated` int(11) NOT NULL DEFAULT '0',
  `UserIDLocked` int(11) NOT NULL DEFAULT '0',
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ProductsID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `item_foods` (`ProductsID`, `CategoryID`, `ProductName`, `ProductImage`, `bigthumb`, `medium_thumb`, `small_thumb`, `component`, `descrip`, `itemnotes`, `productvat`, `special`, `OffersRate`, `offerIsavailable`, `offerstartdate`, `offerendate`, `Position`, `ProductsIsActive`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('1', '4', 'Hamburgers', 'application/modules/itemmanage/assets/images/burger.jpg', 'application/modules/itemmanage/assets/images/big/burger.jpg', 'application/modules/itemmanage/assets/images/medium/burger.jpg', 'application/modules/itemmanage/assets/images/small/burger.jpg', 'ground beef,Macaroni,Ground meat,soy sauce', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'fdgh', '3', '1', '0', '0', '0000-00-00', '0000-00-00', NULL, '1', '2', '2', '2', '2018-11-06 11:56:00', '2019-01-29 07:10:30', '2018-11-06 11:56:00');
INSERT INTO `item_foods` (`ProductsID`, `CategoryID`, `ProductName`, `ProductImage`, `bigthumb`, `medium_thumb`, `small_thumb`, `component`, `descrip`, `itemnotes`, `productvat`, `special`, `OffersRate`, `offerIsavailable`, `offerstartdate`, `offerendate`, `Position`, `ProductsIsActive`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('2', '4', 'Bacon cheeseburger', 'application/modules/itemmanage/assets/images/burger1.jpg', 'application/modules/itemmanage/assets/images/big/burger1.jpg', 'application/modules/itemmanage/assets/images/medium/burger1.jpg', 'application/modules/itemmanage/assets/images/small/burger1.jpg', 'ground beef,Macaroni,Ground meat,soy sauce', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'dr', '0', '1', '5', '1', '2018-11-08', '2018-11-29', NULL, '1', '2', '2', '2', '2018-11-06 11:59:46', '2019-01-29 07:09:22', '2018-11-06 11:59:46');
INSERT INTO `item_foods` (`ProductsID`, `CategoryID`, `ProductName`, `ProductImage`, `bigthumb`, `medium_thumb`, `small_thumb`, `component`, `descrip`, `itemnotes`, `productvat`, `special`, `OffersRate`, `offerIsavailable`, `offerstartdate`, `offerendate`, `Position`, `ProductsIsActive`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('3', '5', 'Chicago Pizza', 'application/modules/itemmanage/assets/images/pizza.jpg', 'application/modules/itemmanage/assets/images/big/pizza.jpg', 'application/modules/itemmanage/assets/images/medium/pizza.jpg', 'application/modules/itemmanage/assets/images/small/pizza.jpg', 'tomato sauce. Generally, the toppings for Chicago pizza are ground beef, sausage, pepperoni, onion, mushrooms, and green peppers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'test', '0', '0', '0', '0', '0000-00-00', '0000-00-00', NULL, '1', '2', '2', '2', '2018-11-12 11:50:22', '2019-01-29 07:09:05', '2018-11-12 11:50:22');
INSERT INTO `item_foods` (`ProductsID`, `CategoryID`, `ProductName`, `ProductImage`, `bigthumb`, `medium_thumb`, `small_thumb`, `component`, `descrip`, `itemnotes`, `productvat`, `special`, `OffersRate`, `offerIsavailable`, `offerstartdate`, `offerendate`, `Position`, `ProductsIsActive`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('4', '5', 'Sicilian Pizza', 'application/modules/itemmanage/assets/images/pizza2.jpg', 'application/modules/itemmanage/assets/images/big/pizza2.jpg', 'application/modules/itemmanage/assets/images/medium/pizza2.jpg', 'application/modules/itemmanage/assets/images/small/pizza2.jpg', 'tomato sauce, onions, herbs, anchovies', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'tr', '10', '1', '0', '0', '0000-00-00', '0000-00-00', NULL, '1', '2', '2', '2', '2018-11-12 11:51:22', '2019-01-29 07:08:47', '2018-11-12 11:51:22');
INSERT INTO `item_foods` (`ProductsID`, `CategoryID`, `ProductName`, `ProductImage`, `bigthumb`, `medium_thumb`, `small_thumb`, `component`, `descrip`, `itemnotes`, `productvat`, `special`, `OffersRate`, `offerIsavailable`, `offerstartdate`, `offerendate`, `Position`, `ProductsIsActive`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('5', '6', 'Special Tandoori', 'application/modules/itemmanage/assets/images/fastfood.jpg', 'application/modules/itemmanage/assets/images/big/fastfood.jpg', 'application/modules/itemmanage/assets/images/medium/fastfood.jpg', 'application/modules/itemmanage/assets/images/small/fastfood.jpg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.', 'tss', '0', '0', '0', '0', '0000-00-00', '0000-00-00', NULL, '1', '2', '2', '2', '2018-11-15 11:40:17', '2019-01-29 07:08:17', '2018-11-15 11:40:17');
INSERT INTO `item_foods` (`ProductsID`, `CategoryID`, `ProductName`, `ProductImage`, `bigthumb`, `medium_thumb`, `small_thumb`, `component`, `descrip`, `itemnotes`, `productvat`, `special`, `OffersRate`, `offerIsavailable`, `offerstartdate`, `offerendate`, `Position`, `ProductsIsActive`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('6', '9', '301. Club Sandwich', 'application/modules/itemmanage/assets/images/sandwich21.jpg', 'application/modules/itemmanage/assets/images/big/sandwich21.jpg', 'application/modules/itemmanage/assets/images/medium/sandwich21.jpg', 'application/modules/itemmanage/assets/images/small/sandwich21.jpg', 'beef,rice', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.', 'tra', '0', '0', '0', '0', '0000-00-00', '0000-00-00', NULL, '1', '2', '2', '2', '2018-11-15 11:43:43', '2019-01-29 06:02:49', '2018-11-15 11:43:43');
INSERT INTO `item_foods` (`ProductsID`, `CategoryID`, `ProductName`, `ProductImage`, `bigthumb`, `medium_thumb`, `small_thumb`, `component`, `descrip`, `itemnotes`, `productvat`, `special`, `OffersRate`, `offerIsavailable`, `offerstartdate`, `offerendate`, `Position`, `ProductsIsActive`, `UserIDInserted`, `UserIDUpdated`, `UserIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES ('7', '12', 'Umami Burger', 'application/modules/itemmanage/assets/images/cheese-burgers-pugs.jpg', 'application/modules/itemmanage/assets/images/big/cheese-burgers-pugs.jpg', 'application/modules/itemmanage/assets/images/medium/cheese-burgers-pugs.jpg', 'application/modules/itemmanage/assets/images/small/cheese-burgers-pugs.jpg', 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.', 'test', '5', '1', '5', '1', '2019-01-22', '2019-01-31', NULL, '1', '2', '2', '2', '2019-01-22 11:23:23', '2019-01-29 07:07:49', '2019-01-22 11:23:23');


#
# TABLE STRUCTURE FOR: job_advertisement
#

DROP TABLE IF EXISTS `job_advertisement`;

CREATE TABLE `job_advertisement` (
  `job_adv_id` int(10) unsigned NOT NULL,
  `pos_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adv_circular_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `circular_dadeline` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adv_file` tinytext CHARACTER SET latin1 NOT NULL,
  `adv_details` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: language
#

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` varchar(100) NOT NULL,
  `english` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=971 DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('2', 'login', 'Login');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('3', 'email', 'Email Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('4', 'password', 'Password');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('5', 'reset', 'Reset');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('6', 'dashboard', 'Dashboard');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('7', 'home', 'Home');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('8', 'profile', 'Profile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('9', 'profile_setting', 'Profile Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('10', 'firstname', 'First Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('11', 'lastname', 'Last Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('12', 'about', 'About');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('13', 'preview', 'Preview');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('14', 'image', 'Image');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('15', 'save', 'Save');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('16', 'upload_successfully', 'Upload Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('17', 'user_added_successfully', 'User Added Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('18', 'please_try_again', 'Please Try Again...');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('19', 'inbox_message', 'Inbox Messages');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('20', 'sent_message', 'Sent Message');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('21', 'message_details', 'Message Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('22', 'new_message', 'New Message');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('23', 'receiver_name', 'Receiver Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('24', 'sender_name', 'Sender Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('25', 'subject', 'Subject');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('26', 'message', 'Message');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('27', 'message_sent', 'Message Sent!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('28', 'ip_address', 'IP Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('29', 'last_login', 'Last Login');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('30', 'last_logout', 'Last Logout');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('31', 'status', 'Status');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('32', 'delete_successfully', 'Delete Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('33', 'send', 'Send');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('34', 'date', 'Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('35', 'action', 'Action');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('36', 'sl_no', 'SL No.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('37', 'are_you_sure', 'Are You Sure ? ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('38', 'application_setting', 'Application Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('39', 'application_title', 'Application Title');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('40', 'address', 'Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('41', 'phone', 'Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('42', 'favicon', 'Favicon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('43', 'logo', 'Logo');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('44', 'language', 'Language');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('45', 'left_to_right', 'Left To Right');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('46', 'right_to_left', 'Right To Left');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('47', 'footer_text', 'Footer Text');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('48', 'site_align', 'Application Alignment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('49', 'welcome_back', 'Welcome Back!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('50', 'please_contact_with_admin', 'Please Contact With Admin');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('51', 'incorrect_email_or_password', 'Incorrect Email/Password');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('52', 'select_option', 'Select Option');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('53', 'ftp_setting', 'Data Synchronize [FTP Setting]');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('54', 'hostname', 'Host Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('55', 'username', 'User Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('56', 'ftp_port', 'FTP Port');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('57', 'ftp_debug', 'FTP Debug');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('58', 'project_root', 'Project Root');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('59', 'update_successfully', 'Update Successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('60', 'save_successfully', 'Save Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('61', 'delete_successfully', 'Delete Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('62', 'internet_connection', 'Internet Connection');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('63', 'ok', 'Ok');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('64', 'not_available', 'Not Available');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('65', 'available', 'Available');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('66', 'outgoing_file', 'Outgoing File');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('67', 'incoming_file', 'Incoming File');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('68', 'data_synchronize', 'Data Synchronize');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('69', 'unable_to_upload_file_please_check_configuration', 'Unable to upload file! please check configuration');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('70', 'please_configure_synchronizer_settings', 'Please configure synchronizer settings');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('71', 'download_successfully', 'Download Successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('72', 'unable_to_download_file_please_check_configuration', 'Unable to download file! please check configuration');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('73', 'data_import_first', 'Data Import First');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('74', 'data_import_successfully', 'Data Import Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('75', 'unable_to_import_data_please_check_config_or_sql_file', 'Unable to import data! please check configuration / SQL file.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('76', 'download_data_from_server', 'Download Data from Server');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('77', 'data_import_to_database', 'Data Import To Database');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('79', 'data_upload_to_server', 'Data Upload to Server');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('80', 'please_wait', 'Please Wait...');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('81', 'ooops_something_went_wrong', ' Ooops something went wrong...');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('82', 'module_permission_list', 'Module Permission List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('83', 'user_permission', 'User Permission');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('84', 'add_module_permission', 'Add Module Permission');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('85', 'module_permission_added_successfully', 'Module Permission Added Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('86', 'update_module_permission', 'Update Module Permission');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('87', 'download', 'Download');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('88', 'module_name', 'Module Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('89', 'create', 'Create');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('90', 'read', 'Read');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('91', 'update', 'Update');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('92', 'delete', 'Delete');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('93', 'module_list', 'Module List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('94', 'add_module', 'Add Module');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('95', 'directory', 'Module Direcotory');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('96', 'description', 'Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('97', 'image_upload_successfully', 'Image Upload Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('98', 'module_added_successfully', 'Module Added Successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('99', 'inactive', 'Inactive');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('100', 'active', 'Active');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('101', 'user_list', 'User List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('102', 'see_all_message', 'See All Messages');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('103', 'setting', 'Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('104', 'logout', 'Logout');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('105', 'admin', 'Admin');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('106', 'add_user', 'Add User');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('107', 'user', 'User');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('108', 'module', 'Module');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('109', 'new', 'New');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('110', 'inbox', 'Inbox');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('111', 'sent', 'Sent');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('112', 'synchronize', 'Synchronize');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('113', 'data_synchronizer', 'Data Synchronizer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('114', 'module_permission', 'Module Permission');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('115', 'backup_now', 'Backup Now!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('116', 'restore_now', 'Restore Now!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('117', 'backup_and_restore', 'Backup and Restore');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('118', 'captcha', 'Captcha Word');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('119', 'database_backup', 'Database Backup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('120', 'restore_successfully', 'Restore Successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('121', 'backup_successfully', 'Backup Successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('122', 'filename', 'File Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('123', 'file_information', 'File Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('124', 'size', 'size');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('125', 'backup_date', 'Backup Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('126', 'overwrite', 'Overwrite');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('127', 'invalid_file', 'Invalid File!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('128', 'invalid_module', 'Invalid Module');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('129', 'remove_successfully', 'Remove Successfully!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('130', 'install', 'Install');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('131', 'uninstall', 'Uninstall');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('132', 'tables_are_not_available_in_database', 'Tables are not available in database.sql');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('133', 'no_tables_are_registered_in_config', 'No tables are registerd in config.php');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('134', 'enquiry', 'Enquiry');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('135', 'read_unread', 'Read/Unread');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('136', 'enquiry_information', 'Enquiry Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('137', 'user_agent', 'User Agent');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('138', 'checked_by', 'Checked By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('139', 'new_enquiry', 'New Enquiry');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('140', 'crud', 'Crud');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('141', 'view', 'View');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('142', 'name', 'Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('143', 'add', 'Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('144', 'ph', 'Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('145', 'cid', 'SL No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('146', 'view_atn', 'AttendanceView');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('147', 'mang', 'Employemanagement');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('148', 'designation', 'Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('149', 'test', 'Test');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('150', 'sl', 'SL');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('151', 'bdtask', 'BDTASK');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('152', 'practice', 'Practice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('153', 'branch_name', 'Branch Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('154', 'chairman_name', 'Chairman');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('155', 'b_photo', 'Photo');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('156', 'b_address', 'Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('157', 'position', 'Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('158', 'advertisement', 'Advertisement');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('159', 'position_name', 'Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('160', 'position_details', 'Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('161', 'circularprocess', 'Recruitment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('162', 'pos_id', 'Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('163', 'adv_circular_date', 'Publish Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('164', 'circular_dadeline', 'Dadeline');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('165', 'adv_file', 'Documents');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('166', 'adv_details', 'Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('167', 'attendance', 'Attendance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('168', 'employee', 'Employee');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('169', 'emp_id', 'Employee Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('170', 'sign_in', 'Sign In');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('171', 'sign_out', 'Sign Out');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('172', 'staytime', 'Stay Time');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('173', 'abc', '1');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('174', 'first_name', 'First Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('175', 'last_name', 'Last Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('176', 'alter_phone', 'Alternative Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('177', 'present_address', 'Present Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('178', 'parmanent_address', 'Permanent Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('179', 'candidateinfo', 'Candidate Info');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('180', 'add_advertisement', 'Add Advertisement');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('181', 'advertisement_list', 'Manage Advertisement ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('182', 'candidate_basic_info', 'Candidate Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('183', 'can_basicinfo_list', 'Manage Candidate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('184', 'add_canbasic_info', 'Add New Candidate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('185', 'candidate_education_info', 'Candidate Educational Info');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('186', 'can_educationinfo_list', 'Candidate Edu Info list');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('187', 'add_edu_info', 'Add Educational Info');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('188', 'can_id', 'Candidate Id');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('189', 'degree_name', 'Obtained Degree');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('190', 'university_name', 'University');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('191', 'cgp', 'CGPA');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('192', 'comments', 'Comments');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('193', 'signature', 'Signature');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('194', 'candidate_workexperience', 'Candidate Work Experience');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('195', 'can_workexperience_list', 'Work Experience list');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('196', 'add_can_experience', 'Add Work Experience');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('197', 'company_name', 'Company Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('198', 'working_period', 'Working Period');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('199', 'duties', 'Duties');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('200', 'supervisor', 'Supervisor');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('201', 'candidate_workexpe', 'Candidate Work Experience');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('202', 'candidate_shortlist', 'Candidate Shortlist');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('203', 'shortlist_view', 'Manage Shortlist');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('204', 'add_shortlist', 'Add Shortlist');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('205', 'date_of_shortlist', 'Shortlist Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('206', 'interview_date', 'Interview Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('207', 'submit', 'Submit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('208', 'candidate_id', 'Your ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('209', 'job_adv_id', 'Job Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('210', 'sequence', 'Sequence');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('211', 'candidate_interview', 'Interview');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('212', 'interview_list', 'Interview list');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('213', 'add_interview', 'Add interview');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('214', 'interviewer_id', 'Interviewer');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('215', 'interview_marks', 'Viva Marks');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('216', 'written_total_marks', 'Written Total Marks');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('217', 'mcq_total_marks', 'MCQ Total Marks');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('218', 'recommandation', 'Recommandation');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('219', 'selection', 'Selection');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('220', 'details', 'Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('221', 'candidate_selection', 'Candidate Selection');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('222', 'selection_list', 'Selection List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('223', 'add_selection', 'Add Selection');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('224', 'employee_id', 'Employee Id');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('225', 'position_id', '1');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('226', 'selection_terms', 'Selection Terms');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('227', 'total_marks', 'Total Marks');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('228', 'photo', 'Picture');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('229', 'your_id', 'Your ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('230', 'change_image', 'Change Photo');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('231', 'picture', 'Photograph');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('232', 'ad', 'Add');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('233', 'write_y_p_info', 'Write Your Persoanal Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('234', 'emp_position', 'Employee Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('235', 'add_pos', 'Add Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('236', 'list_pos', 'List of Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('237', 'emp_salary_stup', 'Employee Salary SetUp');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('238', 'add_salary_stup', 'Add Salary Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('239', 'list_salarystup', 'List of Salary Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('240', 'emp_sal_name', 'Salary Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('241', 'emp_sal_type', 'Salary Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('242', 'emp_performance', 'Employee Performance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('243', 'add_performance', 'Add Performance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('244', 'list_performance', 'List of Performance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('245', 'note', 'Note');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('246', 'note_by', 'Note By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('247', 'number_of_star', 'Number of Star');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('248', 'updated_by', 'Updated By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('249', 'emp_sal_payment', 'Manage Employee Salary');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('250', 'add_payment', 'Add Payment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('251', 'list_payment', 'List of payment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('252', 'total_salary', 'Total Salary');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('253', 'total_working_minutes', 'Working Hour');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('254', 'payment_due', 'Payment Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('255', 'payment_date', 'Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('256', 'paid_by', 'Paid By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('257', 'view_employee_payment', 'Employee Payment List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('258', 'sal_payment_type', 'Salary Payment Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('259', 'add_payment_type', 'Add Payment Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('260', 'list_payment_type', 'List of Payment Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('261', 'payment_period', 'Payment Period');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('262', 'payment_type', 'Payment Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('263', 'time', 'Punch Time');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('264', 'shift', 'Shift');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('265', 'location', 'Location');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('266', 'logtype', 'Log Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('267', 'branch', 'Location');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('268', 'student', 'Students');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('269', 'csv', 'CSV');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('270', 'save_successfull', 'Your Data Save Successfully');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('271', 'successfully_updated', 'Your Data Successfully Updated');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('272', 'atn_form', 'Attendance Form');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('273', 'atn_report', 'Attendance Reports');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('274', 'end_date', 'To');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('275', 'start_date', 'From');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('276', 'done', 'Done');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('277', 'employee_id_se', 'Write Employee Id or name here ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('278', 'attendance_repor', 'Attendance Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('279', 'e_time', 'End Time');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('280', 's_time', 'Start Time');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('281', 'atn_datewiserer', 'Date Wise Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('282', 'atn_report_id', 'Date And Id base Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('283', 'atn_report_time', 'Date And Time report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('284', 'payroll', 'Payroll');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('285', 'loan', 'Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('286', 'loan_grand', 'Grant Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('287', 'add_loan', 'Add Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('288', 'loan_list', 'List of Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('289', 'loan_details', 'Loan Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('290', 'amount', 'Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('291', 'interest_rate', 'Interest Percentage');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('292', 'installment_period', 'Installment Period');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('293', 'repayment_amount', 'Repayment Total');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('294', 'date_of_approve', 'Approve Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('295', 'repayment_start_date', 'Repayment From');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('296', 'permission_by', 'Permitted By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('297', 'grand', 'Grand');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('298', 'installment', 'Installment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('299', 'loan_status', 'status');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('300', 'installment_period_m', 'Installment Period in Month');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('301', 'successfully_inserted', 'Your loan Successfully Granted');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('302', 'loan_installment', 'Loan Installment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('303', 'add_installment', 'Add Installment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('304', 'installment_list', 'List of Installment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('305', 'loan_id', 'Loan No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('306', 'installment_amount', 'Installment Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('307', 'payment', 'Payment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('308', 'received_by', 'Receiver');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('309', 'installment_no', 'Install No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('310', 'notes', 'Notes');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('311', 'paid', 'Paid');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('312', 'loan_report', 'Loan Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('313', 'e_r_id', 'Enter Your Employee ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('314', 'leave', 'Leave');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('315', 'add_leave', 'Add Leave');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('316', 'list_leave', 'List of Leave');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('317', 'dayname', 'Weekly Leave Day');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('318', 'holiday', 'Holiday');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('319', 'list_holiday', 'List of Holidays');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('320', 'no_of_days', 'Number of Days');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('321', 'holiday_name', 'Holiday Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('322', 'set', 'SET');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('323', 'tax', 'Tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('324', 'tax_setup', 'Tax Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('325', 'add_tax_setup', 'Add Tax Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('326', 'list_tax_setup', 'List of Tax setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('327', 'tax_collection', 'Tax collection');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('328', 'start_amount', 'Start Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('329', 'end_amount', 'End Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('330', 'rate', 'Tax Rate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('331', 'date_start', 'Date Start');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('332', 'amount_tax', 'Tax Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('333', 'collection_by', 'Collection By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('334', 'date_end', 'Date End');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('335', 'income_net_period', 'Income  Net period');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('336', 'default_amount', 'Default Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('337', 'add_sal_type', 'Add Salary Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('338', 'list_sal_type', 'Salary Type List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('339', 'salary_type_setup', 'Salary Type Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('340', 'salary_setup', 'Salary SetUp');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('341', 'add_sal_setup', 'Add Salary Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('342', 'list_sal_setup', 'Salary Setup List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('343', 'salary_type_id', 'Salary Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('344', 'salary_generate', 'Salary Generate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('345', 'add_sal_generate', 'Generate Now');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('346', 'list_sal_generate', 'Generated Salary List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('347', 'gdate', 'Generate Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('348', 'start_dates', 'Start Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('349', 'generate', 'Generate ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('350', 'successfully_saved_saletup', ' Set up Successfull');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('351', 's_date', 'Start Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('352', 'e_date', 'End Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('353', 'salary_payable', 'Payable Salary');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('354', 'tax_manager', 'Tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('355', 'generate_by', 'Generate By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('356', 'successfully_paid', 'Successfully Paid');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('357', 'direct_empl', ' Employee');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('358', 'add_emp_info', 'Add New Employee');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('359', 'new_empl_pos', 'Add New Employee Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('360', 'manage', 'Manage Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('361', 'ad_advertisement', 'ADD POSITION');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('362', 'moduless', 'Modules');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('363', 'next', 'Next');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('364', 'finish', 'Finish');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('365', 'request', 'Request');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('366', 'successfully_saved', 'Your Data Successfully Saved');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('367', 'sal_type', 'Salary Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('368', 'sal_name', 'Salary Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('369', 'leave_application', 'Leave Application');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('370', 'apply_strt_date', 'Application Start Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('371', 'apply_end_date', 'Application End date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('372', 'leave_aprv_strt_date', 'Approve Start Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('373', 'leave_aprv_end_date', 'Approved End Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('374', 'num_aprv_day', 'Aproved Day');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('375', 'reason', 'Reason');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('376', 'approve_date', 'Approved Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('377', 'leave_type', 'Leave Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('378', 'apply_hard_copy', 'Application Hard Copy');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('379', 'approved_by', 'Approved By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('380', 'notice', 'Notice Board');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('381', 'noticeboard', 'Notice Board');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('382', 'notice_descriptiion', 'Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('383', 'notice_date', 'Notice Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('384', 'notice_type', 'Notice Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('385', 'notice_by', 'Notice By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('386', 'notice_attachment', 'Attachment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('387', 'account_name', 'Account Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('388', 'account_type', 'Account Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('389', 'account_id', 'Account Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('390', 'transaction_description', 'Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('391', 'payment_id', 'Payment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('392', 'create_by_id', 'Created By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('393', 'account', 'Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('394', 'account_add', 'Add Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('395', 'account_transaction', 'Transaction');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('396', 'award', 'Award');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('397', 'new_award', 'New Award');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('398', 'award_name', 'Award Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('399', 'aw_description', 'Award Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('400', 'awr_gift_item', 'Gift Item');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('401', 'awarded_by', 'Award By');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('402', 'employee_name', 'Employee Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('403', 'employee_list', 'Atn List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('404', 'department', 'Department');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('405', 'department_name', 'Department Name ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('406', 'clockout', 'ClockOut');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('407', 'se_account_id', 'Select Account Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('408', 'division', 'Division');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('409', 'add_division', 'Add Division');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('410', 'update_division', 'Update Division');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('411', 'division_name', 'Division Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('412', 'division_list', 'Manage Division ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('413', 'designation_list', 'Position List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('414', 'manage_designation', 'Manage Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('415', 'add_designation', 'Add Positionn');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('416', 'select_division', 'Select Division');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('417', 'select_designation', 'Select Position');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('418', 'asset', 'Asset');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('419', 'asset_type', 'Asset Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('420', 'add_type', 'Add Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('421', 'type_list', 'Type List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('422', 'type_name', 'Type Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('423', 'select_type', 'Select Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('424', 'equipment_name', 'Equipment Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('425', 'model', 'Model');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('426', 'serial_no', 'Serial No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('427', 'equipment', 'Equipment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('428', 'add_equipment', 'Add Equipment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('429', 'equipment_list', 'Equipment List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('430', 'type', 'Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('431', 'equipment_maping', 'Equipment Mapping');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('432', 'add_maping', 'Add Mapping');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('433', 'maping_list', 'Mapping List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('434', 'update_equipment', 'Update Equipment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('435', 'select_employee', 'Select Employee');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('436', 'select_equipment', 'Select Equipment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('437', 'basic_info', 'Basic Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('438', 'middle_name', 'Middle Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('439', 'state', 'State');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('440', 'city', 'City');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('441', 'zip_code', 'Zip Code');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('442', 'maiden_name', 'Maiden Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('443', 'add_employee', 'Add Employee');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('444', 'manage_employee', 'Manage Employee');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('445', 'employee_update_form', 'Employee Update Form');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('446', 'what_you_search', 'What You Search');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('447', 'search', 'Search');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('448', 'duty_type', 'Duty Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('449', 'hire_date', 'Hire Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('450', 'original_h_date', 'Original Hire Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('451', 'voluntary_termination', 'Voluntary Termination');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('452', 'termination_reason', 'Termination Reason');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('453', 'termination_date', 'Termination Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('454', 're_hire_date', 'Re Hire Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('455', 'rate_type', 'Rate Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('456', 'pay_frequency', 'Pay Frequency');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('457', 'pay_frequency_txt', 'Pay Frequency Text');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('458', 'hourly_rate2', 'Hourly rate2');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('459', 'hourly_rate3', 'Hourly Rate3');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('460', 'home_department', 'Home Department');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('461', 'department_text', 'Department Text');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('462', 'benifit_class_code', 'Benifite Class code');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('463', 'benifit_desc', 'Benifit Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('464', 'benifit_acc_date', 'Benifit Accrual Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('465', 'benifit_sta', 'Benifite Status');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('466', 'super_visor_name', 'Supervisor Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('467', 'is_super_visor', 'Is Supervisor');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('468', 'supervisor_report', 'Supervisor Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('469', 'dob', 'Date of Birth');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('470', 'gender', 'Gender');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('471', 'marital_stats', 'Marital Status');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('472', 'ethnic_group', 'Ethnic Group');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('473', 'eeo_class_gp', 'EEO Class');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('474', 'ssn', 'SSN');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('475', 'work_in_state', 'Work in State');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('476', 'live_in_state', 'Live in State');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('477', 'home_email', 'Home Email');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('478', 'business_email', 'Business Email');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('479', 'home_phone', 'Home Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('480', 'business_phone', 'Business Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('481', 'cell_phone', 'Cell Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('482', 'emerg_contct', 'Emergency Contact');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('483', 'emerg_home_phone', 'Emergency Home Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('484', 'emrg_w_phone', 'Emergency Work Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('485', 'emer_con_rela', 'Emergency Contact Relation');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('486', 'alt_em_contct', 'Alter Emergency Contact');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('487', 'alt_emg_h_phone', 'Alt Emergency Home Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('488', 'alt_emg_w_phone', 'Alt Emergency  Work Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('489', 'reports', 'Reports');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('490', 'employee_reports', 'Employee Reports');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('491', 'demographic_report', 'Demographic Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('492', 'posting_report', 'Positional Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('493', 'custom_report', 'Custom Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('494', 'benifit_report', 'Benifit Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('495', 'demographic_info', 'Demographical Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('496', 'positional_info', 'Positional Info');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('497', 'assets_info', 'Assets Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('498', 'custom_field', 'Custom Field');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('499', 'custom_value', 'Custom Data');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('500', 'adhoc_report', 'Adhoc Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('501', 'asset_assignment', 'Asset Assignment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('502', 'assign_asset', 'Assign Assets');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('503', 'assign_list', 'Assign List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('504', 'update_assign', 'Update Assign');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('505', 'citizenship', 'Citizenship');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('506', 'class_sta', 'Class status');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('507', 'class_acc_date', 'Class Accrual date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('508', 'class_descript', 'Class Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('509', 'class_code', 'Class Code');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('510', 'return_asset', 'Return Assets');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('511', 'dept_id', 'Department ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('512', 'parent_id', 'Parent ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('513', 'equipment_id', 'Equipment ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('514', 'issue_date', 'Issue Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('515', 'damarage_desc', 'Damarage Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('516', 'return_date', 'Return Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('517', 'is_assign', 'Is Assign');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('518', 'emp_his_id', 'Employee History ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('519', 'damarage_descript', 'Damage Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('520', 'return', 'Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('521', 'return_successfull', 'Return Successfull');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('522', 'return_list', 'Return List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('523', 'custom_data', 'Custom Data');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('524', 'passing_year', 'Passing Year');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('525', 'is_admin', 'Is Admin');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('526', 'zip', 'Zip Code');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('527', 'original_hire_date', 'Original Hire Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('528', 'rehire_date', 'Rehire Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('529', 'class_code_desc', 'Class Code Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('530', 'class_status', 'Class Status');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('531', 'super_visor_id', 'Supervisor ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('532', 'marital_status', 'Marital Status');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('533', 'emrg_h_phone', 'Emergency Home Phone');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('534', 'emgr_contct_relation', 'Emergency Contact Relation');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('535', 'id', 'ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('536', 'type_id', 'Equipment Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('537', 'custom_id', 'Custom ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('538', 'custom_data_type', 'Custom Data Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('539', 'role_permission', 'Role Permission');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('540', 'permission_setup', 'Permission Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('541', 'add_role', 'Add Role');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('542', 'role_list', 'Role List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('543', 'user_access_role', 'User Access Role');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('544', 'menu_item_list', 'Menu Item List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('545', 'ins_menu_for_application', 'Ins Menu  For Application');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('546', 'menu_title', 'Menu Title');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('547', 'page_url', 'Page Url');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('548', 'parent_menu', 'Parent Menu');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('549', 'role', 'Role');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('550', 'role_name', 'Role Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('551', 'single_checkin', 'Single Check In');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('552', 'bulk_checkin', 'Bulk Check In');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('553', 'manage_attendance', 'Manage Attendance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('554', 'attendance_list', 'Attendance List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('555', 'checkin', 'Check In');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('556', 'checkout', 'Check Out');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('557', 'stay', 'Stay');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('558', 'attendance_report', 'Attendance Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('559', 'work_hour', 'Work Hour');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('560', 'cancel', 'Cancel');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('561', 'confirm_clock', 'Confirm Checkout');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('562', 'add_attendance', 'Add Attendance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('563', 'upload_csv', 'Upload CSV');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('564', 'import_attendance', 'Import Attendance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('565', 'manage_account', 'Manage Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('566', 'add_account', 'Add Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('567', 'add_new_account', 'Add New Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('568', 'account_details', 'Account Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('569', 'manage_transaction', 'Manage Transaction');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('570', 'add_expence', 'Add Experience');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('571', 'add_income', 'Add Income');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('572', 'return_now', 'Return Now !!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('573', 'manage_award', 'Manage Award');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('574', 'add_new_award', 'Add New Award');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('575', 'personal_information', 'Personal Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('576', 'educational_information', 'Educational Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('577', 'past_experience', 'Past Experience');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('578', 'basic_information', 'Basic Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('579', 'result', 'Result');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('580', 'institute_name', 'Institute Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('581', 'education', 'Education');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('582', 'manage_shortlist', 'Manage Short List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('583', 'manage_interview', 'Manage Interview');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('584', 'manage_selection', 'Manage Selection');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('585', 'add_new_dept', 'Add New Department');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('586', 'manage_dept', 'Manage Department');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('587', 'successfully_checkout', 'Checkout Successful !');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('588', 'grant_loan', 'Grant Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('589', 'successfully_installed', 'Successfully Installed');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('590', 'total_loan', 'Total Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('591', 'total_amount', 'Total Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('592', 'filter', 'Filter');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('593', 'weekly_holiday', 'Weekly Holiday');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('594', 'manage_application', 'Manage Application');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('595', 'add_application', 'Add Application');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('596', 'manage_holiday', 'Manage Holiday');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('597', 'add_more_holiday', 'Add More Holiday');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('598', 'manage_weekly_holiday', 'Manage Weekly Holiday');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('599', 'add_weekly_holiday', 'Add Weekly Holiday');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('600', 'manage_granted_loan', 'Manage Granted Loan');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('601', 'manage_installment', 'Manage Installment');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('602', 'add_new_notice', 'Add New Notice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('603', 'manage_notice', 'Manage Notice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('604', 'salary_type', 'Salary Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('605', 'manage_salary_generate', 'Manage Salary Generate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('606', 'generate_now', 'Generate Now');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('607', 'add_salary_setup', 'Add Salary Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('608', 'manage_salary_setup', 'Manage Salary Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('609', 'add_salary_type', 'Add Salary Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('610', 'manage_salary_type', 'Manage Salary Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('611', 'manage_tax_setup', 'Manage Tax Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('612', 'setup_tax', 'Setup Tax');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('613', 'add_more', 'Add More');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('614', 'tax_rate', 'Tax Rate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('615', 'no', 'No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('616', 'setup', 'Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('617', 'biographicalinfo', 'Bio-Graphical Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('618', 'positional_information', 'Positional Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('620', 'benifits', 'Benifits');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('621', 'others_leave_application', 'Others Leave');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('622', 'add_leave_type', 'Add Leave Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('623', 'others_leave', 'Apply Leave');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('624', 'number_of_leave_days', 'Number of Leave Days');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('625', 'itemmanage', 'Food Management');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('626', 'manage_category', 'Manage Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('627', 'add_category', 'Add Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('628', 'category_list', 'Category List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('629', 'manage_food', 'Manage Food');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('630', 'add_food', 'Add Food');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('631', 'food_list', 'Food List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('632', 'category_name', 'Category Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('633', 'food_name', 'Food Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('634', 'category_subtitle', 'Category Subtitle');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('635', 'update_category', 'Update Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('636', 'update_fooditem', 'Update Food Item');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('713', 'food_list', 'Food List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('714', 'food_name', 'Food Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('715', 'add_category', 'Add Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('716', 'add_food', 'Add Food');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('717', 'category_name', 'Category Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('718', 'category_list', 'Category List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('719', 'itemmanage', 'Food Management');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('720', 'manage_category', 'Manage Category');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('721', 'manage_food', 'Manage Food');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('722', 'offerdate', 'Offer Start Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('723', 'manage_addons', 'Manage Adons');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('724', 'add_adons', 'Add Add-ons');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('725', 'menu_addons', 'Add-ons Menu');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('726', 'addons_list', 'Add-ons List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('727', 'assign_adons', 'Add-ons Assign');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('728', 'assign_adons_list', 'Add-ons Assign List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('729', 'update_adons', 'Update Add-ons');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('730', 'item_name', 'Food Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('731', 'price', 'Price');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('732', 'offerenddate', 'Offer End Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('733', 'units', 'Unit and Ingredients');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('734', 'manage_unitmeasurement', 'Unit Measurement');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('735', 'unit_list', 'Unit Measurement List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('736', 'unit_add', 'Add Unit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('737', 'unit_update', 'Unit Update');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('738', 'unit_name', 'Unit Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('739', 'manage_ingradient', 'Manage Ingredients');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('740', 'ingradient_list', 'Ingredient List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('741', 'add_ingredient', 'Add Ingredient');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('742', 'ingredient_name', 'Ingredient Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('743', 'unit_short_name', 'Short Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('744', 'update_ingredient', 'Update Ingredient');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('745', 'component', 'Components');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('746', 'vat_tax', 'Vat');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('747', 'addons_name', 'Add-ons Name ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('748', 'food_varient', 'Food Variant');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('749', 'food_availablity', 'Food Availablity');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('750', 'add_varient', 'Add Variant');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('751', 'varient_name', 'Variant Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('752', 'variant_list', 'Variant List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('753', 'variant_edit', 'Update Variant');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('754', 'food_availablelist', 'Food Available List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('755', 'add_availablity', 'Add Available Day & Time');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('756', 'edit_availablity', 'Update Available Day & Time');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('757', 'available_day', 'Available Day');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('758', 'available_time', 'Available Time');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('759', 'membership_management', 'Membership Management');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('760', 'membership_list', 'Membership List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('761', 'membership_name', 'Membership Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('762', 'discount', 'Discount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('763', 'other_facilities', 'Other Facilities');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('764', 'membership_add', 'Add Membership');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('765', 'membership_edit', 'Update Membership');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('766', 'payment_setting', 'Payment Method Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('767', 'paymentmethod_list', 'Payment Method List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('768', 'payment_add', 'Add Payment Method');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('769', 'payment_edit', 'Update Payment Method');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('770', 'payment_name', 'Payment Method Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('771', 'shipping_setting', 'Shipping Method Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('772', 'shipping_list', 'Shipping Method List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('773', 'shipping_name', 'Shipping Method Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('774', 'shipping_add', 'Add Shipping Method');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('775', 'shipping_edit', 'Update Shipping Method');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('776', 'shippingrate', 'Shipping Rate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('777', 'supplier_manage', 'Supplier Manage');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('778', 'supplier_name', 'Supplier Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('779', 'supplier_list', 'Supplier List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('780', 'mobile', 'Mobile');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('781', 'address', 'Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('782', 'supplier_add', 'Add Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('783', 'supplier_edit', 'Update Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('784', 'purchase_item', 'Purchase Item');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('785', 'purchase', 'Purchase Manage');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('786', 'purchase_list', 'Purchase List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('787', 'purchase_add', 'Add Purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('788', 'purchase_edit', 'Update Purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('789', 'quantity', 'Quantity');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('790', 'supplier_information', 'Supplier Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('791', 'add_new_order', 'Add New Order');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('792', 'pending_order', 'Pending Order');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('793', 'processing_order', 'Processing Order');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('794', 'cancel_order', 'Cancel Order');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('795', 'complete_order', 'Complete Order');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('796', 'pos_invoice', 'Pos Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('797', 'ordermanage', 'Manage Order');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('798', 'table_manage', 'Manage Table');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('799', 'table_edit', 'Update Table');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('800', 'table_list', 'Table List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('801', 'table_name', 'Table Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('802', 'customer_type', 'Customer Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('803', 'customertype_list', 'Customer Type List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('804', 'production', 'Production');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('805', 'add_table', 'Table Add');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('806', 'table_add', 'Add Table');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('807', 'add_new_table', 'Add Table');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('808', 'order_list', 'Order List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('809', 'currency', 'Currency');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('810', 'currency_list', 'Currency List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('811', 'currency_name', 'Currency Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('812', 'currency_add', 'Add Currency');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('813', 'currency_edit', 'Update Currency');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('814', 'currency_icon', 'Currency Icon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('815', 'currency_rate', 'Conversation Rate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('816', 'report', 'Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('817', 'purchase_report', 'Purchase Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('818', 'purchase_report_ingredient', 'Stock Report (Kitchen)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('819', 'stock_report', 'Stock Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('820', 'sell_report', 'Sell Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('821', 'stock_report_product_wise', 'Stock Report (Product Wise)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('822', 'accounts', 'Accounts');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('823', 'c_o_a', 'Chart of Account');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('824', 'debit_voucher', 'Debit Voucher');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('825', 'credit_voucher', 'Credit Voucher');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('826', 'contra_voucher', 'Contra Voucher');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('827', 'journal_voucher', 'Journal Voucher');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('828', 'voucher_approval', 'Voucher Approval');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('829', 'account_report', 'Account Repor');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('830', 'voucher_report', 'Voucher Report');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('831', 'cash_book', 'Cash Book');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('832', 'bank_book', 'Bank Book');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('833', 'general_ledger', 'General Ledger');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('834', 'trial_balance', 'Trial Balance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('835', 'profit_loss', 'Profit Loss');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('836', 'cash_flow', 'Cash Flow');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('837', 'coa_print', 'Coa Print');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('838', 'in_quantity', 'In Qnty');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('839', 'out_quantity', 'Out Qnty');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('840', 'stock', 'Stock');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('841', 'find', 'Find');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('842', 'from_date', 'From Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('843', 'to_date', 'To Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('844', 'approved', 'Approved');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('845', 'total_ammount', 'Total Amount');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('846', 'total_purchase', 'Total Purchase');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('847', 'total_sale', 'Total Sale');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('848', 'csv_file_informaion', 'CSV File Information');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('849', 'import_product_csv', 'Import product (CSV)');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('850', 'set_productionunit', 'Set Production Unit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('851', 'production_set_list', 'Production Set List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('852', 'production_add', 'Add Production');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('853', 'production_list', 'Production List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('854', 'billing_from', 'Billing From');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('855', 'invoice', 'Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('856', 'invoice_no', 'Invoice No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('857', 'billing_date', 'Billing Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('858', 'billing_to', 'Billing To');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('859', 'reservation', 'Reservation');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('860', 'take_reservation', 'Take A Reservation');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('861', 'update_table', 'Table Update');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('862', 'reserve_time', 'Reservation Table');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('863', 'reservation_table', 'Add Booking');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('864', 'table_setting', 'Table Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('865', 'capacity', 'Capacity');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('866', 'icon', 'Icon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('867', 'purchase_return', 'Purchase Return');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('868', 'purchase_qty', 'Purchase Qty');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('869', 'return_qty', 'Return Qty');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('870', 'total', 'Total');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('871', 'select', 'Select');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('872', 'return_invoice', 'Return Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('873', 'invoice_view', 'View Invoice');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('874', 'grand_total', 'Grand Total');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('875', 'supplier', 'Supplier');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('876', 'po_no', 'Invoice No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('877', 'grant', 'Grant');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('878', 'hrm', 'HRM');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('879', 'departmentfrm', 'Add Department');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('880', 'benefits', 'Benefits');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('881', 'class', 'Class');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('882', 'biographical_info', 'Biographical Info');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('883', 'additional_address', 'Additional Address');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('884', 'custom', 'Custom');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('885', 'pay_now', 'Pay Now ??');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('886', 'paymentmethod_setup', 'Payment Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('887', 'add_paymentsetup', 'Add New Payment Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('888', 'edit_setup', 'Update Setup');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('889', 'marchantid', 'Marchant ID');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('890', 'order_successfully', 'Your Payment was Completed!!!.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('891', 'order_fail', 'Payment Incomplete!!!');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('892', 'voucher_no', 'Voucher No');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('893', 'remark', 'Remark');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('894', 'code', 'Code');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('895', 'debit', 'Debit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('896', 'credit', 'Credit');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('897', 'template_name', 'Template Name ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('898', 'sms_template', 'SMS Template');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('899', 'sms_template_warning', 'please use \"{id}\" format without quotation to set dynamic value inside template');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('900', 'userid', 'UserId');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('901', 'from', 'From');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('902', 'opening_cash_and_equivalent', 'Opening Cash && Equivalent');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('903', 'amount_in_Dollar', 'Amount In Dollar');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('904', 'pre_balance', 'Pre Balance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('905', 'current_balance', 'Current Balance');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('906', 'with_details', 'With Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('907', 'credit_account_head', 'Credit Account Head');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('908', 'gl_head', 'GL Head');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('909', 'transaction_head', 'Transaction Head');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('910', 'confirm', 'Confirm');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('911', 's_rate', 'Rate');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('912', 'web_setting', 'Web Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('913', 'banner_setting', 'Banner Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('914', 'menu_setting', 'Menu Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('915', 'widget_setting', 'Widget Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('916', 'add_banner', 'Add Banner');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('917', 'bannertype', 'Add Banner Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('918', 'banner_list', 'Banner List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('919', 'title', 'Title');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('920', 'subtitle', 'Sub Title');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('921', 'banner_type', 'Banner Type');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('922', 'link_url', 'Link URL');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('923', 'banner_edit', 'Banner Update');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('924', 'menu_name', 'Menu Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('925', 'menu_url', 'Menu Slug');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('926', 'sub_menu', 'Sub Menu');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('927', 'add_menu', 'Add Menu');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('928', 'parent_menu', 'Parent Menu');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('929', 'widget_name', 'Widget Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('930', 'widget_title', 'Widget Title');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('931', 'widget_desc', 'Description');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('932', 'add_widget', 'Add New');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('933', 'common_setting', 'Common Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('934', 'bannersize', 'Banner Size');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('935', 'width', 'Width');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('936', 'height', 'Height');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('937', 'exclusive', 'Exclusive');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('938', 'best_Offers', 'BEST OFFERS');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('939', 'invalid_size', 'Invalid Size');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('940', 'confirm_reservation', 'Confirm Reservation');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('941', 'food_details', 'Food Details');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('942', 'email_setting', 'Email Setting');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('943', 'contact_email_list', 'Contact List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('944', 'subscribelist', 'Subscribe List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('945', 'contact_send', 'Your Contact Information Send Successfully.');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('946', 'couponlist', 'Coupon List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('947', 'add_coupon', 'Add Coupon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('948', 'coupon_Code', 'Coupon Code');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('949', 'coupon_rate', 'Coupon Value');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('950', 'coupon_startdate', 'Start Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('951', 'coupon_enddate', 'End Date');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('952', 'coupon_edit', 'Update Coupon');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('953', 'rating', 'Rating ');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('954', 'add_rating', 'Add Rating');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('955', 'reviewtxt', 'Review Text');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('956', 'rating_edit', 'Rating Update');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('957', 'customer_rating', 'Customer Rating');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('958', 'country_list', 'Country List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('959', 'countryname', 'Country Name');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('960', 'add_country', 'Add Country');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('961', 'edit_country', 'Update Country');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('962', 'add_state', 'Add State');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('963', 'edit_state', 'State Update');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('964', 'state', 'State');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('965', 'city', 'City');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('966', 'add_city', 'Add City');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('967', 'edit_city', 'City Update');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('968', 'country', 'Country');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('969', 'state_list', 'State List');
INSERT INTO `language` (`id`, `phrase`, `english`) VALUES ('970', 'city_list', 'All City');


#
# TABLE STRUCTURE FOR: leave_apply
#

DROP TABLE IF EXISTS `leave_apply`;

CREATE TABLE `leave_apply` (
  `leave_appl_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `leave_type_id` int(2) NOT NULL,
  `apply_strt_date` varchar(20) NOT NULL,
  `apply_end_date` varchar(20) NOT NULL,
  `apply_day` int(11) NOT NULL,
  `leave_aprv_strt_date` varchar(20) NOT NULL,
  `leave_aprv_end_date` varchar(20) NOT NULL,
  `num_aprv_day` varchar(15) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `apply_hard_copy` text,
  `apply_date` varchar(20) NOT NULL,
  `approve_date` varchar(20) NOT NULL,
  `approved_by` varchar(30) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  PRIMARY KEY (`leave_appl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `leave_apply` (`leave_appl_id`, `employee_id`, `leave_type_id`, `apply_strt_date`, `apply_end_date`, `apply_day`, `leave_aprv_strt_date`, `leave_aprv_end_date`, `num_aprv_day`, `reason`, `apply_hard_copy`, `apply_date`, `approve_date`, `approved_by`, `leave_type`) VALUES ('1', 'E1Q5NMGS', '2', '21-12-2018', '23-12-2018', '0', '23-12-2018', '24-12-2018', 'NaN', '', NULL, '2018-12-17', '2018-12-17', '0', '');


#
# TABLE STRUCTURE FOR: leave_type
#

DROP TABLE IF EXISTS `leave_type`;

CREATE TABLE `leave_type` (
  `leave_type_id` int(2) NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(50) NOT NULL,
  `leave_days` int(2) NOT NULL,
  PRIMARY KEY (`leave_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `leave_type` (`leave_type_id`, `leave_type`, `leave_days`) VALUES ('2', 'Earn Leave', '5');


#
# TABLE STRUCTURE FOR: loan_installment
#

DROP TABLE IF EXISTS `loan_installment`;

CREATE TABLE `loan_installment` (
  `loan_inst_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(21) CHARACTER SET latin1 NOT NULL,
  `loan_id` varchar(21) CHARACTER SET latin1 NOT NULL,
  `installment_amount` varchar(20) CHARACTER SET latin1 NOT NULL,
  `payment` varchar(20) CHARACTER SET latin1 NOT NULL,
  `date` varchar(20) CHARACTER SET latin1 NOT NULL,
  `received_by` varchar(20) CHARACTER SET latin1 NOT NULL,
  `installment_no` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '1',
  `notes` varchar(80) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`loan_inst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `loan_installment` (`loan_inst_id`, `employee_id`, `loan_id`, `installment_amount`, `payment`, `date`, `received_by`, `installment_no`, `notes`) VALUES ('1', 'EQLAJFUW', '2', '172', 'Card Payment', '2018-12-18', 'EQLAJFUW', '1', 'hyjg');


#
# TABLE STRUCTURE FOR: marital_info
#

DROP TABLE IF EXISTS `marital_info`;

CREATE TABLE `marital_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marital_sta` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `marital_info` (`id`, `marital_sta`) VALUES ('1', 'Single');
INSERT INTO `marital_info` (`id`, `marital_sta`) VALUES ('2', 'Married');
INSERT INTO `marital_info` (`id`, `marital_sta`) VALUES ('3', 'Divorced');
INSERT INTO `marital_info` (`id`, `marital_sta`) VALUES ('4', 'Widowed');
INSERT INTO `marital_info` (`id`, `marital_sta`) VALUES ('5', 'Other');


#
# TABLE STRUCTURE FOR: membership
#

DROP TABLE IF EXISTS `membership`;

CREATE TABLE `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membership_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `discount` float NOT NULL,
  `other_facilities` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `membership` (`id`, `membership_name`, `discount`, `other_facilities`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('1', 'Premium Member', '20', 'Get a souse', '2', '2018-11-07', '2', '2018-11-07');
INSERT INTO `membership` (`id`, `membership_name`, `discount`, `other_facilities`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('2', 'Silver Member', '18', '', '2', '2018-11-07', '2', '2018-11-07');
INSERT INTO `membership` (`id`, `membership_name`, `discount`, `other_facilities`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES ('3', 'Gold Member', '20', '', '2', '2018-11-07', '2', '2018-11-07');


#
# TABLE STRUCTURE FOR: menu_add_on
#

DROP TABLE IF EXISTS `menu_add_on`;

CREATE TABLE `menu_add_on` (
  `row_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `add_on_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `menu_add_on` (`row_id`, `menu_id`, `add_on_id`, `is_active`) VALUES ('1', '1', '1', '1');
INSERT INTO `menu_add_on` (`row_id`, `menu_id`, `add_on_id`, `is_active`) VALUES ('2', '1', '5', '1');
INSERT INTO `menu_add_on` (`row_id`, `menu_id`, `add_on_id`, `is_active`) VALUES ('7', '2', '1', '1');
INSERT INTO `menu_add_on` (`row_id`, `menu_id`, `add_on_id`, `is_active`) VALUES ('8', '5', '4', '1');
INSERT INTO `menu_add_on` (`row_id`, `menu_id`, `add_on_id`, `is_active`) VALUES ('9', '6', '4', '1');


#
# TABLE STRUCTURE FOR: message
#

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `sender_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unseen, 1=seen, 2=delete',
  `receiver_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unseen, 1=seen, 2=delete',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `subject`, `message`, `datetime`, `sender_status`, `receiver_status`) VALUES ('1', '2', '1', 'TEST', 'All the best', '2017-02-07 00:00:00', '0', '2');
INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `subject`, `message`, `datetime`, `sender_status`, `receiver_status`) VALUES ('3', '26', '3', 'TEST', 'Hello world!', '2017-02-07 00:00:00', '0', '1');
INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `subject`, `message`, `datetime`, `sender_status`, `receiver_status`) VALUES ('10', '2', '17', 'TEST', 'The quick brown fox jumps over the lazy dog!', '2017-02-07 11:34:41', '0', '0');
INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `subject`, `message`, `datetime`, `sender_status`, `receiver_status`) VALUES ('11', '2', '6', 'ateat', '<p>TEST</p>', '2017-05-11 10:00:07', '1', '0');


#
# TABLE STRUCTURE FOR: module
#

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `directory` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: module_permission
#

DROP TABLE IF EXISTS `module_permission`;

CREATE TABLE `module_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_module_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_module_id` (`fk_module_id`),
  KEY `fk_user_id` (`fk_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: order_menu
#

DROP TABLE IF EXISTS `order_menu`;

CREATE TABLE `order_menu` (
  `row_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menuqty` float NOT NULL,
  `add_on_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addonsqty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `varientid` int(11) NOT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('1', '1', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('2', '1', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('3', '1', '1', '1', '1', '1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('4', '2', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('5', '2', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('6', '3', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('7', '3', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('8', '4', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('9', '4', '1', '1', '1', '1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('10', '5', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('11', '5', '3', '3', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('12', '6', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('13', '6', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('14', '7', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('15', '7', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('16', '8', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('17', '9', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('18', '10', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('19', '11', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('20', '12', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('21', '13', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('22', '13', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('23', '14', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('24', '14', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('25', '15', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('26', '16', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('27', '17', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('28', '18', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('29', '19', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('30', '20', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('31', '21', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('32', '22', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('33', '23', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('34', '24', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('35', '25', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('36', '26', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('37', '27', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('38', '28', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('39', '29', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('40', '29', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('41', '30', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('42', '31', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('43', '32', '1', '1', '1,5', '1,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('44', '32', '5', '1', '4', '1', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('45', '33', '2', '1', '1', '1', '3');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('46', '34', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('47', '35', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('48', '36', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('49', '37', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('50', '38', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('51', '39', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('52', '40', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('53', '41', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('54', '42', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('55', '43', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('56', '44', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('57', '45', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('58', '46', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('59', '47', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('60', '48', '5', '1', '4', '1', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('61', '49', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('62', '50', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('63', '51', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('64', '52', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('65', '53', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('66', '54', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('67', '55', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('68', '56', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('69', '57', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('70', '58', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('71', '59', '1', '4', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('72', '60', '5', '1', '4', '1', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('73', '60', '3', '1', '', '', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('74', '60', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('75', '61', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('76', '62', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('77', '63', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('78', '63', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('79', '64', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('80', '65', '5', '1', '4', '1', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('81', '65', '3', '1', '', '', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('82', '66', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('83', '67', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('84', '68', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('85', '69', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('86', '70', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('87', '71', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('88', '72', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('89', '73', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('90', '74', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('91', '75', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('92', '76', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('93', '77', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('94', '78', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('95', '79', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('96', '80', '1', '1', '1', '1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('97', '80', '3', '1', '', '', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('98', '80', '5', '1', '4', '1', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('99', '81', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('100', '82', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('101', '83', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('102', '84', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('103', '85', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('104', '85', '1', '1', '1', '1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('105', '86', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('106', '86', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('107', '86', '1', '1', '1,5', '1,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('108', '89', '1', '2', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('109', '89', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('110', '89', '2', '2', '1', '1', '3');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('111', '90', '1', '2', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('112', '90', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('113', '90', '2', '2', '1', '1', '3');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('114', '91', '1', '2', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('115', '91', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('116', '91', '2', '2', '1', '1', '3');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('120', '93', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('121', '93', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('122', '93', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('123', '94', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('124', '94', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('125', '94', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('126', '95', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('127', '95', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('128', '95', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('129', '96', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('130', '96', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('131', '96', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('132', '97', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('133', '97', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('134', '97', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('135', '98', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('136', '98', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('137', '98', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('138', '99', '1', '2', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('139', '99', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('140', '99', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('141', '100', '1', '2', '1,5', '1,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('142', '100', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('143', '100', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('144', '100', '5', '2', '4', '1', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('145', '101', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('146', '102', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('147', '103', '1', '2', '1', '1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('148', '103', '1', '1', '1', '3', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('149', '104', '1', '3', '1', '1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('150', '105', '1', '3', '1', '1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('151', '106', '1', '3', '1', '1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('152', '107', '2', '3', '1', '1', '3');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('153', '108', '1', '3', '1', '1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('154', '109', '1', '3', '1,5', '1,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('155', '110', '2', '4', '1', '1', '3');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('156', '111', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('157', '112', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('158', '113', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('159', '114', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('160', '114', '5', '2', '4', '1', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('161', '115', '1', '1', '1,5', '1,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('162', '115', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('163', '116', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('164', '116', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('165', '117', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('166', '117', '1', '3', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('167', '117', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('168', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('169', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('170', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('171', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('172', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('173', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('174', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('175', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('176', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('177', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('178', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('179', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('180', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('181', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('182', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('183', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('184', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('185', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('186', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('187', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('188', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('189', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('190', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('191', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('192', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('193', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('194', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('195', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('196', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('197', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('198', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('199', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('200', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('201', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('202', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('203', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('204', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('205', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('206', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('207', '131', '5', '1', '4', '1', '6');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('208', '131', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('209', '1', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('210', '1', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('211', '1', '3', '1', '', '', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('215', '134', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('224', '133', '1', '3', '1,5', '2,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('225', '133', '1', '3', '1,5', '2,1', '2');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('226', '135', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('227', '136', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('228', '137', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('229', '138', '1', '3', '1,5', '1,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('230', '139', '1', '2', '1,5', '1,1', '1');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('231', '139', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('232', '140', '3', '1', '', '', '4');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('233', '140', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('234', '141', '4', '1', '', '', '5');
INSERT INTO `order_menu` (`row_id`, `order_id`, `menu_id`, `menuqty`, `add_on_id`, `addonsqty`, `varientid`) VALUES ('235', '141', '3', '1', '', '', '4');


#
# TABLE STRUCTURE FOR: pay_frequency
#

DROP TABLE IF EXISTS `pay_frequency`;

CREATE TABLE `pay_frequency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frequency_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `pay_frequency` (`id`, `frequency_name`) VALUES ('1', 'Weekly');
INSERT INTO `pay_frequency` (`id`, `frequency_name`) VALUES ('2', 'Biweekly');
INSERT INTO `pay_frequency` (`id`, `frequency_name`) VALUES ('3', 'Annual');


#
# TABLE STRUCTURE FOR: payment_method
#

DROP TABLE IF EXISTS `payment_method`;

CREATE TABLE `payment_method` (
  `payment_method_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `payment_method` (`payment_method_id`, `payment_method`, `is_active`) VALUES ('1', 'Card Payment', '1');
INSERT INTO `payment_method` (`payment_method_id`, `payment_method`, `is_active`) VALUES ('2', 'Two Checkout', '1');
INSERT INTO `payment_method` (`payment_method_id`, `payment_method`, `is_active`) VALUES ('3', 'Paypal', '1');
INSERT INTO `payment_method` (`payment_method_id`, `payment_method`, `is_active`) VALUES ('4', 'Cash Payment', '1');
INSERT INTO `payment_method` (`payment_method_id`, `payment_method`, `is_active`) VALUES ('5', 'SSLCommerz', '1');


#
# TABLE STRUCTURE FOR: paymentsetup
#

DROP TABLE IF EXISTS `paymentsetup`;

CREATE TABLE `paymentsetup` (
  `setupid` int(11) NOT NULL AUTO_INCREMENT,
  `paymentid` int(11) NOT NULL,
  `marchantid` varchar(255) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `Islive` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`setupid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `paymentsetup` (`setupid`, `paymentid`, `marchantid`, `password`, `email`, `currency`, `Islive`, `status`) VALUES ('1', '5', 'bdtas5c1b42e834881', '', 'ainalcse@gmail.com', 'BDT', '0', '1');
INSERT INTO `paymentsetup` (`setupid`, `paymentid`, `marchantid`, `password`, `email`, `currency`, `Islive`, `status`) VALUES ('2', '3', '', '', 'tareq7500personal2@gmail.com', 'USD', '0', '1');
INSERT INTO `paymentsetup` (`setupid`, `paymentid`, `marchantid`, `password`, `email`, `currency`, `Islive`, `status`) VALUES ('3', '2', '901400787', '', 'ainalcse@gmail.com', 'USD', '0', '1');


#
# TABLE STRUCTURE FOR: payroll_holiday
#

DROP TABLE IF EXISTS `payroll_holiday`;

CREATE TABLE `payroll_holiday` (
  `payrl_holi_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `holiday_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `no_of_days` varchar(30) CHARACTER SET latin1 NOT NULL,
  `created_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `updated_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`payrl_holi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `payroll_holiday` (`payrl_holi_id`, `holiday_name`, `start_date`, `end_date`, `no_of_days`, `created_by`, `updated_by`) VALUES ('1', 'Eid Ul Azha', '2019-06-20', '2019-06-27', '8', '', '');


#
# TABLE STRUCTURE FOR: payroll_tax_setup
#

DROP TABLE IF EXISTS `payroll_tax_setup`;

CREATE TABLE `payroll_tax_setup` (
  `tax_setup_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `start_amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `end_amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `rate` varchar(30) CHARACTER SET latin1 NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`tax_setup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: position
#

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `pos_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `position_details` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `position` (`pos_id`, `position_name`, `position_details`) VALUES ('1', 'chef', 'Responsible for the pastry shop in a foodservice establishment. Ensures that the products produced in the pastry shop meet the quality standards in conjunction with the executive chef.');
INSERT INTO `position` (`pos_id`, `position_name`, `position_details`) VALUES ('2', 'HRM', 'Recruits and hires qualified employees, creates in-house job-training programs, and assists employees with their career needs.');
INSERT INTO `position` (`pos_id`, `position_name`, `position_details`) VALUES ('3', 'Kitchen manager', 'Supervises and coordinates activities concerning all back-of-the-house operations and personnel, including food preparation, kitchen and storeroom areas.');
INSERT INTO `position` (`pos_id`, `position_name`, `position_details`) VALUES ('4', 'Counter server', 'Responsible for providing quick and efficient service to customers. Greets customers, takes their food and beverage orders, rings orders into register, and prepares and serves hot and cold drinks.');
INSERT INTO `position` (`pos_id`, `position_name`, `position_details`) VALUES ('6', 'Waiter', 'Most waiters and waitresses, also called servers, work in full-service restaurants. They greet customers, take food orders, bring food and drinks to the tables and take payment and make change.');
INSERT INTO `position` (`pos_id`, `position_name`, `position_details`) VALUES ('7', 'Accounts', 'Play a key role in every restaurant. ');


#
# TABLE STRUCTURE FOR: product_tbl
#

DROP TABLE IF EXISTS `product_tbl`;

CREATE TABLE `product_tbl` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_prod_category_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pos_item_weight` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_short_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rec_retail_price` float DEFAULT NULL,
  `unit_per_case` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `case_discount` float DEFAULT NULL,
  `fk_company_id` int(11) DEFAULT NULL,
  `fk_client_id` int(11) DEFAULT NULL,
  `comparison_product` text COLLATE utf8_unicode_ci,
  `create_date` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `p_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=product,2=pos_item',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('1', '1', 'MUM Drinking Water', NULL, 'test', 'companies', './assets/img/product/551.jpg', '1200', '12', '20', '100', '0', '1', 'Super Fresh Drinking Water,Pran Drinking Water,Aquafina Bangladesh,Jibon Drinking Water', '2018-07-16', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('2', '2', 'Dove Shampoo', NULL, 'test', 'companies ', './assets/img/product/7621.jpg', '1200', '6', '150', '100', '0', '1', 'Sunsilk Shampoo,Clear Shampoo,Max Shampoo,Head and Sholder Shampoo', '2018-07-16', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('3', '3', 'Pran Juc', NULL, 'test', 'companies ', './assets/img/product/offer_7500_50955146', '1200', '12', '150', '100', '0', '1', 'Manguli Juc,Footo Juc,Shajan Juc', '2018-07-16', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('4', '4', 'Farmpride Orange 500ml', NULL, 'Farmpride 500ml', 'FMP500ml', '', '175', '12', '175', '0', NULL, '4', 'Ribena 500ml', '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('5', '4', 'Farmpride Orange 1lt', NULL, 'Farmpride Orange', 'FMP1lt', '', '267', '9', '267', '0', NULL, '4', 'Ribena 1lt', '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('6', '4', 'Farmpride Guava 1lt', NULL, 'Farmpride Guava 1lt', 'FMP1lt', '', '267', '9', '267', '0', NULL, '4', 'Ribena 1lt', '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('7', '4', 'Farmpride Mango 500ml', NULL, 'Farmpride Mango', 'FMPM500ml', '', '175', '12', '175', '0', NULL, '4', 'Ribena 500ml', '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('8', '4', 'Farmpride Mango 1lt', NULL, 'Farmpride Tropical', 'FMPT1lt', '', '267', '9', '267', '0', NULL, '4', 'Ribena 1lt', '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('9', '4', 'Farmpride Tropical 500ml', NULL, 'Farmpride Tropical', 'FMPT500ml', '', '175', '12', '175', '0', NULL, '4', 'Ribena 500ml', '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('10', '6', 'Lucozade Boost 500ml PET x 12', NULL, 'Lucozade Boost 500ml PET x 12', 'LucozadeB', NULL, '218.75', '12', '218.75', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('11', '6', 'Lucozade Boost 500ml PET NCP', NULL, 'Lucozade Boost 500ml PET NCP', 'LucozadeB', NULL, '218.75', '12', '218.75', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('12', '6', 'Lucozade Boost 250ml Tetra x 12', NULL, 'Lucozade Boost 250ml Tetra x 12', 'LucozadeB', NULL, '137.5', '12', '137.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('13', '6', 'Lucozade Boost 250ml Tetra x 24', NULL, 'Lucozade Boost 250ml Tetra x 24', 'LucozadeB', NULL, '137.333', '24', '137.333', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('14', '6', 'Lucozade Sparkling 1Ltr x 6', NULL, 'Lucozade Sparkling 1Ltr x 6', 'LucozadeB', NULL, '632.5', '6', '632.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('15', '6', 'Lucozade Sparkling 1Ltr x 12', NULL, 'Lucozade Sparkling 1Ltr x 12', 'LucozadeB', NULL, '632.083', '12', '632.083', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('16', '6', 'Lucozade Energy Original 380ml PET  x12', NULL, 'Lucozade Energy Original 380ml PET  x12', 'LucozadeB', NULL, '252.083', '12', '252.083', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('17', '6', 'Ribena BC 125ml Tetra x 16', NULL, 'Ribena BC 125ml Tetra x 16', 'LucozadeB', NULL, '54.375', '16', '54.375', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('18', '6', 'Ribena BC 125ml Tetra x 16 NCP', NULL, 'Ribena BC 125ml Tetra x 16 NCP', 'LucozadeB', NULL, '54.375', '16', '54.375', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('19', '6', 'Ribena BC 125ml Tetra x 32', NULL, 'Ribena BC 125ml Tetra x 32', 'LucozadeB', NULL, '54.2188', '32', '54.2188', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('20', '6', 'Lucozade 1Lx 10', NULL, 'Lucozade 1Lx 10', 'LucozadeB', NULL, '463', '10', '463', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('21', '6', 'Ribena BC 250ml Tetra x 12', NULL, 'Ribena BC 250ml Tetra x 12', 'LucozadeB', NULL, '137.5', '12', '137.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('22', '6', 'Ribena BC 250ml Tetra x 24', NULL, 'Ribena BC 250ml Tetra x 24', 'LucozadeB', NULL, '137.5', '24', '137.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('23', '6', 'Lucozade Boost 125ml Tetra x 16', NULL, 'Lucozade Boost 125ml Tetra x 16', 'LucozadeB', NULL, '54.375', '16', '54.375', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('24', '6', 'Lucozade Boost 125ml Tetra x 16 NCP', NULL, 'Lucozade Boost 125ml Tetra x 16 NCP', 'LucozadeB', NULL, '54.375', '16', '54.375', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('25', '6', 'Lucozade Boost 125ml Tetra x 32', NULL, 'Lucozade Boost 125ml Tetra x 32', 'LucozadeB', NULL, '54.2188', '32', '54.2188', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('26', '6', 'Lucozade Boost 330ml Can x 24', NULL, 'Lucozade Boost 330ml Can x 24', 'LucozadeB', NULL, '177.292', '24', '177.292', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('27', '6', 'Lucozade Boost 330ml PET x 12', NULL, 'Lucozade Boost 330ml PET x 12', 'LucozadeB', NULL, '134.167', '12', '134.167', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('28', '6', 'Lucozade Sport Orange 500ml PET x 12', NULL, 'Lucozade Sport Orange 500ml PET x 12', 'LucozadeS', NULL, '218.75', '12', '218.75', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('29', '6', 'Lucozade Sport Orange NCP', NULL, 'Lucozade Sport Orange NCP', 'LucozadeS', NULL, '218.75', '12', '218.75', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('30', '6', 'Ribena BC Concentrate 1LT PET x 6', NULL, 'Ribena BC Concentrate 1LT PET x 6', 'Ribena', NULL, '1032.5', '6', '1032.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('31', '6', 'Ribena BC Concentrate 1LT PET x 12', NULL, 'Ribena BC Concentrate 1LT PET x 12', 'Ribena', NULL, '1032.08', '12', '1032.08', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('32', '6', 'Ribena 1L x 10', NULL, 'Ribena 1L x 10', 'Ribena', NULL, '463', '10', '463', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('33', '6', 'Ribena BC 500ml PET x 12', NULL, 'Ribena BC 500ml PET x 12', 'Ribena', NULL, '218.75', '12', '218.75', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('34', '6', 'Ribena BC Sparkling 330ml Can x 24', NULL, 'Ribena BC Sparkling 330ml Can x 24', 'Ribena', NULL, '177.292', '24', '177.292', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('35', '6', 'Ribena Straw&BC 250ml Tetra x 12', NULL, 'Ribena Straw&BC 250ml Tetra x 12', 'Ribena', NULL, '137.5', '12', '137.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('36', '6', 'Ribena Straw&BC 250ml Tetra x 24', NULL, 'Ribena Straw&BC 250ml Tetra x 24', 'Ribena', NULL, '137.5', '24', '137.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('37', '6', 'Ribena Straw & BC 125ml Tetra x 16', NULL, 'Ribena Straw & BC 125ml Tetra x 16', 'Ribena', NULL, '54.375', '16', '54.375', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('38', '6', 'Ribena Straw & BC 125ml Tetra x 16 NCP', NULL, 'Ribena Straw & BC 125ml Tetra x 16 NCP', 'Ribena', NULL, '54.375', '16', '54.375', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('39', '6', 'Ribena BC&Straw 125ml Tetra x 32', NULL, 'Ribena BC&Straw 125ml Tetra x 32', 'Ribena', NULL, '54.2188', '32', '54.2188', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('40', '6', 'Lucozade Hydro Pure 150cl X 6', NULL, 'Lucozade Hydro Pure 150cl X 6', 'LucozadeH', NULL, '77.5', '6', '77.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('41', '6', 'Lucozade Hydro Pure 600ml PET x 20', NULL, 'Lucozade Hydro Pure 600ml PET x 20', 'LucozadeH', NULL, '50.5', '20', '50.5', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('42', '6', 'Lucozade Hydro Pure 600ml PET x 12', NULL, 'Lucozade Hydro Pure 600ml PET x 12', 'LucozadeH', NULL, '50.4167', '12', '50.4167', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('43', '6', 'Lucozade Boost Sachet 22g', NULL, 'Lucozade Boost Sachet 22g', 'LucozadeB', NULL, '181.136', '22', '181.136', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('44', '5', 'CLOSE UP DEEP ACTION', NULL, 'CLOSE UP DEEP ACTION', 'CloseupDA', NULL, '153.333', '120', '153.333', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('45', '5', 'CLOSE UP DEEP CLEAN', NULL, 'CLOSE UP DEEP CLEAN', 'CloseupDC', NULL, '231.25', '48', '231.25', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('46', '5', 'CLOSE UP SHINY WHITE', NULL, 'CLOSE UP SHINY WHITE', 'CloseupSW', NULL, '310.417', '48', '310.417', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('47', '7', 'Drugfield MR', NULL, 'Drugfield MR', 'DrugfieldM', NULL, '130', '400', '130', '0', NULL, '4', NULL, '2018-09-14', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('51', '0', 'Pelmet', '1.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-24', '0', '2');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('52', '0', 'Nestle House', '1.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-24', '0', '2');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('53', '0', 'Brand Hanger', '1.3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-24', '0', '2');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('55', '0', 'Maggi Stick Out', '1.8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-24', '0', '2');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('56', '0', 'Maggi Apron', '0.3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-24', '0', '2');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('57', '0', 'Maggi Tray', '0.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-24', '0', '2');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('58', '0', 'Nestle Own the Door Hanger', '1.8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-24', '0', '2');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('59', '5', 'Test Product', NULL, 'tesdf', '234', NULL, '343', '343', '23', '2', NULL, '6', '', '2018-09-26', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('60', '8', 'Garri 1kg x 10 ', NULL, 'Garri', 'GAR', NULL, '2100', '1', '2100', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('61', '8', 'Garri 5kg x 1.  ', NULL, 'GARRI', 'GAR', NULL, '1000', '1', '1000', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('62', '9', 'Sugar 250g x 20 ', NULL, 'SUGAR', 'SUG', NULL, '1550', '1', '1550', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('63', '9', 'Sugar 500g x 20 ', NULL, 'SUGAR', 'SUG', NULL, '2950', '1', '2950', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('64', '9', 'Cube 500g x 32 ', NULL, 'CUBE', 'SUG', NULL, '7400', '1', '7400', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('65', '10', 'Goldenvita 1kg x 10 ', NULL, 'GOLDENVITA', 'GOL', NULL, '2400', '1', '2400', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('66', '10', 'Goldenvita 2kg x 5.  ', NULL, 'GOLDENVITA', 'GOL', NULL, '2350', '1', '2350', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('67', '10', 'Goldenvita 5kg x 1.  ', NULL, 'GOLDENVITA', 'GOL', NULL, '1150', '1', '1150', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('68', '10', 'Goldenvita 10kg x 1 ', NULL, 'GOLDENVITA', 'GOL', NULL, '2200', '1', '2200', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('69', '11', 'Noodles 70g ', NULL, 'NODDLES', 'NOD', NULL, '1370', '1', '1370', '0', NULL, '8', '', '2018-10-04', '0', '1');
INSERT INTO `product_tbl` (`product_id`, `fk_prod_category_id`, `product_name`, `pos_item_weight`, `product_description`, `product_short_code`, `product_image`, `rec_retail_price`, `unit_per_case`, `unit_price`, `case_discount`, `fk_company_id`, `fk_client_id`, `comparison_product`, `create_date`, `create_by`, `p_type`) VALUES ('70', '11', 'Noodles 100g ', NULL, 'NODDLES', 'NOD', NULL, '2050', '1', '2050', '0', NULL, '8', '', '2018-10-04', '0', '1');


#
# TABLE STRUCTURE FOR: production
#

DROP TABLE IF EXISTS `production`;

CREATE TABLE `production` (
  `productionid` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `itemquantity` int(11) NOT NULL,
  `savedby` int(11) NOT NULL,
  `saveddate` date NOT NULL,
  `productionexpiredate` date NOT NULL,
  PRIMARY KEY (`productionid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `production` (`productionid`, `itemid`, `itemquantity`, `savedby`, `saveddate`, `productionexpiredate`) VALUES ('1', '1', '2', '2', '2018-12-01', '2018-12-24');


#
# TABLE STRUCTURE FOR: production_details
#

DROP TABLE IF EXISTS `production_details`;

CREATE TABLE `production_details` (
  `pro_detailsid` int(11) NOT NULL AUTO_INCREMENT,
  `foodid` int(11) NOT NULL,
  `ingredientid` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `unitname` varchar(100) NOT NULL,
  `createdby` int(11) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`pro_detailsid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('1', '4', '19', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('2', '4', '21', '0.30', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('3', '4', '15', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('4', '4', '11', '0.10', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('5', '4', '20', '0.30', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('6', '4', '18', '150.00', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('7', '4', '17', '0.30', '', '2', '0000-00-00');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('8', '4', '3', '0.20', '', '2', '0000-00-00');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('9', '4', '16', '0.40', '', '2', '0000-00-00');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('10', '4', '13', '0.30', '', '2', '0000-00-00');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('11', '1', '12', '1.00', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('12', '1', '5', '0.10', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('13', '1', '9', '0.10', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('14', '1', '13', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('15', '1', '14', '0.10', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('16', '2', '12', '1.00', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('17', '2', '9', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('18', '2', '14', '0.10', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('19', '2', '13', '0.15', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('20', '2', '10', '0.10', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('21', '3', '17', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('22', '3', '19', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('23', '3', '15', '0.30', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('24', '3', '14', '0.15', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('25', '3', '20', '0.30', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('26', '3', '11', '0.10', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('27', '3', '16', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('28', '3', '18', '100.00', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('29', '3', '21', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('30', '5', '15', '0.25', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('31', '5', '2', '0.10', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('32', '6', '15', '0.30', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('33', '6', '9', '0.20', '', '2', '2018-12-01');
INSERT INTO `production_details` (`pro_detailsid`, `foodid`, `ingredientid`, `qty`, `unitname`, `createdby`, `created_date`) VALUES ('34', '6', '11', '0.10', '', '2', '0000-00-00');


#
# TABLE STRUCTURE FOR: purchase_details
#

DROP TABLE IF EXISTS `purchase_details`;

CREATE TABLE `purchase_details` (
  `detailsid` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseid` int(11) NOT NULL,
  `indredientid` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL DEFAULT '0.00',
  `unitname` varchar(80) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `purchaseby` int(11) NOT NULL,
  `purchasedate` date NOT NULL,
  `purchaseexpiredate` date NOT NULL,
  PRIMARY KEY (`detailsid`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('1', '1', '2', '2.00', '', '105.00', '210.00', '2', '2018-11-11', '0000-00-00');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('2', '1', '3', '3.00', '', '35.00', '105.00', '2', '2018-11-11', '0000-00-00');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('9', '1', '4', '1.00', '', '120.00', '120.00', '2', '2018-11-11', '0000-00-00');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('10', '2', '11', '4.00', '', '40.00', '160.00', '2', '2018-11-13', '0000-00-00');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('11', '2', '8', '10.00', '', '8.00', '80.00', '2', '2018-11-13', '0000-00-00');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('12', '2', '12', '16.00', '', '15.00', '240.00', '2', '2018-11-13', '0000-00-00');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('13', '2', '14', '5.00', '', '75.00', '375.00', '2', '2018-11-13', '0000-00-00');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('14', '2', '10', '8.00', '', '100.00', '800.00', '2', '2018-11-13', '0000-00-00');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('15', '3', '13', '4.00', '', '120.00', '480.00', '2', '2018-11-13', '1970-01-13');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('16', '3', '9', '5.00', '', '400.00', '2000.00', '2', '2018-11-13', '1970-01-13');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('17', '4', '15', '10.00', '', '32.00', '320.00', '2', '2018-11-25', '2018-01-25');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('18', '4', '9', '3.00', '', '450.00', '1350.00', '2', '2018-11-25', '2018-01-25');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('25', '6', '7', '5.00', '', '70.00', '350.00', '2', '2018-12-01', '2019-01-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('26', '6', '2', '2.00', '', '110.00', '220.00', '2', '2018-12-01', '2019-01-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('27', '7', '22', '10.00', '', '55.00', '550.00', '2', '2018-12-01', '2019-03-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('28', '7', '23', '4.00', '', '60.00', '240.00', '2', '2018-12-01', '2019-03-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('29', '7', '24', '2.00', '', '50.00', '100.00', '2', '2018-12-01', '2019-03-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('30', '7', '25', '2.00', '', '220.00', '440.00', '2', '2018-12-01', '2019-03-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('31', '7', '26', '2.00', '', '55.00', '110.00', '2', '2018-12-01', '2019-03-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('32', '7', '27', '40.00', '', '65.00', '2600.00', '2', '2018-12-01', '2019-03-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('33', '8', '5', '4.00', '', '470.00', '1880.00', '2', '2018-12-01', '2018-12-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('34', '9', '7', '1.00', '', '60.00', '60.00', '2', '2018-12-11', '2019-02-28');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('35', '9', '8', '4.00', '', '8.00', '32.00', '2', '2018-12-11', '2019-02-28');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('36', '9', '27', '20.00', '', '60.00', '1200.00', '2', '2018-12-11', '2019-02-28');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('41', '11', '2', '2.00', '', '105.00', '210.00', '2', '2018-12-12', '2019-01-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('42', '11', '8', '5.00', '', '8.00', '40.00', '2', '2018-12-12', '2019-01-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('43', '11', '14', '2.00', '', '70.00', '140.00', '2', '2018-12-12', '2019-01-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('44', '11', '15', '2.00', '', '35.00', '70.00', '2', '2018-12-12', '2019-01-31');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('45', '12', '5', '6.00', '', '450.00', '2700.00', '2', '2019-01-08', '1970-01-01');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('46', '12', '12', '5.00', '', '10.00', '50.00', '2', '2019-01-08', '1970-01-01');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('47', '12', '7', '5.00', '', '55.00', '275.00', '2', '2019-01-08', '1970-01-01');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('48', '12', '14', '5.00', '', '35.00', '175.00', '2', '2019-01-08', '1970-01-01');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('49', '13', '3', '6.00', '', '32.00', '192.00', '2', '2019-01-08', '2019-01-08');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('50', '13', '15', '2.00', '', '28.00', '56.00', '2', '2019-01-08', '2019-01-08');
INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES ('51', '13', '20', '8.00', '', '100.00', '800.00', '2', '2019-01-08', '2019-01-08');


#
# TABLE STRUCTURE FOR: purchase_return
#

DROP TABLE IF EXISTS `purchase_return`;

CREATE TABLE `purchase_return` (
  `preturn_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `po_no` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `return_date` date NOT NULL,
  `totalamount` float NOT NULL,
  `totaldiscount` float NOT NULL,
  `return_reason` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `updatedate` datetime NOT NULL,
  PRIMARY KEY (`preturn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `purchase_return` (`preturn_id`, `supplier_id`, `po_no`, `return_date`, `totalamount`, `totaldiscount`, `return_reason`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES ('1', '5', '0016', '2018-12-12', '121', '0', 'ddd', '2', '2018-12-12 07:38:04', '0', '0000-00-00 00:00:00');
INSERT INTO `purchase_return` (`preturn_id`, `supplier_id`, `po_no`, `return_date`, `totalamount`, `totaldiscount`, `return_reason`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES ('2', '5', '0016', '2018-12-12', '43', '0', 'sd', '2', '2018-12-12 07:52:48', '0', '0000-00-00 00:00:00');
INSERT INTO `purchase_return` (`preturn_id`, `supplier_id`, `po_no`, `return_date`, `totalamount`, `totaldiscount`, `return_reason`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES ('3', '5', '0016', '2018-12-12', '78', '0', '', '2', '2018-12-12 07:56:55', '0', '0000-00-00 00:00:00');
INSERT INTO `purchase_return` (`preturn_id`, `supplier_id`, `po_no`, `return_date`, `totalamount`, `totaldiscount`, `return_reason`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES ('4', '5', '0016', '2018-12-12', '8', '0', 'df', '2', '2018-12-12 08:02:37', '0', '0000-00-00 00:00:00');
INSERT INTO `purchase_return` (`preturn_id`, `supplier_id`, `po_no`, `return_date`, `totalamount`, `totaldiscount`, `return_reason`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES ('5', '5', '0016', '2018-12-12', '35', '0', 'fsdfsf', '2', '2018-12-12 08:04:21', '0', '0000-00-00 00:00:00');
INSERT INTO `purchase_return` (`preturn_id`, `supplier_id`, `po_no`, `return_date`, `totalamount`, `totaldiscount`, `return_reason`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES ('6', '1', '0012', '2019-01-05', '470', '0', '', '2', '2019-01-05 14:05:56', '0', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: purchase_return_details
#

DROP TABLE IF EXISTS `purchase_return_details`;

CREATE TABLE `purchase_return_details` (
  `preturn_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_rate` float NOT NULL,
  `store_id` int(11) NOT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('1', '8', '2', '8', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('1', '14', '1', '70', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('1', '15', '1', '35', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('2', '8', '1', '8', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('2', '15', '1', '35', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('3', '8', '1', '8', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('3', '14', '1', '70', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('4', '8', '1', '8', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('5', '15', '1', '35', '0', NULL);
INSERT INTO `purchase_return_details` (`preturn_id`, `product_id`, `qty`, `product_rate`, `store_id`, `discount`) VALUES ('6', '5', '1', '470', '0', NULL);


#
# TABLE STRUCTURE FOR: purchaseitem
#

DROP TABLE IF EXISTS `purchaseitem`;

CREATE TABLE `purchaseitem` (
  `purID` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(50) DEFAULT NULL,
  `suplierID` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `details` text,
  `purchasedate` date NOT NULL,
  `purchaseexpiredate` date NOT NULL,
  `savedby` int(11) NOT NULL,
  PRIMARY KEY (`purID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('1', '0001', '1', '435.00', '', '2018-11-11', '2018-01-13', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('2', '0003', '2', '1801.00', '', '2018-11-13', '2018-01-13', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('3', '0004', '1', '2480.00', '', '2018-11-13', '2018-01-13', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('4', '0005', '1', '1670.00', '', '2018-11-25', '2018-01-25', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('6', '0008', '2', '570.00', 'dfd', '2018-12-01', '2019-01-31', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('7', '0009', '1', '4040.00', '', '2018-12-01', '2019-03-31', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('8', '0012', '1', '1880.00', '', '2018-12-01', '2018-12-31', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('9', '0015', '2', '1292.00', 'fg', '2018-12-11', '2019-02-28', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('11', '0016', '5', '460.00', '', '2018-12-12', '2019-01-31', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('12', '04536', '1', '3200.00', 'test', '2019-01-08', '2019-01-08', '2');
INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `total_price`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES ('13', '543212', '2', '1048.00', 'test', '2019-01-08', '2019-01-08', '2');


#
# TABLE STRUCTURE FOR: rate_type
#

DROP TABLE IF EXISTS `rate_type`;

CREATE TABLE `rate_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `rate_type` (`id`, `r_type_name`) VALUES ('1', 'Hourly');
INSERT INTO `rate_type` (`id`, `r_type_name`) VALUES ('2', 'Salary');


#
# TABLE STRUCTURE FOR: rest_table
#

DROP TABLE IF EXISTS `rest_table`;

CREATE TABLE `rest_table` (
  `tableid` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(50) NOT NULL,
  `person_capicity` int(11) NOT NULL,
  `table_icon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=booked,0=free',
  PRIMARY KEY (`tableid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('1', '1', '2', 'assets/img/icons/resttable/1.png', '1');
INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('2', '2', '4', 'assets/img/icons/resttable/4.png', '1');
INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('3', '3', '2', 'assets/img/icons/resttable/2.png', '1');
INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('4', '4', '5', 'assets/img/icons/resttable/table11.png', '0');
INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('5', '5', '6', 'assets/img/icons/resttable/table7.png', '0');
INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('6', '6', '3', 'assets/img/icons/resttable/3.png', '0');
INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('7', '7', '8', 'assets/img/icons/resttable/8.png', '0');
INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('8', '8', '4', 'assets/img/icons/resttable/4.png', '0');
INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES ('9', '9', '3', 'assets/img/icons/resttable/3.png', '0');


#
# TABLE STRUCTURE FOR: role_permission
#

DROP TABLE IF EXISTS `role_permission`;

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_module_id` (`fk_module_id`),
  KEY `fk_user_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: salary_setup_header
#

DROP TABLE IF EXISTS `salary_setup_header`;

CREATE TABLE `salary_setup_header` (
  `s_s_h_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `salary_payable` varchar(30) CHARACTER SET latin1 NOT NULL,
  `absent_deduct` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tax_manager` varchar(30) CHARACTER SET latin1 NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`s_s_h_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: salary_sheet_generate
#

DROP TABLE IF EXISTS `salary_sheet_generate`;

CREATE TABLE `salary_sheet_generate` (
  `ssg_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `gdate` varchar(20) DEFAULT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `generate_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ssg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `salary_sheet_generate` (`ssg_id`, `employee_id`, `name`, `gdate`, `start_date`, `end_date`, `generate_by`) VALUES ('15', '145454', 'january-2019', '2019-01-09', '2019-01-01', '2019-01-31', 'John Doe');
INSERT INTO `salary_sheet_generate` (`ssg_id`, `employee_id`, `name`, `gdate`, `start_date`, `end_date`, `generate_by`) VALUES ('16', 'EQLAJFUW', 'january-2019', '2019-01-09', '2019-01-01', '2019-01-31', 'John Doe');


#
# TABLE STRUCTURE FOR: salary_type
#

DROP TABLE IF EXISTS `salary_type`;

CREATE TABLE `salary_type` (
  `salary_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sal_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `emp_sal_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `default_amount` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`salary_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('6', 'Medical', '1', '10000', '');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('10', 'house Rent', '1', '1000', '');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('12', 'Provident fund', '0', '200', '');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('13', 'Bima', '0', '1000', '');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('15', 'Month', '1', '50', '');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('16', 'new', '1', '321', '');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('17', 'Etcss', '1', '1000', '');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('18', 'yty', '1', '', '');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `emp_sal_type`, `default_amount`, `status`) VALUES ('19', 'rrtrt', '1', '', '');


#
# TABLE STRUCTURE FOR: sec_menu_item
#

DROP TABLE IF EXISTS `sec_menu_item`;

CREATE TABLE `sec_menu_item` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_menu` int(11) DEFAULT NULL,
  `is_report` tinyint(1) DEFAULT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('1', 'manage_category', '', 'itemmanage', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('2', 'category_list', 'item_category', 'itemmanage', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('3', 'add_category', 'create', 'itemmanage', '2', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('4', 'manage_food', '', 'itemmanage', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('5', 'food_list', 'item_food', 'itemmanage', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('6', 'add_food', 'index', 'itemmanage', '5', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('7', 'food_varient', 'foodvarientlist', 'itemmanage', '5', '0', '2', '2018-11-07 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('8', 'add_varient', 'addvariant', 'itemmanage', '5', '0', '2', '2018-11-07 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('9', 'food_availablity', 'availablelist', 'itemmanage', '5', '0', '2', '2018-11-07 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('10', 'add_availablity', 'addavailable', 'itemmanage', '5', '0', '2', '2018-11-07 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('11', 'manage_addons', '', 'itemmanage', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('12', 'addons_list', 'menu_addons', 'itemmanage', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('13', 'add_adons', 'create', 'itemmanage', '8', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('14', 'manage_unitmeasurement', '', 'units', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('15', 'unit_list', 'unitmeasurement', 'units', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('16', 'unit_add', 'create', 'units', '12', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('17', 'manage_ingradient', '', 'units', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('18', 'ingradient_list', 'ingradient', 'units', '0', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('19', 'add_ingredient', 'create', 'units', '15', '0', '2', '2018-11-05 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('20', 'assign_adons_list', 'assignaddons', 'itemmanage', '8', '0', '2', '2018-11-06 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('21', 'assign_adons', 'assignaddonscreate', 'itemmanage', '8', '0', '2', '2018-11-06 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('28', 'membership_management', '', 'setting', '0', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('29', 'membership_list', 'index', 'setting', '28', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('30', 'membership_add', 'create', 'setting', '29', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('31', 'payment_setting', '', 'setting', '0', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('32', 'paymentmethod_list', 'index', 'setting', '31', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('33', 'payment_add', 'create', 'setting', '32', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('34', 'shipping_setting', '', 'setting', '0', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('35', 'shipping_list', 'index', 'setting', '34', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('36', 'shipping_add', 'create', 'setting', '35', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('37', 'supplier_manage', '', 'setting', '0', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('38', 'supplier_list', 'index', 'setting', '37', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('39', 'supplier_add', 'create', 'setting', '38', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('40', 'purchase_item', 'index', 'purchase', '0', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('41', 'purchase_add', 'create', 'purchase', '40', '0', '2', '2018-11-12 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('42', 'table_manage', '', 'setting', '0', '0', '2', '2018-11-13 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('43', 'add_new_table', 'create', 'setting', '44', '0', '2', '2018-11-13 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('44', 'table_list', 'restauranttable', 'setting', '42', '0', '2', '2018-11-13 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('45', 'ordermanage', 'index', 'ordermanage', '0', '0', '2', '2018-11-22 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('46', 'add_new_order', 'neworder', 'ordermanage', '45', '0', '2', '2018-11-22 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('47', 'order_list', 'orderlist', 'ordermanage', '45', '0', '2', '2018-11-22 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('48', 'pending_order', 'pendingorder', 'ordermanage', '45', '0', '2', '2018-11-22 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('49', 'processing_order', 'processing', 'ordermanage', '45', '0', '2', '2018-11-22 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('50', 'complete_order', 'completelist', 'ordermanage', '45', '0', '2', '2018-11-22 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('51', 'cancel_order', 'cancellist', 'ordermanage', '45', '0', '2', '2018-11-22 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('52', 'pos_invoice', 'pos_invoice', 'ordermanage', '45', '0', '2', '2018-11-22 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('53', 'c_o_a', 'treeview', 'accounts', '0', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('54', 'debit_voucher', 'debit_voucher', 'accounts', '0', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('55', 'credit_voucher', 'credit_voucher', 'accounts', '0', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('56', 'contra_voucher', 'contra_voucher', 'accounts', '0', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('57', 'journal_voucher', 'journal_voucher', 'accounts', '0', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('58', 'voucher_approval', 'voucher_approval', 'accounts', '0', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('59', 'account_report', '', 'accounts', '0', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('60', 'voucher_report', 'coa', 'accounts', '59', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('61', 'cash_book', 'cash_book', 'accounts', '59', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('62', 'bank_book', 'bank_book', 'accounts', '59', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('63', 'general_ledger', 'general_ledger', 'accounts', '59', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('64', 'trial_balance', 'trial_balance', 'accounts', '59', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('65', 'profit_loss', 'profit_loss_report', 'accounts', '59', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('66', 'cash_flow', 'cash_flow_report', 'accounts', '59', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('67', 'coa_print', 'coa_print', 'accounts', '59', '0', '2', '2018-12-17 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('68', 'hrm', '', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('69', 'attendance', 'Home', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('70', 'atn_form', 'atnview', 'hrm', '69', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('71', 'atn_report', 'attendance_list', 'hrm', '69', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('72', 'award', 'Award_controller', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('73', 'new_award', 'create_award', 'hrm', '72', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('74', 'circularprocess', 'Candidate', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('75', 'add_canbasic_info', 'caninfo_create', 'hrm', '74', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('76', 'can_basicinfo_list', 'canInfoview', 'hrm', '74', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('77', 'candidate_basic_info', 'Candidate_select', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('78', 'candidate_shortlist', 'shortlist_form', 'hrm', '77', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('79', 'candidate_interview', 'interview_form', 'hrm', '77', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('80', 'candidate_selection', 'selection_form', 'hrm', '77', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('81', 'department', 'Department_controller', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('82', 'departmentfrm', 'create_dept', 'hrm', '81', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('83', 'division', 'Division_controller', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('84', 'add_division', 'division_form', 'hrm', '83', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('85', 'division_list', '', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('86', 'position', 'position_form', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('87', 'Direct_Empl', '', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('88', 'add_employee', 'employ_form', 'hrm', '87', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('89', 'manage_employee', 'employee_view', 'hrm', '87', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('90', 'emp_performance', 'emp_performance_form', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('91', 'emp_sal_payment', 'paymentview', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('92', 'leave', 'leave', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('93', 'weekly_holiday', 'weeklyform', 'hrm', '92', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('94', 'holiday', 'holiday_form', 'hrm', '92', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('95', 'others_leave_application', 'others_leave', 'hrm', '92', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('96', 'add_leave_type', 'leave_type_form', 'hrm', '92', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('97', 'leave_application', 'others_leave', 'hrm', '92', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('98', 'loan', 'loan', 'hrm', '0', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('99', 'loan_grand', 'create_grandloan', 'hrm', '98', '0', '2', '2018-12-18 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('100', 'loan_installment', 'create_installment', 'hrm', '98', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('101', 'manage_installment', 'installmentView', 'hrm', '98', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('102', 'manage_granted_loan', 'loan_view', 'hrm', '98', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('103', 'loan_report', 'loan_report', 'hrm', '98', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('104', 'payroll', 'Payroll', 'hrm', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('105', 'salary_type_setup', 'create_salary_setup', 'hrm', '104', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('106', 'manage_salary_setup', 'emp_salary_setup_view', 'hrm', '104', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('107', 'salary_setup', 'create_s_setup', 'hrm', '104', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('108', 'manage_salary_type', 'salary_setup_view', 'hrm', '104', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('109', 'salary_generate', 'create_salary_generate', 'hrm', '104', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('110', 'manage_salary_generate', 'salary_generate_view', 'hrm', '104', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('111', 'purchase_return', 'return_form', 'purchase', '40', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('112', 'return_invoice', 'return_invoice', 'purchase', '40', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('113', 'report', 'reports', 'report', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('114', 'purchase_report', 'index', 'report', '113', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('115', 'stock_report_product_wise', 'productwise', 'report', '113', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('116', 'purchase_report_ingredient', 'ingredientwise', 'report', '113', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('117', 'sell_report', 'sellrpt', 'report', '113', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('118', 'table_setting', 'tablesetting', 'setting', '44', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('119', 'customer_type', '', 'setting', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('120', 'customertype_list', 'customertype', 'setting', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('121', 'add_type', 'create', 'setting', '120', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('122', 'currency', '', 'setting', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('123', 'currency_list', 'currency', 'setting', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('124', 'currency_add', 'create', 'setting', '123', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('125', 'production', '', 'production', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('126', 'production_set_list', 'production', 'production', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('127', 'set_productionunit', 'productionunit', 'production', '126', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('128', 'production_add', 'create', 'production', '126', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('129', 'production_list', 'addproduction', 'production', '126', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('130', 'reservation', '', 'reservation', '0', '0', '2', '2018-12-19 00:00:00');
INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES ('131', 'reservation_table', 'tablebooking', 'reservation', '130', '0', '2', '2018-12-19 00:00:00');


#
# TABLE STRUCTURE FOR: sec_role_permission
#

DROP TABLE IF EXISTS `sec_role_permission`;

CREATE TABLE `sec_role_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `can_access` tinyint(1) NOT NULL,
  `can_create` tinyint(1) NOT NULL,
  `can_edit` tinyint(1) NOT NULL,
  `can_delete` tinyint(1) NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('169', '3', '1', '1', '1', '1', '1', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('170', '3', '2', '1', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('171', '3', '3', '0', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('172', '3', '4', '0', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('173', '3', '5', '0', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('174', '3', '6', '0', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('175', '3', '7', '1', '1', '1', '1', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('176', '3', '8', '1', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('177', '3', '10', '0', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('178', '3', '17', '0', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('179', '3', '18', '0', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('180', '3', '11', '1', '1', '1', '1', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('181', '3', '12', '1', '1', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('182', '3', '13', '1', '1', '1', '1', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('183', '3', '14', '1', '1', '1', '1', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('184', '3', '15', '1', '1', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('185', '3', '16', '0', '0', '0', '0', '2', '2018-11-06 02:34:24');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('238', '5', '22', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('239', '5', '23', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('240', '5', '24', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('241', '5', '25', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('242', '5', '26', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('243', '5', '27', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('244', '5', '1', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('245', '5', '2', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('246', '5', '3', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('247', '5', '4', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('248', '5', '5', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('249', '5', '6', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('250', '5', '7', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('251', '5', '8', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('252', '5', '9', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('253', '5', '10', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('254', '5', '11', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('255', '5', '12', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('256', '5', '13', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('257', '5', '20', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('258', '5', '21', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('259', '5', '45', '1', '1', '1', '1', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('260', '5', '46', '1', '1', '1', '1', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('261', '5', '47', '1', '1', '1', '1', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('262', '5', '48', '1', '1', '1', '1', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('263', '5', '49', '1', '1', '1', '1', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('264', '5', '50', '1', '1', '1', '1', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('265', '5', '51', '1', '1', '1', '1', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('266', '5', '52', '1', '1', '1', '1', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('267', '5', '40', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('268', '5', '41', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('269', '5', '28', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('270', '5', '29', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('271', '5', '30', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('272', '5', '31', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('273', '5', '32', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('274', '5', '33', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('275', '5', '34', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('276', '5', '35', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('277', '5', '36', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('278', '5', '37', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('279', '5', '38', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('280', '5', '39', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('281', '5', '42', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('282', '5', '43', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('283', '5', '44', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('284', '5', '14', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('285', '5', '15', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('286', '5', '16', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('287', '5', '17', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('288', '5', '18', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');
INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES ('289', '5', '19', '0', '0', '0', '0', '2', '2018-11-22 07:42:54');


#
# TABLE STRUCTURE FOR: sec_role_tbl
#

DROP TABLE IF EXISTS `sec_role_tbl`;

CREATE TABLE `sec_role_tbl` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` text NOT NULL,
  `role_description` text NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `role_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `sec_role_tbl` (`role_id`, `role_name`, `role_description`, `create_by`, `date_time`, `role_status`) VALUES ('3', 'Manager', 'sdfdfsdf', '2', '2018-10-04 11:22:31', '1');
INSERT INTO `sec_role_tbl` (`role_id`, `role_name`, `role_description`, `create_by`, `date_time`, `role_status`) VALUES ('4', 'Second Role', 'sdfasdf', '2', '2018-10-24 08:07:37', '1');
INSERT INTO `sec_role_tbl` (`role_id`, `role_name`, `role_description`, `create_by`, `date_time`, `role_status`) VALUES ('5', 'Waiter', 'testyyu ', '2', '2018-11-05 10:28:38', '1');


#
# TABLE STRUCTURE FOR: sec_user_access_tbl
#

DROP TABLE IF EXISTS `sec_user_access_tbl`;

CREATE TABLE `sec_user_access_tbl` (
  `role_acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_role_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  PRIMARY KEY (`role_acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `sec_user_access_tbl` (`role_acc_id`, `fk_role_id`, `fk_user_id`) VALUES ('6', '3', '16');
INSERT INTO `sec_user_access_tbl` (`role_acc_id`, `fk_role_id`, `fk_user_id`) VALUES ('13', '3', '1');
INSERT INTO `sec_user_access_tbl` (`role_acc_id`, `fk_role_id`, `fk_user_id`) VALUES ('14', '5', '9');
INSERT INTO `sec_user_access_tbl` (`role_acc_id`, `fk_role_id`, `fk_user_id`) VALUES ('15', '5', '166');
INSERT INTO `sec_user_access_tbl` (`role_acc_id`, `fk_role_id`, `fk_user_id`) VALUES ('16', '5', '165');


#
# TABLE STRUCTURE FOR: setting
#

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `storename` varchar(100) DEFAULT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `vat` int(11) NOT NULL DEFAULT '0',
  `currency` int(11) DEFAULT '0',
  `language` varchar(100) DEFAULT NULL,
  `timezone` varchar(150) NOT NULL,
  `dateformat` text NOT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `powerbytxt` text,
  `footer_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `setting` (`id`, `title`, `storename`, `address`, `email`, `phone`, `logo`, `favicon`, `vat`, `currency`, `language`, `timezone`, `dateformat`, `site_align`, `powerbytxt`, `footer_text`) VALUES ('2', 'Dynamic Admin Panel', 'BDTASK', '98 Green Road, Farmgate, Dhaka-1215.', 'bdtask@gmail.com', '0123456789', 'assets/img/icons/logo.png', 'assets/img/icons/m.png', '15', '1', 'english', 'Europe/London', 'd/m/Y', 'LTR', 'Powered By: BDTASK, www.bdtask.com\r\n', '2017Â©Copyright');


#
# TABLE STRUCTURE FOR: shipping_method
#

DROP TABLE IF EXISTS `shipping_method`;

CREATE TABLE `shipping_method` (
  `ship_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_method` varchar(150) NOT NULL,
  `shippingrate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ship_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `shipping_method` (`ship_id`, `shipping_method`, `shippingrate`, `is_active`) VALUES ('1', 'Home Delivary', '60.00', '1');
INSERT INTO `shipping_method` (`ship_id`, `shipping_method`, `shippingrate`, `is_active`) VALUES ('2', 'Pickup', '0.00', '1');
INSERT INTO `shipping_method` (`ship_id`, `shipping_method`, `shippingrate`, `is_active`) VALUES ('3', 'In the restaurant', '0.00', '1');


#
# TABLE STRUCTURE FOR: sms_configuration
#

DROP TABLE IF EXISTS `sms_configuration`;

CREATE TABLE `sms_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `gateway` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sms_from` varchar(200) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `sms_configuration` (`id`, `link`, `gateway`, `user_name`, `password`, `sms_from`, `userid`, `status`) VALUES ('1', 'http://smsrank.com/', 'SMS Rank', 'rabbani', '123456', 'smsrank', '', '1');
INSERT INTO `sms_configuration` (`id`, `link`, `gateway`, `user_name`, `password`, `sms_from`, `userid`, `status`) VALUES ('2', 'https://www.nexmo.com/', 'nexmo', '50489b88', 'z1cBmtrDeQrOaqhg', 'restaurant', '', '0');
INSERT INTO `sms_configuration` (`id`, `link`, `gateway`, `user_name`, `password`, `sms_from`, `userid`, `status`) VALUES ('3', 'https://www.budgetsms.net/', 'budgetsms', 'user1', '1e753da74', 'budgetsms', '21547', '0');


#
# TABLE STRUCTURE FOR: sms_template
#

DROP TABLE IF EXISTS `sms_template`;

CREATE TABLE `sms_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `default_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `sms_template` (`id`, `template_name`, `message`, `type`, `status`, `default_status`, `created_at`, `updated_at`) VALUES ('1', 'one', 'your Order {id} is cancel for some reason.', 'Cancel', '0', '0', '2019-01-03 07:08:07', '0000-00-00 00:00:00');
INSERT INTO `sms_template` (`id`, `template_name`, `message`, `type`, `status`, `default_status`, `created_at`, `updated_at`) VALUES ('2', 'two', 'your order {id} is completed', 'CompleteOrder', '0', '1', '2019-01-03 08:58:19', '0000-00-00 00:00:00');
INSERT INTO `sms_template` (`id`, `template_name`, `message`, `type`, `status`, `default_status`, `created_at`, `updated_at`) VALUES ('3', 'three', 'your order {id} is processing', 'Processing', '0', '1', '2018-11-10 07:00:46', '0000-00-00 00:00:00');
INSERT INTO `sms_template` (`id`, `template_name`, `message`, `type`, `status`, `default_status`, `created_at`, `updated_at`) VALUES ('8', 'four', 'Your Order Has been Placed Successfully.', 'Neworder', '1', '0', '2019-01-03 08:59:32', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: subscribe_emaillist
#

DROP TABLE IF EXISTS `subscribe_emaillist`;

CREATE TABLE `subscribe_emaillist` (
  `emailid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `dateinsert` datetime NOT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `subscribe_emaillist` (`emailid`, `email`, `dateinsert`) VALUES ('1', 'ainal1haque@gmail.com', '2019-02-04 19:26:25');
INSERT INTO `subscribe_emaillist` (`emailid`, `email`, `dateinsert`) VALUES ('2', 'ainal1haque@gmail.com', '2019-02-04 19:28:18');


#
# TABLE STRUCTURE FOR: supplier
#

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supid` int(11) NOT NULL AUTO_INCREMENT,
  `suplier_code` varchar(255) NOT NULL,
  `supName` varchar(100) NOT NULL,
  `supEmail` varchar(100) NOT NULL,
  `supMobile` varchar(50) NOT NULL,
  `supAddress` text NOT NULL,
  PRIMARY KEY (`supid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES ('1', 'sup_001', 'Md. Kamal Hossain', 'kamal@gmail.com', '01723451261', 'Uttara,Dhaka,Bangladesh');
INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES ('2', 'sup_002', 'Ilias Ali', 'ilias@gmail.com', '01723451221', 'Mirpur-10,Dhaka,Bangladesh.');
INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES ('3', 'sup_003', 'Helal Uddin', 'helal@gmail.com', '01814310991', 'Dhaka');
INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES ('5', 'sup_004', 'jack1', 'jack@gmail.com', '01723451201', 'ghdsfsdf');
INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES ('6', 'sup_005', 'owen', 'owen@gmail.com', '01912345245', 'fgfdg');
INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES ('7', 'sup_006', 'Md. Rahman', 'rahman@gmail.com', '01435646457', 'dhaka');
INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES ('8', 'sup_007', 'testsuppp', 'testpp@gmail.com', '019213434543`', 'SDHFGSHFG');


#
# TABLE STRUCTURE FOR: synchronizer_setting
#

DROP TABLE IF EXISTS `synchronizer_setting`;

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `synchronizer_setting` (`id`, `hostname`, `username`, `password`, `port`, `debug`, `project_root`) VALUES ('8', '70.35.198.244', 'softest3bdtask', 'Ux5O~MBJ#odK', '21', 'true', './public_html/');


#
# TABLE STRUCTURE FOR: table_setting
#

DROP TABLE IF EXISTS `table_setting`;

CREATE TABLE `table_setting` (
  `settingid` int(11) NOT NULL AUTO_INCREMENT,
  `tableid` int(11) NOT NULL,
  `iconpos` text NOT NULL,
  PRIMARY KEY (`settingid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tbl_billingaddress
#

DROP TABLE IF EXISTS `tbl_billingaddress`;

CREATE TABLE `tbl_billingaddress` (
  `billaddressid` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `address` text,
  `DateInserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`billaddressid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('1', '98', ' nbmbm', 'bmbnm', 'dhaka', 'kamal@gmail.com', '8801717426371', 'dfdf', 'bnmbm', 'Bangladesh', '1216', 'dfdf', '2019-02-03 19:32:05');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('2', '99', ' nbmbm', 'bmbnm', 'dhaka', 'kamal@gmail.com', '8801717426371', 'dfdf', 'bnmbm', 'Bangladesh', '1216', 'dfdf', '2019-02-03 19:32:30');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('3', '100', 'Jamil', 'Hassan', 'Bdtask', 'jamilh@gmail.com', '8801717426371', 'Dhaka', 'Dhaka', 'Bangladesh', '1216', 'Dhaka', '2019-02-03 19:42:47');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('4', '101', ' nbmbm', 'bmbnm', 'gfdfg', 'doctor@sebaghar.com', '8801717426371', 'dfgfdg', 'bnmbm', 'Bangladesh', '', 'fgdg', '2019-02-03 19:46:19');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('5', '102', ' nbmbm', 'fdsf', 'sdf', 'fsdf', '8801717426371', 'sdfds', 'sfddsf', 'Bangladesh', '1216', 'dfsf', '2019-02-03 19:50:49');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('6', '103', ' nbmbm', 'bmbnm', 'sdf', 'mhkmusa@gmail.com', '8801717426371', 'sdfds', 'bnmbm', 'Bangladesh', '1216', 'dfsf', '2019-02-04 10:14:44');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('7', '104', 'jhon', 'lio', 'bdt', 'jhonl@gmail.com', '8801717426371', '', 'dhaka', 'Bangladesh', '1234', '', '2019-02-04 10:23:42');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('8', '105', 'jhon', 'lio', 'bdt', 'jhonl@gmail.com', '8801717426371', '', 'dhaka', 'Bangladesh', '1234', '', '2019-02-04 10:25:24');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('9', '106', 'test', 'fgdhgf', 'bdt', 'ainalmaan@yahoo.com', '8801717426371', 'Dhaka', 'dhaka', 'Afghanistan', '1234', 'Dhaka', '2019-02-04 11:08:05');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('10', '107', 'jhon', 'lio', '', 'admin@example.com', '8801717426371', 'Dhaka', 'dhaka', 'Bangladesh', '1234', 'Dhaka', '2019-02-04 11:25:51');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('11', '108', 'jhon', 'fgdhgf', '', 'jhonasdal@gmail.com', '8801717426371', '', 'dhaka', 'Bangladesh', '', 'Dhaka', '2019-02-04 11:26:45');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('12', '109', 'jhsdfgsd', 'dfgfdgd', '', 'dfgfd@gmail.com', '8801717426371', '', 'fdgdgf', 'Afghanistan', '', '', '2019-02-04 11:29:29');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('13', '110', 'fhfd', 'dgdf ', '', 'tesafdd@gmail.com', '8801717426371', '', 'dhaka', 'Afghanistan', '', '', '2019-02-04 11:30:16');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('14', '111', 'naeem', 'sdf', '', 'naeem@gmail.com', '8801717426371', '', 'dhaka', 'Afghanistan', '', '', '2019-02-04 11:34:17');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('15', '112', 'jhsdfgsd', 'fgdhgf', '', 'doctowerr@sebaghar.com', '8801717426371', '', 'dhaka', 'Afghanistan', '', '', '2019-02-04 11:40:22');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('16', '117', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 09:29:09');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('17', '118', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:05:56');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('18', '119', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:06:18');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('19', '120', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:08:28');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('20', '121', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:08:38');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('21', '122', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:08:48');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('22', '123', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:09:36');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('23', '124', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:10:27');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('24', '125', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:11:11');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('25', '126', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:11:28');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('26', '127', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:12:43');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('27', '128', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:13:14');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('28', '129', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:14:43');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('29', '130', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:21:15');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('30', '132', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 14:00:27');
INSERT INTO `tbl_billingaddress` (`billaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('31', '133', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 14:09:05');


#
# TABLE STRUCTURE FOR: tbl_city
#

DROP TABLE IF EXISTS `tbl_city`;

CREATE TABLE `tbl_city` (
  `cityid` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cityid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tbl_country
#

DROP TABLE IF EXISTS `tbl_country`;

CREATE TABLE `tbl_country` (
  `countryid` int(11) NOT NULL AUTO_INCREMENT,
  `countryname` varchar(70) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`countryid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_country` (`countryid`, `countryname`, `status`) VALUES ('1', 'Bangladesh', '1');
INSERT INTO `tbl_country` (`countryid`, `countryname`, `status`) VALUES ('2', 'United State', '1');
INSERT INTO `tbl_country` (`countryid`, `countryname`, `status`) VALUES ('3', 'United Kingdom', '1');
INSERT INTO `tbl_country` (`countryid`, `countryname`, `status`) VALUES ('4', 'India', '1');


#
# TABLE STRUCTURE FOR: tbl_rating
#

DROP TABLE IF EXISTS `tbl_rating`;

CREATE TABLE `tbl_rating` (
  `ratingid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `reviewtxt` text NOT NULL,
  `proid` int(11) NOT NULL,
  `rating` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `ratetime` datetime NOT NULL,
  PRIMARY KEY (`ratingid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_rating` (`ratingid`, `title`, `name`, `reviewtxt`, `proid`, `rating`, `status`, `email`, `ratetime`) VALUES ('1', 'Quisque vel elit eu eros blandit consectetur', 'Kamal', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.', '1', '4.50', '1', 'kamal@gmail.com', '2019-01-30 17:33:36');
INSERT INTO `tbl_rating` (`ratingid`, `title`, `name`, `reviewtxt`, `proid`, `rating`, `status`, `email`, `ratetime`) VALUES ('2', 'Veklon Mario foko nanaito', 'shimul', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.', '1', '4.50', '1', 'shimul@gmail.com', '2019-01-30 15:33:24');
INSERT INTO `tbl_rating` (`ratingid`, `title`, `name`, `reviewtxt`, `proid`, `rating`, `status`, `email`, `ratetime`) VALUES ('3', 'lorem', 'shuvo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply ', '2', '4.90', '1', 'shuvo@gmail.com', '2019-01-31 11:21:30');
INSERT INTO `tbl_rating` (`ratingid`, `title`, `name`, `reviewtxt`, `proid`, `rating`, `status`, `email`, `ratetime`) VALUES ('4', 'Discover', 'siam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply ', '2', '3.80', '1', 'siam@gmail.com', '2019-01-31 11:28:26');


#
# TABLE STRUCTURE FOR: tbl_shippingaddress
#

DROP TABLE IF EXISTS `tbl_shippingaddress`;

CREATE TABLE `tbl_shippingaddress` (
  `shipaddressid` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `address` text,
  `DateInserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`shipaddressid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('1', '98', 'Khan', 'dfgdfsgdgh', 'BDtask', 'test@gmail.com', '017172453454', 'gfdg', 'Dhaka', 'Bangladesh', '12254', 'test', '2019-02-03 19:32:05');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('2', '99', 'Khan', 'dfgdfsgdgh', 'BDtask', 'test@gmail.com', '017172453454', 'gfdg', 'Dhaka', 'Bangladesh', '12254', 'test', '2019-02-03 19:32:30');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('3', '100', 'Jamil', 'Hassan', 'Bdtask', 'jamilh@gmail.com', '8801717426371', 'Dhaka', 'Dhaka', 'Bangladesh', '1216', 'Dhaka', '2019-02-03 19:42:47');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('4', '101', ' nbmbm', 'bmbnm', 'gfdfg', 'doctor@sebaghar.com', '8801717426371', 'dfgfdg', 'bnmbm', 'Bangladesh', '', 'fgdg', '2019-02-03 19:46:19');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('5', '102', ' nbmbm', 'fdsf', 'sdf', 'fsdf', '8801717426371', 'sdfds', 'sfddsf', 'Bangladesh', '1216', 'dfsf', '2019-02-03 19:50:49');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('6', '103', ' nbmbm', 'bmbnm', 'sdf', 'mhkmusa@gmail.com', '8801717426371', 'sdfds', 'bnmbm', 'Bangladesh', '1216', 'dfsf', '2019-02-04 10:14:44');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('7', '104', 'jhon', 'lio', 'bdt', 'jhonl@gmail.com', '8801717426371', '', 'dhaka', 'Bangladesh', '1234', '', '2019-02-04 10:23:42');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('8', '105', 'jhon', 'lio', 'bdt', 'jhonl@gmail.com', '8801717426371', '', 'dhaka', 'Bangladesh', '1234', '', '2019-02-04 10:25:24');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('9', '106', 'test', 'fgdhgf', 'bdt', 'ainalmaan@yahoo.com', '8801717426371', 'Dhaka', 'dhaka', 'Afghanistan', '1234', 'Dhaka', '2019-02-04 11:08:05');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('10', '107', 'jhon', 'lio', '', 'admin@example.com', '8801717426371', 'Dhaka', 'dhaka', 'Bangladesh', '1234', 'Dhaka', '2019-02-04 11:25:51');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('11', '108', 'jhon', 'fgdhgf', '', 'jhonasdal@gmail.com', '8801717426371', '', 'dhaka', 'Bangladesh', '', 'Dhaka', '2019-02-04 11:26:45');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('12', '109', 'jhsdfgsd', 'dfgfdgd', '', 'dfgfd@gmail.com', '8801717426371', '', 'fdgdgf', 'Afghanistan', '', '', '2019-02-04 11:29:29');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('13', '110', 'fhfd', 'dgdf ', '', 'tesafdd@gmail.com', '8801717426371', '', 'dhaka', 'Afghanistan', '', '', '2019-02-04 11:30:16');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('14', '111', 'naeem', 'sdf', '', 'naeem@gmail.com', '8801717426371', '', 'dhaka', 'Afghanistan', '', '', '2019-02-04 11:34:17');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('15', '112', 'jhsdfgsd', 'fgdhgf', '', 'doctowerr@sebaghar.com', '8801717426371', '', 'dhaka', 'Afghanistan', '', '', '2019-02-04 11:40:22');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('16', '117', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 09:29:09');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('17', '118', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:05:56');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('18', '119', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:06:18');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('19', '120', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:08:28');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('20', '121', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:08:38');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('21', '122', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:08:48');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('22', '123', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:09:36');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('23', '124', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:10:27');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('24', '125', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:11:11');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('25', '126', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:11:28');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('26', '127', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:12:43');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('27', '128', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:13:14');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('28', '129', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:14:43');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('29', '130', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 11:21:15');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('30', '132', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 14:00:27');
INSERT INTO `tbl_shippingaddress` (`shipaddressid`, `orderid`, `firstname`, `lastname`, `companyname`, `email`, `phone`, `city`, `district`, `country`, `zip`, `address`, `DateInserted`) VALUES ('31', '133', 'teasdfdf', 'kklama', NULL, 'testrrre@gmail.com', '017543634646', 'dhaka', 'dhaka', NULL, NULL, 'dhaka', '2019-02-10 14:09:05');


#
# TABLE STRUCTURE FOR: tbl_slider
#

DROP TABLE IF EXISTS `tbl_slider`;

CREATE TABLE `tbl_slider` (
  `slid` int(11) NOT NULL AUTO_INCREMENT,
  `Sltypeid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slink` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `delation_status` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`slid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('1', '1', 'Welcome To', 'Book Your Table', 'assets/img/banner/2019-01-24/1.jpg', '#', '1', '0', '1920', '902');
INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('2', '1', 'Find Your', 'Best Cafe Deals', 'assets/img/banner/2019-01-24/2.jpg', '#', '1', '0', '1920', '902');
INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('3', '1', 'Exclusive', 'Coffee Shop', 'assets/img/banner/2019-01-24/3.jpg', '#', '1', '0', '1920', '902');
INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('4', '2', 'Discover', 'OUR STORY', 'assets/img/banner/2019-01-26/11.jpg', '#', '1', '0', '263', '332');
INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('5', '2', 'Discover', 'OUR STORY', 'assets/img/banner/2019-01-26/2.jpg', '#', '1', '0', '263', '332');
INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('6', '3', 'Discover', 'OUR MENU', 'assets/img/banner/2019-01-26/1.jpg', '#', '1', '0', '263', '332');
INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('7', '3', 'Discover', 'OUR MENU', 'assets/img/banner/2019-01-26/21.jpg', '#', '1', '0', '263', '177');
INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('8', '3', 'Discover', 'OUR MENU', 'assets/img/banner/2019-01-26/3.jpg', '#', '1', '0', '263', '177');
INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES ('9', '4', 'right', 'ads', 'assets/img/banner/2019-01-30/a1.jpg', '#', '1', '0', '252', '621');


#
# TABLE STRUCTURE FOR: tbl_slider_type
#

DROP TABLE IF EXISTS `tbl_slider_type`;

CREATE TABLE `tbl_slider_type` (
  `stype_id` int(11) NOT NULL AUTO_INCREMENT,
  `STypeName` varchar(255) DEFAULT NULL,
  `delation_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_slider_type` (`stype_id`, `STypeName`, `delation_status`) VALUES ('1', 'Home Top Slider', '0');
INSERT INTO `tbl_slider_type` (`stype_id`, `STypeName`, `delation_status`) VALUES ('2', 'Home our story', '0');
INSERT INTO `tbl_slider_type` (`stype_id`, `STypeName`, `delation_status`) VALUES ('3', 'Home our menu', '0');
INSERT INTO `tbl_slider_type` (`stype_id`, `STypeName`, `delation_status`) VALUES ('4', 'Menu Page right Banner', '0');


#
# TABLE STRUCTURE FOR: tbl_state
#

DROP TABLE IF EXISTS `tbl_state`;

CREATE TABLE `tbl_state` (
  `stateid` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) NOT NULL,
  `statename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`stateid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('1', '2', 'Alabama', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('2', '2', 'Alaska', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('3', '2', 'Arizona', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('4', '2', 'Arkansas', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('5', '2', 'California', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('6', '2', 'Florida', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('7', '2', 'New Mexico', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('8', '2', 'New York', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('9', '2', 'Oklahoma', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('10', '2', 'Texas', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('11', '2', 'Virginia', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('12', '1', 'Dhaka', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('13', '1', 'Chittagong', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('14', '1', 'Rajshahi', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('15', '1', 'Khulna', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('16', '1', 'Sylhet', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('17', '1', 'Barishal', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('18', '1', 'Rangpur', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('19', '1', 'Mymensingh', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('20', '4', 'West Bengal', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('21', '4', 'Uttar Pradesh', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('22', '4', 'Tripura', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('23', '4', 'Telangana', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('24', '4', 'Tamil Nadu', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('25', '4', 'Sikkim', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('26', '4', 'Rajasthan', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('27', '4', 'Punjab', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('28', '4', 'Odisha', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('29', '4', 'Nagaland', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('30', '4', 'Kerala', '1');
INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES ('31', '4', 'Haryana', '1');


#
# TABLE STRUCTURE FOR: tbl_token
#

DROP TABLE IF EXISTS `tbl_token`;

CREATE TABLE `tbl_token` (
  `tokenid` int(11) NOT NULL AUTO_INCREMENT,
  `tokencode` varchar(50) NOT NULL,
  `tokenrate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tokenstartdate` date NOT NULL,
  `tokenendate` date NOT NULL,
  `tokenstatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tokenid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_token` (`tokenid`, `tokencode`, `tokenrate`, `tokenstartdate`, `tokenendate`, `tokenstatus`) VALUES ('1', 'BigT61WD', '15.00', '2019-02-05', '2019-04-30', '1');
INSERT INTO `tbl_token` (`tokenid`, `tokencode`, `tokenrate`, `tokenstartdate`, `tokenendate`, `tokenstatus`) VALUES ('2', 'GoodDAY', '22.00', '2019-02-05', '2019-02-11', '1');


#
# TABLE STRUCTURE FOR: tbl_waiterappcart
#

DROP TABLE IF EXISTS `tbl_waiterappcart`;

CREATE TABLE `tbl_waiterappcart` (
  `weaterappid` int(11) NOT NULL AUTO_INCREMENT,
  `waiterid` int(11) NOT NULL,
  `alladdOnsName` varchar(255) DEFAULT NULL,
  `total_addonsprice` decimal(10,2) DEFAULT '0.00',
  `totaladdons` int(11) DEFAULT NULL,
  `addons_name` varchar(255) DEFAULT NULL,
  `addons_id` int(11) DEFAULT NULL,
  `addons_price` double(10,2) DEFAULT '0.00',
  `addonsQty` int(11) DEFAULT NULL,
  `component` varchar(255) DEFAULT NULL,
  `destcription` text,
  `itemnotes` varchar(255) DEFAULT NULL,
  `offerIsavailable` int(11) DEFAULT '0',
  `offerstartdate` date DEFAULT '0000-00-00',
  `OffersRate` int(11) DEFAULT NULL,
  `offerendate` date DEFAULT '0000-00-00',
  `price` decimal(10,2) DEFAULT '0.00',
  `ProductsID` int(11) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `productvat` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `variantName` varchar(255) NOT NULL,
  `variantid` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  PRIMARY KEY (`weaterappid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_waiterappcart` (`weaterappid`, `waiterid`, `alladdOnsName`, `total_addonsprice`, `totaladdons`, `addons_name`, `addons_id`, `addons_price`, `addonsQty`, `component`, `destcription`, `itemnotes`, `offerIsavailable`, `offerstartdate`, `OffersRate`, `offerendate`, `price`, `ProductsID`, `ProductImage`, `ProductName`, `productvat`, `quantity`, `variantName`, `variantid`, `orderid`) VALUES ('1', '166', 'BBQ Sauce,Cheese,', '70.00', '3', 'BBQ Sauce', '1', '25.00', '2', 'ground beef,Macaroni,Ground meat,soy sauce', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'fdgh', '0', '0000-00-00', '0', '0000-00-00', '150.00', '1', 'http://localhost/restaurant/application/modules/itemmanage/assets/images/burger.jpg', 'Hamburgers', '3', '3', '12 Inch', '1', '133');
INSERT INTO `tbl_waiterappcart` (`weaterappid`, `waiterid`, `alladdOnsName`, `total_addonsprice`, `totaladdons`, `addons_name`, `addons_id`, `addons_price`, `addonsQty`, `component`, `destcription`, `itemnotes`, `offerIsavailable`, `offerstartdate`, `OffersRate`, `offerendate`, `price`, `ProductsID`, `ProductImage`, `ProductName`, `productvat`, `quantity`, `variantName`, `variantid`, `orderid`) VALUES ('2', '166', 'BBQ Sauce,Cheese,', '70.00', '3', 'Cheese', '5', '20.00', '1', 'ground beef,Macaroni,Ground meat,soy sauce', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'fdgh', '0', '0000-00-00', '0', '0000-00-00', '150.00', '1', 'http://localhost/restaurant/application/modules/itemmanage/assets/images/burger.jpg', 'Hamburgers', '3', '3', '12 Inch', '1', '133');
INSERT INTO `tbl_waiterappcart` (`weaterappid`, `waiterid`, `alladdOnsName`, `total_addonsprice`, `totaladdons`, `addons_name`, `addons_id`, `addons_price`, `addonsQty`, `component`, `destcription`, `itemnotes`, `offerIsavailable`, `offerstartdate`, `OffersRate`, `offerendate`, `price`, `ProductsID`, `ProductImage`, `ProductName`, `productvat`, `quantity`, `variantName`, `variantid`, `orderid`) VALUES ('3', '166', 'BBQ Sauce,Cheese,', '70.00', '3', 'BBQ Sauce', '1', '25.00', '2', 'ground beef,Macaroni,Ground meat,soy sauce', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'fdgh', '0', '0000-00-00', '0', '0000-00-00', '200.00', '1', 'http://localhost/restaurant/application/modules/itemmanage/assets/images/burger.jpg', 'Hamburgers', '3', '3', '16 Inch', '2', '133');
INSERT INTO `tbl_waiterappcart` (`weaterappid`, `waiterid`, `alladdOnsName`, `total_addonsprice`, `totaladdons`, `addons_name`, `addons_id`, `addons_price`, `addonsQty`, `component`, `destcription`, `itemnotes`, `offerIsavailable`, `offerstartdate`, `OffersRate`, `offerendate`, `price`, `ProductsID`, `ProductImage`, `ProductName`, `productvat`, `quantity`, `variantName`, `variantid`, `orderid`) VALUES ('4', '166', 'BBQ Sauce,Cheese,', '70.00', '3', 'Cheese', '5', '20.00', '1', 'ground beef,Macaroni,Ground meat,soy sauce', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'fdgh', '0', '0000-00-00', '0', '0000-00-00', '200.00', '1', 'http://localhost/restaurant/application/modules/itemmanage/assets/images/burger.jpg', 'Hamburgers', '3', '3', '16 Inch', '2', '133');
INSERT INTO `tbl_waiterappcart` (`weaterappid`, `waiterid`, `alladdOnsName`, `total_addonsprice`, `totaladdons`, `addons_name`, `addons_id`, `addons_price`, `addonsQty`, `component`, `destcription`, `itemnotes`, `offerIsavailable`, `offerstartdate`, `OffersRate`, `offerendate`, `price`, `ProductsID`, `ProductImage`, `ProductName`, `productvat`, `quantity`, `variantName`, `variantid`, `orderid`) VALUES ('5', '166', '', '0.00', '0', NULL, NULL, '0.00', NULL, 'tomato sauce. Generally, the toppings for Chicago pizza are ground beef, sausage, pepperoni, onion, mushrooms, and green peppers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.Lorem Ipsum is ', 'test', '0', '0000-00-00', '0', '0000-00-00', '200.00', '3', 'http://localhost/restaurant/application/modules/itemmanage/assets/images/pizza.jpg', 'Chicago Pizza', '0', '1', '16 Inch', '2', '133');


#
# TABLE STRUCTURE FOR: tbl_widget
#

DROP TABLE IF EXISTS `tbl_widget`;

CREATE TABLE `tbl_widget` (
  `widgetid` int(11) NOT NULL AUTO_INCREMENT,
  `widget_name` varchar(100) NOT NULL,
  `widget_title` varchar(150) DEFAULT NULL,
  `widget_desc` text,
  PRIMARY KEY (`widgetid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('1', 'Footer left', '', '<p class=\"text-justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.</p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('2', 'footermiddle', 'Opening Time', '<p><strong>Monday - Wednesday</strong>&nbsp;10:00 AM - 7:00 PM</p>\r\n<p><strong>Thursday - Friday</strong>&nbsp;10:00 AM - 11:00 PM</p>\r\n<p><strong>Saturday</strong>&nbsp;12:00 PM - 6:00 PM</p>\r\n<p><strong>Sunday</strong>&nbsp;Off</p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('3', 'Footer right', 'Contact Us', '<p>356, Mannan Plaza ( 4th Floar ) Khilkhet Dhaka</p>\r\n<p><a href=\"../../hungry\">support@bdtask.com</a></p>\r\n<p><a href=\"../../hungry\">+88 01715 222 333</a></p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('4', 'Our Store', 'Our Store', '<address>123 Suspendis matti,&nbsp;<br />Visaosang Building VST District,&nbsp;<br />NY Accums, North American</address>\r\n<p><a class=\"d-block\" href=\"http://soft9.bdtask.com/hungry-v1/\">0123-456-78910</a><a class=\"d-block\" href=\"http://soft9.bdtask.com/hungry-v1/\">support@domain.com</a></p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('6', 'Reservation', 'BOOK YOUR TABLE', '<p>Integer vitae enim vel nisi feugiat ultricies. Phasellus hendrerit pharetra posuere. In hac habitasse platea dictumst. Integer diam nulla,</p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('7', 'Our Menu text', 'Our Menu ', '<p>Rosa is a restaurant, bar and coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides of the building, overlooking the market and a bustling London inteon.</p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('8', 'Specials', 'FOOD MENU', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The</p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('9', 'story text', 'OUR STORY', '<p>Rosa is a restaurant, bar and coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides of the building, overlooking the market and a bustling London inteon.</p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('10', 'Professional', 'OUR EXPERT CHEFS', '');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('11', 'Need Help Booking?', 'Need Help Booking?', '<p class=\"mb-2\">Just call our customer services at any time, we are waiting 24 hours to recieve your calls.</p>\r\n<p><a href=\"#\">+880 1712 123 123</a></p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('12', 'Privacy', 'Privacy Policy', '<h2>What is Lorem Ipsum</h2>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h3>Contacting us :</h3>\r\n<p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us.</p>');
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES ('13', 'termscondition', 'Terms of Use', '<h3>Web browser cookies</h3>\r\n<p>Our Site may use \"cookies\" to enhance User experience. User\'s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>\r\n<h3>How we use collected information bdtask may collect and use Users personal information for the following purposes:</h3>\r\n<p>To run and operate our Site We may need your information display content on the Site correctly. To improve customer service Information you provide helps us respond to your customer service requests and support needs more efficiently. To personalize user experience We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site. To improve our Site We may use feedback you provide to improve our products and services. To run a promotion, contest, survey or other Site feature To send Users information they agreed to receive about topics we think will be of interest to them. To send periodic emails We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests.</p>');


#
# TABLE STRUCTURE FOR: tblreservation
#

DROP TABLE IF EXISTS `tblreservation`;

CREATE TABLE `tblreservation` (
  `reserveid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `tableid` int(11) NOT NULL,
  `person_capicity` int(11) NOT NULL,
  `formtime` time NOT NULL,
  `totime` time NOT NULL,
  `reserveday` date NOT NULL,
  `customer_notes` text,
  `status` int(11) NOT NULL COMMENT '1=free,2=booked',
  PRIMARY KEY (`reserveid`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('1', '1', '3', '2', '06:40:30', '15:33:30', '2018-12-12', NULL, '2');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('2', '1', '2', '8', '08:20:15', '16:40:30', '2018-12-25', NULL, '2');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('3', '3', '7', '3', '06:40:30', '16:40:30', '2018-12-14', NULL, '2');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('4', '2', '1', '2', '09:25:15', '09:55:15', '2018-12-12', NULL, '2');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('5', '5', '1', '2', '13:25:30', '13:55:30', '2018-12-12', NULL, '2');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('6', '11', '3', '2', '11:10:00', '11:40:00', '2019-01-24', NULL, '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('7', '12', '1', '2', '19:15:00', '19:45:00', '2019-01-24', NULL, '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('8', '13', '3', '2', '16:30:00', '17:00:00', '2019-01-24', 'sfsdfgdgdfghf', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('9', '26', '2', '2', '12:00:00', '12:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('21', '30', '2', '2', '13:00:00', '13:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('22', '30', '2', '2', '13:00:00', '13:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('23', '30', '2', '2', '13:00:00', '13:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('24', '30', '2', '2', '13:00:00', '13:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('25', '31', '2', '2', '13:00:00', '13:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('26', '31', '2', '2', '13:00:00', '13:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('27', '31', '2', '2', '13:00:00', '13:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('28', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('29', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('30', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('31', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('32', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('33', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('34', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('35', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('36', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('37', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');
INSERT INTO `tblreservation` (`reserveid`, `cid`, `tableid`, `person_capicity`, `formtime`, `totime`, `reserveday`, `customer_notes`, `status`) VALUES ('38', '31', '2', '2', '14:00:00', '14:30:00', '2018-02-07', 'werwtwerte vertyreyty ty', '1');


#
# TABLE STRUCTURE FOR: top_menu
#

DROP TABLE IF EXISTS `top_menu`;

CREATE TABLE `top_menu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `menu_slug` varchar(70) NOT NULL,
  `parentid` int(11) NOT NULL,
  `entrydate` date NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('1', 'Home', 'hungry', '0', '2019-01-26', '1');
INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('2', 'Reservation', 'reservation', '0', '2019-02-20', '1');
INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('3', 'Menu', 'menu', '0', '2019-01-26', '1');
INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('4', 'About Us', 'about', '2', '2019-02-20', '1');
INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('5', 'Contact Us', 'contact', '0', '2019-01-26', '1');
INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('6', 'Pages', 'pages', '0', '2019-01-26', '0');
INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('7', 'Cart', 'cart', '6', '2019-01-26', '1');
INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('8', 'Details', 'details', '6', '2019-01-26', '1');
INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES ('9', 'Logout', 'logout', '6', '2019-02-03', '1');


#
# TABLE STRUCTURE FOR: unit_of_measurement
#

DROP TABLE IF EXISTS `unit_of_measurement`;

CREATE TABLE `unit_of_measurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uom_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uom_short_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('1', 'Kilogram', 'kg.', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('2', 'Liter', 'ltr.', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('3', 'Gram', 'grm.', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('4', 'tonne', 'tn.', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('5', 'milligram', 'mg.', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('6', 'carat', 'carat', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('7', 'Per Pieces', 'pcs', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('8', 'Per Cup', 'cup', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('9', 'Pound', 'pnd.', '1');
INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES ('10', 'tablespoon', 'tspoon', '1');


#
# TABLE STRUCTURE FOR: usedcoupon
#

DROP TABLE IF EXISTS `usedcoupon`;

CREATE TABLE `usedcoupon` (
  `cusedid` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `couponcode` varchar(100) NOT NULL,
  `couponrate` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`cusedid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `usedcoupon` (`cusedid`, `orderid`, `couponcode`, `couponrate`) VALUES ('1', '113', 'GoodDAY', '22.00');
INSERT INTO `usedcoupon` (`cusedid`, `orderid`, `couponcode`, `couponrate`) VALUES ('2', '114', 'GoodDAY', '22.00');


#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `about` text,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_reset_token` varchar(20) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `ip_address` varchar(14) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('1', 'Johnny', 'Doe', '', 'johnny@example.com', '827ccb0eea8a706c4c34a16891f84e7b', '', './assets/img/user/m.png', '2017-05-22 13:01:39', '2017-05-22 13:02:46', '::1', '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('2', 'John', 'Doe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'admin@example.com', '827ccb0eea8a706c4c34a16891f84e7b', '', './assets/img/user/m2.png', '2019-02-26 10:45:06', '2019-01-24 07:51:22', '::1', '1', '1');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('3', 'Janie ', 'Doe', '', 'janie@example.com', '827ccb0eea8a706c4c34a16891f84e7b', '', './assets/img/user/f.png', '2017-05-22 13:00:35', '2017-05-22 13:01:02', '::1', '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('6', 'Jane', 'Doe', '', 'jane@example.com', 'e10adc3949ba59abbe56e057f20f883e', '', './assets/img/user/f2.png', NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('165', 'Hm', 'Isahaq', NULL, 'hmisahaq@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', NULL, '2018-11-22 09:29:34', '2018-11-22 09:35:29', '::1', '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('166', 'Ainal', 'Haque', NULL, 'ainal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', './application/modules/hrm/assets/images/2019-01-22/u.png', NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('167', 'Manik', 'Khan', NULL, 'manik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', NULL, NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('168', 'Manik ', 'Hassan', NULL, 'manik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', NULL, NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('169', 'test emp', '', NULL, 'testemp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('170', 'John ', 'Carlos', NULL, 'jhonchef@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', './application/modules/hrm/assets/images/2019-01-27/1.jpg', NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('171', 'John ', 'Maria', NULL, 'dimaria@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', './application/modules/hrm/assets/images/2019-01-27/2.jpg', NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('172', 'Mitchel ', 'Santner', NULL, 'michel', 'e10adc3949ba59abbe56e057f20f883e', '', './application/modules/hrm/assets/images/2019-01-27/3.jpg', NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('173', 'John', 'Doe', NULL, 'doe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', './application/modules/hrm/assets/images/2019-01-27/4.jpg', NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('174', 'online', 'order', NULL, 'online@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', './application/modules/hrm/assets/images/2019-02-03/l.png', NULL, NULL, NULL, '1', '0');
INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `status`, `is_admin`) VALUES ('175', 'test sdafds', 'sdfds', NULL, 'sdf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, NULL, NULL, NULL, '1', '0');


#
# TABLE STRUCTURE FOR: variant
#

DROP TABLE IF EXISTS `variant`;

CREATE TABLE `variant` (
  `variantid` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` int(11) NOT NULL,
  `variantName` varchar(120) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`variantid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('1', '1', '12 Inch', '150.00');
INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('2', '1', '16 Inch', '200.00');
INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('3', '2', '12 Inch', '200.00');
INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('4', '3', '16 Inch', '700.00');
INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('5', '4', '12 Inch', '550.00');
INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('6', '5', 'sample', '80.00');
INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('7', '5', 'sample', '80.00');
INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('8', '6', 'sample', '140.00');
INSERT INTO `variant` (`variantid`, `menuid`, `variantName`, `price`) VALUES ('9', '7', 'regular', '200.00');


#
# TABLE STRUCTURE FOR: visit_comp_product_gap
#

DROP TABLE IF EXISTS `visit_comp_product_gap`;

CREATE TABLE `visit_comp_product_gap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `outlet_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comp_product_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comp_product_qty` int(11) NOT NULL,
  `comp_facing` bigint(20) NOT NULL,
  `comp_price` int(11) DEFAULT NULL,
  `createby` int(11) NOT NULL,
  `createdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('1', '4_1542467477', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-17');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('2', '4_1542611252', '4', '6_4_1539089761', 'Ribena 500ml', '2', '3', '2', '4', '2018-11-19');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('3', '4_1542618963', '4', '6_4_1539089761', 'Ribena 500ml', '8', '11', '1', '4', '2018-11-19');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('4', '4_1542618963', '4', '6_4_1539089761', 'Ribena 500ml', '8', '11', '1', '4', '2018-11-19');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('5', '4_1542600812', '4', '6_4_1539089761', 'Ribena 500ml', '2', '23', '258', '4', '2018-11-19');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('6', '4_1542600812', '5', '6_4_1539089761', 'Ribena 1lt', '0', '0', '0', '4', '2018-11-19');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('7', '4_1542600812', '7', '6_4_1539089761', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-19');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('8', '4_1542600812', '6', '6_4_1539089761', 'Ribena 1lt', '0', '0', '0', '4', '2018-11-19');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('9', '4_1542625141', '4', '1_4_1542464416', 'Ribena 500ml', '2', '2', '3', '4', '2018-11-19');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('10', '4_1542793715', '4', '6_4_1539089761', 'Ribena 500ml', '2', '3', '3', '4', '2018-11-21');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('11', '12_1542626217', '4', '1_12_1542619694', 'Ribena 500ml', '2', '2', '3', '12', '2018-11-21');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('12', '4_1542795543', '4', '6_4_1540187427', 'Ribena 500ml', '2', '5', '6', '4', '2018-11-21');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('13', '4_1542798162', '4', '6_4_1540187427', 'Ribena 500ml', '3', '5', '8', '4', '2018-11-21');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('14', '4_1542885316', '4', '1_4_1542464416', 'Ribena 500ml', '5', '6', '5', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('15', '4_1542885316', '5', '1_4_1542464416', 'Ribena 1lt', '5', '6', '6', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('16', '4_1542885316', '7', '1_4_1542464416', 'Ribena 500ml', '5', '56', '6', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('17', '4_1542883690', '4', '9_4_1542883609', 'Ribena 500ml', '55', '5', '180', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('18', '4_1542885136', '4', '6_4_1540187427', 'Ribena 500ml', '6', '5', '9', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('19', '4_1542885136', '1', '6_4_1540187427', 'Super Fresh Drinking Water', '58', '0', '0', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('20', '4_1542885136', '1', '6_4_1540187427', 'Pran Drinking Water', '0', '5', '0', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('21', '4_1542885136', '1', '6_4_1540187427', 'Aquafina Bangladesh', '0', '0', '5', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('22', '4_1542885136', '1', '6_4_1540187427', 'Jibon Drinking Water', '0', '0', '0', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('23', '4_1542893680', '4', '5_4_1542893582', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-22');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('24', '4_1543039731', '4', '17_4_1541324920', 'Ribena 500ml', '5', '6', '8', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('25', '4_1543039731', '5', '17_4_1541324920', 'Ribena 1lt', '5', '3', '6', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('26', '4_1543039731', '7', '17_4_1541324920', 'Ribena 500ml', '4', '6', '6', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('27', '4_1543041019', '4', '17_4_1541324920', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('28', '4_1543042949', '4', '17_4_1541324920', 'Ribena 500ml', '5', '6', '180', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('29', '4_1543042949', '5', '17_4_1541324920', 'Ribena 1lt', '5', '2', '290', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('30', '4_1543052577', '4', '9_4_1542883609', 'Ribena 500ml', '15', '5', '180', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('31', '4_1543052577', '5', '9_4_1542883609', 'Ribena 1lt', '10', '5', '270', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('32', '4_1543052577', '34', '9_4_1542883609', 'None', '0', '0', '0', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('33', '4_1543052577', '10', '9_4_1542883609', 'None', '0', '0', '0', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('34', '4_1542890508', '34', '9_4_1542883609', 'None', '0', '0', '0', '4', '2018-11-24');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('35', '4_1543125755', '34', '1_4_1542464416', 'None', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('36', '4_1543125755', '37', '1_4_1542464416', 'None', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('37', '4_1543125755', '38', '1_4_1542464416', 'None', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('38', '4_1543125755', '10', '1_4_1542464416', 'None', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('39', '4_1543123879', '4', '9_4_1542883609', 'Ribena 500ml', '19', '8', '190', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('40', '4_1543123879', '5', '9_4_1542883609', 'Ribena 1lt', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('41', '4_1543123879', '7', '9_4_1542883609', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('42', '4_1543123879', '6', '9_4_1542883609', 'Ribena 1lt', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('43', '4_1543126150', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('44', '4_1543126150', '5', '1_4_1542464416', 'Ribena 1lt', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('45', '4_1543126150', '7', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('46', '4_1543126150', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('47', '4_1543126150', '5', '1_4_1542464416', 'Ribena 1lt', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('48', '4_1543126150', '7', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('49', '4_1543131271', '4', '1_4_1542464416', 'Ribena 500ml', '53', '3', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('50', '4_1543131271', '5', '1_4_1542464416', 'Ribena 1lt', '6', '3', '0', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('51', '4_1543131271', '7', '1_4_1542464416', 'Ribena 500ml', '0', '6', '3', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('52', '4_1543130721', '4', '9_4_1542883609', 'Ribena 500ml', '12', '7', '190', '4', '2018-11-25');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('53', '4_1543213944', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-26');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('54', '4_1543213944', '7', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-11-26');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('55', '4_1543213944', '6', '1_4_1542464416', 'Ribena 1lt', '0', '0', '0', '4', '2018-11-26');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('56', '12_1543134427', '4', '1_4_1542464416', 'Ribena 500ml', '5', '5', '5', '1', '2018-11-29');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('57', '12_1543134427', '5', '1_4_1542464416', 'Ribena 1lt', '5', '5', '5', '1', '2018-11-29');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('58', '12_1543134427', '6', '1_4_1542464416', 'Ribena 1lt', '5', '5', '5', '1', '2018-11-29');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('59', '10_1543484637', '4', '6_10_1543484599', 'Ribena 500ml', '0', '0', '0', '10', '2018-11-29');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('60', '13_1543595903', '4', '1_13_1543595850', 'Ribena 500ml', '0', '0', '0', '13', '2018-11-30');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('61', '13_1543599799', '4', '1_13_1543598378', 'Ribena 500ml', '0', '0', '0', '13', '2018-11-30');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('62', '4_1543821831', '4', '6_4_1539429068', 'Ribena 500ml', '12', '3', '275', '4', '2018-12-03');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('63', '13_1543862411', '4', '5_13_1543862377', 'Ribena 500ml', '25', '0', '0', '13', '2018-12-03');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('64', '4_1543756443', '4', '6_4_1539429068', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('65', '4_1543822204', '4', '6_4_1539429068', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('66', '4_1543756419', '4', '6_4_1539429068', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('67', '4_1542624323', '4', '7_18_1538641983', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('68', '4_1543913917', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('69', '4_1543914758', '4', '5_4_1543913497', 'Ribena 500ml', '2', '2', '222', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('70', '4_1543918066', '4', '5_4_1543913497', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('71', '4_1543918066', '5', '5_4_1543913497', 'Ribena 1lt', '12', '4', '180', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('72', '4_1543918304', '4', '5_4_1543913497', 'Ribena 500ml', '20', '6', '281', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('73', '4_1543918304', '7', '5_4_1543913497', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('74', '4_1543918700', '4', '5_4_1543913497', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('75', '4_1543918700', '1', '5_4_1543913497', 'Super Fresh Drinking Water', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('76', '4_1543918700', '1', '5_4_1543913497', 'Pran Drinking Water', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('77', '4_1543918700', '1', '5_4_1543913497', 'Aquafina Bangladesh', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('78', '4_1543918700', '1', '5_4_1543913497', 'Jibon Drinking Water', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('79', '4_1543914032', '4', '1_4_1542464416', 'Ribena 500ml', '58', '5', '4', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('80', '4_1543927339', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('81', '4_1543927339', '5', '1_4_1542464416', 'Ribena 1lt', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('82', '4_1543927339', '6', '1_4_1542464416', 'Ribena 1lt', '0', '0', '0', '4', '2018-12-04');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('83', '4_1544003691', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('84', '4_1544003691', '5', '1_4_1542464416', 'Ribena 1lt', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('85', '4_1544003691', '6', '1_4_1542464416', 'Ribena 1lt', '5', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('86', '4_1544004183', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('87', '4_1544004183', '5', '1_4_1542464416', 'Ribena 1lt', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('88', '4_1544004373', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('89', '4_1544004373', '7', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('90', '4_1544004373', '6', '1_4_1542464416', 'Ribena 1lt', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('91', '4_1544005013', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('92', '4_1544005344', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('93', '4_1544005729', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('94', '4_1544006257', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('95', '4_1544006558', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('96', '4_1544007350', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('97', '4_1544007897', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');
INSERT INTO `visit_comp_product_gap` (`id`, `schedule_id`, `product_id`, `outlet_id`, `comp_product_name`, `comp_product_qty`, `comp_facing`, `comp_price`, `createby`, `createdate`) VALUES ('98', '4_1544008061', '4', '1_4_1542464416', 'Ribena 500ml', '0', '0', '0', '4', '2018-12-05');


#
# TABLE STRUCTURE FOR: weekly_holiday
#

DROP TABLE IF EXISTS `weekly_holiday`;

CREATE TABLE `weekly_holiday` (
  `wk_id` int(11) NOT NULL AUTO_INCREMENT,
  `dayname` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`wk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO `weekly_holiday` (`wk_id`, `dayname`) VALUES ('22', 'Friday,Satarday,Sunday');


