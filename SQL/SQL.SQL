CREATE DATABASE gameFreaks;

CREATE TABLE clientData(
  CDID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  fName VARCHAR(50),
  lName VARCHAR(50),
  email VARCHAR(150) UNIQUE NOT NULL
);

CREATE TABLE clientProfile(
  CPID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CDID INT(11) NOT NULL,
  displayName VARCHAR(50) UNIQUE,
  UIMG VARCHAR(255),
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE
);

CREATE TABLE clientReward(
  CRID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CDID INT(11) NOT NULL,
  points INT(11) NOT NULL,
  level INT(11) NOT NULL,
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE
);

CREATE TABLE clientAddress(
  CAID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CDID INT(11) NOT NULL,
  unit INT(11),
  buildingNumber INT(11),
  street VARCHAR(100),
  suburb VARCHAR(100),
  city VARCHAR(100),
  state INT(3),
  postNo INT(5),
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE
);

CREATE TABLE login(
  LID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CDID INT(11) NOT NULL,
  UName VARCHAR(100) UNIQUE NOT NULL,
  PWD VARCHAR(200) NOT NULL,
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE
);

CREATE TABLE gameInventory(
  GIID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  productName VARCHAR(255) NOT NULL,
  releaseDates DATE NOT NULL,
  platform tinyint(1) NOT NULL,
  producer VARCHAR(255) NOT NULL,
  genre VARCHAR(100) NOT NULL,
  briefDescription TEXT(300) NOT NULL,
  longDescription VARCHAR(255) NOT NULL,
  Requirements TEXT(500) NOT NULL
);

CREATE TABLE  gameInventoryIMG (
  GIID INT(11) NOT NULL AUTO_INCREMENT,
  IMG VARCHAR(255) NOT NULL,
  PRIMARY KEY (GIID, IMG),
  FOREIGN KEY (GIID) REFERENCES gameInventory(GIID) ON DELETE CASCADE
);

CREATE TABLE savedGameInventory(
  CDID INT(11) NOT NULL,
  GIID INT(11) NOT NULL,
  PRIMARY KEY (CDID, GIID),
  FOREIGN KEY (CDID)  REFERENCES clientData(CDID) ON DELETE CASCADE,
  FOREIGN KEY (GIID)  REFERENCES gameInventory(GIID) ON DELETE CASCADE
);

CREATE TABLE guestGameComments(
  GGCID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  GIID INT(11) NOT NULL,
  username VARCHAR(255) NOT NULL,
  date date NOT NULL,
  comment TEXT(500) NOT NULL,
  FOREIGN KEY (GIID)  REFERENCES gameInventory(GIID) ON DELETE CASCADE
);

CREATE TABLE userGameComment(
  UGCID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CPID INT(11) NOT NULL,
  IID INT(11) NOT NULL,
  date date NOT NULL,
  comment TEXT(500) NOT NULL,
  FOREIGN KEY (CPID)  REFERENCES clientProfile(CPID) ON DELETE CASCADE
);

CREATE TABLE consoleInventory(
  CIID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  productName VARCHAR(255) NOT NULL,
  producer VARCHAR(255) NOT NULL,
  manufacturer VARCHAR(255) NOT NULL,
  releaseDates DATE NOT NULL,
  briefDescription TEXT(300) NOT NULL,
  longDescription TEXT(1000) NOT NULL
);

CREATE TABLE  consoleInventoryIMG (
  CIID INT(11) NOT NULL AUTO_INCREMENT,
  IMG VARCHAR(255) NOT NULL,
  PRIMARY KEY (CIID, IMG),
  FOREIGN KEY (CIID) REFERENCES consoleInventory(CIID) ON DELETE CASCADE
);

CREATE TABLE savedConsoleInventory(
  CDID INT(11) NOT NULL,
  CIID INT(11) NOT NULL,
  PRIMARY KEY (CDID, CIID),
  FOREIGN KEY (CDID) 	REFERENCES clientData(CDID) ON DELETE CASCADE,
  FOREIGN KEY (CIID) 	REFERENCES consoleInventory(CIID) ON DELETE CASCADE
);

CREATE TABLE guestConsoleComments(
  GCCID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CIID INT(11) NOT NULL,
  username VARCHAR(255) NOT NULL,
  date date NOT NULL,
  comment TEXT(500) NOT NULL,
  FOREIGN KEY (CIID) 	REFERENCES consoleInventory(CIID) ON DELETE CASCADE
);

CREATE TABLE userConsoleComment(
  UCCID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  CPID INT(11) NOT NULL,
  IID INT(11) NOT NULL,
  date date NOT NULL,
  comment TEXT(500) NOT NULL,
  FOREIGN KEY (CPID) 	REFERENCES clientProfile(CPID) ON DELETE CASCADE
);

INSERT INTO clientData (`CDID`, `fName`, `lName`, `email`) VALUES
  (1, 'Arabella', 'NumNut', 'admin1@proxwebdev.com'),
  (2, 'Mariah', 'MarMight', 'admin@proxwebdev.com'),
  (3, 'Megga', 'Boi', 'spambi@420blaze.it');

INSERT INTO clientProfile (`CPID`, `CDID`, `displayName`, `UIMG`) VALUES
  (1, 1, 'Ara', 'stars.jpeg'),
  (2, 2, 'Marmight', '11e79c5bd7cf103d.png'),
  (3, 3, 'Morgs', '44fdc40.jpg');

INSERT INTO clientReward (`CRID`, `CDID`, `points`, `level`) VALUES
  (1, 1, NULL, NULL),
  (2, 2, NULL, NULL),
  (3, 3, NULL, NULL);

INSERT INTO clientAddress (CAID, CDID, unit, buildingNumber, street, suburb, city, state, postNo) VALUES
  (1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
  (2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
  (3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO login (`LID`, `CDID`, `UName`, `PWD`) VALUES
  (1, 1, 'atcav', 'e6c83b282aeb2e022844595721cc00bbda47cb24537c1779f9bb84f04039e1676e6ba8573e588da1052510e3aa0a32a9e55879ae22b0c2d62136fc0a3e85f8bb'),
  (2, 2, 'admin', 'e6c83b282aeb2e022844595721cc00bbda47cb24537c1779f9bb84f04039e1676e6ba8573e588da1052510e3aa0a32a9e55879ae22b0c2d62136fc0a3e85f8bb'),
  (3, 3, 'spambi', '5e84464887949a798486c8ade17b49fc67a451eaee75f5e91aad42ea47060ceb5f9a4fd49eb487c9d851aac45fa788b7cfcb5408ad258bb017ea0b60bb17bfb1');

INSERT INTO gameInventory (GIID, productName, releaseDates, platform, producer, genre, briefDescription ,longDescription, Requirements) VALUES
  (1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
  (2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
  (3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO gameInventoryIMG (GIID, IMG) VALUES
  (1, NULL),
  (2, NULL),
  (3, NULL);

INSERT INTO savedGameInventory (CDID, GIID) VALUES
  (1, 1),
  (2, 2),
  (3, 3);

INSERT INTO guestGameComments (GGCID, GIID, username, date, comment) VALUES
  (1, 1, 'Prox', '2019-04-25 16:51:34', 'great game'),
  (2, 2, 'Prox', '2019-04-25 16:51:34', 'great game'),
  (3, 3, 'Prox', '2019-04-25 16:51:34', 'great game');

INSERT INTO userGameComment (UGCID, CPID, IID, date, comment) VALUES
  (1, 1, 1, '2019-04-25 16:51:34', 'great game'),
  (2, 2, 2, '2019-04-25 16:51:34', 'great game'),
  (3, 3, 3, '2019-04-25 16:51:34', 'great game');

INSERT INTO consoleInventory(CIID, productName, producer, manufacturer, releaseDates, briefDescription, longDescription) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO consoleInventoryIMG (CIID, IMG) VALUE
  (1, NULL),
  (2, NULL),
  (3, NULL);

INSERT INTO savedConsoleInventory (CDID, CIID) VALUES
  (1, 1),
  (2, 2),
  (3, 3);

INSERT INTO guestConsoleComments (GCCID, CIID, username, date, comment) VALUES
  (1, 1, 'Prox', '2019-04-25 16:51:34', 'great game'),
  (2, 2, 'Prox', '2019-04-25 16:51:34', 'great game'),
  (3, 3, 'Prox', '2019-04-25 16:51:34', 'great game');

INSERT INTo userConsoleComment (UCCID, CPID, IID, date, comment) VALUES
  (1, 1, 1, '2019-04-25 16:51:34', 'great console'),
  (2, 2, 2, '2019-04-25 16:51:34', 'great console'),
  (3, 3, 3, '2019-04-25 16:51:34', 'great console');