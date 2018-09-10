<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/8/31
 * Time: 21:12
 */
class Sql
{
    /**
     * 查询数据库
     * 跳转到sql的页面
     */
    function Index(){
        $show_database = $GLOBALS['db']->query('show databases')->fetchAll();
        include 'views/sql/index.html';
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
        include 'views/sql/tableList.html';
    }


    /**
     * @desc 每个表对应的字段和索引
     */
    function getFieldIndex(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        include 'views/sql/fieldIndex.html';die;
    }

    /**
     * @desc 获取每个表所对应的字段名
     */
    function getFieldIndexList(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        $sql = $GLOBALS['db']->query("desc $database.$table;")->fetchAll();

        include "views/sql/field.html";
    }

    /**
     * @desc 获取每个字段的索引
     */
    function getIndexList(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        $sql = $GLOBALS['db']->query("desc $database.$table;")->fetchAll();


        include "views/sql/sy.html";
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
}