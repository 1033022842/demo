<?php
$redis = new Redis();
$redis->connect('localhost');
$redis->auth('123456');
//发送邮件的函数
function send_email($data){
    var_dump($data);
}
//根据列表里的队列执行发送邮件的操作
while (true){
    $info = $redis->lPop('activate');
    if ($info == false){
        continue;
    }
    send_email(json_decode($info));
}

//然后写个每分钟执行一次的shell脚本