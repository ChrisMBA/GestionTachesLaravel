# Gestion de tâches – Laravel

Application de gestion de tâches développée dans le cadre d’un test technique.

### Prérequis
- PHP 8.2
- Composer
- Git

### Étapes d’installation

git clone https://github.com/ChrisMBA/GestionTachesLaravel.git
cd GestionTachesLaravel
composer install
cp .env.example .env
touch database/database.sqlite
php artisan key:generate
php artisan migrate
php artisan serve

### Choix techniques effectués

Laravel a été choisi pour bénéficier d’un framework robuste, structuré et largement utilisé en environnement professionnel.

SQLite permet une mise en place rapide sans dépendance externe, adaptée au contexte d’un test technique.

Blade est utilisé pour le rendu des vues afin de rester dans l’écosystème Laravel.

Bootstrap (via CDN) a été intégré pour proposer une interface simple, responsive et lisible sans complexité inutile.

L’architecture respecte une séparation claire entre routes, contrôleurs et vues pour faciliter la maintenance.

Le projet est versionné avec Git, en suivant un workflow professionnel basé sur les branches main, dev et des branches de fonctionnalités.

### Améliorations possibles avec plus de temps

Modification des tâches (édition du titre, de la description et du statut)

Restauration des tâches supprimées

Pagination de la liste des tâches

Authentification des utilisateurs

À propos des dates et de l’historique

J’ai commencé à implémenter l’affichage des dates de création, de modification et de suppression des tâches.

Cependant, dans le temps imparti, cette fonctionnalité a commencé à générer plusieurs conflits côté interface et logique.
Afin de livrer une version stable, lisible et maintenable, j’ai fait le choix de revenir à une base fonctionnelle propre.

La structure actuelle du projet permettrait de finaliser facilement cette amélioration avec davantage de temps.

Projet réalisé par Chris.
