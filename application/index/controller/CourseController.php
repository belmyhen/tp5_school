<?php
namespace app\index\controller;     // 该文件的位于application\index\controller文件夹
use think\Request;                  // 引用Request
use app\common\model\Student;       // 學生模型
use app\common\model\Teacher;       // 教师
use app\common\model\Klass;         // 班級模型
use app\common\model\Course;        // 課程模型
use app\common\model\KlassCourse;//引用班級課程驗證

/**
 * 教师管理，继承think\Controller后，就可以利用V层对数据进行打包了。
 * 繼承了IndexController, 里面有继承think\Controller
 */
class CourseController extends IndexController
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

        $Course = new Course; 
        // 定制查询信息
        
		
        
        if (!empty($name)) {
            $Course->where('name', 'like', '%' . $name . '%');
        }
        // 调用分页方法2，獲取數組
        //$teachers = $Teacher->page($page, $pageSize)->select();
        
        // 调用分页方法1，獲取對象
        $Course = $Course->paginate($pageSize);

        //if (!empty($name)) {
        //    $Teacher->where('name', 'like', '%' . $name . '%');
        //}
        //$teachers_total = $Teacher->count();
        //echo $Teacher->getLastSql();	// 获取最后一次操作的SQL语句
        //echo $teachers_total;
		//$lastpg=ceil($teachers_total/$pageSize);
		//$this->assign('lastpg', $lastpg);

        // 向V层传数据
        $this->assign('courses', $Course);

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
        //var_dump($Request->post());
        //exit();
        // 实例化课程并赋值
        $Course = new Course();
        $Course->name = $Request->post('name');

        // 添加数据
        if (!$Course->validate(true)->save()) {
            return $this->error('课程保存错误：' . $Course->getError());
        }

        // -------------------------- 新增班级课程信息 -------------------------- 
        // 接收klass_id这个数组
        $klassIds = Request::instance()->post('klass_id/a');       // /a表示获取的类型为数组

        // 利用klass_id这个数组，拼接为包括klass_id和course_id的二维数组。
        if (!is_null($klassIds)) {
            //$datas = array();
            //foreach ($klassIds as $klassId) {
            //    $data = array();
            //    $data['klass_id'] = $klassId;
            //    $data['course_id'] = $Course->id;     // 此时，由于前面已经执行过数据插入操作，所以可以直接获取到Course对象中的ID值。
            //    array_push($datas, $data);
            if (!$Course->Klasses()->saveAll($klassIds)) {
                return $this->error('课程-班级信息保存错误：' . $Course->Klasses()->getError());
            }
        }

            // 利用saveAll()方法，来将二维数据存入数据库。
            //if (!empty($datas)) {
            //    $KlassCourse = new KlassCourse;
            //    if (!$KlassCourse->validate(true)->saveAll($datas)) {
            //        return $this->error('课程-班级信息保存错误：' . $KlassCourse->getError());
            //    }
            //    unset($KlassCourse);    // unset出现的位置和new语句的缩进量相同，最后被执行
            //}
        // -------------------------- 新增班级课程信息(end) -------------------------- 
        
        //unset($Course); // unset出现的位置和new语句的缩进量相同，在返回前，最后被执行。
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
            // 获取所有的班級信息
            //$Klass = Klass::all();
            //$this->assign('klasses', $Klass);
            $this->assign('Course', new Course);
            return $this->fetch();
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
            $Course = Course::get($id);

            // 要删除的对象存在
            if (is_null($Course)) {
                throw new \Exception('不存在id为' . $id . '的課程，删除失败', 1);
            }

            // 删除对象
            if (!$Course->delete()) {
                return $this->error('删除失败:' . $Course->getError());
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
            if (null === $Course = Course::get($id))
            {
                // 由于在$this->error抛出了异常，所以也可以省略return(不推荐)
                $this->error('系统未找到ID为' . $id . '的记录');
            } 
            
            // 将数据传给V层
            $this->assign('Course', $Course);
            // 取出班级列表
            //$klasses = Klass::all();
            //$this->assign('klasses', $klasses);
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
        // 获取当前课程
        $id = Request::instance()->post('id/d');
        if (is_null($Course = Course::get($id))) {
            return $this->error('不存在ID为' . $id . '的记录');
        }

        // 更新课程名
        $Course->name = Request::instance()->post('name');
        if (is_null($Course->validate(true)->save())) {
            return $this->error('课程信息更新发生错误：' . $Course->getError());
        }

        // 删除原有信息
        $map = ['course_id'=>$id];

        // 执行删除操作。由于可能存在 成功删除0条记录，故使用false来进行判断，而不能使用
        // if (!KlassCourse::where($map)->delete()) {
        // 我们认为，删除0条记录，也是成功
        if (false === $Course->KlassCourses()->where($map)->delete()) {
            return $this->error('删除班级课程关联信息发生错误' . $Course->KlassCourses()->getError());
        }

        // 增加新增数据，执行添加操作。
        $klassIds = Request::instance()->post('klass_id/a');
        if (!is_null($klassIds)) {
            if (!$Course->Klasses()->saveAll($klassIds)) {
                return $this->error('课程-班级信息保存错误：' . $Course->Klasses()->getError());
            }
        }

        return $this->success('更新成功', url('index'));
    }

	

}

