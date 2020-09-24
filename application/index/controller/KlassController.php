<?php
namespace app\index\controller;     // 该文件的位于application\index\controller文件夹
use think\Request;                  // 引用Request
use app\common\model\Klass;         // 班级模型
use app\common\model\Teacher;       // 教师

/**
 * 教师管理，继承think\Controller后，就可以利用V层对数据进行打包了。
 * 繼承了IndexController, 里面有继承think\Controller
 */
class KlassController extends IndexController
{
    public function index()
    {
		//try {

		// 直接调用M层方法，验证用户是否登录
        //if (!Teacher::isLogin()) {
        //    return $this->error('plz login first', url('Login/index'));
        //}
        
        //放到Index控制器里了
        //public function __construct()
    	//{
        	// 调用父类构造函数(必须)
        //	parent::__construct();
        
        	// 验证用户是否登陆
        //	if (!Teacher::isLogin()) {
        //	    return $this->error('plz login first', url('Login/index'));
        //	}
    	//}
        
		// 获取查询信息
        //$name = $this->request->get('name');
        $name = input('get.name');
        //echo $name;
		// 获取当前页
        $page = Request::instance()->get('page/d');
        $page = $page < 1 ? 1 : $page;
        // 设置每页大小
        $pageSize = 2;

        // 获取偏移量offset
        $offset = ($page - 1) * $pageSize;	

        $Klass = new Klass; 
        // 定制查询信息
        
		
        
        if (!empty($name)) {
            $Klass->where('name', 'like', '%' . $name . '%');
        }
        // 调用分页方法2，獲取數組
        //$teachers = $Teacher->page($page, $pageSize)->select();
        
        // 调用分页方法1，獲取對象
        $klasses = $Klass->paginate($pageSize);

        //if (!empty($name)) {
        //    $Teacher->where('name', 'like', '%' . $name . '%');
        //}
        //$teachers_total = $Teacher->count();
        //echo $Teacher->getLastSql();	// 获取最后一次操作的SQL语句
        //echo $teachers_total;
		//$lastpg=ceil($teachers_total/$pageSize);
		//$this->assign('lastpg', $lastpg);

        // 向V层传数据
        $this->assign('klasses', $klasses);

        // 取回打包后的数据
        $htmls = $this->fetch();

        // 将数据返回给用户
        return $htmls;
		// 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
       // } catch (\think\Exception\HttpResponseException $e) {
       //     throw $e;

        // 获取到正常的异常时，输出异常
        //} catch (\Exception $e) {
        //    return $e->getMessage();
        //} 
    }

    /**
     * 插入新数据
     * @return   html                   
     * @author Bell
     * @DateTime 2020-09-11T12:31:24+0800
     */
    public function save()
    {
        // 实例化请求信息
        $Request = Request::instance();

        // 实例化班级并赋值
        $Klass = new Klass();
        $Klass->name = $Request->post('name');
        $Klass->teacher_id = $Request->post('teacher_id/d');

        // 添加数据
        if (!$Klass->validate(true)->save()) {
            return $this->error('数据添加错误：' . $Klass->getError());
        }

        return $this->success('操作成功', url('index'));
    }

    /**
     * 新增数据交互
     * @author Bell
     * @DateTime 2020-09-11T12:41:23+0800
     */
    public function add()
    {
        try {
            // 获取所有的教师信息
            $teachers = Teacher::all();
            $this->assign('teachers', $teachers);
            $htmls = $this->fetch();
            return $htmls;
        } catch (\Exception $e) {
            return '系统错误' . $e->getMessage();
        }
    }


    /**
     * 删除
     * @return   跳转                   
     * @author Bell
     * @DateTime 2020-09-11T13:52:07+0800
     */
    public function delete()
    {
        try {
            // 实例化请求类
            $Request = Request::instance();
            
            // 获取get数据
            $id = Request::instance()->param('id/d');
            
            // 判断是否成功接收
            if (0 === $id) {
                throw new \Exception('未获取到ID信息', 1);
            }

            // 获取要删除的对象
            $Klass = Klass::get($id);

            // 要删除的对象存在
            if (is_null($Klass)) {
                throw new \Exception('不存在id为' . $id . '的教师，删除失败', 1);
            }

            // 删除对象
            if (!$Klass->delete()) {
                return $this->error('删除失败:' . $Klass->getError());
            }

        // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

        // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        } 

        // 进行跳转 
        return $this->success('删除成功', $Request->header('referer')); 
    }


    /**
     * 编辑
     * @return   html                   
     * @author Bell
     * @DateTime 2020-09-11T13:52:29+0800
     */
    public function edit()
    {
        try {
            // 获取传入ID
            $id = Request::instance()->param('id/d');

            // 判断是否成功接收
            if (is_null($id) || 0 === $id) {
                throw new \Exception('未获取到ID信息', 1);
            }
            
            // 在Klass表模型中获取当前记录
            if (null === $Klass = Klass::get($id))
            {
                // 由于在$this->error抛出了异常，所以也可以省略return(不推荐)
                $this->error('系统未找到ID为' . $id . '的记录');
            } 
            
            // 将数据传给V层
            $this->assign('Klass', $Klass);
            // 获取所有的教师信息
            $teachers = Teacher::all();
            $this->assign('teachers', $teachers);
            // 获取封装好的V层内容
            $htmls = $this->fetch();

            // 将封装好的V层内容返回给用户
            return $htmls;

        // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

        // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        } 
    }

    /**
     * 更新
     * @return                      
     * @author Bell
     * @DateTime 2020-09-11T14:03:41+0800
     */
    public function update()
    {
        try {
            // 接收数据，获取要更新的关键字信息
            $id = Request::instance()->post('id/d');

            // 获取当前对象
            $Klass = Klass::get($id);

            if (!is_null($Klass)) {
                // 写入要更新的数据
                $Klass->name = input('post.name');
                $Klass->teacher_id = input('post.teacher_id');

                // 更新
                if (false === $Klass->validate(true)->save()) {
                    return $this->error('更新失败' . $Klass->getError());
                }
            } else {
                throw new \Exception("所更新的记录不存在", 1);   // 调用PHP内置类时，需要在前面加上 \ 
            }

        // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

        // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        } 
        
        // 成功跳转至index触发器
        return $this->success('操作成功', url('index'));
    }

	/**
     * 更新方法2
     * @return                      
     * @author Bell
     * @DateTime 2020-09-17T14:03:41+0800
     */
    public function update2()
    {
        try {
            // 接收数据，获取要更新的关键字信息
            $id = Request::instance()->post('id/d');
            $message = '更新成功';

            // 获取当前对象
            $Teacher = Teacher::get($id);

            if (!is_null($Teacher)) {
                // 写入要更新的数据
                $Teacher->name = Request::instance()->post('name');
                $Teacher->username = Request::instance()->post('username');
                $Teacher->sex = Request::instance()->post('sex/d');
                $Teacher->email = Request::instance()->post('email');

                // 更新
                if (false === $Teacher->validate(true)->save())
                {
                    $message =  '更新失败' . $Teacher->getError();
                }
            } else {
                throw new \Exception("所更新的记录不存在", 1);   // 调用PHP内置类时，需要在前面加上 \ 
            }
        } catch (\Exception $e) {
            // 由于对异常进行了处理，如果发生了错误，我们仍然需要查看具体的异常位置及信息，那么需要将以下的代码的注释去掉
            // throw $e;
            $message = $e->getMessage();
        }
       
        return $message;
    }

	public function test()
    {

    	$pageSize = 5; // 每次显示5条数据
        $Teacher = new Teacher; 

        // 调用分页
        $teachers = $Teacher->pageSizeinate($pageSize);
        var_dump($teachers);
        echo "abc";
        // 不调用分页
        $teachers = $Teacher->select();
        var_dump($teachers);

        try {
			throw new \Exception("Error Processing Request", 1);
            return $this->error("系统发生错误");
		// 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

        // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            //var_dump($e);
            return $e->getMessage();
        }
    }

}

