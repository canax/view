<?php

namespace Anax\View;

#use \Anax\View\View2 as View;
use \Anax\View\View2;

/**
 * Define helper functions to include before processing the view template.
 * The functions here are exposed to the view and can be used in the view.
 */

/**
 * Shortcut to create an url for a static asset.
 *
 * @param string $url url to use when creating the url.
 *
 * @return string as resulting url.
 */
function asset($url = "")
{
    global $di;
    return $di->get("url")->asset($url);
}



/**
 * Shortcut to create an url for routing in the framework.
 *
 * @param null|string $url url to use when creating the url.
 *
 * @return string as resulting url.
 */
function url($url = "")
{
    global $di;
    return $di->get("url")->create($url);
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
function renderView($template, $data = [])
{
    global $di;
    $view = new View2();
    $template = $di->get("view")->getTemplateFile($template);
    $view->set($template, $data);
    $view->render($di);
}



/**
 * Check if the region in the view container has views to render.
 *
 * @param string $region to check
 *
 * @return boolean true or false
 */
function regionHasContent($region)
{
    global $di;
    return $di->get("view")->hasContent($region);
}



/**
 * Render views, from the view container, in the region.
 *
 * @param string $region to render in
 *
 * @return boolean true or false
 */
function renderRegion($region)
{
    global $di;
    return $di->get("view")->render($region);
}



/**
 * Create a class attribute from a string or array.
 *
 * @param string|array $args variable amount of classlists.
 *
 * @return string as complete class attribute
 */
function classList(...$args)
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
function currentUrl()
{
    global $di;
    return $di->get("request")->getCurrentUrl(false);
}



/**
 * Get current route.
 *
 * @return string as resulting route.
 */
function currentRoute()
{
    global $di;
    return $di->get("request")->getRoute();
}



/**
 * Show variables/functions that are currently defined and can
 * be used within the view. Call the function with get_defined_vars()
 * as the parameter.
 *
 * @param array $variables should be the retiurned value from
 *                         get_defined_vars()
 *
 * @return string showing variables.
 */
function showEnvironment($variables)
{
    $all = array_keys($variables);
    sort($all);
    $res = "<pre>\nVariables (var_dump them for more information):\n";
    foreach ($all as $var) {
        $variable = $variables[$var];
        $res .= "  $var (" . gettype($variable) . ")";
        if (is_integer($variable) || is_double($variable) ) {
            $res .= ": $variable";
        } elseif (is_string($variable)) {
            $res .= ": \"$variable\"";
        } elseif (is_bool($variable)) {
            $res .= ": " . ( $variable ? "true" : "false" );
        }
        $res .= "\n";
    }
    $res .= "</pre>";

    return $res;
}
