<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>手机主题</title>

<link rel="stylesheet" type="text/css" href="__ADMIN__/Public/css/base.css" />
<script src="__ADMIN__/Public/js/jquery-1.7.1.min.js"></script>
<script src="__ADMIN__/Public/js/base.js"></script>

<script>
$(function(){
	
	var web_theme = "<?php echo $obj['web_theme']; ?>";

	$("input[name=web_theme][value="+web_theme+"]").attr("checked",true);
	$("#"+web_theme).css({'border':'3px solid red'});
	
	$('#category_tpl').change(function() {
	   window.location.href='__APP__/System/theme/ctplid/'+$(this).val();
	});
	var cid="<?php echo $_GET['ctplid']; ?>";
	if( cid ) {
		$('#category_tpl').val(cid);
	}
	
});
</script>

<style>
.theme_box,.theme_box li{list-style:none;margin:0;padding:0}
.theme_box{margin-top:20px;margin-left:20px;overflow: hidden;}
.theme_box li{float:left;margin: 10px 10px;overflow: hidden;height: 220px;}
.theme_box li div{font-weight:bold;}
.theme_box li img{border:1px solid #666;padding:3px;height:188px;width:208px}
#category_tpl{margin:50px 10px 0px 30px;width: 90%;font-size: 14px;padding: 5px;}
</style>

</head>
<body>
<div class="nav-site"><?php getNavSite($nav_site,2);?> &gt; 系统设置 &gt; 网站更换风格</div>
<select name="category_tpl" id="category_tpl">
	<option value="">全部风格</option>
	<?php if(is_array($ctplList)): $i = 0; $__LIST__ = $ctplList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
<form action="__APP__/Admin/System/saveTheme" method="post" enctype="multipart/form-data" class="form">
   <input type="hidden" name="theme_field" value="web_theme">
   <ul class="theme_box">
   	<?php if(is_array($templateList)): $i = 0; $__LIST__ = $templateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
	        <div><img src="http://img.huyionline.cn/tplimg/<?php echo ($vo["image"]); ?>" id="<?php echo ($vo["number"]); ?>"></div>
	        <div><input type="radio" name="web_theme" value="<?php echo ($vo["number"]); ?>"> 模板编号: <?php echo ($vo["number"]); ?></div>
	    </li><?php endforeach; endif; else: echo "" ;endif; ?>
   </ul>
   <div style="margin-left:30px;margin-top:20px;"><input type="submit" value="立刻使用该主题" name="save" class="button button-green button-big" /></div>
</form>
<br><br><br><br><br>
</body>
</html>