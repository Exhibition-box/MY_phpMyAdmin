<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/8/31
 * Time: 8:25
 */

//var_dump($_SERVER);

if(!isset($_SERVER['PATH_INFO']) or empty($_SERVER['PATH_INFO'])){
    $_SERVER['PATH_INFO']='welcome/list';
}

$path=$_SERVER['PATH_INFO'];

$path=ltrim($path,'/');

$se=explode('/',$path);

$se[0]=ucfirst($se[0]);

include 'vendor/Db.class.php';
include 'common/Db.config.php';
$GLOBALS['db']=new Db($config['db']);

 //定义__PUBLIC__变量
$host = $_SERVER['HTTP_HOST'];
define("__PUBLIC__",'http://'.$host.'/'.'1712/'.'public/');

include 'controller/'.$se[0].'.class.php';

@call_user_func_array(array($se[0],$se[1]),array(''));


