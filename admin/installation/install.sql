DROP TABLE IF EXISTS `#__coupon`;


CREATE TABLE IF NOT EXISTS `#__coupon` (
  `couponcode` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `orderprocess` varchar(10) NOT NULL,
  `couponamount` int(11) NOT NULL,
  `dedication` varchar(50) DEFAULT NULL,
  `use` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` int(150) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `payed` tinyint(1) DEFAULT NULL,
  `canceled` date DEFAULT NULL,
  PRIMARY KEY (`couponcode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;