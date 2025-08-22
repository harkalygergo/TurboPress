<?php

namespace TurboPress\Model;

class Twig
{
    private string $path;
    private object $environment;

    public function __construct()
    {
        $this->path = WP_PLUGIN_DIR.'/TurboPress/src/app/View';
        $this->setEnvironment();
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    public function setEnvironment()
    {
        $loader = new \Twig\Loader\FilesystemLoader($this->path);
        $this->environment = new \Twig\Environment($loader);

        return $this;
    }
}
