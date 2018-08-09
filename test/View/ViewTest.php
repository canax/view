<?php

namespace Anax\View;

use PHPUnit\Framework\TestCase;

/**
 * Views.
 */
class ViewTest extends TestCase
{
    /**
     * View renderes a string.
     */
    public function testRenderString()
    {
        $view = new View();
        $exp = "a string";
        $view->set($exp, [], 0, "string");
        
        ob_start();
        $view->render();
        $res = ob_get_contents();
        ob_end_clean();
        $this->assertEquals($exp, $res);
    }
}
