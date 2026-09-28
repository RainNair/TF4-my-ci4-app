CREATE DATABASE IF NOT EXISTS tasks_db;
USE tasks_db;

CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  task_date DATE NOT NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);

-- Seed single demo user with updated email
INSERT INTO users (username, full_name, email, created_at) VALUES
('rainier_espino', 'Rainier Louis Espino', 're@gmail.com', NOW());

-- Seed 8 randomized tasks spanning multiple dates (past, today, future)
INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Sync with backend team regarding API endpoints', 'completed', DATE_SUB(CURDATE(), INTERVAL 3 DAY), NOW()),
('Perform automated database performance benchmark', 'pending', DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
('Debug memory leak in background job processor', 'in_progress', CURDATE(), NOW()),
('Audit third-party API rate limits and authentication keys', 'pending', CURDATE(), NOW()),
('Update CI/CD deployment pipelines for staging server', 'completed', CURDATE(), NOW()),
('Draft security vulnerability remediation plan', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW()),
('Optimize database index queries for high-traffic tables', 'in_progress', DATE_ADD(CURDATE(), INTERVAL 2 DAY), NOW()),
('Review pull requests for upcoming sprint release', 'pending', DATE_ADD(CURDATE(), INTERVAL 4 DAY), NOW());