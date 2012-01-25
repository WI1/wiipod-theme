<?php if(arg(2) === null): ?>
<?php print views_embed_view('og_ghp_ron', 'default', $node->nid); $node=node_load(arg(1)); drupal_set_title($node->title); ?>

<?php elseif(arg(2) == 'info'): ?>
<?php //drupal_set_message('<pre>' . print_r($node, TRUE) . '</pre>'); ?>
<?php print $content; ?>
<?php endif; ?>