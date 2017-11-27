<?php
 
namespace app\admin\validate;
use think\Validate; 

class Property extends Validate{
     
    protected $rule = [ 
        ['user', 'require', '报修人不能为空'],
        ['tel', 'require', '电话不能为空'],
    ];

   /* protected $message = [
        'tel.mobile'  => '手机格式错误'
        ];*/
}