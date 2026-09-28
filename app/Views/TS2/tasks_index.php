<?= $this->include('TS2/header') ?>

<h2><?= esc($page_title) ?></h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Task Title</th>
            <th>Status</th>
            <th>Task Date</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['id']) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><span class="status <?= esc($task['status']) ?>"><?= esc(str_replace('_', ' ', $task['status'])) ?></span></td>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= esc($task['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>