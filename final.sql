DROP DATABASE IF EXISTS finaldb;

CREATE DATABASE finaldb;

USE finaldb;

CREATE TABLE auth /*userid, username, password, firstName, lastName, email, phone*/
(
   userid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   username varchar(60),
   password varchar(60),
   firstName varchar(60),
   lastName varchar(60),
   email varchar(60),
   phone varchar(60)
);


INSERT INTO auth (username, password, firstName, lastName, email, phone) VALUES ('hkw', 'pw123', 'Hayden', 'Wilcoox', 'hayden.wilcoox.2@gmail.com', '555-200-3000');
INSERT INTO auth (username, password, firstName, lastName, email, phone) VALUES ('dms', 'pw456', 'Devansh', "Sangvhi", 'devansh.sangvhi.747@gmail.com', '555-400-5000');
INSERT INTO auth (username, password, firstName, lastName, email, phone) VALUES ('ptb', 'pw789', 'Tan', 'Babakhanlou', 'tan.babakhanlou@gmail.com', '555-430-3338');
----