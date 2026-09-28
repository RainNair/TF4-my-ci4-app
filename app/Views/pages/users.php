<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h1><?= esc($heading) ?></h1>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a> | 
        <a href="<?= base_url('about') ?>">About</a> | 
        <a href="<?= base_url('customers') ?>">Customer Accounts</a> | 
        <a href="<?= base_url('users') ?>">User Accounts</a>
    </nav>
</body>
</html>