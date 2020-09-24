<?php
// 简单的原理重复记： namespace说明了该文件位于application\common\model 文件夹
namespace app\common\model;
use think\Model;    //  导入think\Model类 使用前进行声明
/**
 * Course 課程表模型
 */
  
// 我的类名叫做Course,对应的文件名为Course.php.该类继承了Model类,Model我们在文件头中,提前使用use进行了导入
class Course extends Model
{

    public function Klasses()
    {
        return $this->belongsToMany('Klass',  config('database.prefix') . 'klass_course');
    }
	
    /**
     * 获取是否存在相关关联记录
     * @param  object  班级
     * @return bool
     * @author Bell
     */
    public function getIsChecked(Klass &$Klass)
    {
        // 取课程ID
        $courseId = (int)$this->id;
        $klassId = (int)$Klass->id;

        // 定制查询条件
        $map = array();
        $map['klass_id'] = $klassId;
        $map['course_id'] = $courseId;

        // 从关联表中取信息
        $KlassCourse = KlassCourse::get($map);
        if (is_null($KlassCourse)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 一对多关联
     * @author Bell
     * @DateTime 2020-09-24T17:56:05+0800
     */
    public function KlassCourses()
    {
        return $this->hasMany('KlassCourse');
    }
}