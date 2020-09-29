<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
</script>
</head>
<body>

<h2>使用 XMLHttpRequest 来获取文件内容</h2>
<p>文件内容是标准的 JSON 格式，可以使用 JSON.parse 方法将其转换为 JavaScript 对象。</p>

<div id="div0"></div>

<h2>使用 jquery $.ajax 来获取文件内容</h2>
<p>文件内容是标准的 JSON 格式，可以使用 JSON.parse 方法将其转换为 JavaScript 对象。</p>

<p id="demo"></p>

<h2>从 JSON 字符串中创建对象</h2>
<p>
网站名: <span id="name"></span><br> 
网站地址: <span id="url"></span><br> 
</p> 

<script>

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		var myObj, i, j, x = "";
        myObj = JSON.parse(this.responseText);
		// 輸出json_demo.txt內容
        //document.getElementById("demo").innerHTML = myObj.sites[0].name;
		
		for (i in myObj.sites) {
			x += "<h1>" + myObj.sites[i].name + "</h1>";
			for (j in myObj.sites[i].info) {
				x += myObj.sites[i].info[j] + "<br />";	
			}
		}
		// 格式化輸出json_demo.txt內容
		//document.getElementById("demo").innerHTML = x;
    }
};
xmlhttp.open("GET", "try/ajax/json_demo.txt", true);
xmlhttp.send();



$(document).ready(function(){
  $("button").click(function(){
    var obj = { "name":"runoob", "alexa":10000, "site":"www.runoob.com"};
	var myJSON = JSON.stringify(obj);
	document.getElementById("div0").innerHTML = myJSON;	
	
	$.ajax({url:"try/ajax/json_demo.txt",success:function(result){
		//$("#demo").html(result);
		var myObj, i, j, x = "";
		myObj = JSON.parse(result);
       	for (i in myObj.sites) {
			x += "<h1>" + myObj.sites[i].name + "</h1>";
			for (j in myObj.sites[i].info) {
				x += myObj.sites[i].info[j] + "<br />";	
			}
		}
		// 格式化輸出json_demo.txt內容
		document.getElementById("demo").innerHTML = x;
    }});
  });
});


var txt = '{ "sites" : [' +
'{ "name":"菜鸟教程" , "url":"www.runoob.com" },' +
'{ "name":"google" , "url":"www.google.com" },' +
'{ "name":"微博" , "url":"www.weibo.com" } ]}';

var obj = eval ("(" + txt + ")");

var i, j, x = "";
for(i in obj.sites) {
	x += "<h1>"	+ obj.sites[i].name + "</h1>"
	for(j in obj.sites[i].url) {
		x += obj.sites[i].url[j];	
	}
}
	
document.getElementById("name").innerHTML=x; 
//document.getElementById("url").innerHTML=obj.sites[0].url 

</script>

<p>查看 JSON 文件数据 <a href="try/ajax/json_demo.txt" target="_blank">json_demo.txt</a></p>
<button>click me</button>
</body>
</html>