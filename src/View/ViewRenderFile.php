<?php

namespace Anax\View;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * Render a view based on a template file and a dataset.
 */
class ViewRenderFile implements
    ViewRenderFileInterface,
    AppInjectableInterface
{
    use ViewHelperTrait,
        AppInjectableTrait;



    /**
     * Render the view file.
     *
     * @param string $file to include as view file.
     * @param array  $data to expose within the view.
     *
     * @return void
     *
     * @throws \Anax\View\Exception when template file is not found.
     */
    public function render($file, $data)
    {
        if (!is_readable($file)) {
            throw new Exception("Could not find template file: " . $this->template);
        }

        $data["app"] = $this->app;
        extract($data);
        include $file;
    }
}
