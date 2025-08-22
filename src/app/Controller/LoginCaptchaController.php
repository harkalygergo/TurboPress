<?php

namespace TurboPress\Controller;

use TurboPress\Model\LoginCaptcha;

class LoginCaptchaController
{
    private object $loginCaptcha;

    public function __construct()
    {
        $this->loginCaptcha = new LoginCaptcha();
    }

    public function init()
    {
        if (is_login()) {
            $this->loginCaptcha->setCaptchaKey1(rand(1, 10));
            $this->loginCaptcha->setCaptchaKey2(rand(1, 10));
            $this->setHooks();
        }
    }

    public function setHooks()
    {
        // captcha on login form
        add_action('login_form', [$this, 'showCaptcha']);
        add_action('woocommerce_login_form', [$this, 'showCaptcha']);
        add_action('wp_authenticate_user', [$this, 'validateCaptcha'], 10, 2);
    }

    public function showCaptcha()
    {
        ?>
        <p>
            <label for="user_captcha">Captcha</label>
            <input type="text" name="user_captcha" id="user_captcha" class="input" placeholder="<?php echo $this->loginCaptcha->getCaptchaKey1().'+'.$this->loginCaptcha->getCaptchaKey2().'=?';?>" required>
            <input type="hidden" name="captcha_result" value="<?php echo $this->loginCaptcha->getCaptchaKey1()+$this->loginCaptcha->getCaptchaKey2(); ?>" required>
        </p>
    <?php }

    public function validateCaptcha($user, $password)
    {
        if(!isset($_POST['user_captcha']) || empty($_POST['user_captcha']) || !isset($_POST['captcha_result']) || empty($_POST['captcha_result']))
        {
            return new \WP_Error('empty_captcha', 'CAPTCHA should not be empty');
        }

        if(isset($_POST['user_captcha']) && isset($_POST['captcha_result']) && $_POST['user_captcha'] != $_POST['captcha_result'])
        {
            return new \WP_Error('invalid_captcha', 'CAPTCHA response was incorrect');
        }

        return $user;
    }
}
