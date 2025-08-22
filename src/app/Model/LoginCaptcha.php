<?php

namespace TurboPress\Model;

class LoginCaptcha
{
    private ?int $captchaKey1 = null;
    private ?int $captchaKey2 = null;

    public function getCaptchaKey1(): ?int
    {
        return $this->captchaKey1;
    }

    public function setCaptchaKey1(?int $captchaKey1): self
    {
        $this->captchaKey1 = $captchaKey1;

        return $this;
    }

    public function getCaptchaKey2(): ?int
    {
        return $this->captchaKey2;
    }

    public function setCaptchaKey2(?int $captchaKey2): self
    {
        $this->captchaKey2 = $captchaKey2;

        return $this;
    }
}
