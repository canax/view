<?php

namespace Anax\View;

/**
 * A view connected to a template file.
 *
 */
class View
{
    /**
     * Properties
     *
     */
    private $template;          // Template file or array
    private $templateData = []; // Data to send to template file
    private $sortOrder;         // For sorting views
    private $type;              // Type of view



    /**
     * Set values for the view.
     *
     * @param array|string $template the template file, or array
     * @param array        $data     variables to make available to the
     *                               view, default is empty
     * @param integer      $sort     which order to display the views,
     *                               if suitable
     * @param string       $type     which type of view
     *
     * @return self
     */
    public function set($template, $data = [], $sort = 0, $type = "file")
    {
        if (is_array($template)) {
            if (isset($template["callback"])) {
                $type = "callback";
                $this->template = $template;
            } else {
                $this->template = $template["template"];
            }

            $this->templateData = isset($template["data"])
                ? $template["data"]
                : $data;

            $this->sortOrder = isset($template["sort"])
                ? $template["sort"]
                : $sort;

            $this->type = isset($template["type"])
                ? $template["type"]
                : $type;

            return;
        }

        $this->template     = $template;
        $this->templateData = $data;
        $this->sortOrder    = $sort;
        $this->type         = $type;

        return $this;
    }



    /**
     * Render the view.
     *
     * @param object $app optional with access to the framework resources.
     *
     * @return void
     */
    public function render($app = null)
    {
        switch ($this->type) {
            case "file":
                if (!$app) {
                    throw new Exception("View missing \$app.");
                }
                $viewRender = new ViewRenderFile();
                $viewRender->setApp($app);
                $viewRender->render($this->template, $this->templateData);
                break;

            case "callback":
                if (!isset($this->template["callback"]) || !is_callable($this->template["callback"])) {
                    throw new Exception("View missing callback.");
                }

                echo call_user_func($this->template["callback"]);

                break;

            case "string":
                echo $this->template;

                break;

            default:
                throw new Exception("Not a valid template type: {$this->type}");
        }
    }



    /**
     * Give the sort order for this view.
     *
     * @return int
     */
    public function sortOrder()
    {
        return $this->sortOrder;
    }
}
