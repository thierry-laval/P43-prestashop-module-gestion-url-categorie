<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class DisableCategoryUrlRewrite extends Module
{
    const LOG_FILE = _PS_ROOT_DIR_ . '/var/logs/disable_category_url_rewrite.log';

    public function __construct()
    {
        $this->name = 'disablecategoryurlrewrite';
        $this->tab = 'administration';
        $this->version = '1.1.0';
        $this->author = 'Thierry Laval';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Désactive la mise à jour automatique de l\'URL des catégories');
        $this->description = $this->l('Empêche la modification automatique du slug (link_rewrite) des catégories lors du changement de leur nom.');

        $this->confirmUninstall = $this->l('Êtes-vous sûr de vouloir désinstaller ce module ?');
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('actionCategoryUpdate')
            && $this->registerHook('displayBackOfficeHeader')
            && Configuration::updateValue('DISABLE_CAT_URL_REWRITE_ACTIVE', 1);
    }

    public function uninstall()
    {
        return parent::uninstall()
            && Configuration::deleteByName('DISABLE_CAT_URL_REWRITE_ACTIVE');
    }

    public function getContent()
    {
        if (Tools::isSubmit('submitDisableCatUrlRewrite')) {
            $active = Tools::getValue('DISABLE_CAT_URL_REWRITE_ACTIVE');
            Configuration::updateValue('DISABLE_CAT_URL_REWRITE_ACTIVE', (int)$active);
            $this->context->controller->confirmations[] = $this->l('Configuration mise à jour.');
        }

        return $this->renderForm();
    }

    protected function renderForm()
    {
        $fields_form = [
            'form' => [
                'legend' => [
                    'title' => $this->l('Paramètres'),
                    'icon' => 'icon-cogs',
                ],
                'input' => [
                    [
                        'type' => 'switch',
                        'label' => $this->l('Activer le blocage des mises à jour automatiques de l\'URL'),
                        'name' => 'DISABLE_CAT_URL_REWRITE_ACTIVE',
                        'is_bool' => true,
                        'desc' => $this->l('Empêche que le slug (link_rewrite) soit modifié automatiquement lors de la modification du nom de la catégorie.'),
                        'values' => [
                            ['id' => 'active_on', 'value' => 1, 'label' => $this->l('Oui')],
                            ['id' => 'active_off', 'value' => 0, 'label' => $this->l('Non')],
                        ],
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Sauvegarder'),
                ],
            ],
        ];

        $helper = new HelperForm();
        $helper->show_cancel_button = false;
        $helper->table = $this->table;
        $helper->submit_action = 'submitDisableCatUrlRewrite';
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->fields_value['DISABLE_CAT_URL_REWRITE_ACTIVE'] = Configuration::get('DISABLE_CAT_URL_REWRITE_ACTIVE');

        return $helper->generateForm([$fields_form]);
    }

    /**
     * Hook appelé après la mise à jour d'une catégorie
     * Empêche la mise à jour automatique du link_rewrite si activé
     */
    public function hookActionCategoryUpdate($params)
    {
        if (!Configuration::get('DISABLE_CAT_URL_REWRITE_ACTIVE')) {
            return;
        }

        if (isset($params['category']) && Validate::isLoadedObject($params['category'])) {
            $category = $params['category'];
            $id_category = (int)$category->id;

            // Récupérer tous les anciens link_rewrite pour toutes les langues
            $sql = 'SELECT id_lang, link_rewrite 
                    FROM ' . _DB_PREFIX_ . 'category_lang 
                    WHERE id_category = ' . $id_category;
            $results = Db::getInstance()->executeS($sql);

            if (!$results) {
                $this->log('Aucun link_rewrite trouvé pour la catégorie ID ' . $id_category);
                return;
            }

            // Pour chaque langue, remettre l'ancien link_rewrite en base (direct SQL)
            foreach ($results as $row) {
                $id_lang = (int)$row['id_lang'];
                $old_link_rewrite = pSQL($row['link_rewrite']);

                // Si le slug a changé, on remet l'ancien slug
                if ($category->link_rewrite != $old_link_rewrite) {
                    $update_sql = 'UPDATE ' . _DB_PREFIX_ . 'category_lang 
                                   SET link_rewrite = "' . $old_link_rewrite . '" 
                                   WHERE id_category = ' . $id_category . ' AND id_lang = ' . $id_lang;
                    Db::getInstance()->execute($update_sql);
                    $this->log('Blocage update slug catégorie ID ' . $id_category . ', langue ' . $id_lang . ' remis à "' . $old_link_rewrite . '"');
                }
            }
        }
    }

    /**
     * Petit logger simple dans un fichier
     */
    protected function log($message)
    {
        $date = date('Y-m-d H:i:s');
        $text = "[$date] $message\n";
        file_put_contents(self::LOG_FILE, $text, FILE_APPEND);
    }
}
