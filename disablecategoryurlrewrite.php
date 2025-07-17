<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class DisableCategoryUrlRewrite extends Module
{
    public function __construct()
    {
        $this->name = 'disablecategoryurlrewrite';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Thierry Laval';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Désactive la mise à jour automatique de l\'URL des catégories');
        $this->description = $this->l('Empêche la modification automatique du slug (link_rewrite) des catégories lors du changement de leur nom.');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('actionCategoryUpdateBefore');
    }

    /**
     * Hook exécuté avant la mise à jour d'une catégorie.
     * On remet les anciens link_rewrite pour éviter leur modification automatique.
     */
    public function hookActionCategoryUpdateBefore($params)
    {
        if (isset($params['category']) && Validate::isLoadedObject($params['category'])) {
            $category = $params['category'];
            $id_category = (int)$category->id;

            // Récupérer les anciens slugs pour toutes les langues
            $sql = 'SELECT id_lang, link_rewrite FROM ' . _DB_PREFIX_ . 'category_lang WHERE id_category = ' . $id_category;
            $old_links = Db::getInstance()->executeS($sql);

            if ($old_links) {
                foreach ($old_links as $old_link) {
                    // On force la valeur du slug à l'ancien pour chaque langue
                    $category->link_rewrite[$old_link['id_lang']] = $old_link['link_rewrite'];
                }
            }
        }
    }
}
