# Welcome to my portfolio 📦

![image](https://img.shields.io/badge/Symfony-000000?style=for-the-badge&logo=Symfony&logoColor=white) ![image](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

## Introduction

Dans le cadre de ma formation de déveleppeur web, j'ai abordé le Framework Symfony pour lequel nous avions un projet de création d'une application à produire. J'ai profité de l'occasion pour créer mon portfolio dans l'optique de présenter mon parcours professionnel, mes compétences acquise ainsi que mes projets réalisés toutes au long de cette formation.

## Configuration ⚙️

Avant toutes chose,j'ai [configuré mon projet](INSTALL.md).

## Doctrine

J'ai créer un fichier `.env.local` à la racine du projet et configurer votre ma `base de donnée` :

`DATABASE_URL="mysql://username:password@127.0.0.1:port/db_name?serverVersion=8.0.32&charset=utf8mb4"`

### Création de la BDD

Ensuite j'ai utilisé les commandes suivante :

`php bin/console doctrine:database:create`

`php bin/console doctrine:migrations:migrate`

### Création des tables & des colonnes + class Entity

Afin de créer mes entités j'ai utilisé la commande :

`php bin/console make:entity`

J'ai ensuite mise à jour ma BDD en utilisant les migrations.

Générer la migration :
`php bin/console make:migration`

Executer la migration :
`php bin/console doctrine:migrations:migrate`

### Insertion des données (Fixture)

Afin de pouvoir inserer des données dans la BDD, j'ai ajouter le package de fixtures :

`composer require --dev orm-fixtures`
c'est dans le fichier `src/DataFixtures/AppFixtures.php` qui m'a permis de créer les données de mon projet et les enregistrer dans la BDD.

J'ai ajouter la librairie Faker afin d'abord d'effectuer des tests , pour ce faire j'ai utilisé la commande suivante:

`src/DataFixtures/AppFixtures.php`

### Relation ManyToMany

J'ai créer une relation ManyToMany entre les entités `Projet` (coté propriétaire) et `Technology`. Cela me permet d'ajouter les langages de programmation utilisés lors de mes projets.

## Contrôleur et Templates

En utilisant la console et MakerBundle, j'ai créer mon premier controleur grâce à la commande :

`php bin/console make:controller`

Cette commande à permis de créer le fichier vue `templates/index/index.html.twig`.

Cela m'a permis d'organiser mon projet par section en utilisant les fonctions du template comme `block`, `parent`, `include`.

## Assets/ Bootstrap / CSS`/AOS

J'ai utlisée le composant `AssetMapper` cela m'a permis d'importer les feuilles de styles `CSS`, `AOS` et `Bootstrap`.

Pour ajouter Boostrap, j'ai utlisé la commande suivante et pu ajouter l'import dans `asset/app.js`:

`php bin/console importmap:require bootstrap`

## Formulaire

Comme il s'agit d'un portfolio à destination de recruteur , il me semblait essentiel d'ajouter un formulaire de contact.

Pour ce faire :

j'ai d'abord construit le formulaire en utilisant le MakerBundle suivant :

`php bin/console make:form` que j'ai lier à mon entité `Contact`. J'ai ensuite déclarer les différents champ de mon formulaire grâce la méthode `buildForm`.

Ensuite créer le formulaire dans le controleur grâce à la méthode `createForm` et utiliser la méthode `handleRequest` afin de gerer les données éventuellement saisie.

Afin de m'assurer de la validé des données saisie par un éventuel utilisateur et que le formulaire a bien était soumis, j'ai utilisé deux méthodes :

- `isSubmitted`
- `isValid`

j'ai aussi utilisé deux contrainte de validation sous forme d'attribut directement sur les propriétés de l'entité `Contact.php`

- `NotBlank` (Valide qu'une valeur n'est pas égale à une chaîne vide)`,
- `E-mail` (Valide qu'une valeur est une adresse e-mail valide)

j'ai persister les données grâce à la variable $em.

Enfin je en utilisant la methode `render` dans le controleur , Symfony créer automatique un objet `FormView ` afin de pouvoir afficher le formulaire dans le template twig. J'ai appliqué un théme Boostrap pour un meilleur rendu du formulaire.

### Messages flash

Afin d'assurer un retour à l'utilisateur lui indiquant que sa demande a bien était prise en compte . J'ai utilisé les messages flash.

## EasyAdmin 👨🏾‍💼

Comme il s'agit d'un portfolio dans lequel je souhaite ajouter/modifier ou bien supprimer des éléments comme par exemple de nouveaux projets, de nouvelles expérience etc... J'ai intégré le Bundle d'administration `Easyadmin`. Grâce à la commande :

`composer require easycorp/easyadmin-bundle`

Une fois le package installer, j'ai créer mon dashboard :

`php bin/console make:admin:dashboard`

Ensuite j'ai générer un CRUD :

`php bin/console make:admin:crud`

Grâce à EasyAdmin il est maintenant possible :

- de recevoir les messages envoyés par les utilisateurs depuis la formulaire de contact.
- d'ajouter de nouveaux projets et de nouvelles expériences,
- de les modifers,
- de les supprimers.

Cependant concernant la supression tout fonctionne bien mais les fichiers dans `/uploads` ne se supprimait pas.

Afin de remédier à ce probléme, j'ai mis en place un Subscriber [`DeleteUploadSubscriber`](src/EventSubscriber/DeleteUploadSubscriber.php) qui s'assure qu'avant le `remove` du `Manager`, il me supprime le fichier correspondant dans `/uploads/`.

### Authentification

Afin d'accéder à l'interface `EasyAdmin` j'ai souhaité ajouter un contrôle d'accès personnalisé.

Pour ce faire dans un premier temps, j'ai utilisé le composant `security` avec la commande :

`php bin/console make:user`

qui à créer une entité `User` et dans lequel il a été implémenté 2 interfaces `UserInterface` et `PasswordAuthenticatedUserInterface`.

J'ai utiliser une fixture administrateur avec un mots de pass Hasher en utilisant l'interface `PasswordHasher`.

J'ai la commande : `make:auth` en choissant `Form Login` qui permis de générer automatiquement un formulaire de login et un `Authenticator`.

Mon interface `EasyAdmin` est accessible via le l'URL `/admin`).

- Identifiant : admin
- Mot de passe : admin
