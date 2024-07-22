<?php

require 'db_config.php';

try {
    $stmt = $pdo->query('SELECT comment FROM comments');
    $comments = $stmt->fetchAll();
    echo json_encode($comments);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
