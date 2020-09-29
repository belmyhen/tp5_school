<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
</script>
<script>

// 點擊class為hide的button 隱藏 class為ex的 div 
$(document).ready(function(){
  $(".ex .hide").click(function(){
    $(".ex").hide("slow");
  });
});

$(document).ready(function(){
  $("p").click(function(){
    $(this).hide();
  });
});


//$(document).ready(function(){
//  $("button").click(function(){
//    $("p").toggle();
//  });
//});

$(document).ready(function(){
  $("button.btn1").click(function(){
	alert("Text: " + $("#test").text());
	$("#test1").text("Hello world!");
    $("#div1").fadeIn();
    $("#div2").fadeIn("slow");
    $("#div3").fadeIn(3000);
  });
});

$(document).ready(function(){
  $("button.btn2").click(function(){
	alert("HTML: " + $("#test").html());
	 $("#test2").html("<b>Hello world!</b>");
    $("#div1").fadeOut();
    $("#div2").fadeOut("slow");
    $("#div3").fadeOut(3000);
  });
});

$(document).ready(function(){
  $("button.btn3").click(function(){
	   $("#test3").val("RUNOOB");
    $("#div1").fadeTo("slow",0.15);
    $("#div2").fadeTo("slow",0.4);
    $("#div3").fadeTo("slow",0.7);
  });
});

$(document).ready(function(){
	$("#flip").click(function(){
    $("#panel").slideToggle();
  });	
  
  $("#stop").click(function(){
    $("#panel").stop();
  });
});

$(document).ready(function(){
  $("button").click(function(){
	//AJAX LOAD
	$("#div0").load("try/ajax/demo_test.txt");
	
	//AJAX GET
	$.get("demo_test.php",function(data,status){
    alert("数据: " + data + "\n状态: " + status);
  });
  
  	//AJAX POST
    $.post("demo_test_post.php",
    {
        name:"菜鸟教程",
        url:"http://www.runoob.com"
    },
    function(data,status){
        alert("数据: \n" + data + "\n状态: " + status);
    });
	
	//jQuery 设置属性
	$("#runoob").attr({
		"href":"http://www.runoob.com/jquery",
		"title" : "jQuery 教程"
	});
	
	//jQuery 效果 - 滑动 + jQuery 方法链接
    $("#p1").css("color","red").slideUp(2000).slideDown(2000);
	
	//jQuery - 获取内容和属性
	alert("值为: " + $("#test0").val());
	
	//jQuery 效果- 动画
    var div=$("div.qbdz");
    div.animate({height:'300px',opacity:'0.4'},"slow");
    div.animate({width:'300px',opacity:'0.8'},"slow");
    div.animate({height:'100px',opacity:'0.4'},"slow");
    div.animate({width:'100px',opacity:'0.8'},"slow");
  });
});

$(document).ready(function(){
  $("#btn4").click(function(){
    $("#test1").text(function(i,origText){
      return "旧文本: " + origText + " 新文本: Hello world! (index: " + i + ")"; 
    });
  });

  $("#btn5").click(function(){
    $("#test2").html(function(i,origText){
      return "旧 html: " + origText + " 新 html: Hello <b>world!</b> (index: " + i + ")"; 
    });
  });
});

$(document).ready(function(){
  $("button").click(function(){
    $("h1,h2,p").toggleClass("blue");
  });
});

</script>
<style type="text/css">
html,body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    /*overflow: hidden;*/
}
.container{
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #000000;
}

div.ex
{
	background-color:#e5eecc;
	padding:7px;
	border:solid 1px #c3c3c3;
}

#panel,#flip
{
	padding:5px;
	text-align:center;
	background-color:#e5eecc;
	border:solid 1px #c3c3c3;
}
#panel
{
	padding:50px;
	display:none;
}

.blue
{
color:blue;
}

</style>

</head>
<body>
<h3>Google</h3>
<div class="ex">
<button class="hide">点我隐藏</button>
<p>站点名: Google<br> 
站点 URL：http://www.google.com</p>
</div>

<h3>菜鸟教程</h3>
<div class="ex">
<button class="hide">点我隐藏</button>
<p>站点名: 菜鸟教程<br> 
站点 URL：http://www.runoob.com</p>
</div>

<p>如果你点击“隐藏” 按钮，我将会消失。</p>

<p>以下实例演示了 fadeIn() 使用了不同参数的效果。</p>
<button class="btn1">点击淡入 div 元素。</button>
<br><br>
<div id="div1" style="width:80px;height:80px;display:none;background-color:red;"></div><br>
<div id="div2" style="width:80px;height:80px;display:none;background-color:green;"></div><br>
<div id="div3" style="width:80px;height:80px;display:none;background-color:blue;"></div>

<p>以下实例演示了 fadeOut() 使用了不同参数的效果。</p>
<button class="btn2">点击淡出 div 元素。</button>
<p>演示 fadeTo() 使用不同参数</p>
<button class="btn3">点我让颜色变淡</button>
<button id="stop">停止滑动</button>
<div id="flip">点我滑下面板</div>
<div id="panel">Hello world!</div>
<br /><br /><br /><br /><br /><br />
<button>开始动画</button>
<p>默认情况下，所有的 HTML 元素有一个静态的位置，且是不可移动的。 
如果需要改变为，我们需要将元素的 position 属性设置为 relative, fixed, 或 absolute!</p>
<div class="qbdz" style="background:#98bf21;height:100px;width:100px;position:absolute;">
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<p id="p1">菜鸟教程!!</p>
<p id="test">这是段落中的 <b>粗体</b> 文本。</p>
<p>名称: <input type="text" id="test0" value="菜鸟教程"></p>
<p id="test1">这是一个段落。</p>
<p id="test2">这是另外一个段落。</p>
<p>输入框: <input type="text" id="test3" value="菜鸟教程"></p>
<p><a href="//www.runoob.com" id="runoob">菜鸟教程</a></p>
<button id="btn4">显示 新/旧 文本</button>
<button id="btn5">显示 新/旧 HTML</button>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div id="div0"><h2>使用 jQuery AJAX 修改文本内容</h2></div>
<h1 class="blue">标题 1</h1>
<h2 class="blue">标题 2</h2>
<p class="blue">这是一个段落。</p>
<p>这是另外一个段落。</p>

</body>
</html>