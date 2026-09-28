<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h1><?= esc($heading) ?></h1>

    <p>Welcome to our basic Point-of-Sale (POS) system. This application is built using the CodeIgniter 4 framework, following the Model-View-Controller (MVC) architectural pattern.</p>
    
    <p>Current features include:</p>
    <ul>
        <li>Static routing and controller methods for core pages</li>
        <li>Dynamic data passing from controllers to views</li>
        <li>Temporary static arrays simulating customer and user records</li>
    </ul>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a> | 
        <a href="<?= base_url('about') ?>">About</a> | 
        <a href="<?= base_url('customers') ?>">Customer Accounts</a> | 
        <a href="<?= base_url('users') ?>">User Accounts</a>
    </nav>
</body>
</html>