<?php 
namespace app\index\controller;
use think\Controller;
use think\Request;              // 请求
use app\common\model\Teacher;   // 教师模型

class LoginController extends Controller
{
	public function index()
	{
		// 显示登录表单
		return $this->fetch();
	}

	public function test()
    {
        echo Teacher::encryptPassword('123');
    }
	
    // 处理用户提交的登录数据
    public function login()
    {
	   
       // 接收post信息
        $postData = Request::instance()->post();
		
        // 验证用户名是否存在
        $map = array('username'  => $postData['username']);
		
        $Teacher = Teacher::get($map);
		//echo $Teacher->getLastSql();
		//var_dump($Teacher);
		//exit;
		
		// 直接调用M层方法，进行登录。
        if (Teacher::login($postData['username'], $postData['password'])) {
            return $this->success('login success', url('Teacher/index'));
        } else {
            return $this->error('username or password incorrent', url('index'));
        }
    }

    // 注销
    public function logOut()
    {
        if (Teacher::logOut()) {
            return $this->success('logout success', url('index'));
        } else {
            return $this->error('logout error', url('index'));
        }
    }
  
}