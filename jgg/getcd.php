<?php
$q=$_GET["q"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("cd_catalog.xml");

$x=$xmlDoc->getElementsByTagName('ARTIST');

for ($i=0; $i<=$x->length-1; $i++)
{
    // 处理元素节点
	//echo $x->item($i)->nodeType." ".$i." ";
	//echo $x->item($i)->nodeValue." <br>";
    if ($x->item($i)->nodeType==1)
    {
        if ($x->item($i)->childNodes->item(0)->nodeValue == $q)
        {
            $y=($x->item($i)->parentNode);
			//print_r($y);
        }
    }
}

$cd=($y->childNodes);

for ($i=0;$i<$cd->length;$i++)
{ 
    // 处理元素节点
    if ($cd->item($i)->nodeType==1)
    {
        echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
        echo($cd->item($i)->nodeValue);
		//echo($cd->item($i)->childNodes->item(0)->nodeValue);
        echo("<br>");
    }
}
?>