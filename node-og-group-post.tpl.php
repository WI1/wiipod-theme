<?php if(isset($before)) { print $before; }?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?><?php if (isset($og_public) && $og_public === FALSE) { print ' node-private'; } ?> <?php if (isset($node_classes)) { print $node_classes; } ?> node-<?php print $type; ?> clear-block">
	<?php if (!$page): ?>
		<h2 class="node-title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
	<?php endif; ?>
	<?php if(!$page && isset($focusgroups)): ?>
		<div class="fg">
	    <?php foreach($focusgroups as $g): ?>
			<?php print phptemplate_group_list_item($g, FALSE, FALSE); ?>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php if (isset($og_public) && $og_public === FALSE): ?>
	<?php print balance_visibility($node->og_groups_both); ?>
	<?php endif; ?>

  <div class="content">
    <?php print $content ?>
		<?php if (!$page && $node_read_more): ?>
		<p><?php print $node_read_more; ?></p>
		<?php endif; ?>
  </div>
	<?php print balance_addthis_button(); ?>
  <div class="links"><?php print $submitted; ?><?php if($links): ?> | <?php print $links; ?><?php endif; ?></div>
</div>
<?php if(isset($after)) { print $after; }?>
