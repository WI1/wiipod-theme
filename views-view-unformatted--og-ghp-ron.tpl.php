<?php
// $Id: views-view-unformatted.tpl.php,v 1.6 2008/10/01 20:52:11 merlinofchaos Exp $
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

$realpath = drupal_get_normal_path($_REQUEST['q']);
$realpath = explode("/", $realpath);
$groupnode = node_load($realpath[1]);

if ($groupnode->type == 'project' || $groupnode->type == 'focusgroup') {
echo $groupnode->body;
}

?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div class="<?php print $classes[$id]; ?>">
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
