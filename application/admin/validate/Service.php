<?php
 
namespace app\admin\validate;
use think\Validate; 

class Service extends Validate{
     
    protected $rule = [ 
        ['title', 'require', '标题不能为空'],
        ['content', 'require', '内容不能为空'],
    ];

}