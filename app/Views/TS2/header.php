<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($page_title ?? 'Tasks Management') ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f9f9f9; color: #333; }
        nav { background: #1e293b; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        nav a { color: #fff; text-decoration: none; margin-right: 15px; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 6px; overflow: hidden; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #3b82f6; color: white; }
        .status { padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
        .pending { background: #fef08a; color: #854d0e; }
        .in_progress { background: #bfdbfe; color: #1e40af; }
        .completed { background: #bbf7d0; color: #166534; }
        .card { background: #fff; padding: 20px; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); max-width: 500px; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Dashboard (Today)</a>
        <a href="<?= base_url('/tasks') ?>">All Tasks</a>
        <a href="<?= base_url('/profile') ?>">Profile</a>
        <a href="<?= base_url('/about') ?>">About</a>
    </nav>