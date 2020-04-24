

CREATE DATABASE IF NOT EXISTS `mywschoo_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mywschoo_db`;


CREATE TABLE `companies_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `companies_info` (`id`, `name`, `phone`, `email`, `website`) VALUES
(1, 'Maczen Technologies', '0802323565', 'maczentech@gmail.com', 'http://www.maczentech.com/');
