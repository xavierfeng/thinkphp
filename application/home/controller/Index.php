<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace app\home\controller;
use app\admin\model\Notice;
use app\admin\model\Property;
use app\home\model\Document;
use app\home\model\Join;
use OT\DataDictionary;
use think\Config;
use think\Db;
use think\response\Json;
use think\Session;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class Index extends Home{

	//系统首页
    public function index(){
        $category = model('Category')->getTree();
        $document = new Document();
        $lists    = $document->lists(null);
        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('page',model('Document')->page);//分页

        return $this->fetch();
    }

    //在线报修
    public function online(){
        if(request()->isPost()) {
            $property = new Property();
            $post_data = \think\Request::instance()->post();
            //自动验证
            $validate = new \app\admin\validate\Property();
            if (!$validate->check($post_data)) {
                return $this->error($validate->getError());
            }
            $data = $property->create($post_data);
            if ($data) {
                $this->success('新增成功', url('index'));
            } else {
                $this->error($property->getError());
            }
        }
        $this->assign('property',$property);
        return $this->fetch();
    }


    //服务
    public function fuwu()
    {
        return $this->fetch();
    }

    //业主认证
    public function identify()
    {
        return $this->fetch();
    }

    //业主认证Ajax
    public function identifyAjax()
    {
        $member=Db::name('ucenter_member')->find($_POST['uid']);
        if($member['identify']==0){
            \think\Db::name('ucenter_member')->where('id',$_POST['uid'])->setField('identify',1);
            echo 'true';
        }
    }

    //点击业主认证判断是否认证 Ajax
    public function checkIdentify()
    {
        $member=Db::name('ucenter_member')->find($_POST['uid']);
        if($member['identify']==0){
            echo 'true';
        }
    }

    //关于我们
    public function about()
    {
        $info = \think\Db::name('document')->whereLike('name','About')->find();
        $this->assign('info',$info);
        return $this->fetch();
    }

    //发现
    public function faxian()
    {
        return $this->fetch();
    }

    //小区通知
    public function notice()
    {
        $page=1;
        if($_GET){
            $page=$_GET['page'];
        }
        $pageSize=1;
        $start=($page-1)*$pageSize;
        $list =Db::name('notice')->limit($start,$pageSize)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }

    //小区通知Ajax
    public function noticeAjax()
    {
        $page=$_GET['page'];
        $pageSize=1;
        $start=($page-1)*$pageSize;
        $list =Db::name('notice')->limit($start,$pageSize)->select();
        echo json_encode($list);

    }

    //小区通知详情
    public function noticeDetail($id)
    {
        $info =[];
        /* 获取数据 */
        $info = \think\Db::name('notice')->find($id);
        \think\Db::name('notice')->where('id',$id)->setInc('view_times');
        if(false === $info){
            $this->error('获取配置信息错误');
        }
        $this->assign('info', $info);
        return $this->fetch();
    }

    //便民服务
    public function service()
    {
        $page=1;
        if($_GET){
            $page=$_GET['page'];
        }
        $pageSize=1;
        $start=($page-1)*$pageSize;
        $list =Db::name('service')->limit($start,$pageSize)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    //便民服务Ajax
    public function serviceAjax()
    {
        $page=$_GET['page'];
        $pageSize=1;
        $start=($page-1)*$pageSize;
        $list =Db::name('service')->limit($start,$pageSize)->select();
        echo json_encode($list);

    }

    //获取图片
    public function getPicture($cover_id)
    {
        $src = Db::name('picture')->find($cover_id);
        echo json_encode($src);
    }

    //便民服务详情
    public function serviceDetail($id)
    {
        $info =[];
        /* 获取数据 */
        $info = \think\Db::name('service')->find($id);
        \think\Db::name('service')->where('id',$id)->setInc('view_times');
        if(false === $info){
            $this->error('获取配置信息错误');
        }
        $this->assign('info', $info);
        return $this->fetch();
    }

    //商家活动
    public function bactivity()
    {
        $page=1;
        if($_GET){
            $page=$_GET['page'];
        }
        $pageSize=1;
        $start=($page-1)*$pageSize;
        $list =Db::name('document')->whereLike('name','Bactivity%')->where('deadline','>',time())->where('status',1)->limit($start,$pageSize)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    //商家活动Ajax
    public function bactivityAjax()
    {
        $page=$_GET['page'];
        $pageSize=1;
        $start=($page-1)*$pageSize;
        $list =Db::name('document')->whereLike('name','Bactivity%')->where('deadline','>',time())->where('status',1)->limit($start,$pageSize)->select();
        echo json_encode($list);

    }
    //商家活动详情
    public function bactivityDetail($id)
    {
        $info =[];
        /* 获取数据 */
        $info = \think\Db::name('document')->find($id);
        $infoContent = \think\Db::name('document_article')->find($id);
        \think\Db::name('document')->where('id',$id)->setInc('view');
        if(false === $info){
            $this->error('获取配置信息错误');
        }
        $this->assign('info', $info);
        $this->assign('infoContent', $infoContent);
        return $this->fetch();
    }

    //小区活动
    public function vactivity()
    {
        $page=1;
        if($_GET){
            $page=$_GET['page'];
        }
        $pageSize=1;
        $start=($page-1)*$pageSize;
        $list =Db::name('document')->whereLike('name','Vactivity%')->where('deadline','>',time())->where('status',1)->limit($start,$pageSize)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    //小区活动Ajax
    public function vactivityAjax()
    {
        $page=$_GET['page'];
        $pageSize=1;
        $start=($page-1)*$pageSize;
        $list =Db::name('document')->whereLike('name','Vactivity%')->where('deadline','>',time())->where('status',1)->limit($start,$pageSize)->select();
        echo json_encode($list);

    }
    //小区活动详情
    public function vactivityDetail($id)
    {
        $info =[];
        /* 获取数据 */
        $info = \think\Db::name('document')->find($id);
        $infoContent = \think\Db::name('document_article')->find($id);
        \think\Db::name('document')->where('id',$id)->setInc('view');
        if(false === $info){
            $this->error('获取配置信息错误');
        }
        $this->assign('info', $info);
        $this->assign('infoContent', $infoContent);
        return $this->fetch();
    }

    //报名参加小区活动
    public function join()
    {
        $check = Db::name('join')->where('user_id',$_POST['user_id'])->where('activity_id',$_POST['activity_id'])->find();
        if(!$check){
            $join = new Join();
            $join->data([
                'user_id'=>$_POST['user_id'],
                'activity_id'=>$_POST['activity_id']
            ]);
            $join->save();
            echo "success";
        }
    }

    //生活贴士
    public function tips()
    {
        $page=1;
        if($_GET){
            $page=$_GET['page'];
        }
        $pageSize=1;
        $start=($page-1)*$pageSize;
        //小区活动
        $Vactivity =Db::name('document')->whereLike('name','Vactivity%')->where('deadline','>',time())->where('status',1)->limit($start,$pageSize)->select();
        //便民服务

        $service =Db::name('service')->limit($start,$pageSize)->select();
        //小区通知
        $notice =Db::name('notice')->limit($start,$pageSize)->select();

        $this->assign('Vactivity',$Vactivity);
        $this->assign('service',$service);
        $this->assign('notice',$notice);
        return $this->fetch();
    }

    //小区租售
    public function rent()
    {
        //租房
        $list1 =Db::name('document')->whereLike('name','rent%')->where('deadline','>',time())->where('status',1)->select();
        //售房
        $list2 =Db::name('document')->whereLike('name','sale%')->where('deadline','>',time())->where('status',1)->select();
        $this->assign('list1',$list1);
        $this->assign('list2',$list2);
        return $this->fetch();
    }

    //小区租售详情
    public function rentDetail($id)
    {
        $info = \think\Db::name('document')->find($id);
        $infoContent = \think\Db::name('document_article')->find($id);
        \think\Db::name('document')->where('id',$id)->setInc('view');
        if(false === $info){
            $this->error('获取配置信息错误');
        }
        $this->assign('info', $info);
        $this->assign('infoContent', $infoContent);
        return $this->fetch();
    }
}
