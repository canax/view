<?php

namespace Anax\View;

use \Anax\View\ViewRenderFile2 as ViewRenderFile;
use \Anax\View\Exception;
use \Anax\DI\DIInterface;

/**
 * A view connected to a template file, supporting Anax DI.
 */
class View2
{
    /**
     * @var $template     Template file or array
     * @var $templateData Data to send to template file
     * @var $sortOrder    For sorting views
     * @var $type         Type of view
     */
    private $template;
    private $templateData = [];
    private $sortOrder;
    private $type;



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
     * @param object $di optional with access to the framework resources.
     *
     * @return void
     */
    public function render(DIInterface $di = null)
    {
        switch ($this->type) {
            case "file":
                if ($di->has("viewRenderFile")) {
                    $viewRender = $di->get("viewRenderFile");
                } else {
                    $viewRender = new ViewRenderFile($di);
                }
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
