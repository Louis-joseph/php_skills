# Comprendre les APIs grâce a API Platform

Créer une API 🚀
qui permet de communiquer avec une base de données afin de fournir à l'application les informations demandées au format JSON.

## Environnement de développement
```bash
composer create-project symfony/skeleton test-api
composer req api
composer require symfony/maker-bundle --dev
```
## Ressources d'API
*Pour créer une ressource on va créer une entitée qui va permettre de sauvegarder les données en BDD*
```bash
php bin/console make:entity
```
*Chaque article appartient a une categorie parcontre une categorie peut avoir plusieurs articles*
```bash
Category: ManyToOne 
```

### Pré-requis

- PHP 7.4 👐
- Composer

Vérifier les pré-requis :
```bash
symfony check:requirements
```

### Plateforme

```bash
composer req api
API Platform : documentation génerée grâce à Swagger UI capable de lire les dossier de définition d'open API et de générée une interface graphique
```

### Créer un premier point d'entrée
*Au nivau de la class qui est donc notre entitée, indiquer cette annotations qui permet de créer 6 routes accesibles*
```bash
@ApiResource()
IRI : chemin vers la ressource en question
```
