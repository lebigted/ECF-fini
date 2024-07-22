# Guide d'installation et de configuration pour le projet ECF

## 1. Installation de XAMPP

### Télécharger et installer :
- Rendez-vous sur le site officiel de XAMPP : [Apache Friends](https://www.apachefriends.org/index.html)
- Téléchargez la version adaptée à votre système d'exploitation.
- Installez XAMPP en suivant les instructions à l'écran.

### Lancer XAMPP :
- Ouvrez le panneau de contrôle XAMPP.
- Démarrez les modules `Apache` et `MySQL`.

## 2. Connexion à la base de données

### Accéder à phpMyAdmin :
- Ouvrez votre navigateur web.
- Tapez `http://localhost/phpmyadmin` dans la barre d'adresse.

### Créer une nouvelle base de données :
- Dans phpMyAdmin, allez dans l'onglet `Bases de données`.
- Entrez le nom de la base de données (par exemple, `ecf_database`) et cliquez sur `Créer`.

### Importer le fichier SQL :
- Dans phpMyAdmin, sélectionnez la base de données que vous venez de créer.
- Allez dans l'onglet `Importer`.
- Cliquez sur `Choisir un fichier` et sélectionnez le fichier `create_and_insert_data.sql` fourni.
- Cliquez sur `Exécuter` pour importer le fichier SQL.

## 3. Configuration du projet

### Placer les fichiers dans le bon répertoire :
- Copiez le dossier `tp-ecf` dans le répertoire `C:\xampp\htdocs\`.

- https://getbootstrap.com/ ne pas oublier les js .
- telecharger le fichier et inserer le dans le projet .
- bootstrap.bundle.min.js .
- bootstrap.min.css .
- script-login.js .


### Configuration de la connexion à la base de données :
- Ouvrez le fichier `db_config.php` et assurez-vous que les paramètres de connexion à la base de données sont corrects :
  ```php
  <?php
  $servername = "localhost";
  $username = "root";
  $password = ""; // Votre mot de passe MySQL
  $dbname = "ecf_database";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  ?>

## 4. Création de comptes et attribution des rôles

### Créer un compte utilisateur :
- Connectez-vous à phpMyAdmin.
- Allez dans l'onglet `Utilisateurs`.
- Cliquez sur `Ajouter un utilisateur`.
- Remplissez les informations nécessaires et attribuez un mot de passe.

### Donner des permissions à l'utilisateur :
- Après avoir créé l'utilisateur, allez dans `Utilisateurs` et cliquez sur `Modifier les privilèges` à côté de l'utilisateur.
- Attribuez les rôles nécessaires à l'utilisateur selon ses besoins.

### Accès au compte professionnel :
- Pour accéder au compte professionnel, l'utilisateur doit être soit `admin`, `vet`, ou `employee`.
- Assurez-vous que ces rôles sont bien définis et attribués dans votre base de données.

## 5. Problèmes courants et solutions

### Mot de passe MySQL incorrect :
- Vérifiez que le mot de passe dans `db_config.php` correspond bien à celui de votre utilisateur MySQL.

### Chemins d'accès incorrects :
- Assurez-vous que le projet est bien placé dans `C:\xampp\htdocs\tp-ecf`.
- Vérifiez que tous les chemins d'accès dans vos fichiers PHP sont corrects.

## 6. Connexion au site

### Accéder au site :
- Ouvrez votre navigateur web.
- Tapez `http://localhost/tp-ecf/content/login.php` dans la barre d'adresse.

### Se connecter normalement :
- Inscrivez-vous via le formulaire de connexion.
- Les données seront stockées dans la base de données.
- Chaque utilisateur simple peut naviguer librement sur le site sauf dans l'espace professionnel.

### Accès à l'espace professionnel :
- Pour accéder à l'espace professionnel, allez dans `Utilisateurs` dans phpMyAdmin.
- Modifiez le rôle de l'utilisateur pour fournir les bons accès (`admin`, `vet`, ou `employee`).

## 7. Besoin d'aide ?
Pour toute assistance supplémentaire, vous pouvez me contacter par mail à l'adresse suivante : lucastestard77@gmail.com

