--
-- Database: `dobble_social_networks`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `password` varchar(100) COLLATE latin1_german2_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=4 ;


--
-- Dumping data for table `users`
--

-- INSERT INTO `users` (`user_name`, `email`, `password`) VALUES
-- ('Rabi', 'r@mail.com', 'secret'),
-- ('Nabi', 'n@mail.com', 'secret');

