<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 3/11/16
 * Time: 3:48 PM
 */
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/massMail.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$massMail = new \massMail\massMail();

# TODO
# addressArray shound be loaded externally.
$addressArray = ['example@126.com', 'example@hotmail.com'];

$massMail->sendMassMail($addressArray);