CREATE DATABASE IF NOT EXISTS student_management_system;

USE student_management_system;

CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    course VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    admission_date DATE
);

INSERT INTO students 
(first_name, last_name, gender, course, email, phone, admission_date)
VALUES
('Praveen', 'Patel', 'Male', 'BCA', 'praveen@example.com', '9876543210', '2026-08-01'),
('Rahul', 'Sharma', 'Male', 'BCA', 'rahul@example.com', '9876543211', '2026-08-02'),
('Sneha', 'Patel', 'Female', 'BCA', 'sneha@example.com', '9876543212', '2026-08-03');