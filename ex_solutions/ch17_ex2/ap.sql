DROP DATABASE IF EXISTS ap;
CREATE DATABASE ap;
USE ap;

CREATE  TABLE IF NOT EXISTS vendors (
  vendorID       INT          NOT NULL  AUTO_INCREMENT,
  vendorName     VARCHAR(45)  NOT NULL  UNIQUE,
  vendorAddress  VARCHAR(45)  NOT NULL,
  vendorCity     VARCHAR(45)  NOT NULL,
  vendorState    VARCHAR(45)  NOT NULL,
  vendorZipCode  VARCHAR(10)  NOT NULL,
  vendorPhone    VARCHAR(20)  NOT NULL,
  PRIMARY KEY (vendorID) 
);

CREATE  TABLE IF NOT EXISTS invoices (
  invoiceID      INT          NOT NULL  AUTO_INCREMENT,
  vendorID       INT          NOT NULL,
  invoiceNumber  VARCHAR(45)  NOT NULL,
  invoiceDate    DATETIME     NOT NULL,
  invoiceTotal   DECIMAL      NOT NULL,
  paymentTotal   DECIMAL,
  PRIMARY KEY (invoiceID)
);

CREATE  TABLE IF NOT EXISTS lineItems (
  lineItemID     INT          NOT NULL  AUTO_INCREMENT,
  invoiceID      INT          NOT NULL,
  description    VARCHAR(45)  NOT NULL,
  quantity       INT          NOT NULL,
  price          INT          NOT NULL,
  lineItemTotal  DECIMAL      NOT NULL,
  PRIMARY KEY (lineItemID)
);

CREATE INDEX vendorID
ON invoices (vendorID);

CREATE INDEX invoiceNumber
ON invoices (invoiceNumber);

CREATE INDEX invoiceID
ON lineItems (invoiceID);

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO mgs_user
IDENTIFIED BY 'pa55word';
