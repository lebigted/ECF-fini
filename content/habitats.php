<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitats et Animaux</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .habitat {
            margin-bottom: 40px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .habitat:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .habitat img {
            max-width: 100%;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        .animal {
            margin-bottom: 20px;
        }
        .animal img {
            max-width: 100%;
            border-radius: 15px;
            margin-bottom: 10px;
        }
        .veterinaire {
            margin-top: 10px;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 10px;
        }
        .veterinaire h5 {
            font-size: 1.1rem;
            color: #28a745;
        }
        .section-title {
            font-size: 2.5rem;
            color: #28a745;
            text-align: center;
            margin-bottom: 40px;
        }
        .section-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
    </style>
</head>
<body>
    <section id="habitats" class="mb-5">
        <h2 class="section-title">Nos Habitats</h2>
        <div class="section-content">
            <!-- Habitat Savane -->
            <div class="habitat">
                <h3>Savane</h3>
                <img src="images/savane.gi" alt="Savane">
                <p>La savane est un vaste écosystème caractérisé par des prairies ouvertes et des arbres épars, abritant une grande variété de faune sauvage.</p>
                <div class="animal">
                    <h4>Simba (Lion)</h4>
                    <img src="images/lion.gif" alt="Lion">
                    <p><strong>Habitat:</strong> Savane</p>
                    <div class="veterinaire">
                        <h5>Vétérinaire</h5>
                        <p><strong>État:</strong> En bonne santé</p>
                        <p><strong>Nourriture proposée:</strong> Viande</p>
                        <p><strong>Grammage de la nourriture:</strong> 5 kg</p>
                        <p><strong>Date de passage:</strong> 2023-07-21</p>
                        <p><strong>Détail de l'état de l'animal:</strong> Aucun problème détecté</p>
                    </div>
                </div>
            </div>

            <!-- Habitat Jungle -->
            <div class="habitat">
                <h3>Jungle</h3>
                <img src="images/jungle.gif" alt="Jungle">
                <p>La jungle est une forêt dense et luxuriante, remplie de végétation épaisse et de diverses espèces animales.</p>
                <div class="animal">
                    <h4>Kaa (Serpent)</h4>
                    <img src="images/serpent.gif" alt="Serpent">
                    <p><strong>Habitat:</strong> Jungle</p>
                    <div class="veterinaire">
                        <h5>Vétérinaire</h5>
                        <p><strong>État:</strong> Bonne condition</p>
                        <p><strong>Nourriture proposée:</strong> Souris</p>
                        <p><strong>Grammage de la nourriture:</strong> 500 g</p>
                        <p><strong>Date de passage:</strong> 2023-07-20</p>
                        <p><strong>Détail de l'état de l'animal:</strong> Surveiller la digestion</p>
                    </div>
                </div>
            </div>

            <!-- Habitat Marais -->
            <div class="habitat">
                <h3>Marais</h3>
                <img src="images/crocodile.gif" alt="Marais">
                <p>Les marais sont des zones humides où l'eau est présente en surface ou près de la surface pendant une grande partie de l'année.</p>
                <div class="animal">
                    <p><strong>Habitat:</strong> Marais</p>
                    <h4>luc (crocodile)</h4>
                    <div class="veterinaire">
                        <h5>Vétérinaire</h5>
                        <p><strong>État:</strong> Sain</p>
                        <p><strong>Nourriture proposée:</strong> Poisson</p>
                        <p><strong>Grammage de la nourriture:</strong> 3 kg</p>
                        <p><strong>Date de passage:</strong> 2023-07-22</p>
                        <p><strong>Détail de l'état de l'animal:</strong> Bonne croissance</p>
                    </div>
                </div>
            </div>

            <!-- Habitat Antarctique -->
            <div class="habitat">
                <h3>Antarctique</h3>
                <img src="images/antarctique.gif" alt="Antarctique">
                <p>L'Antarctique est un habitat polaire caractérisé par ses températures glaciales et ses vastes étendues de glace.</p>
                <div class="animal">
                    <p><strong>Habitat:</strong> Antarctique</p>
                    <div class="veterinaire">
                    <h4>jimmy (manchot)</h4>
                        <h5>Vétérinaire</h5>
                        <p><strong>État:</strong> En pleine forme</p>
                        <p><strong>Nourriture proposée:</strong> Poisson</p>
                        <p><strong>Grammage de la nourriture:</strong> 2 kg</p>
                        <p><strong>Date de passage:</strong> 2023-07-19</p>
                        <p><strong>Détail de l'état de l'animal:</strong> Aucune remarque</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
