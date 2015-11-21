# Projet d'un site Web

[![Build Status](https://api.travis-ci.org/cakephp/app.png)](https://travis-ci.org/cakephp/app)
[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.

## Utilisation

Pour lancer un serveur de developpement :
```bash
bin/cake server
```
Par défaut, l'application sera accessible sur **http://localhost:8765/**.

S'il y a un conflit avec localhost ou le port 8765, il est possible préciser un hôte ou un port spécifique :
```bash
bin/cake server -H [IP] -p [PORT]
```
Cela lancera l'application sur **http://[IP]:[PORT]/**.

*Ceci n’a pas vocation à être utilisé, ni ne devrait être utilisé dans un environnement de production. Il est juste à utiliser pour un serveur de développement basique.* [Documentation CakePHP]

## Organisation du code

L'application suit l'architecture MVC, c'est à dire que la partie affichage est séparée du traitement et des données.

### Controller

Dossier : /src/Controller/  
Documentation : http://book.cakephp.org/3.0/fr/controllers.html

Un Controller gère l'interpretation des données requêtées et fait une liaison entre le Model et la View. Il contient des méthodes publiques qui gèrent les requêtes ; ces méthodes sont appelées *actions*.  
Ces actions sont accessibles via une URL de la forme **http://exemple.com/[controllers]/[action]**.  
Dans les Controllers, il est possible d'utiliser des [Components](http://book.cakephp.org/3.0/fr/controllers/components.html).

### View

Dossier : /src/Template/  
Documentation : http://book.cakephp.org/3.0/fr/views.html

Les Templates sont écrit en PHP dans des fichiers .ctp (CakePHP TemPlate) et se situent dans un sous-dossier portant le nom du Controller associé.  
Pour passer des variables du Controller au Template :
```php
//controller
$this->set('nom_var', $var);

//template
<?= $nom_var ?>
```  

Pour ce qui est des fichiers de styles, javascript, fonts, images, ... ils se trouvent dans le dossier /webroot/.

Dans les Templates, il est possible d'utiliser des [Helpers](http://book.cakephp.org/3.0/fr/views/helpers.html).

### Model

Dossier : /src/Model/  
Documentation : http://book.cakephp.org/3.0/fr/orm.html

La partie Model est principalement séparée en deux classes Entities et Tables.  
Les Tables fournissent un accès à la collection des entitées stockées dans une table.  
Les Entities représentent des lignes individeulles ou des objets de domaine.

Il est possible d'utiliser des [Behaviors](http://book.cakephp.org/3.0/fr/orm/behaviors.html).
