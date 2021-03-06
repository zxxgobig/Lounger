<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>手机基本设置</title>

<link rel="stylesheet" type="text/css" href="__ADMIN__/Public/css/base.css" />
<script src="__ADMIN__/Public/js/jquery-1.7.1.min.js"></script>
<script src="__ADMIN__/Public/js/base.js"></script>

<script>
$(function(){
	
	$("input[name=lang][value=<?php echo $_GET['lang'];?>]").attr("checked",true);

	$("input[name=lang]").click(function(){
		window.location.href = '__APP__/Admin/System/index/lang/'+$(this).val()+'/cid/<?php echo $_GET["cid"];?>';
	});

	$('#delete_image').click(function(){
		if( confirm('确定要删除Logo吗？') ) {
			$.get('__APP__/Admin/Mobile/deleteImage',{'id':'<?php echo $system["id"]; ?>'},function(bool){
				if( bool==1 ) {
					$('#span_image').css('display','none');
				}
			});
		}
	});
	
	$('#delete_app_logo').click(function(){
		if( confirm('确定要删除App Logo吗？') ) {
			$.get('__APP__/Admin/Mobile/deleteAppLogo',{'id':'<?php echo $system["id"]; ?>'},function(bool){
				if( bool==1 ) {
					$('#span_app_logo').css('display','none');
				}
			});
		}
	});
	
});
</script>

<style>
.mobile_theme_box td{padding-right:20px;}
</style>

</head>
<body>
<div class="nav-site"><?php getNavSite($nav_site,2);?> &gt; 系统设置 &gt; 网站基本信息</div>

<form action="__APP__/Admin/System/saveSetting" method="post" enctype="multipart/form-data" class="form">
<input type="hidden" name="hardware" value="<?php echo ($_SESSION['hardware']); ?>">
   <fieldset>
       <ul class="align-list">
       	   <?php isLang();?>
		   <li>
               <label>Logo上传</label>
			   <?php if( !empty($system['image']) ) { ?>
               <span id="span_image">
			   <img alt="" align="middle" height="80" vspace="5" src="<?php echo $upload_root_path.'images/mobile/'.$system['image']; ?>">
           	   <a href="javascript:void(0)" id="delete_image" style="color:red;text-decoration:underline;">删除Logo</a>&nbsp;&nbsp;&nbsp;&nbsp;
           	   </span>
           	   <?php } ?>
               <input type="file" name="image">
           </li>
		   <li>
               <label>APP Logo</label>
			   <?php if( !empty($system['app_logo']) ) { ?>
               <span id="span_app_logo">
			   <img alt="" align="middle" height="80" vspace="5" src="<?php echo $upload_root_path.'images/mobile/'.$system['app_logo']; ?>">
           	   <a href="javascript:void(0)" id="delete_app_logo" style="color:red;text-decoration:underline;">删除Logo</a>&nbsp;&nbsp;&nbsp;&nbsp;
           	   </span>
           	   <?php } ?>
               <input type="file" name="app_logo">
           </li>
           <li>
               <label>网站名称</label>
               <input type="text" id="website" name="website" value="<?php echo ($system["website"]); ?>" class="type-text">
           </li>
		   <li>
               <label>网站域名</label>
               <input type="text" id="domain" name="domain" value="<?php echo ($system["domain"]); ?>" class="type-text">
           </li>
           <li>
               <label>ICP备案号</label>
               <input type="text" id="icpnumber" name="icpnumber" value="<?php echo ($system["icpnumber"]); ?>" class="type-text">
           </li>
           <li>
               <label>网站版权</label>
               <input type="text" id="copyright" name="copyright" value="<?php echo ($system["copyright"]); ?>" class="type-text">
           </li>
		   <li>
               <label>可信认证</label>
               <textarea id="credible" name="credible" cols="100" rows="3"><?php echo ($system["credible"]); ?></textarea>
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