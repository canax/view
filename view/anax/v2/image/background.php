<?php

namespace Anax\View;

/**
 * A div element with an image as background.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

$src = $src ?? null;
$class = $class ?? null;

?><div <?= classList("background-image", $class) ?> style="background-image:url(<?= asset($src) ?>)">
