<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - TFA3</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"] { width: 300px; padding: 8px; box-sizing: border-box; }
        .btn { padding: 8px 16px; background-color: #007bff; color: white; border: none; cursor: pointer; text-decoration: none; border-radius: 4px; }
        .btn-secondary { background-color: #6c757d; }
        .errors { background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
    </style>
</head>
<body>

    <h2><?= esc($title) ?></h2>

    <?php if (isset($validation)): ?>
        <div class="errors">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= $action ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="full_name">Full Name *</label>
            <input type="text" name="full_name" id="full_name" value="<?= esc($customer['full_name'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" id="email" value="<?= esc($customer['email'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="<?= esc($customer['phone'] ?? '') ?>">
        </div>

        <button type="submit" class="btn">Save Customer</button>
        <a href="<?= base_url('tfa3/customers') ?>" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>