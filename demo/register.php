<?php
$redis = new Redis();
$redis->connect('localhost');
$redis->auth('123456');
//完成注册  插入到mysql数据库。。略
//发送邮件让用户激活
$username = $_POST['username'];
$email = $_POST['email'];

$redis->rPush('activate',json_encode(['email'=>$email,'username'=>$username]));

//跳转到注册成功页面
echo 'success';