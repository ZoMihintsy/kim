
# KIM - Un Système de Gestion de Recettes et de Profils

KIM est une application web moderne développée avec le framework PHP Laravel, utilisant Livewire pour une expérience utilisateur interactive. Le projet se concentre sur la gestion de recettes, permettant aux utilisateurs de visualiser, rechercher et potentiellement partager leurs propres créations culinaires, tout en gérant leur profil personnel.

## Table des Matières

-   [Fonctionnalités](#fonctionnalités)
-   [Technologies Utilisées](#technologies-utilisées)
-   [Installation](#installation)
-   [Utilisation](#utilisation)
-   [Structure du Projet](#structure-du-projet)

---

## Fonctionnalités

* **Gestion des recettes :** Les utilisateurs peuvent consulter une liste de recettes, rechercher des recettes spécifiques et voir les détails d'une recette.
* **Profils utilisateurs :** Chaque utilisateur a un profil où il peut mettre à jour ses informations, changer son mot de passe.
* **Authentification complète :** Système d'inscription, de connexion et de déconnexion.
* **Tableau de bord utilisateur :** Un tableau de bord privé où l'utilisateur peut voir ses propres recettes et d'autres informations pertinentes.

---

## Technologies Utilisées

* **[Laravel]**.
* **[Livewire]**.
* **[Blade]**.
* **[TailwindCSS]**

---

## Installation

Pour lancer l'application sur votre machine locale, suivez ces étapes :

1.  **Cloner le dépôt Git :**
    ```bash
    git clone [https://github.com/zomihintsy/kim.git](https://github.com/zomihintsy/kim.git)
    cd kim
    ```

2.  **Installer les dépendances :**
    ```bash
    # Installer les dépendances PHP
    composer install

    # Installer les dépendances JavaScript (si applicables)
    npm install
    npm run dev # ou npm run build
    ```

3.  **Configurer le fichier `.env` :**
    ```bash
    cp .env.example .env
    ```
    Ouvrez le fichier `.env` et configurez les informations de votre base de données et d'autres variables d'environnement.

4.  **Générer la clé d'application :**
    ```bash
    php artisan key:generate
    ```

5.  **Exécuter les migrations de la base de données :**
    ```bash
    php artisan migrate
    ```

6.  **Créer le lien symbolique pour le stockage :**
    ```bash
    php artisan storage:link
    ```
    Cette commande est essentielle pour lier le dossier de stockage public aux fichiers et images de l'application.

7.  **Lancer le serveur de développement :**
    ```bash
    php artisan serve
    ```
    L'application sera accessible sur `http://localhost:8000`.

---

## Utilisation

* **Page d'accueil (`/`) :** Présentation du projet.
* **Inscription/Connexion (`/register` et `/login`) :** Pour créer un compte et se connecter.
* **Recherche de recettes (`/search`) :** Explorez les recettes disponibles.
* **Tableau de bord (`/dashboard`) :** Accédez à votre espace personnel après la connexion.
* **Profil (`/user/profile`) :** Gérez vos informations de compte.

---

## Structure du Projet

* `app/Http/Livewire/` : Contient les composants Livewire (`guest/recette.blade.php`, `guest/search.blade.php`, `layout/navigation.blade.php`).
* `resources/views/` : Contient les vues Blade pour l'interface.
    * `guest/` : Vues publiques (recettes, recherche).
    * `layouts/` : Layouts principaux (`app.blade.php`, `guest.blade.php`).
    * `pages/` : Vues spécifiques comme les pages d'authentification (`auth`), le profil et le tableau de bord utilisateur.
* `routes/` : Fichiers de définition des routes (`web.php` pour les routes de l'application).

---
