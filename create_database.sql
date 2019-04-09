DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `IdAnimal` int(11) NOT NULL AUTO_INCREMENT,
  `animalName` varchar(255) DEFAULT NULL,
  `BornAt` date DEFAULT NULL,
  `ArrivalDate` date DEFAULT NULL,
  `adopted` int(11) NOT NULL DEFAULT '0',
  `IdCategory` int(11) DEFAULT NULL,
  `IdRace` int(11) NOT NULL,
  `IdRoom` int(11) DEFAULT NULL,
  `IdFood` int(11) DEFAULT NULL,
  `IdChenil` int(11) DEFAULT NULL,
  `IdDonator` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdAnimal`),
  KEY `IdCategory` (`IdCategory`),
  KEY `IdRoom` (`IdRoom`),
  KEY `IdFood` (`IdFood`),
  KEY `IdChenil` (`IdChenil`),
  KEY `IdDonator` (`IdDonator`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `buyers`;
CREATE TABLE IF NOT EXISTS `buyers` (
  `IdBuyer` int(11) NOT NULL AUTO_INCREMENT,
  `buyerName` varchar(255) NOT NULL,
  `AdoptedAt` date DEFAULT NULL,
  `IdInvoice` int(11) DEFAULT NULL,
  `IdAnimal` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdBuyer`),
  KEY `IdInvoice` (`IdInvoice`),
  KEY `IdAnimal` (`IdAnimal`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `IdCategory` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdCategory`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `chenil`;
CREATE TABLE IF NOT EXISTS `chenil` (
  `IdChenil` int(11) NOT NULL AUTO_INCREMENT,
  `chenilName` varchar(255) DEFAULT NULL,
  `IdCompany` int(11) DEFAULT NULL,
  `IdLocation` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdChenil`),
  KEY `IdCompany` (`IdCompany`),
  KEY `IdLocation` (`IdLocation`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `IdCompany` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedAt` date DEFAULT NULL,
  PRIMARY KEY (`IdCompany`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `donators`;
CREATE TABLE IF NOT EXISTS `donators` (
  `IdDonator` int(11) NOT NULL AUTO_INCREMENT,
  `donatorName` varchar(255) NOT NULL,
  `GivenAt` date DEFAULT NULL,
  `IdAnimal` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdDonator`),
  KEY `IdAnimal` (`IdAnimal`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `IdEmployee` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Hire_date` date DEFAULT NULL,
  `IdJob` int(11) NOT NULL,
  `IdLocation` int(11) DEFAULT NULL,
  `IdChenil` int(11) NOT NULL,
  `IdCompany` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdEmployee`),
  KEY `IdCompany` (`IdCompany`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `food_items`;
CREATE TABLE IF NOT EXISTS `food_items` (
  `IdFood` int(11) NOT NULL AUTO_INCREMENT,
  `foodName` varchar(255) DEFAULT NULL,
  `price` float(11,3) NOT NULL,
  `Composition` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdFood`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `IdInvoice` int(11) NOT NULL AUTO_INCREMENT,
  `Payement` int(11) DEFAULT NULL,
  `IdBuyer` int(11) DEFAULT NULL,
  `IdAnimal` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdInvoice`),
  KEY `IdClient` (`IdBuyer`),
  KEY `IdAnimal` (`IdAnimal`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `IdJob` int(11) NOT NULL AUTO_INCREMENT,
  `jobName` varchar(255) NOT NULL,
  PRIMARY KEY (`IdJob`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `IdLocation` int(11) NOT NULL AUTO_INCREMENT,
  `locationName` varchar(255) DEFAULT NULL,
  `IdCompany` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdLocation`),
  KEY `IdCompany` (`IdCompany`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `races`;
CREATE TABLE IF NOT EXISTS `races` (
  `IdRace` int(11) NOT NULL AUTO_INCREMENT,
  `raceName` varchar(255) DEFAULT NULL,
  `IdCategory` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdRace`),
  KEY `IdCategory` (`IdCategory`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `IdRoom` int(11) NOT NULL AUTO_INCREMENT,
  `roomName` varchar(255) DEFAULT NULL,
  `capacity` int(11) NOT NULL DEFAULT '4',
  `IdCategory` int(11) NOT NULL,
  `IdChenil` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdRoom`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;




