<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/30/15
 * Time: 2:56 PM
 */



$router->route('/',                                 'home');
$router->route('home',                              'home');
$router->route('chat',                              'chat');
$router->route('about',                              'about');
$router->route('test',                              'test');
$router->route('users/phone/:phone',                'one');
$router->route('phone/:phoneno/friends/:friend_id', 'two');
$router->route('users/phone/:phone/about',          'three');
$router->route('phone/:passnumber/:signinid',            'four');
$router->route('phone/:phone/media',                'five');



//sleep(5);//todo test