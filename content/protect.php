<?php

require 'db_config.php';

$username = 'admin';
$password = password_hash('password123', PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    $stmt->execute(['username' => $username, 'password' => $password]);
    echo 'User added successfully!';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
