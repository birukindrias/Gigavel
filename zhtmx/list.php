<?php
include '../db.php';
$tasks = $db->query("SELECT * FROM tasks ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?= htmlspecialchars($task['title']) ?>
            <button 
                hx-post="tasks/delete.php" 
                hx-vals='{"id": <?= $task["id"] ?>}' 
                hx-target="#task-list" 
                hx-swap="outerHTML">
                Delete
            </button>
        </li>
    <?php endforeach; ?>
</ul>
