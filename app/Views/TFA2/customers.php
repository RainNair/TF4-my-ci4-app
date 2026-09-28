<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts - TFA2</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Customer Accounts (TFA2)</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
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
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No customer records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>