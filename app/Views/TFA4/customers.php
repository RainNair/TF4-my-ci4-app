<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts - TFA3</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn { display: inline-block; padding: 6px 12px; margin-bottom: 10px; text-decoration: none; border-radius: 4px; color: white; font-size: 14px; }
        .btn-primary { background-color: #007bff; }
        .btn-warning { background-color: #ffc107; color: #000; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .alert-success { background-color: #d4edda; color: #155724; }
    </style>
</head>
<body>

    <h2>Customer Accounts (TFA3)</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <a href="<?= base_url('tfa3/customers/new') ?>" class="btn btn-primary">+ Add New Customer</a>

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
            <?php if (!empty($customers) && is_array($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['id']) ?></td>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                        <td><?= esc($customer['created_at']) ?></td>
                        <td>
                            <a href="<?= base_url('tfa3/customers/edit/' . $customer['id']) ?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No customer records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>