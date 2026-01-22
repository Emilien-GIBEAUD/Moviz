# Moviz : Développement d'un site de critique de film en PHP OBJET et MVC

### Série de lives de AL avec la base MVC provenant du projet Bookeo

* La VUE est dans /templates et /assets.
* Le CONTROLLER est dans /App/Controller.
* Le MODEL est dans les autres dossiers présents dans /App

<br>

## Mise en place locale
A la racine du projet :
* Créer le fichier db_config.php à l'aide db_config.php.exemple
* Créer le fichier .env à l'aide .env.exemple
* 

<br>

Lancer les conteneurs :

    docker compose up -d

Accèder au site via : <a href="http://localhost/" target="_blank" rel="noopener noreferrer">localhost</a> (sans certificat, faire le nécessaire dans le navigateur)
<br>
<br>

Arrêter les conteneurs :

    docker compose down

<br>

## Création de la db
* Accèder à PHPMyAdmin : <a href="http://localhost:4216" target="_blank" rel="noopener noreferrer">localhost:4216</a>
* Saisir le user et psw du fichier .env
* Créer la base de données et ses tables à l'aide du fichier /App/Db/bdd_create.sql (Onglet "SQL")
