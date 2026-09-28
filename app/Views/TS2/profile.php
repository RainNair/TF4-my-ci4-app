<?= $this->include('TS2/header') ?>

<h2><?= esc($page_title) ?></h2>

<?php if ($user): ?>
    <div class="card">
        <h3>User Info</h3>
        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
        <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <p><strong>Account Created:</strong> <?= esc($user['created_at']) ?></p>
    </div>
<?php else: ?>
    <p>User record not found.</p>
<?php endif; ?>

</body>
</html>