<?php
//public function ruhuo()
//{
        $redis = new Redis();
  		$redis->connect('127.0.0.1', 6379);
		echo "Connection to server successfully";
         //查看服务是否运行
   		echo "Server is running: " . $redis->ping();
		
        for($i = 1;$i<=1000;$i++) {
            $redis->lpush('goods_list',$i);
		}
        echo '进货成功';
 //   }
?>