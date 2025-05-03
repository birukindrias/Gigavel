<?php
include '../db.php';

$title = $_POST['title'] ?? '';
if ($title !== '') {
    $stmt = $db->prepare("INSERT INTO tasks (title) VALUES (:title)");
    $stmt->execute(['title' => $title]);
}

include 'list.php'; // Re-render list
