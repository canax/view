<?php

namespace Anax\View;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * Render a view based on a template file and a dataset.
 */
class ViewRenderFile2 implements
    ViewRenderFileInterface,
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;



    /**
     * Render the view file.
     *
     * @param string $file to include as view file.
     * @param array  $data to expose within the view.
     *
     * @throws \Anax\View\Exception when template file is not found.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function render($file, $data)
    {
        if (!is_readable($file)) {
            throw new Exception("Could not find template file: " . $this->template);
        }

        global $app;
        $di = $this->di;
        extract($data);
        require $file;
    }



    /**
     * TODO: Remove when updating oophp to new view classes. Its here for
     *       backward compability with views from oophp that used the trait
     *       ViewHelperTrait for view helpers which is now obsolete.
     */
    public function asset($url = "")
    {
        return asset($url);
    }

    public function url($url = "")
    {
        return url($url);
    }

    public function renderView($template, $data = [])
    {
        return renderView($template, $data);
    }

    public function regionHasContent($region)
    {
        return regionHasContent($region);
    }

    public function renderRegion($region)
    {
        return renderRegion($region);
    }

    public function classList(...$args)
    {
        return classList($args);
    }

    public function currentUrl()
    {
        return currentUrl();
    }

    public function currentRoute()
    {
        return currentRoute();
    }
}
