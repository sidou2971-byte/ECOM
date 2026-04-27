# Site E-Commerce (ECOM)

## 📌 Description du Projet (État Actuel)
Ce projet est une plateforme e-commerce robuste construite avec **Laravel 12** et **Vite**. Actuellement, le projet comprend plusieurs fonctionnalités développées :
- **Boutique en ligne :** Page de produits avec recherche, tri, et filtrage.
- **Panier et Favoris :** Gestion de la liste de souhaits (Wishlist) et panier avec indicateurs dans l'en-tête.
- **Portail d'Administration :** Interface modernisée pour la gestion des utilisateurs, des opérateurs et l'authentification.
- **Base de données :** Utilisation de SQLite par défaut pour faciliter le développement local sans configuration lourde.

## 🚀 Prérequis
Avant de commencer, assurez-vous que votre ordinateur dispose de :
- **PHP** (version 8.2 ou supérieure)
- **Composer**
- **Node.js** et **npm** (version 18 ou supérieure)
- **Git**

---

## 🛠️ Comment exécuter le projet sur n'importe quel PC ?

### 1. Télécharger le projet
Ouvrez un terminal et clonez le repository GitHub, puis rentrez dans son dossier :
```bash
git clone https://github.com/sidou2971-byte/ECOM.git
cd ECOM
```

### 2. Installation (Méthode Rapide)
Le fichier `composer.json` est déjà configuré avec une commande d'installation tout-en-un. Tapez simplement :
```bash
composer run setup
```
*Cette commande va : installer les dépendances PHP et Node, créer automatiquement votre fichier `.env`, générer la clé d'application, migrer la base de données et builder le frontend !*

### 3. Lancer les serveurs de développement
Une fois l'installation terminée, tapez la commande suivante pour tout lancer d'un coup (Frontend, Backend, Queues...) :
```bash
composer run dev
```
Vous pouvez maintenant ouvrir votre navigateur et aller sur : **[http://localhost:8000](http://localhost:8000)**

---

### Alternative : Installation purement Manuelle
Si la commande `setup` ou `dev` ne passe pas pour une raison ou une autre, voici les étapes manuelles standards :

1. Installer les packages :
   ```bash
   composer install
   npm install
   ```
2. Préparer l'environnement :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *(Sur Invite de commandes Windows : `copy .env.example .env`)*
3. Créer les tables :
   ```bash
   php artisan migrate
   ```
4. Lancer le site (il faut 2 terminaux ouverts) :
   - Terminal 1 : `php artisan serve`
   - Terminal 2 : `npm run dev`
