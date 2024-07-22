<?php
require '../php/db_config.php';


$users = [
    ['username' => 'admin', 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'role' => 'admin'],
    ['username' => 'vet', 'password' => password_hash('vet123', PASSWORD_DEFAULT), 'role' => 'vet'],
    ['username' => 'employee', 'password' => password_hash('employee123', PASSWORD_DEFAULT), 'role' => 'employee']
];

foreach ($users as $user) {
    $stmt = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)
                           ON DUPLICATE KEY UPDATE password = VALUES(password), role = VALUES(role)');
    $stmt->execute([
        'username' => $user['username'],
        'password' => $user['password'],
        'role' => $user['role']
    ]);
}

echo "Utilisateurs ajoutés avec succès.";
?>
