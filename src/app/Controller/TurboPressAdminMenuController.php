<?php

namespace TurboPress\Controller;

class TurboPressAdminMenuController extends TurboPressController
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
        $availableTabs = [
            'head-html' => 'Head HTML',
            'head-css' => 'Head CSS',
            'head-js' => 'Head JS',
            'footer-html' => 'Footer HTML',
            'footer-js' => 'Footer JS',
            'settings' => 'Settings',
            'developer-tools' => 'Developer Tools',
            'log' => 'Napló',
            'phpinfo' => 'PHP Info',
        ];


        $tab = $_GET['tab'] ?? null;
        ?>

        <div class="wrap">
            <h1><?php echo $this->settings->getPluginName(); ?></h1>
            <nav class="nav-tab-wrapper">
                <a href="?page=<?php echo $this->pluginSlug; ?>" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Info</a>

                <?php foreach ($availableTabs as $tabKey => $tabTitle)
                {
                    echo sprintf('<a href="?page=%s&tab=%s" class="nav-tab %s">%s</a>',
                        $this->pluginSlug,
                        $tabKey,
                        $tab===$tabKey ? 'nav-tab-active' : '',
                        $tabTitle
                    );
                }
                ?>
            </nav>
            <div class="tab-content">

                <?php
                switch ($tab) {
                    case 'head-html':
                        break;
                    case 'head-css':
                        break;
                    case 'head-js':
                        break;
                    case 'footer-html':
                        break;
                    case 'footer-js':
                        break;
                    case 'phpinfo':

                        ob_start();
                        phpinfo();
                        echo explode('</body>', explode('<body>', trim (ob_get_clean ()))['1'])['0'];
                        echo '<style>table, th, td { border: 1px solid gray;}</style>';
                        ob_flush();
                        ob_end_clean();
                        break;
                    case 'settings':
                        include_once(__DIR__.'/../View/settings_form.html');
                        break;
                    case 'log':
                        break;
                    case 'developer-tools':
                        echo '<h2>Developer Tools</h2>';
                        ?>
                            <h1>Truncate Posts and Meta</h1>
                            <p>Click the button below to truncate all posts, pages, and their metadata.</p>
                            <form method="post" action="' . esc_url(admin_url('admin-post.php')) . '">
                                <?php echo wp_nonce_field('truncate_posts', '_wpnonce', true, false); ?>
                                <input type="hidden" name="action" value="truncate_posts">
                                <button type="submit" class="button button-primary">Truncate Posts and Meta</button>
                            </form>
                        <?php
                        break;

                    default:
                        $languageCode = get_option('WPLANG')!=='' ? get_option('WPLANG') : 'en_GB';
                        include_once (__DIR__.'/../../assets/documentation/'.$languageCode.'.html');
                        break;
                }
                ?>

            </div>
        </div>

        <?php
    }
}
