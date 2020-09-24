<?php
namespace app\common\validate;
use think\Validate;     // 内置验证类

class KlassCourse extends Validate
{
    protected $rule = [
        'klass_id'  => 'require',
        'course_id' => 'require'
    ];
}