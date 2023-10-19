<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

README - Site de Gestion d'Utilisateurs

 

Bienvenue dans le README du site de gestion d'utilisateurs ! Ce site permet d'afficher les utilisateurs sous forme de tableau, offrant des fonctionnalités pour modifier leurs informations et les supprimer de la base de données. De plus, il vous permet de créer de nouveaux utilisateurs. Ce guide vous aidera à comprendre comment utiliser ce site.

 

Table des matières

Configuration du projet

Affichage des Utilisateurs

Modification d'Utilisateurs

Suppression d'Utilisateurs

Création d'un Nouvel Utilisateur

 

 ## Configuration du Projet

 

Avant de commencer, assurez-vous d'avoir correctement configuré votre environnement de développement

Pour cela il vous faudra telechargé composer : https://getcomposer.org/download/

le cli relatif a laravel

une fois que le projet est récuperer en local :

il faut créer une base de données sur phpMyadmin (par exemple)

il faut créer un fichier .env à partir de .env.example (inclu dans le projet )

il faut mettre le nom de la base de données avec l'utilisateur et le mot de passe si nécessaire

il faut se mettre sur le dossier du projet

il faudra taper dans votre terminal 'composer install' .

afin migrer les tables vers la base de données il faut taper la commande "php artisan migrate"

pour remplir les tables de la base il faut taper la commande "php artisan db:seed"

démarrer l'application avec  'php artisan serve'

## Routes

les routes utilisées de retrouve au niveau du fichier routes/api.php

 ## Affichage des Utilisateurs

 

Lorsque vous accédez à la page principale du site, vous verrez un tableau affichant les utilisateurs existants. Chaque ligne du tableau représente un utilisateur et comporte les informations suivantes :

 

Nom

Prénom

Age Email

Bouton "Modifier"

Bouton "Supprimer"

 

## Modification d'Utilisateurs

Cliquez sur le bouton "Modifier" correspondant à l'utilisateur que vous souhaitez modifier.

Vous serez redirigé vers une page de modification où vous pourrez mettre à jour les informations de l'utilisateur, telles que le nom, le prénom et l'age et l'email.

Une fois que vous avez apporté les modifications souhaitées, cliquez sur le bouton "Enregistrer" pour sauvegarder les changements.

 

## Suppression d'Utilisateurs

Cliquez sur le bouton "Supprimer" correspondant à l'utilisateur que vous souhaitez supprimer.

Une boîte de dialogue de confirmation s'affichera pour vous assurer que vous souhaitez vraiment supprimer l'utilisateur.

Confirmez la suppression, et l'utilisateur sera retiré de la base de données.

 

## Création d'un Nouvel Utilisateur

 

Pour ajouter un nouvel utilisateur à la base de données :

 

Sur la page principale, cliquez sur le bouton "Nouvel Utilisateur".

Vous serez dirigé vers un formulaire de création d'utilisateur.

Remplissez les champs obligatoires tels que le nom, le prénom, l'age et l'adresse email.

Après avoir rempli le formulaire, cliquez sur "Créer" pour ajouter l'utilisateur à la base de données.


## Visualisation d'un utilisateur 

afin de visualiser l'utilisateur il faut juste cliquer sur la ligne de l'utilisateur

ça permet d'afficher les infos lié à un utilisateur et les commandes effectuées par ce dernier avec les produits et leurs quantité

## Procedure et trigger
on affiche aussi le nombre total des commandes effectuées par l'utilisateur en utilisant une procedure 'get_nbr_order_per_user' 

on a utiliser aussi un trigger qui permet de supprimer les commandes d'un utilisateur une fois que ce derniers est supprimé