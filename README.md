# ![left 100%](https://raw.githubusercontent.com/thierry-laval/archives/master/images/logo-portfolio.png "Un bien beau logo !")

## Auteur

👤 &nbsp; **Thierry LAVAL** [🇫🇷 Contactez-moi 🇬🇧](mailto:contact@thierrylaval.dev)

* Github: [@Thierry Laval](https://github.com/thierry-laval)
* LinkedIn: [@Thierry Laval](https://www.linkedin.com/in/thierry-laval)
* Visitez ==> 🏠 [Site Web](https://thierrylaval.dev)

***

### 📎 Projet : DisableCategoryUrlRewrite - Module PrestaShop

_`Début du projet le 17/07/2025`_

***

## Description

### 🧩 Module pour désactiver la mise à jour automatique de l'URL des catégories

Ce module PrestaShop empêche la modification automatique du slug (`link_rewrite`) des catégories lors du changement de leur nom.  
Il garantit ainsi la stabilité des URLs des catégories pour éviter les impacts négatifs sur le référencement et les liens externes.

#### 🔁 Fonctionnement

* À chaque mise à jour d'une catégorie, le module restaure l'ancien slug dans la base.
* Empêche toute modification automatique du `link_rewrite`.
* Simple, sans configuration nécessaire.

## Fonctionnalités

* Compatible PrestaShop 1.7, 8.x et 9.x.
* Installation et activation faciles.
* Léger, performant et sans impact sur les performances.
* Utilise le hook `actionCategoryUpdate` pour intervenir avant la sauvegarde.

## Installation

1. Renommer le module par - disablecategoryurlrewrite.zip -
2. Copier le dossier `disablecategoryurlrewrite` dans `/modules/`.
3. Installer et activer le module dans le back-office PrestaShop.
4. Le module est actif immédiatement, aucune configuration requise.

### 📦 &nbsp; Technologies utilisées

| Langages / Techs | Description                              |
|------------------|------------------------------------------|
| PHP              | Module PrestaShop                        |
| SQL              | Requête pour récupérer l’ancien slug     |
| PrestaShop Hooks | Interception de la mise à jour catégorie |

***

#### Contributions bienvenues

* Forkez le projet
* Créez une branche pour vos modifications (`git checkout -b feature/ma-fonctionnalite`)
* Commitez vos changements (`git commit -am 'Ajout d'une fonctionnalité'`)
* Pushez sur votre branche (`git push origin feature/ma-fonctionnalite`)
* Ouvrez une Pull Request

#### 📝 Licence

Ce projet est sous licence [MIT](LICENSE).

Copyright © 2025 [Thierry Laval](https://thierrylaval.dev)

#### €€€ Soutenez-moi !

Si ce projet vous plaît, n’hésitez pas à me soutenir :

<a href="https://paypal.me/thierrylaval01?country.x=FR&locale.x=fr_FR" target="_blank"><img src="https://www.paypalobjects.com/digitalassets/c/website/logo/full-text/pp_fc_hl.svg" alt="Soutiens-moi !" height="35" width="150"></a>

[Voir mon travail](https://github.com/thierry-laval)

***

### &hearts;&nbsp;&nbsp;&nbsp;&nbsp;Love Markdown

Donnez une ⭐️ &nbsp;si ce projet vous plaît !

<span style="font-family:Papyrus; font-size:4em;">FAN DE GITHUB !</span>

<a href="#"><img src="https://github.com/thierry-laval/P00-mes-archives/blob/master/images/octocat-oley.png" height="300"></a>

**[⬆ Retour en haut](#auteur)** <br>
