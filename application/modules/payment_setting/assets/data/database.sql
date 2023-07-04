--
-- Table structure for table `roomfacilitydetails`
--

CREATE TABLE IF NOT EXISTS `roomfacilitydetails` (
  `facilityid` int(11) NOT NULL AUTO_INCREMENT,
  `facilitytypeid` int(11) NOT NULL,
  `facilitytitle` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`facilityid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomfacilitytype`
--

CREATE TABLE IF NOT EXISTS `roomfacilitytype` (
  `facilitytypeid` int(11) NOT NULL AUTO_INCREMENT,
  `facilitytypetitle` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`facilitytypeid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomfaility_ref_accomodation`
--

CREATE TABLE IF NOT EXISTS `roomfaility_ref_accomodation` (
  `accomodationid` int(11) NOT NULL,
  `facilityid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomsizemesurement`
--

CREATE TABLE IF NOT EXISTS `roomsizemesurement` (
  `mesurementid` int(11) NOT NULL AUTO_INCREMENT,
  `roommesurementitle` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`mesurementid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;