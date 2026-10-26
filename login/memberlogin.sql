-- Your table has no memberID column. Run these next:

ALTER TABLE memberLogin
    ADD COLUMN memberID INT NOT NULL AUTO_INCREMENT UNIQUE KEY FIRST;

ALTER TABLE memberLogin
    ADD PRIMARY KEY (memberEmail);
