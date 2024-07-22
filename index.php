<?php

include 'auth.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arche Verte</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
include 'header.php';
?>

<main>
    <?php
    switch ($page) {
        case 'home':
            include 'content/home.php';
            break;
        case 'services':
            include 'content/services.php';
            break;
        case 'habitats':
            include 'content/habitats.php';
            break;
        case 'avis':
            include 'content/avis.php';
            break;
        case 'pro_login':
            include 'content/login.php';
            break;
        case 'disconnect':
            include 'content/logout.php';
            break;
        default:
            include 'content/home.php';
    }
    ?>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
