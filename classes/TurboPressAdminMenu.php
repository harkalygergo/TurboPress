<?php

namespace TurboPress;

class TurboPressAdminMenu extends TurboPress
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        // Add admin menu item
        add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
    }

    public function add_admin_menu()
    {
        add_menu_page(
            $this->pluginName,
            $this->pluginName,
            'manage_options',
            $this->pluginSlug,
            [ $this, 'options_page' ],
            'dashicons-superhero',
            0
        );
    }

    public function options_page()
    {
        echo '<h1>'.$this->pluginName.'</h1>';
        echo '<p>Welcome to the '.$this->pluginName.' options page!</p>';
    }
}
