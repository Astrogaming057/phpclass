CREATE TABLE race
(
    raceID          INT AUTO_INCREMENT,
    raceName        VARCHAR(75)  NULL,
    raceLocation    VARCHAR(255) NULL,
    raceDescription VARCHAR(255) NULL,
    raceDateTime    DATETIME     NULL,
    CONSTRAINT race_pk
        PRIMARY KEY (raceID)
);

INSERT INTO race (raceID, raceName, raceLocation, raceDescription, raceDateTime) VALUES
(1, 'Joe''s Haunted 5K', 'Appleton, WI', 'This is a fun race', '2030-10-31 13:00:00'),
(2, 'Bob''s 15k', 'Green Bay, WI', 'Beat Bob in his own race', '2024-12-25 12:00:00');
