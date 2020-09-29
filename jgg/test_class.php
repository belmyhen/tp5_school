<?php

$extensions = array("jpg","bmp","gif","png","jpeg");
$uploadFilename = $_FILES['upload']['name'];
$uploadFilesize = $_FILES['upload']['size'];
if($uploadFilesize  > 1024*10*1000){
echo "<font color=\"red\"size=\"2\">*图片大小不能超过10M</font>";
exit;
}

$extension = pathInfo($uploadFilename,PATHINFO_EXTENSION);
if(in_array($extension,$extensions)){
$uploadPath ="/jgg/files/";
$uuid = str_replace('.','',uniqid("",TRUE)).".".$extension;
$desname = $uploadPath.$uuid;
$previewname = '/jgg/files/'.$uuid;
$tag = move_uploaded_file($_FILES['upload']['tmp_name'],$desname);
$arr = array('uploaded'=>1,'url'=>$previewname);
exit(json_encode($arr));
}else{
//echo "<font color=\"red\"size=\"2\">*文件格式不正确（必须为.jpg/.gif/.bmp/.png文件）</font>";
}

/**
 * Define MyClass
 */
class MyClass
{
    // 声明一个公有的构造函数
    public function __construct() { }

    // 声明一个公有的方法
    public function MyPublic() { }

    // 声明一个受保护的方法
    protected function MyProtected() { }

    // 声明一个私有的方法
    private function MyPrivate() { }

    // 此方法为公有
    function Foo()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}

$myclass = new MyClass;
$myclass->MyPublic(); // 这行能被正常执行
//$myclass->MyProtected(); // 这行会产生一个致命错误
//$myclass->MyPrivate(); // 这行会产生一个致命错误
$myclass->Foo(); // 公有，受保护，私有都可以执行


/**
 * Define MyClass2
 */
class MyClass2 extends MyClass
{
    // 此方法为公有
    function Foo2()
    {
        $this->MyPublic();
        $this->MyProtected();
        //$this->MyPrivate(); // 这行会产生一个致命错误
    }
}

$myclass2 = new MyClass2;
$myclass2->MyPublic(); // 这行能被正常执行
$myclass2->Foo2(); // 公有的和受保护的都可执行，但私有的不行

Class Bar
{
	public function test() {
		$this->testPrivate();
		$this->testPublic();
	}
	
	public function testPublic(){
		echo "Bar::testPublic <br />";	
	}
	
	private function testPrivate(){
		echo "Bar::testPrivate <br />";	
	}
}

class Foo extends Bar
{
	public function testPublic(){
		echo "Foo::testPublic <br /><br />";	
	}
	
	private function testPrivate2(){
		echo "Foo::testPrivate2 <br />";	
	}
}

$myFoo = new Foo();
$myFoo->test();
$myFoo->testPublic();


		
		
class MyClassa
{
    const constant = '常量值';

    function showConstant() {
        echo  self::constant . "<br /><br />";
		//echo "afsa";
    }
}

echo MyClassa::constant . "<br />";

$classname = "MyClass";
//echo $classname::constant . PHP_EOL; // 自 5.3.0 起

$class = new MyClassa();
$class->showConstant();

//echo $class::constant . PHP_EOL; // 自 PHP 5.3.0 起

class Food {
  public static $my_static = 'food';
  
  public function staticValue() {
     return "Food2: ".self::$my_static;
  }
}

print "Food1: ".Food::$my_static . "<br />";
$food = new Food();

print $food->staticValue() . "<br /><br />";
		
		
		
class BaseClass {
   function __construct() {
       print "BaseClass 类中构造方法" . "<br /><br />";
   }
}
class SubClass extends BaseClass {
   function __construct() {
	   print " 父类的构造方法: ";
       parent::__construct();  // 子类构造方法不能自动调用父类的构造方法
       print "SubClass 类中构造方法" . "<br /><br />";
   }
}
class OtherSubClass extends BaseClass {
	const constant = '继承 BaseClass 的构造方法:';
    // 继承 BaseClass 的构造方法
	//print " 继承 BaseClass 的构造方法: ";
}

// 调用 BaseClass 构造方法
$obj = new BaseClass();

// 调用 BaseClass、SubClass 构造方法
$obj = new SubClass();

// 调用 BaseClass 构造方法
//echo OtherSubClass::constant . "<br />";
print " 继承 BaseClass 的构造方法: ";
$obj = new OtherSubClass();
		
		
		
class father {

    public function __construct(){
        echo "父类构造函数，如果子类没有重写构造函数将会调用这里。如果子类重写了构造函数则子类不用自动调用这个函数，而需要显示调用父类构造函数。<br /><br />";
    }

    public $m_fa="fa";
    protected $m_fb="fb";
    private $m_fc="fc";

    public function getFa($m_fa, $separator = ".") { return $m_fa; }
    protected function getFb() { return $m_fb; }
    private function getFc() { return $m_fc; }
    public function getFaPrivate_1() { return $m_fc; }
    public function getFaPrivate_2($m_fc) { return $m_fc; }

    public function getAll(){
        echo "變量中獲取： ".$this->m_fa, $this->m_fb, $this->m_fc."<br />";
        echo "方法中獲取： ".$this->getFa(), $this->getFb(), $this->getFc()."<br />";
    }

}

class son extends father{
    public function __construct(){
        parent::__construct(); //显示调用父类构造函数。
        echo "子类构造函数调用<br /><br />";
    }
}

$class_fa = 'father';
$class_son = 'son';
print "new的時候已有構造函數： ";
$fa = new father();
print "firstget: ";
$fa->getAll();
echo $fa->getFa("fa"), "\n";
$son = new son();
$son->getFa("af");
//$son->getAll();
// 执行以下方法回报错，protected 无法在类外面进行调用的
// 报错信息：Fatal error: Uncaught Error: Call to protected method father::getFb()...
// $son->getFb();
// 执行以下方法回报错，private 无法被继承，也无法在类外面进行调用的
// 报错信息：Fatal error: Uncaught Error: Call to private method father::getFc()...
// $son->getFc();

echo $son->getFaPrivate_2("mfc");

class students{
    var $name,$age,$sex;
    function __construct($name,$age,$sex){
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }
	
	public function getAll(){
		echo $this->name." , ".$this->age." , ".$this->sex;	
	}
}

class master extends students{
    var $hobby,$address;
    function __construct($name, $age, $sex,$hobby,$address){
        parent::__construct($name, $age, $sex);
        $this->hobby = $hobby;
        $this->address = $address;
    }
	
	public function getAll(){
		echo $this->name." , ".$this->age." , ".$this->sex." , ".$this->hobby." , ".$this->address;	
	}
}

$std = new students("tao","36","male");
$mst = new master("tao","36","male","travel","zhuhai");
echo "<br /><br />";
$std->getAll();
echo "<br /><br />";
//$mst->getAll();

//魔術常量

echo '这是第 " '  . __LINE__ . ' " 行';
echo '该文件位于 " '  . __FILE__ . ' " ';

?>
<!DOCTYPE html>
<meta charset="utf-8">
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor</title>
        <!-- 确保引入的CKEditor文件路径正确 -->
        <script src="ckeditor/ckeditor.js"></script><!--引入相关js-->  
    <script src="ckfinder/ckfinder.js"></script>
    <script src="ckeditor/config.js"></script><!--引入ckeditor配置-->  
    <link href="ckeditor/contents.css" rel="stylesheet">  
    </head>
    <body>
        <!--<form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // 使用CKEditor替换 <textarea id="editor1">
                // 实例化，使用默认配置
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>-->
    </body>
</html>