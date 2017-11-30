<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络 <http://www.twothink.cn>
// +----------------------------------------------------------------------

namespace app\user\controller;
use app\common\controller\UcApi;
use think\Db;

/**
 * 用户控制器
 */
class User extends Base {
    /**
     * 修改密码提交
     * @author 艺品网络  <twothink.cn>
     */
    public function profile(){
		if ( !is_login() ) {
			$this->error( '您还没有登陆',url('User/login') );
		}
        if ($this->request->isPost()) {
            //获取参数
            $uid        =   is_login();
            $data = input('param.'); 
            $password   =  $data['old'];;
            $repassword = $data['repassword'];
            $data['password'] = $data['password'];
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');

            if($data['password'] !== $repassword){
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UcApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if($res['status']){
                $this->success('修改密码成功！');
            }else{
                $this->error($res['info']);
            }
        }else{
            return $this->fetch();
        }
    }

    //我的
    public function my()
    {
        return $this->fetch();
    }

    //我的报修
    public function myproperty()
    {
        $user =get_username();
        $list =Db::name('property')->where('user',$user)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }

    //报名的活动
    public function myactivity()
    {
        $user_id=is_login();
        $activities =Db::name('join')->where('user_id',$user_id)->select();
        $ids=[];
        foreach ($activities as $activity){
            $ids[]=$activity['activity_id'];
        }
        $list = Db::name('document')->where('id','in',$ids)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
}
