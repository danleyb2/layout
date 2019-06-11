<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 12/30/15
 * Time: 3:07 PM
 */

//print_r($request);
use core\Controller;

#require_once '/home/brian/PhpstormProjects/Layout/classes/controller.class.php';
class Chat extends Controller
{
    /**
     * runs on all methods.
     * @return mixed
     */
    function all($req)
    {
        // TODO: can this be turned to __construct??
        require_once CONFIG.DS.'config.php';
        //$connection=new Database();
    }

    /**
     * @param $req
     * @property View $view
     */
    function get($req)
    {
        include_once VIEWS.DS.'index.html';
        // Switch over to daemon mode.


        //ob_end_clean(); // Discard the output buffer and close

        #fclose(STDIN);  // Close all of the standard
        #fclose(STDOUT); // file descriptors as we
        #fclose(STDERR); // are running as a daemon.

        #register_shutdown_function('shutdown');

        #if (posix_setsid() < 0)
            #return;

        if ($pid = pcntl_fork())
            return;     // Parent

        // Now running as a daemon. This process will even survive
        // an apachectl stop.
        //require_once SCRIPTS.DS.'chat.php';
        /*sleep(10);

        $fp = fopen("/tmp/sdf123", "w");
        fprintf($fp, "PID = %s\n", posix_getpid());
        fclose($fp);*/

        return;

        /*
        $view=new View($this);
        $view->create('chat');
        $view->script('chat');
        $view->has_header(false);
        $view->has_footer(false);
        $view->main_template('chat',true);
        #$view->cache();
        $view->render(true);
        */
    }

    function post($req)
    {
        // TODO: Implement post() method.
    }

    function put($req)
    {
        // TODO: Implement put() method.
    }

    function patch($req)
    {
        // TODO: Implement patch() method.
    }

    function delete($req)
    {
        // TODO: Implement delete() method.
    }

    function head($req)
    {
        // TODO: Implement head() method.
    }


}
