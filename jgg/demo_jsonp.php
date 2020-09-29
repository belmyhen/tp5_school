<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>JSONP 实例</title>
<script src="https://cdn.static.runoob.com/libs/jquery/1.8.3/jquery.js"></script> 
</head>
<body>
<p>JSONP</p>
<div id="divCustomers"></div>
<p>jQuery JSONP</p>
<div id="divCustomers2"></div>
<script type="text/javascript">
function callbackFunction(result, methodName)
{
    var html = '<ul>';
    for(var i = 0; i < result.length; i++)
    {
        html += '<li>' + result[i] + '</li>';
    }
    html += '</ul>';
    document.getElementById('divCustomers').innerHTML = html;
}


$.getJSON("https://www.runoob.com/try/ajax/jsonp.php?jsoncallback=?", function(data) {
    
    var html = '<ul>';
    for(var i = 0; i < data.length; i++)
    {
        html += '<li>' + data[i] + '</li>';
    }
    html += '</ul>';
    
    $('#divCustomers2').html(html); 
});


</script>
<script type="text/javascript" src="https://www.runoob.com/try/ajax/jsonp.php?jsoncallback=callbackFunction"></script>

<?php
   $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
   $pj = json_encode($arr);
   echo $pj."<br />";
   
   var_dump(json_decode($pj));
   var_dump(json_decode($pj, true));
   
   class Emp {
       public $name = "";
       public $hobbies  = "";
       public $birthdate = "";
   }
   $e = new Emp();
   $e->name = "sachin";
   $e->hobbies  = "sports";
   $e->birthdate = date('m/d/Y h:i:s a', "8/5/1974 12:20:03 p");
   $e->birthdate = date('m/d/Y h:i:s a', strtotime("8/5/1974 12:20:03"));

   echo json_encode($e)."<br />";;
   //echo base64_encode("BAKER");
   $arr = array('runoob' => '菜鸟教程', 'taobao' => '淘宝网');
   echo json_encode($arr)."<br />";; // 编码中文
   echo PHP_EOL;  // 换行符
   echo json_encode($arr, JSON_UNESCAPED_UNICODE);  // 不编码中文
?>
<case id="9474">
      <entuid>0102/2019</entuid>
      <enttypegroup>專業技術/管理人員</enttypegroup>
      <enttype>首次申請</enttype>
      <name>BAKER</name>
      <date_of_birth>08/20</date_of_birth>
      <docid>545</docid>
      <smsmobile>66520888</smsmobile>
      <status>3</status>
  </case>
</body>
</html>