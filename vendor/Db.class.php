<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/8/31
 * Time: 9:14
 */
class Db
{
    private static $link;
    private static $result;
    public function __construct($config)
    {

        self::$link = mysqli_connect(
            $config['dns'],
            $config['username'],
            $config['password'],
            $config['dateBase']
        );
    }
    //查看数据库
    public function query($sql){
        self::$result=mysqli_query(self::$link,$sql);
        return $this;
    }
    public function fetchAll(){
        return mysqli_fetch_all(self::$result,MYSQLI_ASSOC);
    }
    public function fetchOne(){
        return mysqli_fetch_array(self::$result,MYSQLI_ASSOC);
    }
    /*
     * 添加数据
     */
    public function insert($tableName,$array=array()){
        $v='(';
        foreach ($array as $key=>$value){
            is_string($value)?$value="'".$value."'":'';
            if(empty($value))  $v.='null';

            $v.=$value.',';
        }
        $v=rtrim($v,',');
        $v.=')';
        $sql='insert into '.$tableName.' values '.$v;
        echo $sql;
        $this->query($sql);
        return mysqli_insert_id(self::$link);
    }
}