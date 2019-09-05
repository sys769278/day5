<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index');  //渲染模板
    }
    /**
     * 添加放法
    */
    public function add_do(){
        $data=$_REQUEST;
        $data['creat_at']=date('Y-m-d H:i:s');
        $data['ip']='127.0.0.1';
        $data['name']='李晓光';
        $res=Db::table('day4')->insert($data);
        if($res){
            $arr=Db::table('day4')->select();
            if($arr){
                return $this->fetch('show',['data'=>$arr]);
            }
        }else{
            return $this->fetch('show');
        }
    }

    public function show(){

    }
}
