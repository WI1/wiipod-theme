<?php if(arg(2) === null): ?>

<?php print views_embed_view('og_ghp_ron', 'default', $node->nid); $node=node_load(arg(1)); drupal_set_title($node->title); ?>

<?php elseif(arg(2) == 'info'): ?>
<?php print $node->body; ?>
<?php endif; ?>