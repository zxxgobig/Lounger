<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SEO设置</title>

<link rel="stylesheet" type="text/css" href="__ADMIN__/Public/css/base.css" />
<script src="__ADMIN__/Public/js/jquery-1.7.1.min.js"></script>
<script src="__ADMIN__/Public/js/base.js"></script>

<script>
$(function(){
	$("input[name=lang][value=<?php echo $_GET['lang'];?>]").attr("checked",true);

	$("input[name=lang]").click(function(){
		window.location.href = '__APP__/Admin/System/index/lang/'+$(this).val()+'/cid/<?php echo $_GET["cid"];?>';
	});
});
</script>

</head>
<body>
<div class="nav-site"><?php getNavSite($nav_site,2);?> &gt; 系统设置 &gt; 网站SEO设置</div>

<form action="__APP__/Admin/System/saveSetting" method="post" class="form">
<input type="hidden" name="hardware" value="<?php echo ($_SESSION['hardware']); ?>">
   <fieldset>
       <ul class="align-list">
       	<?php isLang();?>
           <li>
               <label>标题(Title)</label>
               <input type="text" id="seo_title" name="seo_title" value="<?php echo ($system["seo_title"]); ?>" class="type-text">
           </li>
           <li>
               <label>关键字(Keywords)</label>
               <input type="text" id="seo_keywords" name="seo_keywords" value="<?php echo ($system["seo_keywords"]); ?>" class="type-text">
           </li>
           <li>
               <label>描述(Description)</label>
               <input type="text" id="seo_description" name="seo_description" value="<?php echo ($system["seo_description"]); ?>" class="type-text">
           </li>
		   <li>
			   <?php echoLangsCheckbox($_GET['lang']);?>
           </li>
		   <li>
               <label></label>
           </li>
           <li>
               <label></label>
               <input type="submit" value="确定并保存" name="save" class="button button-green button-big" />
            </li>
        </ul>
    </fieldset>
</form>

</body>
</html>