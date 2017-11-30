<?php
namespace app\admin\controller;

use app\home\model\Document;
use think\Controller;

class Task extends Controller{
    //执行脚本 修改活动状态
    public function checkActivity()
    {
        //设置php脚本最长执行时间为无限制
        set_time_limit(0);
        while (1){
            $Model=new Document();
            $time = time();
            $sql="UPDATE `document` set status=-1 WHERE `deadline` < {$time} and status = 1";
            $Model->query($sql);
            sleep(1);
            echo "Clear Completed".date("Y-m-d H:i:s",$time)."\n";
        }


    }
}