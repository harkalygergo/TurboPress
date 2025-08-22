<?php

namespace TurboPress\Controller;

class TurboPressAdminMenuController extends TurboPressController
{
    private array $pluginTabs;

    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        $this->pluginTabs = [
            null => 'Info',
            'head_html' => 'Head HTML',
            'head_css' => 'Head CSS',
            'head_js' => 'Head JS',
            'footer_html' => 'Footer HTML',
            'footer_js' => 'Footer JS',
            'settings' => __( 'Settings'),
            'developer_tools' => 'Developer Tools',
            'log' => 'Napló',
            'phpinfo' => 'PHP Info',
        ];

        add_action( 'admin_menu', [ $this, 'addAdminMenu' ] );
    }

    public function addAdminMenu()
    {
        add_submenu_page(
            'options-general.php',
            $this->pluginName,
            $this->pluginName,
            'manage_options',
            $this->pluginSlug,
            [ $this, 'showTabs' ],
        );
    }

    public function showTabs()
    {
        $tab = $_GET['tab'] ?? null;
        $twig = (new \TurboPress\Model\Twig)->getEnvironment();

        $twigTemplate = 'content.html.twig';
        switch ($tab) {
            case 'head_html':
            case 'head_css':
            case 'head_js':
            case 'footer_html':
            case 'footer_js':
                if (!empty($_POST) && isset($_POST) && is_array($_POST) && count($_POST) && isset($_POST[$tab])) {
                    update_option($this->settings->getPluginPrefix().$tab, $_POST[$tab]);
                }
                $twigTemplate = 'textarea.html.twig';
                $content = get_option($this->settings->getPluginPrefix().$tab);
                break;
            case 'phpinfo':
                ob_start();
                phpinfo();
                $content = explode('</body>', explode('<body>', trim (ob_get_clean ()))['1'])['0'];
                $content .= '<style>table, th, td { border: 1px solid gray;}</style>';
                ob_flush();
                ob_end_clean();
                break;
            case 'settings':
                $content = file_get_contents(__DIR__.'/../View/parts/settings_form.html');
                break;
            case 'log':
                $content = '...';
                break;
            case 'developer_tools':
                $content = file_get_contents(__DIR__.'/../View/parts/developer-tools.html.twig');
                break;
            default:
                $languageCode = get_option('WPLANG') ?? 'en_GB';
                $content = file_get_contents(__DIR__.'/../../assets/documentation/'.$languageCode.'.html');
                break;
        }

        echo $twig->render($twigTemplate, [
                'pluginName' => $this->settings->getPluginName(),
                'pluginSlug' => $this->settings->getPluginSlug(),
                'tabs' => $this->pluginTabs,
                'tab' => $tab,
                'title' => $this->pluginTabs[$tab],
                'content' => $content,
            ]
        );
    }
}
