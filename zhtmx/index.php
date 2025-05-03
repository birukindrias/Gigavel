<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task CRUD</title>
    <script src="https://unpkg.com/htmx.org@1.9.5"></script>
</head>
<body>
    <h1>Task Manager</h1>

    <div id="task-form" hx-get="/form.php" hx-trigger="load"></div>
    <div id="task-list" hx-get="/list.php" hx-trigger="load"></div>
</body>
</html>
