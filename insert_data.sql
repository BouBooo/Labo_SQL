INSERT INTO `animals` (`IdAnimal`, `animalName`, `BornAt`, `ArrivalDate`, `adopted`, `IdCategory`, `IdRace`, `IdRoom`, `IdFood`, `IdChenil`, `IdDonator`) VALUES
(1, 'Marutaro', '2015-06-24', '2018-12-16', 0, 1, 3, 1, 1, 1, 3),
(2, 'Okapi', '2016-08-21', '2018-08-05', 0, 1, 1, 3, 1, 1, 2),
(3, 'Cheeper', '2015-01-28', '2016-05-03', 1, 1, 2, 2, 2, 1, 1),
(4, 'Dynamite', '2018-04-19', '2019-01-18', 0, 1, 2, 3, 1, 1, 4),
(6, 'Typo', '2014-05-02', '2017-11-05', 0, 1, 3, 2, 1, 1, 6),
(7, 'Larson', '2016-09-22', '2017-08-21', 1, 1, 2, 1, 2, 1, 8),
(8, 'Spaz', '2016-02-15', '2017-03-12', 1, 1, 2, 1, 2, 1, NULL),
(9, 'Chapo', '2015-02-15', '2018-07-16', 0, 2, 5, 4, 4, 1, 10),
(10, 'Tigrou', '2016-11-05', '2019-01-30', 0, 2, 6, 4, 4, 1, 11),
(11, 'Caramel', '2015-11-03', '2016-06-16', 1, 2, 8, 10, 3, 2, 12),
(12, 'Grey', '2016-02-21', '2017-07-16', 1, 2, 7, 10, 4, 2, 13),
(13, 'Angry', '2012-08-21', '2014-12-07', 1, 1, 2, 4, 1, 2, 14),
(14, 'Cheap', '2014-01-24', '2015-07-15', 1, 1, 4, 4, 1, 2, 15),
(15, 'Farine', '2016-07-04', '2017-11-20', 0, 1, 7, 10, 2, 2, NULL),
(16, 'Cypress', '2015-08-16', '2016-06-05', 0, 1, 2, 9, 2, 2, NULL),
(17, 'Kobi', '2014-11-19', '2016-12-05', 0, 1, 4, 9, 1, 2, NULL),
(18, 'Ritz', '2015-06-20', '2015-11-27', 0, 1, 3, 9, 1, 2, NULL),
(19, 'Daphne', '2016-02-08', '2018-06-12', 0, 1, 1, 9, 2, 2, NULL),
(20, 'Magma', '2014-06-13', '2015-05-05', 0, 2, 1, 11, 4, 2, NULL),
(21, 'Zebenjo', '2015-12-05', '2016-06-14', 0, 2, 2, 11, 3, 2, NULL),
(22, 'Essien', '2016-08-15', '2018-02-28', 0, 2, 3, 11, 3, 2, NULL),
(23, 'Garnet', '2014-12-14', '2017-09-01', 0, 2, 4, 11, 4, 2, NULL),
(24, 'Ms Awesome', '2016-04-21', '2018-07-24', 0, 2, 7, 7, 4, 3, NULL),
(25, 'Elana', '2015-12-06', '2017-08-25', 1, 2, 5, 7, 3, 3, 19),
(26, 'Panther', '2017-08-14', '2019-01-24', 0, 2, 8, 8, 3, 3, NULL),
(29, 'Kudu', '2013-05-05', '2014-08-05', 0, 1, 1, 5, 1, 3, NULL),
(30, 'Santafe', '2014-11-25', '2016-06-05', 0, 1, 2, 6, 1, 3, NULL),
(31, 'Shane', '2013-06-11', '2014-01-26', 1, 1, 3, 5, 1, 3, 16),
(32, 'Fleabag', '2016-04-11', '2016-08-12', 1, 1, 4, 5, 2, 3, 17),
(33, 'Runner', '2015-01-01', '2016-01-06', 1, 1, 2, 6, 1, 3, 18),
(37, 'Raven', '2016-11-24', '2018-08-09', 1, 2, 7, 8, 4, 3, 20),
(38, 'Elana', '2015-12-06', '2017-10-25', 1, 2, 5, 7, 3, 3, 19),
(39, 'Ms Awesome', '2016-04-21', '2018-02-24', 0, 2, 7, 7, 4, 3, NULL),
(40, 'Panther', '2017-08-14', '2019-01-24', 0, 2, 8, 8, 3, 3, NULL),
(41, 'Raven', '2016-11-24', '2018-08-09', 1, 2, 7, 7, 4, 3, 20),
(42, 'Oreo', '2015-03-15', '2017-07-26', 0, 2, 5, 8, 3, 3, NULL);





INSERT INTO `buyers` (`IdBuyer`, `buyerName`, `AdoptedAt`, `IdInvoice`, `IdAnimal`) VALUES
(1, 'Pallard', '2017-02-16', 1, 3),
(2, 'Hunter', '2018-03-11', 2, 7),
(3, 'Graves', '2018-04-25', 3, 8),
(4, 'Phillips', '2016-12-21', 4, 11),
(5, 'Kennedy', '2017-11-04', 5, 12),
(6, 'Morrison', '2016-02-17', 6, 13),
(7, 'Daniels', '2015-02-02', 7, 14),
(8, 'Titouan', '2017-12-07', 8, 25),
(9, 'Jack', '2014-04-30', 9, 31),
(10, 'John', '2017-01-23', 10, 32),
(11, 'Magnat', '2017-04-01', 11, 33),
(12, 'Caponi', '2019-02-16', 12, 37),
(13, 'Albert', '2017-12-21', 13, 38),
(14, 'Balan', '2018-11-09', 14, 41);


INSERT INTO `categories` (`IdCategory`, `categoryName`) VALUES
(1, 'Doggos'),
(2, 'Cats');



INSERT INTO `chenil` (`IdChenil`, `chenilName`, `IdCompany`, `IdLocation`) VALUES
(1, 'PetHeaven - Bordeaux', 1, 1),
(2, 'PetHeaven - Marseille', 1, 2),
(3, 'PetHeaven - Paris', 1, 3);



INSERT INTO `company` (`IdCompany`, `companyName`, `Description`, `CreatedAt`) VALUES
(1, 'PetHeaven', 'Company which have 2 chenils : in Bordeaux and in Marseille', NULL);


INSERT INTO `donators` (`IdDonator`, `donatorName`, `GivenAt`, `IdAnimal`) VALUES
(1, 'BouBooo', '2016-05-03', 3),
(2, 'Le Cossec', '2018-08-05', 2),
(3, 'Dupin', '2018-12-16', 1),
(4, 'Ximenes', '2019-01-18', 4),
(6, 'Paul', '2018-04-25', 5),
(7, 'Corentin', '2017-11-05', 6),
(8, 'Lucas', '2018-08-21', 7),
(10, 'Castaing', '2018-07-16', 9),
(11, 'Catallo', '2019-01-30', 10),
(12, 'Marcheron', '2016-05-16', 11),
(13, 'Priolot', '2014-05-16', 12),
(14, 'Fontaine', '2014-12-07', 13),
(15, 'Nay', '2015-02-15', 14),
(16, 'Platel', '2017-11-20', 15);


INSERT INTO `employees` (`IdEmployee`, `FirstName`, `LastName`, `Email`, `Password`, `Hire_date`, `IdJob`, `IdLocation`, `IdChenil`, `IdCompany`) VALUES
(1, 'Leo', 'CHAPON', 'leo.chapon@petheaven-bordeaux.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '2014-07-20', 2, 1, 1, 1),
(2, 'Justin', 'SELLA', 'justin.sella@petheaven-bordeaux.com', 'd4g481fsqdzdzcf4', '2013-02-18', 3, 1, 1, 1),
(3, 'Theo', 'FERRERA', 'theo.ferrera@petheaven-bordeaux.com', 'ccs55448c84zfqcZE5', '2012-09-01', 4, 1, 1, 1),
(4, 'Theo', 'HAY', 'theo.hay@petheaven-bordeaux.com', 'ezrvvqncxjkjnezvr4dezafqcs', '2013-05-30', 4, 1, 1, 1),
(6, 'Freeze', 'CORLEONE', 'freeze.corleone@petheaven-bordeaux.com', 'fX2ZccdfUkM5rBr8', '2012-06-06', 1, 1, 1, 1),
(7, 'Jack', 'OSIRUS', 'osirus.jack@petheaven-marseille.com', 'nHy833hRnmGyvQBE', '2013-02-19', 2, 2, 2, 1),
(8, 'Riley', 'REID', 'riley.reid@petheaven-marseille.com', 'yV3c7VdusSus39v3', '2013-05-16', 3, 2, 2, 1),
(9, 'Homer', 'SIMPSON', 'homer.simpson@petheaven-marseille.com', 'dYded9D4qk6C3AAs', '2014-01-02', 4, 2, 2, 1),
(10, 'Jesse', 'PINKMAN', 'jesse.pinkman@petheaven-marseille.com', 'hMLp4djXFvVDd9xE', '2014-06-26', 4, 2, 2, 1),
(11, 'Zeu', 'SERVIETSKY', 'lil.peep@petheaven-marseille.com', 'v2BKDXyjuc8XtgEe', '2014-05-16', 4, 2, 2, 1),
(12, 'Kobo', 'MAXIMUM', 'kobo.maximum@petheaven-paris.com', '8jbPq2YMWm2n4zV5', '2014-09-15', 2, 3, 3, 1),
(13, 'Lana', 'RHOADES', 'lana.rhoades@petheaven-paris.com', 'rCDSwj9Jnaa7VGNc', '2014-12-12', 3, 3, 3, 1),
(14, 'Patrick', 'SEBASTIEN', 'patrick.sebastien@petheaven-paris.com', '94B8jWhnbRBqpXC6', '2014-10-13', 4, 3, 3, 1),
(15, 'Florian', 'ONAIR', 'florian.onair@petheaven-paris.com', 'jtw7LXrVWFxmF3cY', '2014-10-13', 4, 3, 3, 1),
(16, 'Ikaz', 'BOI', 'ikaz.boi@petheaven-paris.com', 'aRT7adFQ79bfTSQF', '2015-02-06', 4, 3, 3, 1);



INSERT INTO `food_items` (`IdFood`, `foodName`, `price`, `Composition`) VALUES
(1, 'Doggo Healthy', 0.135, 'Chicken, brocoli, rice'),
(2, 'Doggo Meat focused', 0.160, 'Beef cubed, Chicken'),
(3, 'Cat Fish focused', 0.185, 'Salmon, oil, seaweeds'),
(4, 'Cat Meat focused', 0.100, 'Turkey, Raw egg');



INSERT INTO `invoice` (`IdInvoice`, `Payement`, `IdBuyer`, `IdAnimal`) VALUES
(1, 1250, 1, 3),
(2, 1000, 2, 7),
(3, 1400, 3, 8),
(4, 750, 4, 11),
(5, 1230, 5, 12),
(6, 1050, 6, 13),
(7, 1400, 7, 14),
(8, 930, 8, 25),
(9, 800, 9, 31),
(10, 1350, 10, 32),
(11, 850, 11, 33),
(12, 1100, 12, 37),
(13, 900, 13, 38),
(14, 1000, 14, 41);


INSERT INTO `jobs` (`IdJob`, `jobName`) VALUES
(1, 'Boss'),
(2, 'Manager'),
(3, 'Secretary'),
(4, 'Basic employee');



INSERT INTO `location` (`IdLocation`, `locationName`, `IdCompany`) VALUES
(1, 'Bordeaux', 1),
(2, 'Marseille', 1),
(3, 'Paris', 1);


INSERT INTO `races` (`IdRace`, `raceName`, `IdCategory`) VALUES
(1, 'Berger allemand', 1),
(2, 'Shiba', 1),
(3, 'Cocker', 1),
(4, 'Husky', 1),
(5, 'Persan', 2),
(6, 'Siamois', 2),
(7, 'Ragdoll', 2),
(8, 'Sphynx', 2);



INSERT INTO `rooms` (`IdRoom`, `roomName`, `capacity`, `IdCategory`, `IdChenil`) VALUES
(1, 'Room_bdx 1', 4, 1, 1),
(2, 'Room_bdx 2', 4, 1, 1),
(3, 'Room_bdx 3', 4, 2, 1),
(4, 'Room_bdx 4', 4, 2, 1),
(5, 'Room_paris 1', 4, 1, 3),
(6, 'Room_paris 2', 4, 1, 3),
(7, 'Room_paris 3', 4, 2, 3),
(8, 'Room_paris 4', 4, 2, 3),
(9, 'Room_marseille 1', 4, 1, 2),
(10, 'Room_marseille 2', 4, 1, 2),
(11, 'Room_marseille 3', 4, 2, 2),
(12, 'Room_marseille 4', 4, 2, 2);