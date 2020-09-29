<?php
// 设置回调函数，确保重新构建对象。
ini_set('unserialize_callback_func', 'mycallback');
function mycallback($classname) {
    include_once $classname . '.php';
	//echo $classname;
}
session_start();
$person = $_SESSION['person'];
//  输出 21
$person->output();
?>