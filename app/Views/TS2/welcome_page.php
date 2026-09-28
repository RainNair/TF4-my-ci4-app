<?= $this->include('TS2/header') ?>

<h2><?= esc($page_title) ?></h2>
<p><strong>Today's Date:</strong> <?= esc($today) ?></p>

<?php if (!empty($tasks)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Title</th>
                <th>Status</th>
                <th>Task Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['id']) ?></td>
                    <td><?= esc($task['title']) ?></td>
                    <td><span class="status <?= esc($task['status']) ?>"><?= esc(str_replace('_', ' ', $task['status'])) ?></span></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No tasks scheduled for today!</p>
<?php endif; ?>

</body>
</html>