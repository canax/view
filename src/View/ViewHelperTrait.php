<?php

namespace Anax\View;

/**
 * Trait with view helpers, provided by the ThemeEngine to the views.
 *
 */
trait ViewHelperTrait
{
    /**
     * Shortcut to create an url for a static asset.
     *
     * @param string $url url to use when creating the url.
     *
     * @return string as resulting url.
     */
    public function asset($url = "")
    {
        return $this->app->url->asset($url);
    }



    /**
     * Shortcut to create an url for routing in the framework.
     *
     * @param null|string $url url to use when creating the url.
     *
     * @return string as resulting url.
     */
    public function url($url = "")
    {
        return $this->app->url->create($url);
    }



    /**
     * Render a view with an optional data set of variables.
     *
     * @param string $template the template file, or array
     * @param array  $data     variables to make available to the
     *                         view, default is empty
     *
     * @return void
     */
    public function renderView($template, $data = [])
    {
        $view = new View();
        $template = $this->app->view->getTemplateFile($template);
        $view->set($template, $data);
        $view->render($this->app);
    }



    /**
     * Check if the region in the view container has views to render.
     *
     * @param string $region to check
     *
     * @return boolean true or false
     */
    public function regionHasContent($region)
    {
        return $this->app->view->hasContent($region);
    }



    /**
     * Render views, from the view container, in the region.
     *
     * @param string $region to render in
     *
     * @return boolean true or false
     */
    public function renderRegion($region)
    {
        $this->app->view->render($region);
    }



    /**
     * Create a class attribute from a string or array.
     *
     * @param string|array $args variable amount of classlists.
     *
     * @return string as complete class attribute
     */
    public function classList(...$args)
    {
        $classes = [];
    
        foreach ($args as $arg) {
            if (empty($arg)) {
                continue;
            } elseif (is_string($arg)) {
                $arg = explode(" ", $arg);
            }
            $classes = array_merge($classes, $arg);
        }
    
        return "class=\"" . implode(" ", $classes) . "\"";
    }



    /**
     * Get current url, without querystring.
     *
     * @return string as resulting url.
     */
    public function currentUrl()
    {
        return $this->app->request->getCurrentUrl(false);
    }



    /**
     * Get current route.
     *
     * @return string as resulting route.
     */
    public function currentRoute()
    {
        return $this->app->request->getRoute();
    }



    /**
     * Load content from a route and return details to view.
     *
     * @param string $route to load content from.
     *
     * @return array with values to extract in view.
     */
    // public function getContentForRoute($route)
    // {
    //     $content = $this->di->get("content")->contentForInternalRoute($route);
    //     return $content->views["main"]["data"];
    // }



    /**
     * Wrap a HTML element with start and end.
     *
     * @param string  $text  with content
     * @param string  $tag   HTML tag to search for
     * @param string  $start wrap start part
     * @param string  $end   wrap end part
     * @param number  $count hits to search for
     *
     * @return array with values to extract in view.
     */
    // public function wrapElementWithStartEnd($text, $tag, $start, $end, $count)
    // {
    //     return $this->di->get("textFilter")->wrapElementWithStartEnd($text, $tag, $start, $end, $count);
    // }



    /**
     * Wrap content of a HTML element with start and end.
     *
     * @param string  $text  with content
     * @param string  $tag   HTML tag to search for
     * @param string  $start wrap start part
     * @param string  $end   wrap end part
     * @param number  $count hits to search for
     *
     * @return array with values to extract in view.
     */
    // public function wrapElementContentWithStartEnd($text, $tag, $start, $end, $count)
    // {
    //     return $this->di->get("textFilter")->wrapElementContentWithStartEnd($text, $tag, $start, $end, $count);
    // }



    /**
     * Extrat the publish or update date for the article.
     *
     * @param array $dates a collection of possible date values.
     *
     * @return array with values for showing the date.
     */
    // public function getPublishedDate($dates)
    // {
    //     $defaults = [
    //         "revision" => [],
    //         "published" => null,
    //         "updated" => null,
    //         "created" => null,
    //     ];
    //     $dates = array_merge($defaults, $dates);
    //
    //     if ($dates["revision"]) {
    //         return [t("Latest revision"), key($dates["revision"])];
    //     } elseif ($dates["published"]) {
    //         return [t("Published"), $dates["published"]];
    //     } elseif ($dates["updated"]) {
    //         return [t("Updated"), $dates["updated"]];
    //     } elseif ($dates["created"]) {
    //         return [t("Created"), $dates["created"]];
    //     }
    //
    //     return [t("Missing pubdate."), null];
    // }
}
