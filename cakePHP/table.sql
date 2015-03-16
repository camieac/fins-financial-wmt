DROP TABLE purchases;
DROP TABLE meetings;
DROP TABLE clients;
DROP TABLE fas;
DROP TABLE stocklists;

CREATE TABLE fas (
username VARCHAR(50) PRIMARY KEY,
name VARCHAR(50),
gender VARCHAR(1),
dateOfBirth DATE,
created DATETIME DEFAULT NULL,
modified DATETIME DEFAULT NULL
);

CREATE TABLE clients (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
gender VARCHAR(1),
dateOfBirth DATE,
nis VARCHAR(30),
phoneNo VARCHAR(10),
address VARCHAR(100),
balance INT(10),
fa VARCHAR(50),
created DATETIME DEFAULT NULL,
modified DATETIME DEFAULT NULL,
FOREIGN KEY (FA) references fas(username)
);

CREATE TABLE stocklists (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
symbol VARCHAR(50) UNIQUE,
created DATETIME DEFAULT NULL
);

CREATE TABLE purchases (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
stock INT UNSIGNED,
customer INT UNSIGNED,
quantity INT UNSIGNED,
price VARCHAR(10),
created DATETIME DEFAULT NULL,
modified DATETIME DEFAULT NULL,
FOREIGN KEY (customer) references clients(id),
FOREIGN KEY (stock) references stocklists(id)
);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE meetings (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
description VARCHAR(150),
customer INT UNSIGNED,
fa VARCHAR(50),
meetingTime TIME,
dateMeeting DATE,
created DATETIME DEFAULT NULL,
modified DATETIME DEFAULT NULL,
FOREIGN KEY (customer) references clients(id),
FOREIGN KEY (fa) references fas(username)
);


INSERT INTO fas(username, name, gender, dateOfBirth, created) VALUES ('pe70', 'Patrice Evra', 'M', '1984-06-06', NOW());
INSERT INTO fas(username, name, gender, dateOfBirth, created) VALUES ('er49', 'Evina Richards', 'F', '1988-04-09', NOW());

INSERT INTO clients (name, gender, dateOfBirth, nis, phoneNo, address, balance, fa, created) VALUES ('Jeremy Cricket', 'M', '1989-02-12', 'NX S3 DF PA 8', '1092384347', '19 Wallaby Way', 1200, 'pe70', NOW());
INSERT INTO clients (name, gender, dateOfBirth, nis, phoneNo, address, balance, fa, created) VALUES ('Lauren Tiuss', 'F', '1992-08-25', 'AC F5 EK PL 3',  '6542129653', '11 Alabaster Road', 750, 'pe70', NOW());
INSERT INTO clients (name, gender, dateOfBirth, nis, phoneNo, address, balance, fa, created) VALUES ('Ryan Dargus', 'M', '1998-11-28', 'KF L5 AK MA 5', '9128645319', '38 Leon Street', 2200, 'er49', NOW());


INSERT INTO meetings (name, description, customer, fa, meetingTime, dateMeeting, created) VALUES ('Stock Status Meeting', 'Want to discuss the current status of the stocks owned.', '2', 'pe70', '14:45', '2015-03-14', NOW());
INSERT INTO meetings (name, description, customer, fa, meetingTime, dateMeeting, created) VALUES ('Financial Advice', 'Discussion about when to sell stocks.', '1', 'pe70', '16:10', '2015-03-27', NOW());
INSERT INTO meetings (name, description, customer, fa, meetingTime, dateMeeting, created) VALUES ('Financial Advice', 'Possibility of buying stocks.', '3', 'er49', '11:50', '2015-04-20', NOW());

INSERT INTO stocklists (symbol, created) VALUES ('GOOG', NOW());
INSERT INTO stocklists (symbol, created) VALUES ('YHOO', NOW());
INSERT INTO stocklists (symbol, created) VALUES ('MSFT', NOW());
INSERT INTO stocklists (symbol, created) VALUES ('AAPL', NOW());

INSERT INTO purchases (stock, customer, quantity, price, created) VALUES (3, 1, 10, 45.58, NOW());
INSERT INTO purchases (stock, customer, quantity, price, created) VALUES (1, 1, 2, 540.49,  NOW());
INSERT INTO purchases (stock, customer, quantity, price, created) VALUES (4, 2, 3, 44.35, NOW());

