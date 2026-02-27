-- ===============================
-- Crime Management System
-- Database Updates for Soft Delete
-- ===============================

-- Add status column to all tables for soft delete functionality
-- Run this SQL in phpMyAdmin after creating your database

-- Officers Table
ALTER TABLE officers 
ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

UPDATE officers SET status = 'active' WHERE status IS NULL;

-- Criminals Table
ALTER TABLE criminals 
ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

UPDATE criminals SET status = 'active' WHERE status IS NULL;

-- Victims Table
ALTER TABLE victims 
ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

UPDATE victims SET status = 'active' WHERE status IS NULL;

-- Cases Table
ALTER TABLE cases 
ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

UPDATE cases SET status = 'active' WHERE status IS NULL;

-- Police Station Table
ALTER TABLE police_station 
ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

UPDATE police_station SET status = 'active' WHERE status IS NULL;

-- Evidence Table
ALTER TABLE evidence 
ADD COLUMN IF NOT EXISTS status ENUM('active', 'inactive') DEFAULT 'active';

UPDATE evidence SET status = 'active' WHERE status IS NULL;

-- Note: crime_report table uses hard delete (no status column needed)

-- ===============================
-- Verification Queries
-- ===============================

-- Check if status columns were added successfully
SHOW COLUMNS FROM officers LIKE 'status';
SHOW COLUMNS FROM criminals LIKE 'status';
SHOW COLUMNS FROM victims LIKE 'status';
SHOW COLUMNS FROM cases LIKE 'status';
SHOW COLUMNS FROM police_station LIKE 'status';
SHOW COLUMNS FROM evidence LIKE 'status';

SELECT 'Database updates completed successfully!' AS message;
