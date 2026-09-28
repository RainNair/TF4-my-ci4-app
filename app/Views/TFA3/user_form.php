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
        input[type="text"], input[type="file"] { width: 300px; padding: 8px; box-sizing: border-box; }
        .btn { padding: 8px 16px; background-color: #28a745; color: white; border: none; cursor: pointer; text-decoration: none; border-radius: 4px; }
        .btn-secondary { background-color: #6c757d; }
        .errors { background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .avatar-preview { width: 80px; height: 80px; object-fit: cover; border-radius: 50%; margin-bottom: 10px; display: block; }
    </style>
</head>
<body>

    <h2><?= esc($title) ?></h2>

    <?php if (isset($validation)): ?>
        <div class="errors">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Username *</label>
            <input type="text" name="username" id="username" value="<?= esc($user['username'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="full_name">Full Name *</label>
            <input type="text" name="full_name" id="full_name" value="<?= esc($user['full_name'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="avatar">Profile Avatar (JPG/PNG, Max 2MB)</label>
            <?php if (!empty($user['avatar']) && file_exists(FCPATH . 'uploads/avatars/' . $user['avatar'])): ?>
                <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="Current Avatar" class="avatar-preview">
            <?php endif; ?>
            <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg">
        </div>

        <button type="submit" class="btn">Save User</button>
        <a href="<?= base_url('tfa3/users') ?>" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>