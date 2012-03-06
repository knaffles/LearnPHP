SELECT COUNT(*) as productCount
FROM products
WHERE categoryID = (SELECT categoryID FROM categories WHERE categoryName = 'Guitars')