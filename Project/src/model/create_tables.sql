CREATE TABLE Users (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    address varchar(255) NOT NULL,
    username varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL
);

CREATE TABLE Products (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    name varchar(255) NOT NULL,
    price float NOT NULL,
    category varchar(255) NOT NULL,
    stock int NOT NULL,
    img_url varchar(255) NOT NULL
);