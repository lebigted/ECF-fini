<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Services - Arche Verte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section id="services" class="mb-5">
            <h2 class="section-title">Nos Services</h2>
            <div class="section-content">
                <!-- Restauration -->
                <div class="service-card">
                    <h3>Restauration</h3>
                    <img src="images/menu.png" alt="Menu de Restauration">
                    <p>Découvrez notre menu de restauration offrant une variété de plats pour tous les goûts.</p>
                    <a href="#restauration" class="service-link">En savoir plus</a>
                    <div class="service-details hidden" id="restauration">
                        <h4>Menu de Restauration</h4>
                        <ul>
                            <li>Plats végétariens et véganes</li>
                            <li>Plats de viande et de poisson</li>
                            <li>Snacks et desserts</li>
                            <li>Boissons chaudes et froides</li>
                        </ul>
                        <p>Nos plats sont préparés avec des ingrédients frais et locaux. Nous proposons également des options sans gluten et sans lactose.</p>
                    </div>
                </div>

                <!-- Soin des Animaux -->
                <div class="service-card">
                    <h3>Soin des Animaux</h3>
                    <img src="images/soigneur.gif" alt="Soigneur en action">
                    <p>Nos soigneurs professionnels prennent soin des animaux avec passion et expertise.</p>
                    <a href="#soin-animaux" class="service-link">En savoir plus</a>
                    <div class="service-details hidden" id="soin-animaux">
                        <h4>Programme de Soin des Animaux</h4>
                        <ul>
                            <li>Examen médical quotidien</li>
                            <li>Nourriture adaptée et équilibrée</li>
                            <li>Enrichissement et stimulation mentale</li>
                            <li>Environnement propre et sécurisé</li>
                        </ul>
                        <p>Nous utilisons des techniques de soin modernes et respectueuses du bien-être animal. Nos soigneurs sont formés pour détecter rapidement tout signe de malaise ou de maladie.</p>
                    </div>
                </div>

                <!-- Visite Guidée -->
                <div class="service-card">
                    <h3>Visite Guidée</h3>
                    <p>Profitez d'une visite guidée pour découvrir les habitats et les animaux avec un guide expert.</p>
                    <a href="#visite-guidee" class="service-link">En savoir plus</a>
                    <div class="service-details hidden" id="visite-guidee">
                        <h4>Programme de Visite Guidée</h4>
                        <ul>
                            <li>Découverte des habitats</li>
                            <li>Rencontre avec les soigneurs</li>
                            <li>Observation des animaux en action</li>
                            <li>Sessions de questions-réponses avec le guide</li>
                        </ul>
                        <p>Nos visites guidées sont conçues pour être éducatives et divertissantes. Chaque visiteur peut en apprendre davantage sur les efforts de conservation et les comportements des animaux.</p>
                    </div>
                </div>

                <!-- Boutique -->
                <div class="service-card">
                    <h3>Boutique</h3>
                    <p>Visitez notre boutique pour trouver des souvenirs uniques et soutenir notre mission.</p>
                    <a href="#boutique" class="service-link">En savoir plus</a>
                    <div class="service-details hidden" id="boutique">
                        <h4>Produits Disponibles</h4>
                        <ul>
                            <li>Vêtements et accessoires</li>
                            <li>Jouets et peluches</li>
                            <li>Livres et jeux éducatifs</li>
                            <li>Produits artisanaux locaux</li>
                        </ul>
                        <p>Chaque achat dans notre boutique contribue directement à nos efforts de conservation et à l'amélioration des conditions de vie de nos animaux.</p>
                    </div>
                </div>

                <!-- Éducatif -->
                <div class="service-card">
                    <h3>Éducatif</h3>
                    <p>Visitez le site éducatif pour en savoir plus sur nos programmes éducatifs.</p>
                    <a href="#educatif" class="service-link">En savoir plus</a>
                    <div class="service-details hidden" id="educatif">
                        <h4>Programmes Éducatifs</h4>
                        <ul>
                            <li>Ateliers pour enfants</li>
                            <li>Conférences et séminaires</li>
                            <li>Visites scolaires</li>
                            <li>Ressources pédagogiques en ligne</li>
                        </ul>
                        <p>Nos programmes éducatifs sont conçus pour sensibiliser le public à la conservation de la faune et à l'importance de préserver les habitats naturels.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
