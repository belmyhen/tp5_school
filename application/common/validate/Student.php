<?php
namespace app\common\validate;
use think\Validate;     // 内置验证类

class Student extends Validate
{
    protected $rule = [
        'name'  => 'require|length:2,25',
        'num' => 'require',
        'sex' => 'in:0,1',
        'klass_id' => 'require',
        'email' => 'email',
    ];
}