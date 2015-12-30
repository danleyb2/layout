<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/30/15
 * Time: 3:07 PM
 */


$view=new View();
$view->create('main');
$view->has_header(true);
$view->has_footer(true);
#$view->cache();
$view->render();

