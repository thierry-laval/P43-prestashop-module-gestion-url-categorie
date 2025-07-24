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

#### 🧩 Module pour désactiver la mise à jour automatique de l'URL des catégories et des produits

#### Description

Ce module PrestaShop empêche la modification automatique du slug (`link_rewrite`) des catégories  et produits lors de la modification de leur nom. Cela évite que les URLs changent automatiquement. Il garantit ainsi la stabilité des URLs des catégories pour éviter les impacts négatifs sur le référencement et les liens externes.

#### 🔁 Fonctionnement

* À chaque mise à jour d'une catégorie, le module restaure l'ancien slug dans la base.
* Empêche toute modification automatique du `link_rewrite`.
* Simple, sans configuration nécessaire.

#### Fonctionnalités

* Compatible PrestaShop 1.7, 8.x et 9.x.
* Installation et activation faciles.
* Léger, performant et sans impact sur les performances.
* Utilise le hook `actionCategoryUpdate` pour intervenir avant la sauvegarde.
* Option dans le back-office pour activer/désactiver le blocage.
* Mise à jour directe en base via SQL (avec `Db::update`) pour éviter la récursion inutile.
* Logging simple dans un fichier pour tracer les actions, avec gestion silencieuse des erreurs.
* Code commenté, sécurisé (pSQL) et optimisé.
* Blocage de la modification automatique des URLs (slugs) pour les catégories.  
* Blocage de la modification automatique des URLs (slugs) pour les produits.  
* Mode debug/logging activable pour suivre les actions dans un fichier de logs.  
* Notification optionnelle par email à l’installation du module (avec consentement explicite).  
* Interface d’administration simple et claire.  
* Section support & récompenses avec liens pour faire un don.  

#### Installation & Configuration

1. Installer le module via le back-office PrestaShop.  
2. Accéder à la configuration du module dans la section “Modules”.  
3. Activer les options souhaitées : blocage catégories, blocage produits, mode debug, notification par email.  
4. En cas d’activation de la notification email, un email contenant les informations de la boutique sera envoyé à l’auteur du module (email configurable dans le code).  

#### Aide & Support

Pour toute question ou problème, contactez-moi via :  

* Site web : [thierrylaval.dev](https://thierrylaval.dev)  
* Email : [contact@thierrylaval.dev](mailto:contact@thierrylaval.dev)

#### RGPD & Confidentialité

Ce module peut envoyer une notification à son auteur lors de son installation, uniquement si vous avez activé cette option explicitement. Cette notification contient :

* Nom et URL de la boutique  
* Adresse email du marchand  
* Adresse IP du serveur  

Aucune autre donnée n’est collectée, stockée ou partagée. Cette collecte est uniquement destinée à faciliter l’assistance technique et améliorer le module. Vous pouvez désactiver cette option à tout moment via la configuration du module.

#### 📦 &nbsp; Technologies utilisées

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

#### Soutien & Dons

Votre soutien est précieux pour encourager tout mon travail et mon dévouement.

**Pourquoi faire un don ?**  
Votre don m’aide à continuer de développer et améliorer des outils de qualité pour vous. Chaque contribution, même modeste, me motive à poursuivre cet engagement.

**Modes de dons disponibles :**

* **PayPal** : Don simple, sécurisé et rapide
  
<a href="https://paypal.me/thierrylaval01?country.x=FR&locale.x=fr_FR" target="_blank" rel="noopener noreferrer" style="display:inline-block; margin-right:10px;">
  <img src="https://www.paypalobjects.com/digitalassets/c/website/logo/full-text/pp_fc_hl.svg" alt="Soutiens-moi via PayPal !" width="150" />
</a>

* **Revolut** : Pour un soutien via Revolut, facile et direct  

<a href="https://revolut.me/lavalthierry" target="_blank" rel="noopener noreferrer" style="display:inline-block;">
  <img src="https://cdn.worldvectorlogo.com/logos/revolut-1.svg" alt="Soutiens-moi via Revolut !" width="150" style="object-fit: contain;" />
</a>

**Merci infiniment pour votre générosité !**

[Voir mon travail](https://github.com/thierry-laval)

***

### &hearts;&nbsp;&nbsp;&nbsp;&nbsp;Love Markdown

Donnez une ⭐️ &nbsp;si ce projet vous plaît !

<span style="font-family:Papyrus; font-size:4em;">FAN DE GITHUB !</span>

<a href="#"><img src="https://github.com/thierry-laval/P00-mes-archives/blob/master/images/octocat-oley.png" height="300"></a>

**[⬆ Retour en haut](#auteur)** <br>
