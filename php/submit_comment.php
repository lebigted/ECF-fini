<?php

require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : null;

    if ($username && $email && $comment) {
        try {
            $stmt = $pdo->prepare('INSERT INTO comments (username, email, comment) VALUES (:username, :email, :comment)');
            $stmt->execute(['username' => $username, 'email' => $email, 'comment' => $comment]);
            echo 'Comment submitted successfully!';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo 'Please provide a username, email, and comment.';
    }
}
?>
