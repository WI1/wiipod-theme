<?php
if ($node->type == 'balancewiki' || $node->type == 'dokuwiki') {
$grid = array(
	'left' => 2,
	'middle' => 10,
	'right' => 0,
	);
} else {
$grid = array(
	'left' => 2,
	'middle' => 7,
	'right' => 3,
);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir="<?php print $language->dir ?>" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php print $head; ?>
		<title><?php print $head_title; ?></title>
		<link rel="stylesheet" href="<?php print $base_path . $directory; ?>/css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="<?php print $base_path . $directory; ?>/css/960.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="<?php print $base_path . $directory; ?>/css/text.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="<?php print $base_path . $directory; ?>/css/layout.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<?php print $styles; ?>
	</head>

	<body class="<?php print $body_classes; ?> node-<?php print $node->nid; ?>">
		<div id="page">
			<div id="pageInner">
					<?php if (!empty($balance_bar)): ?>
					<div id="balance-bar">
						<div id="balance-bar-inner">
							<?php print $balance_bar; ?>
						</div>
					</div>
					<?php endif; ?>
				<div id="header" class="container_12">

					<div class="clear"></div>
					<?php if (!empty($header)): ?>

					<div id="header-region">
						<?php print $header; ?>
						<?php if (!empty($search_box)): ?>
						<div id="search-box">
							<?php print $search_box; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div><!-- /header -->

				<div id="container" class="clear-block container_12">
					<div id="sidebar-left" class="column sidebar grid_<?php print$grid['left']?>">
						<div id="logo-title">
							<div class="logo-title">
							<?php// if($fg): // page with fg context ?>
								<?php// print l('<img src="' . $base_path . 'sites/all/themes/balance/img/badges_gross/fokusgruppe_' . $fg->field_fgnumber_value . '.png" />', 'node/' . $fg->nid, array('html' => TRUE)) ?>
							<?php// else: ?>
							<a id="logo" href="<?php print $front_page; ?>" rel="home" title="<?php print t('Home'); ?>">
								<img alt="<?php print t('Home'); ?>" src="<?php print $logo; ?>" />
							</a>
							<?php// endif; ?>
							</div>
						</div>
						<?php print $left; ?>
					</div><!-- /sidebar-left -->

					<div id="main" class="column">
						<div id="main-squeeze" class="grid_<?php print $grid['middle']?>">

							<?php if (!empty($mission)): ?>
							<div id="mission">
								<?php print $mission; ?></div>
							<?php endif; ?>
							<?php if (!empty ($content_top)): ?>
 								<div id="content-top">
									<?php print $content_top; ?>
								</div><!-- /content-top -->
								<?php endif; ?>
						<?php if (!empty($announcement)): ?>
					<div id="announcement">
						<?php print $announcement; ?>
					</div>
					<?php endif; ?>
						   <br class="clear"/>
							<?php if (!empty($title)): ?>
								<h1 id="page-title" class="title"><?php print $title; ?></h1>
							<?php endif; ?>
							<?php if (isset($node) && !empty($node->og_description) && $node->og_description !== 'na'): ?>
							<p class="long"><?php print $node->og_description; ?></p>
							<?php endif; ?>
							<?php if (!empty($tabs)): ?>
								<div class="tabs">
									<?php print $tabs; ?></div>
								<?php endif; ?>
							<div id="content">
								<?php if (!empty($help)): print $help; endif; ?>
								<div id="content-content" class="clear-block">
				 					<?php if (!empty($messages)): print $messages; endif; ?>
									<?php if (!empty($meta_content)): ?>
										<?php print $meta_content; ?>
									<?php endif; ?>
									<?php if(isset($node)): ?>
										<?php if(in_array($node->type, array('project', 'focusgroup')) && arg(2) == null): ?>
											<?php print balance_og_add_blog_link($node); ?>
										<?php endif; ?>
										<?php print balance_edit_link($node); ?>
									<?php endif; ?>
									<?php print $content; ?>
								</div><!-- /content-content -->
								<?php print $feed_icons; ?>
							</div><!-- /content -->
						</div><!-- /main-squeeze -->
						<div id="sidebar-right" class="column sidebar grid_<?php print $grid['right']?>">
							<?php if(isset($node->field_projectlogo) && ($projectlogo = $node->field_projectlogo[0])): ?>
								<div class="logo-title">
									<?php print l(theme('imagecache', 'pic_2c_square', $projectlogo['filepath']), 'node/' . $node->nid, array('html' => TRUE)) ?>
								</div>
							<?php endif; ?>

						<?php if (isset($authors)): ?>
							<div class="block" id="authors">
								<h2>Autoren</h2>
								<ul class="no-bullets">
							<?php foreach($authors as $a): ?>
								<li>
								<?php print theme('user_picture', $a); ?>
								<h3><?php print l($a->profile_lastname . ', ' . $a->profile_firstname, 'user/' . $a->uid); ?></h3>
								<p><?php print $a->profile_title; ?></p>
								</li>
							<?php endforeach; ?>
							<?php if(isset($node->field_coautors)): ?>
              <?php
                $coautors = $node->field_coautors;
                if(is_array($coautors)):
                  foreach($coautors as $coautor):
                    if($coautor['uid'] == '') continue;
                    $coautor = user_load($coautor['uid']); ?>
                      <li>
                      <?php print theme('user_picture', $coautor); ?>
                      <h3><?php print l($coautor->profile_lastname . ', ' . $coautor->profile_firstname, 'user/' . $coautor->uid); ?></h3>
                      <p><?php print $coautor->profile_title; ?></p>
                      </li>
                  <?php endforeach; ?>
								<?php endif; ?>
							<?php endif; ?>
								</ul>
							</div>
						<?php endif; ?>

						<?php if(isset($related_groups)): ?>
							<div class="block" id="related_groups">
								<h2>Gruppen dieses Beitrags</h2>
								<ul class="no-bullets">
							    <?php foreach($related_groups as $g): ?>
									<li><?php print phptemplate_group_list_item($g); ?></li>
								<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>

						<?php if(!empty($project_sidebar)): ?>
						<div id="project-sidebar">
						<?php print $project_sidebar; ?>
						</div>
						<?php endif; ?>
						<?php if (!empty($right) && $node->type != 'project'): ?>
							<?php print $right; ?>
						<?php endif; ?>
						</div><!-- /right -->
					</div><!-- main -->
				</div><!-- /container -->
				<div class="clear"></div>
				<div id="footer">
					<?php print $footer_message; ?><?php if (!empty($footer)): print $footer; endif; ?>
				</div><!-- /footer -->
			</div>
		</div><!-- /page -->
		<?php print $scripts; ?>
		<?php print $closure; ?>
	</body>
</html>
