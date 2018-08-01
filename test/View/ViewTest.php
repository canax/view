<?php

namespace Anax\View;

use \PHPUnit\Framework\TestCase;

/**
 * Views.
 */
class ViewTest extends TestCase
{
    /**
     * Test
     *
     * @expectedException \Anax\View\Exception
     */
    public function testInvalidViewType()
    {
        $view = new View();
        $view->set("void", [], 0, "not-valid-typ");
        $view->render();
    }



    /**
     * Test
     *
     * @expectedException \Anax\View\Exception
     */
    public function testMissingApp()
    {
        $view = new View();
        $view->set("void", [], 0, "file");
        $view->render();
    }



    /**
     * Test
     */
    public function testRenderString()
    {
        $view = new View();
        $exp = "a string";
        $view->set($exp, [], 0, "string");
        
        ob_start();
        $view->render();
        $res = ob_get_contents();
        $this->assertEquals($exp, $res);
        ob_end_clean();
    }
}
