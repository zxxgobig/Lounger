<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
这只是测试后台
<div style="display:none;">
 <?php echo Y('One',array('style'=>'show','model'=>'News','cid' => $sort[0]['id'],'alias' => 'About','tplNum'=>'Home'));?>
 <?php echo U('Index/index',array('l' => 'zh-cn'));?>
 </div>
</body>
</html>