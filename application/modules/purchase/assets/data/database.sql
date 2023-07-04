
CREATE TABLE `purchaseitem` (
  `purID` int(11) NOT NULL AUTO_INCREMENT,
  `suplierID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quntity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `purchasedate` date NOT NULL,
  PRIMARY KEY (`purID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

