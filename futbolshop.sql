CREATE DATABASE futbolshop;

USE futbolshop;

CREATE TABLE categories(
    CategoriesID INT AUTO_INCREMENT,
    CategoriesName VARCHAR(50) NOT NULL,
    PRIMARY KEY (CategoriesID)
);

CREATE TABLE suppliers(
    SuppliersID INT AUTO_INCREMENT,
    SuppliersName VARCHAR(100) NOT NULL,
    PRIMARY KEY (SuppliersID)
);

CREATE TABLE products(
    ProductID INT AUTO_INCREMENT,
    ProductName VARCHAR(50) NOT NULL,
    ProductPrice INT(20) NOT NULL,
    ProductDescription VARCHAR(250),
    ProductImage VARCHAR(350),
    ProductQty INT(3) NOT NULL,
    ProductDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CategoriesID INT NOT NULL,
    SuppliersID INT NOT NULL,
    PRIMARY KEY (ProductID)
);

CREATE TABLE userstatus(
    StatusID INT AUTO_INCREMENT,
    StatusCode VARCHAR(50) NOT NULL,
    PRIMARY KEY (StatusID)
);

CREATE TABLE customers(
    CustomerID      INT AUTO_INCREMENT,
    email           VARCHAR(50) NOT NULL UNIQUE,
    password        VARCHAR(100) NOT NULL,
    first_name      VARCHAR(100) NOT NULL,
    last_name       VARCHAR(100),
    birthdate       DATE,
    phone_number    VARCHAR(20),
    gender          VARCHAR(20),
    address         VARCHAR(300),
    AccessID INT NOT NULL DEFAULT 1,
    StatusID INT NOT NULL DEFAULT 1,
    PRIMARY KEY(CustomerID),
    FOREIGN KEY(StatusID) REFERENCES userStatus(StatusID)
);

CREATE TABLE admins(
    AdminID INT AUTO_INCREMENT,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(100) NOT NULL,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50),
    AccessID INT NOT NULL DEFAULT 2,
    StatusID INT NOT NULL DEFAULT 1,
    LevelID INT NOT NULL DEFAULT 2,
    PRIMARY KEY (AdminID)
);

CREATE TABLE adminlevels(
    LevelID INT AUTO_INCREMENT,
    LevelCode VARCHAR(50) NOT NULL,
    PRIMARY KEY (LevelID) 
);

CREATE TABLE transactions(
    TransactionID   INT AUTO_INCREMENT,
    CustomerID      INT NOT NULL,
    transactionValue    INT,
    transactionDate     DATE,
    paymentMethod       VARCHAR(100),
    transactionStatus   VARCHAR(50) NOT NULL,
    transactionReceipt  VARCHAR(100),
    PRIMARY KEY (TransactionID)
);

CREATE TABLE orders(
    TransactionID   INT NOT NULL,  
    ProductID       INT NOT NULL,
    ProductQty      INT
);

INSERT INTO adminlevels (LevelCode)
VALUES ('Super Admin'),
        ('Admin');

INSERT INTO userstatus (StatusCode)
VALUES ('Active'),
        ('Not Active');

INSERT INTO admins (Email, Password, FirstName, LastName, AccessID, StatusID, LevelID)
VALUES ('admin@admin.com', '$2y$10$DgBqn4qf7r5Sx8DCzwC9zOnXYRBwub/gtoEdjk6mZgfOQMfvbgGTu', 'admin', '', 2, 1, 1),
        ('admin1@admin.com', '$2y$10$DgBqn4qf7r5Sx8DCzwC9zOnXYRBwub/gtoEdjk6mZgfOQMfvbgGTu', 'admin', '', 2, 1, 2);

INSERT INTO categories (CategoriesName)
VALUES ('Shoes'),
        ('Jersey'),
        ('Ball');

INSERT INTO suppliers (SuppliersName)
VALUES ('Adidas'),
        ('Nike');

INSERT INTO products (ProductName, ProductPrice, ProductDescription, ProductImage, ProductQty, ProductDate, CategoriesID, SuppliersID)
VALUES ('Barcelona Home Kit', 1200000, 'Bacelona Home Kit 2018/2019', 'barca.jpg', 5, NOW(), 2, 2),
        ('Real Madrid Home Kit', 1150000, 'Real Madrid Home Kit 2018/2019', 'rmadrid.jpg', 5, NOW(), 2, 2),
        ('Arsenal Home Kit', 1152000, 'Arsenal Home Kit 2018/2019', 'arsenal.jpg', 5, NOW(), 2, 2),
        ('AC Milan Home Kit', 1150000, 'AC Milan Home Kit 2018/2019', 'acmilan.jpg', 5, NOW(), 2, 2),
        ('Bayern Munich Home Kit', 1750000, 'Bayern Munich Home Kit 2018/2019', 'bayern.jpg', 5, NOW(), 2, 2),
        ('Chelsea Home Kit', 1300000, 'Chelsea Home Kit 2018/2019', 'chelsea.jpg', 5, NOW(), 2, 2),
        ('Manchester United Home Kit', 1500000, 'Manchester United Home Kit 2018/2019', 'mu.jpg', 5, NOW(), 2, 2),
        ('Manchester City Home Kit', 1950000, 'Macnhester City Home Kit 2018/2019', 'mcity.jpg', 5, NOW(), 2, 2),
        ('Paris Saint Germain Home Kit', 2150000, 'Paris Saint Germain Home Kit 2018/2019', 'psg.jpg', 5, NOW(), 2, 2),
        ('AS Roma Home Kit', 3150000, 'AS Roma Home Kit 2018/2019', 'roma.jpg', 5, NOW(), 2, 2),
        ('Dortmund Home Kit', 1000000, 'Dortmund Home Kit 2018/2019', 'dortmund.jpg', 5, NOW(), 2, 2),
        ('JR Phantom', 1500000, 'Nike JR Phantom', 'jr_phantom.jpg', 7, NOW(), 1, 2),
        ('JR Vapor', 1300000, 'JR Vapor', 'jr_vapor.jpg', 3, NOW(), 1, 2),
        ('Legend Tiempo', 2000000, 'Legend Tiempo', 'legend.jpg', 2, NOW(), 1, 2),
        ('Phantom VSN Academy', 1700000, 'Phantom VSN Academy', 'phantom_vsn_academy.jpg', 8, NOW(), 1, 2),
        ('Superfly', 1500000, 'Superfly', 'superfly.jpg', 3, NOW(), 1, 2),
        ('Adidas Glider 2 Ball', 400000, 'Adidas Glider 2 Ball', 'adidas_glider_2_ball.jpg', 11, NOW(), 3, 1),
        ('Context 19 European Quilifiers', 550000, 'Context 19 European Quilifiers', 'context_19_european_quilifiers.jpg', 15, NOW(), 3, 1),
        ('UCL Final 2019', 850000, 'Adidas UCL Final 2018/2019', 'ucl_final_2019.jpg', 12, NOW(), 3, 1),
        ('Context 19 Top Training Ball', 500000, 'Context 19 Top Training Ball', 'context_19_top_training_ball.jpg', 15, NOW(), 3, 1),
        ('MLS Capitano Ball', 450000, 'MLS Capitano Ball', 'mls_capitano_ball.jpg', 11, NOW(), 3, 1),
        ('UCL Final Madrid Capitano Ball', 750000, 'UCL Final Madrid Capitano Ball', 'ucl_final_madrid_capitano_ball.jpg', 8, NOW(), 3, 1);


INSERT INTO transactions(CustomerID, transactionValue, transactionDate, transactionStatus)
VALUES (1, 3502000, now(), "PENDING");

INSERT INTO orders(TransactionID, ProductID, ProductQty)
VALUES (1, 1, 1), 
(1,2,1),
(1,3,1);


