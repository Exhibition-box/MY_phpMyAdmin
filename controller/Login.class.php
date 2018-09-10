<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/8/31
 * Time: 8:29
 */
class Login
{
    /**
     *跳转到登录的页面
     */
    function index()
    {
        include 'views/login/index.html';
    }

    /**
     * 判断用户信息是否正确
     * 如果正确则跳转的项目首页
     */
    function loginCheck()
    {
//      var_dump($_SERVER);
        $user = $_POST['pma_username'];
        //$pwd=$_POST['pma_password"'];
        $result = $GLOBALS['db']->query('select User from mysql.user where User="' . $user . '" limit 1')->fetchOne();
        //echo 'select User from mysql.user where User="'.$user.'" limit 1';die;
        if (empty($result)) {
            die('此用户不存在!');
        } else {
            $show_database = $GLOBALS['db']->query('show databases')->fetchAll();
            //var_dump($show_database);die;
           header('location:http://localhost/1712/index.php/home/index');
        }
    }

    //退出。
    public function exits()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        $this->index();
    }
}