Revision history
=================================


v1.0.15 (2017-08-15)
---------------------------------

* Phpmd config to ignore short name for $di.
* Make anax/di and anax/configure part of composer.json to pass tests.


v1.0.14 (2017-08-14)
---------------------------------

* Bug: Double codeline in ViewRenderFile, fix #2.
* Change view info to use Route->getInfo().
* Add info about di loaded services.


v1.0.13 (2017-08-10)
---------------------------------

* Adding a version supporting DI using classes ViewCollection, View2 and config/viewdi.php.
* Update configfile view.php to include helper-functions for use in the view template files.


v1.0.12 (2017-06-27)
---------------------------------

* Replace view default1/404 with default1/http_status_code.
* Add own view dir to config path.
* Add navbar region to default1/layout.


v1.0.11 (2017-06-27)
---------------------------------

* Print route details in view/default1/info.


v1.0.10 (2017-06-26)
---------------------------------

* Add stylesheets to view/default1/layout.php.


v1.0.9 (2017-06-16)
---------------------------------

* Remove stray setApp from ViewContainer.
* Add new directory for views to prepare move from older versions.


v1.0.8 (2017-03-30)
---------------------------------

* Fix renderView() to supply $app.


v1.0.7 (2017-03-27)
---------------------------------

* Cleanup docblock.
* ViewContainer implements ConfigureInterface.


v1.0.6 (2017-03-17)
---------------------------------

* Update Makefile and configuration of phpcs.


v1.0.5 (2017-03-17)
---------------------------------

* Formatting and phpcs of view files.


v1.0.4 (2017-03-15)
---------------------------------

* Renamed all view files and removed .tpl.


v1.0.3 (2017-03-10)
---------------------------------

* Added default view library as example in view/default.
* Added config in config/view.php.


v1.0.2 (2017-03-09)
---------------------------------

* `ViewContainer:render()` returns void.


v1.0.1 (2017-03-09)
---------------------------------

* Remove duplicate $app from ViewContainer.
* Add sensiolabs badge.


v1.0.0 (2017-03-09)
---------------------------------

* Extracted from anax to be its own module.
* Rewritten without $di.
