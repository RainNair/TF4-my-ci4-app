<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #cccccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #006633;
            color: white;
        }

        .price {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1><?= esc($title) ?></h1>

    <?php if ($products !== []): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= esc($product['id']) ?></td>
                        <td><?= esc($product['name']) ?></td>
                        <td><?= esc($product['description']) ?></td>
                        <td class="price">
                            ₱<?= number_format((float) $product['price'], 2) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No products were found.</p>
    <?php endif ?>

    <p>
        <a href="<?= base_url('/') ?>">Return to Home</a>
    </p>
</body>
</html>