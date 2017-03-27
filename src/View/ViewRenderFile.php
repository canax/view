<?php

namespace Anax\View;

/**
 * A view connected to a template file.
 *
 */
class ViewRenderFile implements \Anax\Common\AppInjectableInterface
{
    use ViewHelperTrait,
        \Anax\Common\AppInjectableTrait;



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
