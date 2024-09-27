<?php

// Extraire les informations depuis l'URL
$dbopts = parse_url(getenv('ddb0g16nfr7a82'));

$host = $dbopts["clhtb6lu92mj2.cluster-czz5s0kz4scl.eu-west-1.rds.amazonaws.com"];
$db   = ltrim($dbopts["path"], '/');
$user = $dbopts["u8ut1p2g8ec5em"];
$pass = $dbopts["p2471cc826ad4d4f27dd1743e1c21593dcd42deb931f36b4740e931266602b07f"];
$port = $dbopts["5432"];
$charset = 'utf8mb4';

$dsn = "pgsql:host=$host;port=$port;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    echo "Connexion réussie à la base de données PostgreSQL !";
} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
}
?>


