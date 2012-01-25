<?php 

$focusGroupsNodeIds = array();
 
for ($i=0;$i<count($view->result);$i++) {
	if ($view->result[$i]->nodehierarchy_parent!=0) {  
	$focusGroupsNodeIds[$view->result[$i]->nodehierarchy_parent]=null;
	}
}

?>
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/vertical_tabs/vertical_tabs.css?n" />

<script>
var list_current_id=null;
$(document).ready(function() {
	

	
	$('.vertical-tab-button').click(function() {

		if (list_current_id!=null)  {
			$('.'+list_current_id).css( 'display','none' ) ;
			$('#'+list_current_id).removeClass('selected');
		}
		$('.'+this.id).css( 'display','' ) ;
		$('#'+this.id).addClass('selected');
		list_current_id =this.id ; 
	});
	$('ul.vertical-tabs-list li:first').click();
	
		
});

</script>
<div class="tabs">
<div class="node-form">
<div class="vertical-tabs clear-block" style="display: block;top:300px;width:166px;overflow:hiddden">
<ul class="vertical-tabs-list">

<?php 

foreach ($focusGroupsNodeIds as $nodeId=>$null) {
	$focusGroupsNodes[$nodeId] = node_load($nodeId);
	?>
		<li id="file-<?php echo $nodeId;?>" class="vertical-tab-button"><a class="vertical-tabs-list-vertical_tab_default vertical-tabs-nosummary"  href="#"><strong><?php echo  $focusGroupsNodes[$nodeId]->title?></strong></a></li>
	<?php  
}

?>
</ul>
</div>
</div>
</div>
<div style="margin-top:-340px">
<ul>
<?php 
for ($i=0;$i<count($view->result);$i++) {
	$row = $view->result[$i];
	$file = field_file_load($row->node_data_field_synopsis_field_synopsis_fid);
	echo '<li style="list-style:none;display:none" class="file-'.$row->nodehierarchy_parent.'">
	<h2>'.$row->node_title.'</h2>
	<a href="'.$file['filepath'].'">'.$file['filename'].'</a>';
	 
	echo '</li>';
}
?>
</ul>
</div>