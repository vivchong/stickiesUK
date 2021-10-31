Database schema:

Products (ProductID, ProductName, Price, Category, onSale) // table of product details
ShippingMethods (ShippingID, ShippingPrice)

Cart (ProductID, Qty) // table of products in cart

CustomerInfo (CustomerID, FirstName, LastName, Email, Address, ApartmentSuite, PostalCode, City, PhoneNumber, ShippingID) // don't have to be in this sequence

Orders (OrderID, CustomerID, Amount, Date)
Order_Items(OrderID, ProductID, Qty)

Inventory (ProductID, inStock)

----

At the end, after confirming order, need to deduct Qty sold from Stock in Inventory table.