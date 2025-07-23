<?php

declare( strict_types=1 );

namespace TurboPress;

class TurboPress
{
    protected string $pluginName = 'TurboPress';
    protected string $pluginSlug = 'turbo-press';
    protected string $pluginPrefix = 'turbo_press_';

    public function __construct()
    {
    }

    public function init()
    {
        $adminMenu = new TurboPressAdminMenu();
        $adminMenu->init();
    }
}
