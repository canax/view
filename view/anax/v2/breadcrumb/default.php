<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

renderView("anax/v2/link-list/default", [
    "links" => $breadcrumb
]);
