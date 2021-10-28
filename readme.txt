Database schema:

Products (ProductID, Name, Price) // table of product details
ShippingMethods (ShippingID, ShippingPrice)

Cart (ProductID, Qty) // table of products in cart

Customers (CustomerID, FirstName, LastName, Email, Address, ApartmentSuite, PostalCode, City, PhoneNumber, ShippingID) // don't have to be in this sequence

Orders (OrderID, CustomerID, Amount, Date)
Order_Items(OrderID, ProductID, Qty)
