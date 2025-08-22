<?php

namespace TurboPress\Model;

class TurboPress
{
    private string $pluginName = 'TurboPress';
    private string $pluginSlug = 'turbopress';
    private string $pluginPrefix = 'turbopress_';
    private array $pluginOptions = [];

    private string $headHTML;
    private string $headCSS;
    private string $headJS;
    private string $footerHTML;
    private string $footerJS;

    public function getPluginName(): string
    {
        return $this->pluginName;
    }

    public function setPluginName(string $pluginName): TurboPress
    {
        $this->pluginName = $pluginName;

        return $this;
    }

    public function getPluginSlug(): string
    {
        return $this->pluginSlug;
    }

    public function setPluginSlug(string $pluginSlug): TurboPress
    {
        $this->pluginSlug = $pluginSlug;

        return $this;
    }

    public function getPluginPrefix(): string
    {
        return $this->pluginPrefix;
    }

    public function setPluginPrefix(string $pluginPrefix): TurboPress
    {
        $this->pluginPrefix = $pluginPrefix;

        return $this;
    }

    public function getPluginOptions(): array
    {
        return $this->pluginOptions;
    }

    public function setPluginOptions(array $pluginOptions): TurboPress
    {
        $this->pluginOptions = $pluginOptions;

        return $this;
    }

    public function getHeadHTML(): string
    {
        return $this->headHTML;
    }

    public function setHeadHTML(string $headHTML): TurboPress
    {
        $this->headHTML = $headHTML;
    }

    public function getHeadCSS(): string
    {
        return $this->headCSS;
    }

    public function setHeadCSS(string $headCSS): TurboPress
    {
        $this->headCSS = $headCSS;

        return $this;
    }

    public function getHeadJS(): string
    {
        return $this->headJS;
    }

    public function setHeadJS(string $headJS): TurboPress
    {
        $this->headJS = $headJS;

        return $this;
    }

    public function getFooterHTML(): string
    {
        return $this->footerHTML;
    }

    public function setFooterHTML(string $footerHTML): TurboPress
    {
        $this->footerHTML = $footerHTML;

        return $this;
    }

    public function getFooterJS(): string
    {
        return $this->footerJS;
    }

    public function setFooterJS(string $footerJS): TurboPress
    {
        $this->footerJS = $footerJS;

        return $this;
    }
}
