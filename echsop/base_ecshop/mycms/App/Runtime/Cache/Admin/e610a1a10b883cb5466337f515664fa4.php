<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>系统首页</title>

<link rel="stylesheet" type="text/css" href="__ADMIN__/Public/css/base.css" />
<script src="__ADMIN__/Public/js/jquery-1.7.1.min.js"></script>
<style type="text/css">
table{border-collapse:collapse;border-spacing:0;}

table.website-info tbody td{padding:9px;padding-left:30px;}
.red{color:red;font-weight:bold;font-weight:bold;}
.c_013A6F{color:#0e0e0d;}
.c_545454{color:#545454;}
.renewals{color:#4E7C00;margin-left: 20px;text-decoration:underline;}
.renewals:HOVER {text-decoration:underline;}
.module-list{margin:0;padding:0;overflow:hidden;}
.module-list li{margin:0;padding:0;float:left;width:130px;text-align:center;height:120px;line-height:120px;}
.module-list li img{vertical-align: middle;}

ul.circle {list-style-type:circle;}
ul.square {list-style-type:square;}
ol.upper-roman {list-style-type:upper-roman;}
ol.lower-alpha {list-style-type:lower-alpha;}

#TextContent1 li{height:18px;font-size:12px;}
</style>

<script type="text/javascript">
$(function(){
	if ($.browser.msie && $.browser.version<8) { //IE浏览器
		//alert('您正在使用低版本IE浏览器,这样会给网站带来不安全因素！');
		CreatNode('902px','469px','__PUBLIC__/browsertip.html');
	}
});

function formatFloat(src, pos)
{
    return Math.round(src*Math.pow(10, pos))/Math.pow(10, pos);
}
$(function(){

	$.get('__APP__/Admin/System/getSpaceSize',{},function(size){
		var space_mb = "<?php echo $custom['space_mb']; ?>";
		$('#use_size').text(size);
		$('#surplus_size').text(formatFloat(space_mb-parseFloat(size),2)+' MB');});
});

function CreatNode(w,h,s) { 
	//参数w为弹出页面的宽度,参数h为弹出页面的高度,参数s为弹出页面的路径 
	var NewMask=window.parent.document.createElement("div"); 
	NewMask.id="Mask"; 
	NewMask.style.position="absolute"; 
	NewMask.style.top="0"; 
	NewMask.style.left="0"; 
	NewMask.style.zIndex="9"; 
	NewMask.style.backgroundColor="#000"; 
	NewMask.style.filter="alpha(opacity=70)"; 
	NewMask.style.opacity="0.7"; 
	NewMask.style.width="100%"; 
	NewMask.style.height=(window.parent.document.body.scrollHeight+50)+"px"; 
	var NewDiv=window.parent.document.createElement("div"); 
	NewDiv.id="newdiv"; 
	NewDiv.style.width=w; 
	NewDiv.style.height=h; 
	NewDiv.style.position="absolute"; 
	NewDiv.style.top=(window.screen.height-450)/4+"px" 
	NewDiv.style.left=(window.screen.width-910)/2+"px"; 
	NewDiv.style.zIndex="99";; 
	var NewFrame=window.parent.document.createElement("iframe"); 
	NewFrame.id="frame" 
	         NewFrame.setAttribute("frameBorder","0"); 
	NewFrame.setAttribute("scrolling","no"); 
	NewFrame.setAttribute("allowTransparency","true"); 
	NewFrame.setAttribute("width",w); 
	NewFrame.setAttribute("height",h); 
	NewFrame.setAttribute("src",s); 
	/*var NewImg=window.parent.document.createElement("img"); 
	NewImg.id="newimg" 
	NewImg.style.cursor="pointer"; 
	NewImg.style.position="relative"; 
	NewImg.style.top="-479px"; 
	NewImg.style.left="880px"; 
	NewImg.onclick=function(){ 
	     Cancel(); 
	     } 
	NewImg.setAttribute("src","fancy_closebox.png") 
	NewImg.setAttribute("title","点击关闭")*/
	$("body",window.parent.document).append(NewMask);//这里用了jquery的添加节点方式,如果没有jquery文件可改成window.parent.document.body.appendChild(NewMask); 
	$("body",window.parent.document).append(NewDiv); 
	$("#newdiv",window.parent.document).append(NewFrame); 
	//$("#newdiv",window.parent.document).append('《跳过');
} 

//移除添加的节点 
function Cancel() { 
	window.parent.document.body.removeChild(window.parent.document.getElementById("Mask")); 
	window.parent.document.body.removeChild(window.parent.document.getElementById("newdiv")); 
} 
</script>

</head>
<body>

<table style="margin:20px;">
	<tbody>
		<tr>
		<td valign="top">
			<div style="border:1px #D5D5D5 solid;border-bottom:none;background:url('__ADMIN__/Public/imgs/webinfo_bg.jpg');"><img src="__ADMIN__/Public/imgs/yy_quick.jpg"></div>
			<div style="border:1px #D5D5D5 solid;border-top:none;padding:20px;">
				<ul class="module-list">
					
				<?php if(is_array($moduleList)): $i = 0; $__LIST__ = $moduleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><?php switch($vo["alias"]): ?><?php case "About": case "News": case "Goods": case "Market": case "Guestbook": case "Advert": case "Job": case "Video":  ?><li><a href="#" onclick="parent.goToModule('#<?php echo ($vo["alias"]); ?>','<?php echo ($vo["alias"]); ?>/index/cid/<?php echo ($vo["first_cid"]); ?>/lang/<?php echo ($vo["lang"]); ?>','Index/sidemenu/pid/<?php echo ($vo["id"]); ?>')"><img src="__ADMIN__/Public/imgs/main/<?php echo ($vo["alias"]); ?>.jpg"></a></li><?php break;?>
						<?php default: ?><?php endswitch;?><?php endforeach; endif; else: echo "" ;endif; ?>
				
				<li><a href="#" onclick="parent.goToModule('#System','System/index/cid/contact','Index/sidemenu')"><img src="__ADMIN__/Public/imgs/main/Contactus.jpg"></a></li>
				<li><a href="#" onclick="parent.goToModule('#System','System/index/cid/seo','Index/sidemenu')"><img src="__ADMIN__/Public/imgs/main/Seo.jpg"></a></li>
				<li><a href="#" onclick="parent.goToModule('#System','System/index/cid/base','Index/sidemenu')"><img src="__ADMIN__/Public/imgs/main/Logo.jpg"></a></li>
				<li><a href="#" onclick="parent.goToModule('#System','System/index/cid/theme','Index/sidemenu')"><img src="__ADMIN__/Public/imgs/main/Theme.jpg"></a></li>
				<!--<li><a href="#" onclick="parent.goToModule('#System','User/index','Index/sidemenu/pid/30')"><img src="__ADMIN__/Public/imgs/main/System.jpg"></a></li>-->
				<li><a href="http://<?php getDomain($custom);?>" target="_blank"><img src="__ADMIN__/Public/imgs/main/Home.jpg"></a></li>
				<li><a href="__APP__/Admin/Public/logout" target="_top"><img src="__ADMIN__/Public/imgs/main/Exit.jpg"></a></li>
				</ul>
			</div>
		</td>
		</tr>
		<tr>
		<td valign="top">
			<div style="border:1px #D5D5D5 solid;margin-top:20px;">
				<table class="website-info" style="width:100%">
					<thead>
						<tr>
							<td style="background:url('__ADMIN__/Public/imgs/webinfo_bg.jpg');"><img src="__ADMIN__/Public/imgs/yy_info.jpg" /></td>
						</tr>
						<tr>
							<td valign="top">
								<div style="background-color:#CDCDCD;line-height:20px;padding: 10px 0 10px 30px; display:none;">
								<strong style="font-size:14px;font-weight:bold;"><?php echo ($custom["website_name"]); ?></strong><br>
								尊敬的客户 <strong class="c_013A6F"><?php echo $_SESSION["admin"]["username"];?></strong> 您好！您的网站现在状态如下：<br>
								<span class="c_545454">开通正式空间时间：</span><span class="red"><?php echo date('Y年m月d日',$custom['begin_time']);?></span>   <span class="c_545454">空间到期时间：</span><span class="red"><?php echo date('Y年m月d日',$custom['end_time']);?></span>   <span class="c_545454">空间剩余时间：</span><strong class="red"><?php echo round(($custom['end_time']-time())/3600/24); ?></strong> 天 <br>
								<span class="c_545454">空间容量：</span><?php echo $space_mb = $custom['space_mb']; ?>MB，<span class="c_545454">现使用容量：</span><span id="use_size">...</span>，<span class="c_545454">剩余：</span><span id="surplus_size">...</span> 
								</div>
							</td>
						</tr>
					</thead>
					<tbody>
					<?php if(is_array($moduleList)): $i = 0; $__LIST__ = $moduleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><?php switch($vo["alias"]): ?><?php case "News":  ?><tr>
								<td style="background-color:#EAEAEA">已发布的新闻信息 <a href="#" onclick="parent.goToModule('#News','News/index','Index/sidemenu/pid/19')" class="red"><?php echo ($newsCount); ?></a> 条</td>
							</tr><?php break;?>
						<?php case "Goods":  ?><tr>
								<td>已发布的产品信息 <a href="#" onclick="parent.goToModule('#Goods','Goods/index','Index/sidemenu/pid/20')" class="red"><?php echo ($goodsCount); ?></a> 条</td>
							</tr><?php break;?>
						<?php case "Guestbook":  ?><tr>
								<td style="background-color:#EAEAEA">收到留言 <a href="#" onclick="parent.goToModule('#Guestbook','Guestbook/index','Index/sidemenu/pid/21')" class="red"><?php echo ($guestbookCount); ?></a> 条，未读留言 <a href="#" onclick="parent.goToModule('#Guestbook','Guestbook/index/cid/222','Index/sidemenu/pid/21')" class="red"><?php echo ($guestbookCountRead0); ?></a> 条</td>
							</tr><?php break;?>
						<?php case "Advert":  ?><tr>
								<td>已发布的广告图片 <a href="#" onclick="parent.goToModule('#Advert','Advert/index','Index/sidemenu/pid/23')" class="red"><?php echo ($advertCount); ?></a> 张</td>
							</tr><?php break;?>
						<?php case "Link":  ?><tr>
								<td style="background-color:#EAEAEA">已发布友情链接 <a href="#" onclick="parent.goToModule('#Link','Link/index','Index/sidemenu/pid/24')" class="red"><?php echo ($linkCount); ?></a> 个</td>
							</tr><?php break;?>
						<?php case "Download":  ?><tr>
								<td>已发布的下载文件 <a href="#" onclick="parent.goToModule('#Download','Download/index','Index/sidemenu/pid/26')" class="red"><?php echo ($downloadCount); ?></a> 个</td>
							</tr><?php break;?>
						<?php case "Job":  ?><tr>
								<td style="background-color:#EAEAEA">已发布的招聘职位 <a href="#" onclick="parent.goToModule('#Job','Job/index','Index/sidemenu/pid/27')" class="red"><?php echo ($jobCount); ?></a> 个，收到的应聘简历 <a href="#" onclick="parent.goToModule('#Job','Job/index','Index/sidemenu/pid/27')" class="red"><?php echo ($jobrCount); ?></a> 个</td>
							</tr><?php break;?>
						<?php case "Member":  ?><tr>
								<td>已注册的会员 <a href="#" onclick="parent.goToModule('#Member','Member/index','Index/sidemenu/pid/29')" class="red"><?php echo ($memberCount); ?></a> 人，今天注册的会员 <a href="#" onclick="parent.goToModule('#Member','Member/index','Index/sidemenu/pid/29')" class="red"><?php echo ($todayMemberCount); ?></a> 人</td>
							</tr><?php break;?><?php endswitch;?><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2">
				<div class="bottom-copyright" style="margin:20px 0;">欢迎使用网站后台</div>
			</td>
		</tr>
	</tfoot>
</table>

</body>
</html>