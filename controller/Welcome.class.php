<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/8/31
 * Time: 8:29
 */
class Welcome
{
    /**
     * 跳转页面的地址是否有参数 如果没有参数执行此方法 跳转到欢迎页面
     */
    function list(){

        include 'views/list.html';
    }
}