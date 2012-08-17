--
-- Table structure for table `datori`
--

CREATE TABLE IF NOT EXISTS `datori` (
  `ip` varchar(15) COLLATE utf8_bin NOT NULL,
  `dators` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `grupas`
--

CREATE TABLE IF NOT EXISTS `grupas` (
  `Vecums` double DEFAULT NULL,
  `CV` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `TV` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `SV` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `CS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `TS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `SS` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `AKV` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `AKS` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grupas`
--

INSERT INTO `grupas` (`Vecums`, `CV`, `TV`, `SV`, `CS`, `TS`, `SS`, `AKV`, `AKS`) VALUES
(0, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(1, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(2, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(3, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(4, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(5, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(6, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(7, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(8, 'BV', 'BV', 'BV', 'BS', 'BS', 'BS', 'AK', 'AK'),
(9, 'TV 1', 'TV 1', 'SV 1', 'TS 1', 'TS 1', 'SS 1', 'AK', 'AK'),
(10, 'TV 1', 'TV 1', 'SV 1', 'TS 1', 'TS 1', 'SS 1', 'AK', 'AK'),
(11, 'TV 1', 'TV 1', 'SV 1', 'TS 1', 'TS 1', 'SS 1', 'AK', 'AK'),
(12, 'TV 1', 'TV 1', 'SV 1', 'TS 1', 'TS 1', 'SS 1', 'AK', 'AK'),
(13, 'CV 3', 'TV 2', 'SV 2', 'CS 3', 'TS 2', 'SS 3', 'AK', 'AK'),
(14, 'CV 3', 'TV 2', 'SV 2', 'CS 3', 'TS 2', 'SS 3', 'AK', 'AK'),
(15, 'CV 3', 'TV 2', 'SV 2', 'CS 3', 'TS 2', 'SS 3', 'AK', 'AK'),
(16, 'CV 3', 'TV 2', 'SV 2', 'CS 3', 'TS 2', 'SS 3', 'AK', 'AK'),
(17, 'CV 3', 'TV 3', 'SV 3', 'CS 3', 'TS 3', 'SS 3', 'AK', 'AK'),
(18, 'CV 3', 'TV 3', 'SV 3', 'CS 3', 'TS 3', 'SS 3', 'AK', 'AK'),
(19, 'CV 3', 'TV 3', 'SV 3', 'CS 3', 'TS 3', 'SS 3', 'AK', 'AK'),
(20, 'CV 3', 'TV 3', 'SV 3', 'CS 3', 'TS 3', 'SS 3', 'AK', 'AK'),
(21, 'CV 3', 'TV 3', 'SV 3', 'CS 3', 'TS 3', 'SS 3', 'AK', 'AK'),
(22, 'CV 3', 'TV 3', 'SV 3', 'CS 3', 'TS 3', 'SS 3', 'AK', 'AK'),
(23, 'CV 3', 'TV 3', 'SV 3', 'CS 3', 'TS 3', 'SS 3', 'AK', 'AK'),
(24, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(25, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(26, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(27, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(28, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(29, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(30, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(31, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(32, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(33, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(34, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(35, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(36, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(37, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(38, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(39, 'CV 3', 'TV 4', 'SV 3', 'CS 3', 'TS 4', 'SS 3', 'AK', 'AK'),
(40, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(41, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(42, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(43, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(44, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(45, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(46, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(47, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(48, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(49, 'CV 5', 'TV 5', 'SV 5', 'CS 5', 'TS 5', 'SS 5', 'AK', 'AK'),
(50, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(51, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(52, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(53, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(54, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(55, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(56, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(57, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(58, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(59, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(60, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(61, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(62, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(63, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(64, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(65, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(66, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(67, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(68, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(69, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(70, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(71, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(72, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(73, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(74, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(75, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(76, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(77, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(78, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(79, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(80, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(81, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(82, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(83, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(84, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(85, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(86, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(87, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(88, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(89, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(90, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(91, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(92, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(93, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(94, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(95, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(96, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(97, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(98, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(99, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK'),
(100, 'CV 5', 'TV 6', 'SV 5', 'CS 5', 'TS 6', 'SS 5', 'AK', 'AK');

--
-- Table structure for table `kolektivi`
--

CREATE TABLE IF NOT EXISTS `kolektivi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kolektivs` varchar(150) COLLATE utf8_bin NOT NULL,
  `gads` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=26 ;

--
-- Table structure for table `registracija`
--
CREATE TABLE IF NOT EXISTS `registracija` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Numurs` int(3) NOT NULL,
  `Vards` varchar(150) COLLATE utf8_bin NOT NULL,
  `Gads` int(4) NOT NULL,
  `Grupa` varchar(5) COLLATE utf8_bin NOT NULL,
  `Dzimums` varchar(2) COLLATE utf8_bin NOT NULL,
  `Velo` varchar(5) COLLATE utf8_bin NOT NULL,
  `Sods` int(20) DEFAULT NULL,
  `Komentars` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `ipReg` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `SK` int(4) NOT NULL,
  `Rezultats` int(20) DEFAULT NULL,
  `ipStarts` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `ipFiniss` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `Starts` int(20) DEFAULT NULL,
  `Finiss` int(20) DEFAULT NULL,
  `Apgrieziens` int(20) DEFAULT NULL,
  `Kolektivs` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=300 ;

--
-- Structure for view `export_finiss`
--
DROP TABLE IF EXISTS `export_finiss`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `export_finiss` AS select `registracija`.`Numurs` AS `Numurs`,sec_to_time(`registracija`.`Finiss`) AS `SEC_TO_TIME(``Finiss``)` from `registracija`;

--
-- Structure for view `export_reg`
--
DROP TABLE IF EXISTS `export_reg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `export_reg` AS select `registracija`.`Numurs` AS `Numurs`,`registracija`.`Vards` AS `Vards`,`registracija`.`Gads` AS `Gads`,`registracija`.`Dzimums` AS `Dzimums`,`registracija`.`Velo` AS `Velo`,`registracija`.`Sods` AS `Sods`,`registracija`.`Kolektivs` AS `Kolektivs`,`registracija`.`Komentars` AS `Komentars`,`registracija`.`SK` AS `SK` from `registracija`;

--
-- Structure for view `export_starts`
--
DROP TABLE IF EXISTS `export_starts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `export_starts` AS select `registracija`.`Numurs` AS `Numurs`,sec_to_time(`registracija`.`Starts`) AS `Starts` from `registracija`;
