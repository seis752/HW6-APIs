CREATE TABLE `seis752john_db`.`Users` (
`ID` INT NOT NULL AUTO_INCREMENT ,
`UserNames` VARCHAR( 60 ) NOT NULL ,
`Passwords` VARCHAR( 60 ) NOT NULL ,
PRIMARY KEY ( `ID` )
) ENGINE = MYISAM ;

CREATE TABLE `seis752john_db`.`Messages` (
`ID` INT NOT NULL ,
`senderID` INT( 11 ) NOT NULL ,
`message` VARCHAR( 180 ) NOT NULL ,
`timeStamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`receiverID` INT( 11 ) NOT NULL ,
) ENGINE = MYISAM ;

CREATE TABLE `seis752john_db`.`Relationships` (
`userIDs` INT NOT NULL ,
`friendIDs` INT NOT NULL
) ENGINE = MYISAM ;

INSERT INTO Users(UserNames, Passwords)
VALUES('sue@gmail.com','AWD')
('joe@yahoo.com','WD40'),
('ted@gmail.com','QWE'),
('Bob@hotmail.com','BBB'),
('Pat@hotmail.com','PPP'),
('Cal@yahoo.com','CCC'),
('Tim@yahoo.com','TTT'),
('Hal@gmail.com','HHH'),
('Jean@gmail.com','JJJ');

INSERT INTO Messages( senderID, message,  receiverID)
VALUES ( 1,'test message two', 2 ),
            ( 1,'Hello from Wis',3 ),
            ( 2,'Hello from TX',1 ),
            ( 3,'Hello from SD',2 ),
            ( 1,'test message one',2 ),
            ( 1,'test message two',2 ),
            ( 1,'hello joe, from sue',2 ),
            ( 1,'Sue to Ted Message 10',3 );

 
INSERT INTO Relationships(userIDs, friendIDs) 
 VALUES(1, 2),
                (1, 3),
                (2, 3),
                (3, 2),
                (3, 4),
                (3, 5),
                (3, 6),
                (4, 3);
