<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/30/15
 * Time: 2:49 PM
 */

class RouterTest extends PHPUnit_Framework_TestCase {
    public function setUp(){

    }
    public function testExample(){
        $this->assertFalse(false);
    }
    public function testDirStructure(){
        $this->assertFileExists('cache');
    }
    public function tearDown(){

    }
}
