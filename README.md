Anax View
==================================

[![Latest Stable Version](https://poser.pugx.org/anax/view/v/stable)](https://packagist.org/packages/anax/view)
[![Join the chat at https://gitter.im/mosbth/anax](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/canax?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/canax/view.svg?branch=master)](https://travis-ci.org/canax/view)
[![CircleCI](https://circleci.com/gh/canax/view.svg?style=svg)](https://circleci.com/gh/canax/view)
[![Build Status](https://scrutinizer-ci.com/g/canax/view/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/view/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/view/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/view/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/canax/view/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/view/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/6dc5e622-2087-4fb5-969e-1609eed3c85b/mini.png)](https://insight.sensiolabs.com/projects/6dc5e622-2087-4fb5-969e-1609eed3c85b)

Anax View module.



Note to reader
------------------

The module should be not be opinionated on how a view should be written and used.

PHP is used as the basic template language for the views.

The module should (future release) provide an interface to ease integration of other standalone template engines.

The module might (future release) implement its own template language.



Features
------------------

* A view is the smallest building block constructing the web page.
* A view can include other views. A specific page view can include a header and a footer view.
* The web page can be divided into regions and views can be attached to, and rendered in, a region.
* A view can be constructed as a layout, specifying what regions to render views in.
* A view can render any type of result and is not limited to HTML.
* A view can call "back" into the framework for additional information retrieval.



View
------------------

The view is the building blocks of a web page. A view contains HTML and uses PHP as a template language to echo out variables and carry out loops.

**view/page.php**

```php
<!doctype html>
<html>
<meta charset="utf-8">
<title><?= $title ?></title>

<navbar>
<?php foreach ($links as $link) : ?>
    <a href="<?= $link["href"] ?>"><?= $link["text"] ?></a>
<?php endforeach; ?> 
</navbar>

</html>
```

A view is usually created within a route or a controller responding to a route. A set of data variables can be sent to the route.


There is a view container holding an organised set of views. The views are the basic, singular, building blocks of the web page to be rendered.

The aim of the 



The view container is a factory for views and can create new views through

A view is the smallest part that can be rendered




License
------------------

This software carries a MIT license.



```
 .  
..:  Copyright (c) 2013 - 2017 Mikael Roos, mos@dbwebb.se
```
