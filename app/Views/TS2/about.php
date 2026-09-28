<?= $this->include('TS2/header') ?>

<h2><?= esc($page_title) ?></h2>

<div class="card">
    <h3>Developer Profile</h3>
    <p><strong>Developer:</strong> <?= esc($developer['name']) ?></p>
    <p><strong>Section:</strong> <?= esc($developer['section']) ?></p>
    <p><strong>Course:</strong> <?= esc($developer['course']) ?></p>
    <hr>
</div>

</body>
</html>