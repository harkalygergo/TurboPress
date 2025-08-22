<?php

namespace TurboPress\Controller;

class LoginBackgroundController
{
    public function init(): void
    {
        $this->setHooks();
    }

    public function setHooks()
    {
        add_action('login_head', [$this, 'setBackgroundImage']);
    }

    public function setBackgroundImage()
    {
        // custom login
        ?>
        <style>
            body.login { background-image:url("<?php echo $this->getPluginUrl(); ?>src/images/login-background-<?php echo date('m'); ?>.webp"); -webkit-background-size: cover; background-size: cover; }
            body.login h1 { opacity:0; }
            body.login p#nav a, body.login p#backtoblog a { background-color:white; padding:5px; border-radius:5px; }
        </style>
    <?php }

}
