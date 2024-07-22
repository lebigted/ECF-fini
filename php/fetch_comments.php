<?php

require 'db_config.php';

try {
    $stmt = $pdo->query('SELECT username, email, comment FROM comments');
    $comments = $stmt->fetchAll();

    foreach ($comments as $comment) {
        echo '<div class="comment">';
        echo '<strong>' . htmlspecialchars($comment['username']) . '</strong> (' . htmlspecialchars($comment['email']) . ')';
        echo '<p>' . htmlspecialchars($comment['comment']) . '</p>';
        echo '</div>';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
