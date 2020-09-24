<?php
// 简单的原理重复记： namespace说明了该文件位于application\common\model 文件夹
namespace app\common\model;
use think\Model;    //  导入think\Model类
/**
 * Klass 班級表
 */
  
// 我的类名叫做Klass,对应的文件名为Klass.php.该类继承了Model类,Model我们在文件头中,提前使用use进行了导入
class Klass extends Model
{
    private $Teacher;

    /**
     * 获取对应的教师（辅导员）信息
     * @return Teacher 教师
     * @author Bell 
     */
    public function getTeacher()
    {
        if (is_null($this->Teacher)) {
            $teacherId = $this->getData('teacher_id');
            $this->Teacher = Teacher::get($teacherId);
        }
        return $this->Teacher;

    }

    public function Teacher()
    {
     //练习：代码自己写吧
     return $this->belongsTo('teacher');
    }


	/**
     * 用户登录
     * @param  string $username 用户名
     * @param  string $password 密码
     * @return bool  成功返回true，失败返回false。
     */
    static public function login($username, $password)
    {
        // 验证用户是否存在
        $map = array('username' => $username);
        $Teacher = self::get($map);
        
        if (!is_null($Teacher)) {
            // 验证密码是否正确
            if ($Teacher->checkPassword($password)) {
                // 登录
                session('teacherId', $Teacher->getData('id'));
                return true;
            }
        }
        return false;
    }
	
	/**
     * 验证密码是否正确
     * @param  string $password 密码
     * @return bool           
     */
    public function checkPassword($password)
    {
        if ($this->getData('password') === $this::encryptPassword($password))
        {
            return true;
        } else {
            return false;
        }
    }
	
	/**
     * 密码加密算法
     * @param    string                   $password 加密前密码
     * @return   string                             加密后密码
     * @author panjie@yunzhiclub.com http://www.mengyunzhi.com
     * @DateTime 2016-10-21T09:26:18+0800
     */
    static public function encryptPassword($password)
    {   
		if (!is_string($password)) {
            throw new \RuntimeException("传入变量类型非字符串，错误码2", 2);
        }

        // 实际的过程中，我还还可以借助其它字符串算法，来实现不同的加密。
        return sha1(md5($password));
    }
	
	/**
     * 注销
     * @return bool  成功true，失败false。
     * @author panjie
     */
    static public function logOut()
    {
        // 销毁session中数据
        session('teacherId', null);
        return true;
    }
	
	/**
     * 判断用户是否已登录
     * @return boolean 已登录true
     * @author  Bell
     */
    static public function isLogin()
    {
        $teacherId = session('teacherId');

        // isset()和is_null()是一对反义词
        if (isset($teacherId)) {
            return true;
        } else {
            return false;
        }
    }
}