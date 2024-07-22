<?php
// test_connexion.php

require 'db_config.php';

try {
    $stmt = $pdo->query('SELECT 1');
    echo 'Connection successful!';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
