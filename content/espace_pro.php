
<?php
session_start();
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin', 'vet', 'employee'])) {
    header('Location: ../pro_login.php');
    exit();
}

require '../php/db_config.php';

$error = '';
$success = '';

$reportsStmt = $pdo->prepare('SELECT * FROM veterinary_reports ORDER BY report_date DESC');
$reportsStmt->execute();
$reports = $reportsStmt->fetchAll();

$scheduleStmt = $pdo->prepare('SELECT * FROM schedule ORDER BY start_time ASC');
$scheduleStmt->execute();
$schedules = $scheduleStmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_report'])) {
    $animal_id = filter_input(INPUT_POST, 'animal_id', FILTER_VALIDATE_INT);
    $vet_id = filter_input(INPUT_POST, 'vet_id', FILTER_VALIDATE_INT);
    $report_date = $_POST['report_date'];
    $health_status = $_POST['health_status'];
    $food_provided = $_POST['food_provided'];
    $food_quantity = filter_input(INPUT_POST, 'food_quantity', FILTER_VALIDATE_INT);
    $visit_details = $_POST['visit_details'];

    if ($animal_id !== false && $vet_id !== false && $food_quantity !== false) {
        $stmt = $pdo->prepare('INSERT INTO veterinary_reports (animal_id, vet_id, report_date, health_status, food_provided, food_quantity, visit_details) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$animal_id, $vet_id, $report_date, $health_status, $food_provided, $food_quantity, $visit_details]);

        $success = 'Rapport ajouté avec succès.';
        header('Location: espace_pro.php');
        exit();
    } else {
        $error = 'Veuillez entrer des valeurs valides pour les champs ID Animal, ID Vétérinaire et Quantité de Nourriture.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_schedule'])) {
    $vet_id = filter_input(INPUT_POST, 'vet_id', FILTER_VALIDATE_INT);
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $description = $_POST['description'];

    if ($vet_id !== false) {
        $stmt = $pdo->prepare('INSERT INTO schedule (vet_id, start_time, end_time, description) VALUES (?, ?, ?, ?)');
        $stmt->execute([$vet_id, $start_time, $end_time, $description]);

        $success = 'Planning ajouté avec succès.';
        header('Location: espace_pro.php');
        exit();
    } else {
        $error = 'Veuillez entrer une valeur valide pour le champ ID Vétérinaire.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Professionnel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .form-container, .white-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        h1, h2, h3 {
            margin-bottom: 20px;
        }
        table {
            margin-top: 20px;
        }
        table th, table td {
            text-align: center;
        }
        #calendar {
            max-width: 1000px;
            margin: 0 auto;
            margin-top: 30px;
        }
        .fc-header-toolbar {
            display: flex;
            justify-content: center;
        }
        .fc-day-grid-event {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
        .fc-event {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Bienvenue dans l'Espace Professionnel</h1>
        <p class="text-center">Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>

        <div class="message">
            <?php if ($error): ?>
                <p class="text-danger"><?php echo $error; ?></p>
            <?php endif; ?>
            <?php if ($success): ?>
                <p class="text-success"><?php echo $success; ?></p>
            <?php endif; ?>
        </div>

        <div class="form-container">
            <h2>Rapports Vétérinaires</h2>
            <h3>Ajouter un Rapport Vétérinaire</h3>
            <form method="POST" action="espace_pro.php">
                <input type="hidden" name="add_report" value="1">
                <div class="form-group">
                    <label for="animal_id">ID Animal:</label>
                    <input type="text" class="form-control" id="animal_id" name="animal_id" required>
                </div>
                <div class="form-group">
                    <label for="vet_id">ID Vétérinaire:</label>
                    <input type="text" class="form-control" id="vet_id" name="vet_id" required>
                </div>
                <div class="form-group">
                    <label for="report_date">Date du Rapport:</label>
                    <input type="date" class="form-control" id="report_date" name="report_date" required>
                </div>
                <div class="form-group">
                    <label for="health_status">État de Santé:</label>
                    <textarea class="form-control" id="health_status" name="health_status" required></textarea>
                </div>
                <div class="form-group">
                    <label for="food_provided">Nourriture Fournie:</label>
                    <input type="text" class="form-control" id="food_provided" name="food_provided" required>
                </div>
                <div class="form-group">
                    <label for="food_quantity">Quantité de Nourriture:</label>
                    <input type="number" class="form-control" id="food_quantity" name="food_quantity" required>
                </div>
                <div class="form-group">
                    <label for="visit_details">Détails de la Visite:</label>
                    <textarea class="form-control" id="visit_details" name="visit_details" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

        <h2>Liste des Rapports Vétérinaires</h2>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>ID Animal</th>
                    <th>ID Vétérinaire</th>
                    <th>Date du Rapport</th>
                    <th>État de Santé</th>
                    <th>Nourriture Fournie</th>
                    <th>Quantité de Nourriture</th>
                    <th>Détails de la Visite</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report): ?>
                <tr>
                    <td><?php echo htmlspecialchars($report['id']); ?></td>
                    <td><?php echo htmlspecialchars($report['animal_id']); ?></td>
                    <td><?php echo htmlspecialchars($report['vet_id']); ?></td>
                    <td><?php echo htmlspecialchars($report['report_date']); ?></td>
                    <td><?php echo htmlspecialchars($report['health_status']); ?></td>
                    <td><?php echo htmlspecialchars($report['food_provided']); ?></td>
                    <td><?php echo htmlspecialchars($report['food_quantity']); ?></td>
                    <td><?php echo htmlspecialchars($report['visit_details']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="form-container">
            <h2>Calendrier des Plannings</h2>
            <h3>Ajouter un Planning</h3>
            <form method="POST" action="espace_pro.php">
                <input type="hidden" name="add_schedule" value="1">
                <div class="form-group">
                    <label for="vet_id">ID Vétérinaire:</label>
                    <input type="text" class="form-control" id="vet_id" name="vet_id" required>
                </div>
                <div class="form-group">
                    <label for="start_time">Heure de Début:</label>
                    <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
                </div>
                <div class="form-group">
                    <label for="end_time">Heure de Fin:</label>
                    <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

        <div id="calendar"></div>

        <div class="white-box">
            <h2>Informations Supplémentaires</h2>
            <p>Cette section peut contenir des informations supplémentaires ou des outils pour les professionnels.</p>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                <?php foreach ($schedules as $schedule): ?>
                {
                    title: '<?php echo htmlspecialchars($schedule['description']); ?>',
                    start: '<?php echo htmlspecialchars($schedule['start_time']); ?>',
                    end: '<?php echo htmlspecialchars($schedule['end_time']); ?>'
                },
                <?php endforeach; ?>
            ],
            height: 'auto',
            contentHeight: 400,
            aspectRatio: 1.5,
            eventRender: function(event, element) {
                element.css('background-color', '#007bff');
                element.css('border-color', '#007bff');
                element.css('color', '#fff');
            }
        });
    });
</script>
</body>
</html>

