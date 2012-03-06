SELECT productName, description, listPrice 
FROM products 
WHERE description LIKE '%electric%'
ORDER BY listPrice