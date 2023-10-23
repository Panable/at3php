Drop Table if exists menu;
Drop Table if exists Employees;
Drop Table if exists OnlineBookings;
Drop Table if exists Orders;
Drop Table if exists OrderItems;

CREATE TABLE menu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    photo VARCHAR(255)
);

CREATE TABLE Employees (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name NVARCHAR(100),
    Email NVARCHAR(100),
    Position NVARCHAR(50),
    Password NVARCHAR(255)
);

CREATE TABLE OnlineBookings (
    Phone_Number NVARCHAR(255) PRIMARY KEY,
    Time TIME,
    Date DATE,
    Guests INT
);

CREATE TABLE Orders (
    OrderID INT PRIMARY KEY AUTO_INCREMENT,
    TableNumber INT
);

CREATE TABLE OrderItems (
    OrderItemID INT PRIMARY KEY AUTO_INCREMENT,
    OrderID INT,
    ItemID INT
);

INSERT INTO Orders (OrderID, TableNumber)
VALUES
    (1001, NULL),
    (1002, NULL),
    (1003, NULL),
    (1004, NULL),
    (1005, NULL);

INSERT INTO OrderItems (OrderID, ItemID)
VALUES
    (1001, 101),
    (1001, 102),
    (1001, 105),
    (1002, 103),
    (1002, 104),
    (1003, 101),
    (1003, 105),
    (1003, 106),
    (1004, 102),
    (1004, 104),
    (1004, 107),
    (1005, 103),
    (1005, 106),
    (1005, 108);



INSERT INTO OnlineBookings (Phone_Number, Time, Date, Guests)
VALUES
    ('1234567890', '09:00:00', '2023-08-28', 2),
    ('9876543210', '14:30:00', '2023-08-29', 4),
    ('5555555555', '18:45:00', '2023-08-30', 6),
    ('7777777777', '12:15:00', '2023-08-31', 3),
    ('8888888888', '20:00:00', '2023-09-01', 5);

INSERT INTO Employees (ID, Name, Email, Position, Password)
VALUES
    (1, 'John Smith', 'john.smith@email.com', 'Manager', '$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26'),
    (2, 'Jane Doe', 'jane.doe@email.com', 'Employee','$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26'), 
    (3, 'Alice Brown', 'alice.brown@email.com', 'Employee','$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26'), 
    (4, 'Bob Johnson', 'bob.johnson@email.com', 'Manager', '$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26'),
    (5, 'Sarah White', 'sarah.white@email.com', 'Employee', '$2y$10$1OAFWaT4q15YZis.b380KukWaMTe/CBQZTcELNw6FkNS1yvCx6z26');

INSERT INTO menu (name, price, description, photo)
VALUES
    ('Cappuccino', 4.99, 'A classic Italian coffee', 'images/cappuccino.jpg'),
    ('Espresso', 3.49, 'Strong and concentrated', 'images/espresso.jpg'),
    ('Latte', 5.49, 'Creamy and mild', 'images/latte.jpg'),
    ('Americano', 4.29, 'Diluted espresso', 'images/americano.jpg'),
    ('Mocha', 5.99, 'Coffee and chocolate', 'images/mocha.jpg'),
    ('Macchiato', 4.79, 'Espresso with a dash of milk', 'images/macchiato.jpg'),
    ('Caffe Ristretto', 4.79, 'Short and strong espresso', 'images/ristretto.jpg'),
    ('Iced Coffee', 4.99, 'Chilled coffee with ice', 'images/iced_coffee.jpg'),
    ('Hot Chocolate', 4.99, 'Rich and chocolaty', 'images/hot_chocolate.jpg'),
    ('Green Tea Latte', 4.49, 'Matcha and steamed milk', 'images/green_tea_latte.jpg'),
    ('Chai Latte', 4.49, 'Spiced tea with milk', 'images/chai_latte.jpg'),
    ('Caramel Macchiato', 5.49, 'Caramel, espresso, and milk', 'images/caramel_macchiato.jpg'),
    ('Tea', 3.99, 'Assorted tea flavors', 'images/tea.jpg'),
    ('Lemonade', 3.99, 'Refreshing lemon drink', 'images/lemonade.jpg'),
    ('Orange Juice', 3.49, 'Freshly squeezed', 'images/orange_juice.jpg'),
    ('Cheeseburger', 7.99, 'Classic beef burger with cheese', 'images/cheeseburger.jpg'),
    ('Veggie Wrap', 6.49, 'Grilled vegetables in a wrap', 'images/veggie_wrap.jpg'),
    ('Caesar Salad', 8.99, 'Romaine lettuce, croutons, and Caesar dressing', 'images/caesar_salad.jpg'),
    ('Margherita Pizza', 10.99, 'Tomato, mozzarella, and basil on thin crust', 'images/margherita_pizza.jpg'),
    ('Spaghetti Bolognese', 9.49, 'Spaghetti with meat sauce', 'images/spaghetti_bolognese.jpg'),
    ('Sushi Platter', 14.99, 'Assorted sushi rolls', 'images/sushi_platter.jpg'),
    ('Chicken Tenders', 6.99, 'Breaded chicken tenders', 'images/chicken_tenders.jpg'),
    ('French Fries', 3.99, 'Crispy golden fries', 'images/french_fries.jpg');