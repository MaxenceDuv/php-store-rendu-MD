# PHP - CNAM 2024

## Base de données - Configuration

Créer un fichier `db.ini` dans le dossier `config`, inscrire ensuite vos propres données de configuration :

```ini
HOST=127.0.0.1
PORT=3306
DB_NAME=db_name
CHARSET=utf8mb4
USER=user
PASSWORD=pass
```

## Modifications

### Upload

* J'ai d'abord fait fonctionner l'upload dans le fichier add-product-process
* J'ai ensuite vérifié que tout fonctionnait bien :
    * L'upload en BDD
    * L'enregistrement de l'image dans le bon dossier etc
    * Si ça me renvoi bien une erreur quand j'oublie de remplir un champ de la création de produit
* Je me suis pour finir occupé de la refactorisation pour upload des fichiers qui pourra être utilisé sur d'autres pages :
    * Création d'une fonction dans le fichier "utils.php"
    * Renommage avec un nom unique et aléatoire des images pour éviter les doublons dans le dossier et donc n'en perdre aucune

### Erreur

* Création d'une fonction productErrorMessage car avant tout passait par la fonction des catégories meme pour les produits
* Ajout de quelques cas d'erreurs pour les produits qui n'étaient pas présent


