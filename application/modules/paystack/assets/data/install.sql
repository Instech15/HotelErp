INSERT INTO `payment_method` (`payment_method_id`, `payment_method`, `is_active`) VALUES (7, 'Paystack', '1');
INSERT INTO `paymentsetup` (`setupid`, `paymentid`, `marchantid`, `password`, `email`, `currency`, `Islive`, `status`) VALUES (NULL, '7', 'sk_test_244d476bdc23152bb2cc08b55a99ae700474b639', 'pk_test_b71ced5a4e8c55532f62c4e2565edaba837efd8b', 'shakilbdtask@gmail.com', 'NGN', '0', '1');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010303', 'Paystack', 'Online Payment', '4', '1', '1', '0', 'A', '0', '0', '0.00', '1', '2021-12-06 10:02:51', '', '0000-00-00 00:00:00');