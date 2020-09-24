<?php
// 简单的原理重复记： namespace说明了该文件位于application\common\model 文件夹
namespace app\common\model;
use think\Model;    //  导入think\Model类 使用前进行声明
/**
 * Student 學生表
 */
  
// 我的类名叫做Student,对应的文件名为Student.php.该类继承了Model类,Model我们在文件头中,提前使用use进行了导入
class KlassCourse extends Model
{
	 protected $dateFormat = 'Y年m月d日';    // 日期格式

    /**
     * 自定义自转换字换
     * @var array
     */
    protected $type = [
        'create_time' => 'datetime',
    ];
	
	/**
     * 输出性别的属性
     * @return string 0男，1女
     * @author Bell
     */
    public function getSexAttr($value)
    {
        $status = array('0'=>'男','1'=>'女');
        $sex = $status[$value];
        if (isset($sex))
        {
            return $sex;
        } else {
            return $status[0];
        }
    } 
	
	/**
     * 获取要显示的创建时间
     * @param  int $value 时间戳
     * @return string  转换后的字符串
     * @author Bell
     */
    //public function getCreateTimeAttr($value)
    //{
    //    return date('Y-m-d', $value);
    //}	
	
	/**
     * ThinkPHP使用一个叫做__get()的魔法函数来完成这个函数的自动调用
    */
    public function Klass()
    {
        return $this->belongsTo('Klass');
    }
	
}