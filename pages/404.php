<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 11/13/15
 * Time: 11:45 AM
 */
?>

<h1 style=" margin-top:20px;text-align:center;color:red;">404.</h1>
<p class="" style="text-align:center;">The requested resource was not found.</p>
<style>
    pre{
        padding:3px;
        background-color: lemonchiffon;
        border: 1px solid black;
        border-radius: 4px;
        width:50%;
        margin:auto;
        overflow: auto;
    }

</style>
<?php
Functions::print_prep(Functions::get_path());
Functions::print_prep($_SERVER);
?>
