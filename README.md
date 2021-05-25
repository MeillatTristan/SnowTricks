# SnowTricks

## Contexte
[![SymfonyInsight](https://insight.symfony.com/projects/96303bb3-7fa1-48d8-8bcc-6179aa870e58/mini.svg)](https://insight.symfony.com/projects/96303bb3-7fa1-48d8-8bcc-6179aa870e58)

Dans le cadre du projet 6 de la formation OpenClassrooms "Développeur d'application web" en spécialisation symfony, nous devions réaliser un site web en Symfony pour un client fictif qui souhaitait réaliser un blog de snowboard

### Compte utilisateur activé

email:password

test.test@gmail.com:aKzp5u6zvhwY8F4

### Fonctionnalités 

Les principales fonctionnalités du blog peuvent être décomposer en trois parties en fonction des droits de l'utilisateur :

#### Visiteur :
* Accès à la page d'accueil
* Visibilité des différents tricks déjà ajouter

#### Utilisateur activés :
* Même accès que les visiteurs
* Possibilité de poster des commentaires
* Possibilité d'ajouter des tricks et des catégories
* Modification des différents tricks et des catégories

## Prérequis

PHP avec composer est requis pour pouvoir installer le projet. Pour la partie frontend NPM est requis également.

## Installation

### Etape 1 : 

Cloner le projet sur votre serveur avec cette commande : 
```bash
git clone https://github.com/MeillatTristan/SnowTricks.git
```

### Etape 2 :

Créer une base donnée et importé le fichier portfolio.sql

### Etape 3 : 

Editer le fichier de configuration comprenant la base de donnée, le serveur smtp ainsi que vos informations mail. il se trouve à la racine et est nommé : ```.env```

voici les différents lignes à modifier 

``` MAILER_DSN=gmail://test.test@gmail.com:password@default ```
``` DATABASE_URL="mysql://root:@127.0.0.1:3306/dbName" ```

### Etape 4 : 

Installer les différentes dépendances du projet via [Composer](https://getcomposer.org/) :
```bash
composer install
```

### Etape 5 : 

Installer les dépendances front-end du projet via [Yarn](https://yarnpkg.com/) ou [NPM](https://www.npmjs.com/)
```bash
yarn install
```
```bash
npm install
```

### Etape 6 : 

Créer un build pour les assets avec la commande suivante :
```bash
Yarn build (en prod)
Yarn watch (en dev)
```

### Etape 7 :

Si ce n'est pas déjà fais, créer la base de donnée avec le nom donné dans le fichier de configuration et importer le fichier situé à la racine nommé : 
```bash snowtricks.sql ```



Le projet est maintenant fonctionnel, vous pouvez vous connecter en tant qu'administrateur à l'aide du compte d'exemple.
