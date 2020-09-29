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
echo "<font color=\"red\"size=\"2\">*文件格式不正确（必须为.jpg/.gif/.bmp/.png文件）</font>";
}

		
		?>
<!DOCTYPE html>
<html lang="en">
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
        <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // 使用CKEditor替换 <textarea id="editor1">
                // 实例化，使用默认配置
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>
    </body>
</html>