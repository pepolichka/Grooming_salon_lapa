-- Перед выполнением этого файла создайте базу данных отдельно:
-- CREATE DATABASE grooming_db;

CREATE TABLE IF NOT EXISTS appointments (
    id SERIAL PRIMARY KEY,
    owner_name VARCHAR(100) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    pet_name VARCHAR(100) NOT NULL,
    pet_type VARCHAR(30) NOT NULL,
    breed VARCHAR(100),
    service VARCHAR(150) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    comment TEXT,
    privacy_agreement BOOLEAN NOT NULL DEFAULT false,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
