-- Database setup for Natural Heal project
-- Run these commands in phpMyAdmin or MySQL command line

-- Create database
CREATE DATABASE IF NOT EXISTS `natural heal project`;

-- Use the database
USE `natural heal project`;

-- Create appointments table
CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    disease VARCHAR(100) NOT NULL,
    appointment_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some sample data (optional)
INSERT INTO appointments (name, email, phone, disease, appointment_date) VALUES
('John Doe', 'john@example.com', '1234567890', 'back pain', '2025-01-15'),
('Jane Smith', 'jane@example.com', '0987654321', 'migraine', '2025-01-16');
