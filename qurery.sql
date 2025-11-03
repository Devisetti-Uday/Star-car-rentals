CREATE DATABASE rental;
USE rental;

CREATE TABLE cars (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pic VARCHAR(50);
  name VARCHAR(15) NOT NULL,
  model VARCHAR(10),
  seater INT,
  price DECIMAL(10,2),
  available INT DEFAULT 0
);

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20),
  phone VARCHAR(10),
  email VARCHAR(25),
  carid INT,
  start_date DATE,
  end_date DATE,
  FOREIGN KEY (carid) REFERENCES cars(id)
);

INSERT INTO `cars` (`id`, `pic`, `name`, `model`, `seater`, `price`) VALUES
(1, 'images/swift.jpg', 'MARUTHI SUZUKI', 'swift', 4, 1199.00),
(2, 'images/ertiga.jpg', 'MARUTHI SUZUKI', 'ertiga', 8, 1899.00),
(3, 'images/bmwx1.jpg', 'BMW', 'X1', 4, 7499.00),
(4, 'images/isuzu.jpg', 'ISUZU', 'mux', 7, 2999.00),
(5, 'images/city.jpg', 'HONDA', 'city', 5, 1799.00),
(6, 'images/innova.jpg', 'TOYOTA', 'innova', 8, 2399.00),
(7, 'images/benz.jpg', 'MERCEDES-BENZ', 'C-class', 4, 7999.00),
(8, 'images/audi.jpg', 'AUDI', 'Q3', 4, 7999.00),
(9, 'images/kiger.jpg', 'RENAULT', 'kiger', 5, 1999.00);