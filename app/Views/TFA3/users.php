<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts - TFA3</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; vertical-align: middle; }
        th { background-color: #28a745; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .avatar-img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border: 1px solid #ccc; }
        .btn { display: inline-block; padding: 6px 12px; margin-bottom: 10px; text-decoration: none; border-radius: 4px; color: white; font-size: 14px; }
        .btn-success { background-color: #28a745; }
        .btn-warning { background-color: #ffc107; color: #000; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .alert-success { background-color: #d4edda; color: #155724; }
    </style>
</head>
<body>

    <h2>User Accounts (TFA3)</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <a href="<?= base_url('tfa3/users/new') ?>" class="btn btn-success">+ Add New User</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td>
                            <?php 
                                $avatarPath = !empty($user['avatar']) && file_exists(FCPATH . 'uploads/avatars/' . $user['avatar']) 
                                    ? base_url('uploads/avatars/' . $user['avatar']) 
                                    : base_url('uploads/avatars/placeholder.png');
                            ?>
                            <img src="<?= $avatarPath ?>" alt="Avatar" class="avatar-img">
                        </td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><?= esc($user['created_at']) ?></td>
                        <td>
                            <a href="<?= base_url('tfa3/users/edit/' . $user['id']) ?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No user records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>