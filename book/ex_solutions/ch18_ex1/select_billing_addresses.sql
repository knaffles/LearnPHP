SELECT firstName, lastName, line1, line2, city, state, zipCode
FROM customers c
   INNER JOIN addresses a
      ON c.billingAddressID = a.addressID
WHERE lastName = 'sherwood'