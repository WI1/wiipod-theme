<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?><?php if (isset($og_public) && $og_public === FALSE) { print ' node-private'; } ?> <?php if (isset($node_classes)) { print $node_classes; } ?> node-<?php print $type; ?> clear-block">
	<?php if (!$page): ?>
		<h2 class="node-title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
	<?php endif; ?>
<?php if ($links): ?>
  <div class="links wiki"><?php print $links; ?></div>
<?php endif; ?>

	<?php if(!$page && isset($focusgroups)): ?>
		<div class="fg">
	    <?php foreach($focusgroups as $g): ?>
			<?php print phptemplate_group_list_item($g, FALSE, FALSE); ?>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>

  <div class="content">
    <?php print $content ?>
    <div class="addthis_button_div"><?php print theme('addthis_button',$node,$teaser); ?></div>
  </div>

<?php if ($submitted): ?>
  <div class="submitted"><?php print $submitted; ?></div>
<?php endif; ?>

</div>
