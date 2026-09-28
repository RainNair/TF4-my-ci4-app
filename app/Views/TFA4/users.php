<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts (TFA3)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f8f9fa; }
        .container { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.08); }
        .btn { padding: 8px 14px; text-decoration: none; border-radius: 4px; color: white; display: inline-block; font-weight: 500; }
        .btn-primary { background-color: #007bff; }
        .btn-warning { background-color: #ffc107; color: #212529; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #dee2e6; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn-login-tfa4 {
            background-color: #28a745;
            color: white !important;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-login-tfa4:hover { background-color: #218838; }
    </style>
</head>
<body>

<div class="container">
    <!-- Top Navigation with Login Button -->
    <div style="display: flex; justify-content: space-between; align-items: center; background: #e9ecef; padding: 12px 20px; border-radius: 6px; margin-bottom: 20px; border-left: 5px solid #007bff;">
        <div>
            <strong style="font-size: 16px;">POS Module</strong> 
            <span style="background: #007bff; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; margin-left: 8px;">TFA3 (Public)</span>
        </div>
        <div style="display: flex; align-items: center; gap: 15px;">
            <a href="<?= base_url('TFA3/customers') ?>" style="text-decoration: none; color: #333; font-weight: 500;">Customers</a>
            <a href="<?= base_url('TFA3/users') ?>" style="text-decoration: none; color: #333; font-weight: 500;">Users</a>
            
            <!-- Login Button Redirecting to TFA4 -->
            <a href="<?= base_url('TFA4/login') ?>" class="btn-login-tfa4">
                🔒 Login to TFA4
            </a>
        </div>
    </div>

    <h2>Customer Accounts (TFA3)</h2>

    <a href="<?= base_url('TFA3/customers/new') ?>" class="btn btn-primary">+ Add New Customer</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $customer['id'] ?></td>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
                <td><?= $customer['created_at'] ?></td>
                <td>
                    <a href="<?= base_url('TFA3/customers/edit/' . $customer['id']) ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>