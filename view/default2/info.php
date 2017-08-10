<?php
$router = $di->get("router");



?><h1>Anax info</h1>

<h2>Routes loaded</h2>

<p>The following routes are loaded:</p>
<ul>
<?php foreach ($router->getAll() as $route) : ?>
    <li>"<?= $route->getRule() ?>" (<?= $route->getRequestMethod() ?>) <?= $route->getInfo() ?></li>
<?php endforeach; ?>
</ul>

<p>The following internal routes are loaded:</p>
<ul>
<?php foreach ($router->getInternal() as $route) : ?>
    <li><?= $route->getRule() ?></li>
<?php endforeach; ?>
</ul>
