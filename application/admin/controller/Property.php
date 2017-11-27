<?php
//物业管理
namespace app\admin\controller;

use think\Db;

class Property extends Admin{

    //报修列表页
    public function index()
    {
        $list=Db::name('property')->paginate(5);
        $page=$list->render();
        $this->assign('list',$list);
        $this->assign('page',$page);
        $this->assign('meta_title' , '保修管理');
        return $this->fetch();
    }

    //添加报修
    public function add(){
        if(request()->isPost()){
            $property = model('property');
            $post_data=\think\Request::instance()->post();
            //自动验证
            $validate = validate('property');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $property->create($post_data);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('add_property', 'property', $data->id, UID);
            } else {
                $this->error($property->getError());
            }
        } else {
            $this->assign('info',null);
            $this->assign('meta_title', '新增导航');
            return $this->fetch('edit');
        }
    }

    //修改报修
    public function edit($id = 0){
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $property = \think\Db::name("property");
            $data = $property->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        } else {
            $info =[];
            /* 获取数据 */
            $info = \think\Db::name('property')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            return $this->fetch();
        }
    }

    //删除报修
    public function del(){
        $id = array_unique((array)input('id',0));
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );
        if(\think\Db::name('property')->where($map)->delete()){
            //记录行为
            action_log('del_property', 'property', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

}