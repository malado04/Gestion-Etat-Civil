# Gestion de l'État Civil

Application web de gestion des actes et procédures d'état civil permettant de centraliser la gestion des **naissances, décès, mariages, divorces et jugements**.

Le projet vise à informatiser les processus administratifs liés à l'état civil et à faciliter la gestion, la consultation et le suivi des dossiers.

## 🎯 Fonctionnalités

### 👤 Gestion des utilisateurs

* Authentification des utilisateurs
* Gestion des profils
* Gestion des utilisateurs selon leurs responsabilités
* Accès aux fonctionnalités selon les rôles

### 👶 Gestion des naissances

* Enregistrement des actes de naissance
* Gestion des informations relatives aux citoyens
* Consultation et suivi des dossiers

### 💍 Gestion des mariages

* Enregistrement des mariages
* Gestion des informations des époux
* Suivi des dossiers de mariage

### ⚰️ Gestion des décès

* Enregistrement des actes de décès
* Gestion des informations relatives au défunt
* Consultation des dossiers

### ⚖️ Gestion des divorces et jugements

* Gestion des dossiers de divorce
* Gestion des jugements
* Suivi des procédures administratives

### 📄 Gestion des demandes

* Création et suivi des demandes
* Gestion des demandes effectuées par les citoyens
* Traitement des dossiers par les utilisateurs habilités

### 📊 Tableaux de bord

* Vue synthétique des données administratives
* Statistiques sur les différents actes
* Indicateurs permettant le suivi de l'activité

---

## 🏗️ Architecture

L'application repose sur une architecture web basée sur le modèle **MVC (Model-View-Controller)**.

```text
Gestion-Etat-Civil/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Requests/
│   │
│   └── Models/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   └── views/
│
├── routes/
│   └── web.php
│
├── public/
├── config/
├── tests/
└── README.md
```

## 🛠️ Technologies

* **PHP**
* **Laravel**
* **MySQL**
* **Blade**
* **HTML5**
* **CSS3**
* **JavaScript**
* **Bootstrap**
* **Git / GitHub**

## 🔐 Gestion des accès

L'application prévoit une séparation des fonctionnalités selon les responsabilités des utilisateurs afin de contrôler l'accès aux différentes opérations administratives.

## 🚀 Installation

### Prérequis

* PHP
* Composer
* MySQL
* Node.js / npm
* Laravel

### Installation du projet

```bash
git clone https://github.com/malado04/Gestion-Etat-Civil.git

cd Gestion-Etat-Civil

composer install

npm install
```

Créer ensuite le fichier `.env` :

```bash
cp .env.example .env
```

Configurer les paramètres de connexion à la base de données dans `.env`.

Générer la clé de l'application :

```bash
php artisan key:generate
```

Exécuter les migrations :

```bash
php artisan migrate
```

Compiler les ressources frontend :

```bash
npm run dev
```

Lancer l'application :

```bash
php artisan serve
```

L'application sera accessible à l'adresse :

```text
http://127.0.0.1:8000
```

## 📌 Modules principaux

| Module       | Description                           |
| ------------ | ------------------------------------- |
| Citoyens     | Gestion des informations des citoyens |
| Naissances   | Gestion des actes de naissance        |
| Mariages     | Gestion des actes de mariage          |
| Décès        | Gestion des actes de décès            |
| Divorces     | Gestion des dossiers de divorce       |
| Jugements    | Gestion des décisions et jugements    |
| Demandes     | Gestion des demandes administratives  |
| Utilisateurs | Gestion des comptes et accès          |
| Dashboard    | Statistiques et suivi de l'activité   |

## 💡 Compétences démontrées

Ce projet met notamment en évidence des compétences en :

* Développement backend avec **Laravel / PHP**
* Conception d'applications web métier
* Architecture MVC
* Conception et manipulation de bases de données relationnelles
* Gestion des utilisateurs et des autorisations
* Développement de workflows administratifs
* Gestion de données d'état civil
* Développement d'interfaces web
* Git et GitHub

## 🔮 Évolutions possibles

* API REST pour les intégrations externes
* Génération automatique des documents PDF
* Signature électronique des actes
* Notifications SMS / Email
* Traçabilité complète des opérations
* Journal d'audit
* Recherche avancée
* Tableau de bord analytique
* Modernisation frontend avec Angular ou React
* Conteneurisation avec Docker

## 👨‍💻 Auteur

**Amadou Malado Ndiaye**

Ingénieur Logiciel | Développeur Full Stack | Architecture Logicielle

* GitHub : [@malado04](https://github.com/malado04)

## 📄 Licence

Projet développé dans un cadre professionnel et/ou pédagogique.

WhatApp +221 77 560 42 72 / +221 76 618 15 75

