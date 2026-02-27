-- Add status columns to all tables for soft delete functionality
-- Run this SQL in phpMyAdmin or MySQL command line

USE crime_management;

-- Add status column to officers table
ALTER TABLE officers ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

-- Add status column to criminals table
ALTER TABLE criminals ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

-- Add status column to victims table
ALTER TABLE victims ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

-- Add status column to cases table
ALTER TABLE cases ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

-- Add status column to police_station table
ALTER TABLE police_station ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

-- Add status column to evidence table
ALTER TABLE evidence ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

-- Update existing records to active
UPDATE officers SET status = 'active' WHERE status IS NULL;
UPDATE criminals SET status = 'active' WHERE status IS NULL;
UPDATE victims SET status = 'active' WHERE status IS NULL;
UPDATE cases SET status = 'active' WHERE status IS NULL;
UPDATE police_station SET status = 'active' WHERE status IS NULL;
UPDATE evidence SET status = 'active' WHERE status IS NULL;
