<?php

class Home{

    /**
     * 跳转的主页面
     */
    function index(){
        $show_database = $GLOBALS['db']->query('show databases')->fetchAll();
        include 'views/home/index.html';
    }

    /**
     * @desc 数据库下的所有表
     */
    function getTable(){
        $database= $_GET['database'];
        $GLOBALS['db']->query("use $database");
        $result = $GLOBALS['db']->query('show tables')->fetchAll();
        $string=json_encode($result);
        $str=  str_replace($database,'name',$string);
        $res = json_decode($str,true); //如果没有true 默认转成对象
        //var_dump($res);die;
        include 'views/home/tableList.html';
    }


    /**
     * @desc 每个表对应的字段和索引
     */
    function getFieldIndex(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        include 'views/home/fieldIndex.html';die;
    }

    /**
     * @desc 获取每个表所对应的字段名
     */
    function getFieldIndexList(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        $sql = $GLOBALS['db']->query("desc $database.$table;")->fetchAll();

        include "views/home/field.html";
    }

    /**
     * @desc 获取每个字段的索引
     */
    function getIndexList(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        $sql = $GLOBALS['db']->query("show index from $database.$table;")->fetchAll();

        include "views/home/sy.html";
    }

    function zhan(){
        $database= $_GET['database'];
        $GLOBALS['db']->select("use $database");
        $result = $GLOBALS['db']->select('show tables')->fetchAll();
        $string=json_encode($result);
        $str=  str_replace($database,'name',$string);
        $res = json_decode($str,true); //如果没有true 默认转成对象
        //var_dump($res);die;
        include 'views/insert/zhan.html';
    }

    /**
     * ajax传值后的新建表页面
     */
    function newTable(){
        include 'views/insert/newTable.html';
    }

    /**
     * @desc 退出登录
     */
    function del(){
        unset($_SESSION['user']);
        include 'views/login/login.html';
    }
}