ALTER TABLE customers ADD 
middleInitials VARCHAR (3)
AFTER firstName;

ALTER TABLE customers MODIFY 
lastName VARCHAR(100) NOT NULL;
