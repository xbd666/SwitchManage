<?php
namespace Home\Controller;
class PublicController extends \Think\Controller{

    private $ajax_msg=array(
        1=>'成功',
        2=>'请求方式不正确',
        3=>'用户名或密码错误',
        4=>'超过限制次数,请15分钟后重试',
        5=>'验证码错误',
        6=>'请求交换机IP有误',
        7=>'命令不存在',
        8=>'连接交换机失败',
        9=>'获取交换机接口失败',
        10=>'后台服务未启动',
        11=>'密码不能为空',
        12=>'服务器异常',
        13=>'修改密码与原密码相同'
    );

    /**
     * 返回Ajax请求
     * @param integer $code
     * @param string $msg
     * @param array $data
     */
    protected function ajaxReturn($code,$data=null,$msg=null){
        $result['code']=$code;
        if($msg==null){
            if(isset($this->ajax_msg[$code])){
                $result['msg']=$this->ajax_msg[$code];
            }
        }else{
            $result['msg']=$msg;
        }
        if($data!=null){
            $result['data']=$data;
        }
        parent::ajaxReturn($result);
    }
}