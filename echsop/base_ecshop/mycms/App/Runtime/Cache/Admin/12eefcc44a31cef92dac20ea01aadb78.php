<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>默认数据表格</title>
<link rel="stylesheet" type="text/css" href="__ADMIN__/Public/css/base.css" />
<script src="__ADMIN__/Public/js/jquery-1.7.1.min.js"></script>
<script src="__ADMIN__/Public/js/base.js"></script>

<script>
function Data(){
	this._APP_ = "__APP__";
	this.c_root = "<?php echo $_SESSION['c_root']; ?>";
	this.get_cid = "<?php echo $_GET['cid']; ?>";
	this.get_lang = "<?php echo $_GET['lang']; ?>";
	this.def_lang = "<?php echo $custom['def_lang']; ?>"
	this.rowpage = "<?php echo $rowpage; ?>";
	this.actionName = "<?php echo $actionName;?>";
}
</script>
<script src="__ADMIN__/Public/js/index.js"></script>

</head>
<body>

<div class="nav-site"><?php getNavSite($nav_site,$_GET['cid']);?></div>

<form action="__APP__/Admin/News" method="post" id="form_list">
<input type="hidden" name="cid" value="<?php echo $_GET["cid"];?>" />
<table class="grid-function" border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th width="600">
				<div class="qw-fl grid-add-data">
					<input type="button" value="添加信息" onclick="goToUrl('__APP__/Admin/News/edit/lang/<?php echo $_GET["lang"];?>/cid/<?php echo $_GET["cid"];?>');" class="button-img-add" />
				</div>
				<div class="qw-fl grid-batch-operate">
					<a href="#" id="on_ordernum" title="数字排序"><img src="__ADMIN__/Public/imgs/sort.png" /></a>&nbsp;&nbsp;
					<a href="#" id="on_move" title="移动数据"><img src="__ADMIN__/Public/imgs/move.png"  /></a>&nbsp;&nbsp;
					<a href="#" id="on_copy" title="复制一份"><img src="__ADMIN__/Public/imgs/copy.png"  /></a>&nbsp;&nbsp;
					<a href="#" id="on_delete" title="彻底删除"><img src="__ADMIN__/Public/imgs/delete.png" /></a>&nbsp;&nbsp;
				</div>
				<div class="qw-fr">
					<input name="searchKey" id="searchKey" value="<?php echo ($searchKey); ?>" onclick="inputText(this,'请输入关键字');" onblur="inputText(this,'请输入关键字');" class="grid-search-input" /> <input type="button" value="搜索" class="button" id="search_button" />
				</div>
			</th>
		</tr>
	</thead>
	<!-- 移动和复制操作分类选择 -->
	<!-- layout::Inc:category_lang::0 -->
</table>
<table class="grid-table" border="1" cellpadding="0" cellspacing="0"> 
	<thead> 
		<tr>
			<th width="15"><input type="checkbox" id="chk_all"></th>
			<th width="40">排序<a href="#" title="数字最大的排序在最前面">？</a></th>
		    <th>标题</th>
		    <th width="40">浏览数</th>
		    <th width="80">分类</th>
		    <th width="75">更新时间</th>
		    <th width="25">发布</th>
		    <th width="36">首页<a href="#" title="在网站首页显示">？</a></th>
		    <th width="36">置顶<a href="#" title="在列表页面置顶">？</a></th>
		    <th width="50">操作</th>
		</tr> 
	</thead>
	<?php if(!empty($dataList)): ?><tbody>
		<?php if(is_array($dataList)): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 
			<td><input type="checkbox" name="ids[]" id="ids<?php echo ($vo["id"]); ?>" value="<?php echo ($i); ?>,<?php echo ($vo["id"]); ?>"></td>
			<td><input style="width:35px" name="ordernums[]" id="ordernum<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["ordernum"]); ?>"></td>
		    <td><?php getLangTextTitle($vo['lang']);?> <a href="__APP__/Admin/News/edit/id/<?php echo ($vo["id"]); ?>/lang/<?php echo ($vo["lang"]); ?>/cid/<?php echo ($vo["category_id"]); ?>"><?php echo ($vo["title"]); ?></a>
		    	<?php if(!empty($vo["image"])): ?><img alt="有封面图片" src="__ADMIN__/Public/imgs/gtk-image.png"><?php endif; ?>
		    </td>
		    <td><?php echo ($vo["click_count"]); ?></td>
		    <td><?php getCategoryTitle($vo['category_id'],$vo['lang']);?></td>
		    <td><?php echo (date('Y-m-d',$vo["update_time"])); ?></td>
		    <td align="center"><?php getCheckboxState($vo['id'],'is_publish',$vo['is_publish']);?></td>
		    <td align="center"><?php getCheckboxState($vo['id'],'is_home',$vo['is_home']);?></td>
		    <td align="center"><?php getCheckboxState($vo['id'],'is_top',$vo['is_top']);?></td>
		    <td><a href="__APP__/Admin/News/edit/id/<?php echo ($vo["id"]); ?>/lang/<?php echo ($vo["lang"]); ?>/cid/<?php echo ($vo["category_id"]); ?>"><img src="__ADMIN__/Public/imgs/edit.png" /></a>&nbsp;&nbsp;&nbsp;<a href="#" onclick="javascript:deleteData('__APP__/Admin/News/delete/id/<?php echo ($vo["id"]); ?>/cid/<?php echo ($vo["category_id"]); ?>');"><img src="__ADMIN__/Public/imgs/cross.png" /></a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
	<?php else: ?>
	<tbody>
		<tr>
			<td colspan="11" align="center" style="color:red;">没有找到数据！！！<a href="__APP__/Admin/News/edit/cid/<?php echo $_GET["cid"];?>/lang/<?php echo $_GET['lang']; ?>">添加</a></td>
		</tr>
	</tbody><?php endif; ?>
	<tfoot>
		<tr>
			<td colspan="11">
				<div class="qw-fl" style="visibility:hidden;">
					<select name="rowpage" id="rowpage">
						 
					</select>
				</div>
				<div class="qw-fr">
					<div class="grid-pagination">
					<?php echo ($pageBar); ?>
					</div>
				</div>
			</td>
		</tr>
	</tfoot>
</table>
</form>



</body>
</html>