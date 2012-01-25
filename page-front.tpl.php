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

<body class="<?php print $body_classes; ?>">
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

		<div class="clear"></div>
		<div id="container" class="clear-block container_12">
			<div id="sidebar-left" class="column sidebar grid_2">
				<div id="logo-title">
					<?php if (!empty($logo)): ?>
					<a id="logo" href="<?php print $front_page; ?>" rel="home" title="<?php print t('Home'); ?>">
					<img alt="<?php print t('Home'); ?>" src="<?php print $logo; ?>" />
					</a><?php endif; ?>
				</div>
				<?php print $left; ?>
			</div><!-- /sidebar-left -->

			<?php if (!empty ($content_top)): ?>
			<div id="content-top" class="grid_10">
				<?php print $content_top; ?>
			</div><!-- /content-top -->
			<?php endif; ?>

			<?php if (!empty ($teaser_1)): ?>
			<div id="teaser_1" class="grid_3">
				<?php print $teaser_1; ?>
			</div><!-- /teaser_1 -->
			<?php endif; ?>

			<?php if (!empty ($teaser_2)): ?>
			<div id="teaser_2" class="grid_3">
				<?php print $teaser_2; ?>
			</div><!-- /teaser_2 -->
			<?php endif; ?>

			<?php if (!empty ($teaser_3)): ?>
			<div id="teaser_3" class="grid_3">
				<?php print $teaser_3; ?>
			</div><!-- /teaser_3 -->
			<?php endif; ?>

			<div id="main" class="column grid_7">
				<div id="main-squeeze">
					<?php if (!empty($mission)): ?>
					<div id="mission">
						<?php print $mission; ?>
					</div>
					<?php endif; ?>
					
					<?php if (!empty($announcement)): ?>
					<div id="announcement">
						<?php print $announcement; ?>
					</div>
					<?php endif; ?>
					
					<div id="content">
					<?php if (!empty($tabs)): ?>
						<div class="tabs">
							<?php print $tabs; ?>
						</div>
						<?php endif; ?>

						<?php if (!empty($title)): ?>
						<h1 id="page-title" class="title"><?php print $title; ?></h1>
						<?php endif; ?>
						<?php if (!empty($help)): print $help; endif; ?>
						<div id="content-content" class="clear-block">
							<?php if (!empty($messages)): print $messages; endif; ?>
							<?php print $content; ?>
						</div><!-- /content-content -->
						<?php print $feed_icons; ?>
					</div><!-- /content -->
				</div><!-- /main-squeeze -->
			</div><!-- /main -->
			<?php if (!empty($right)): ?>
			<div id="sidebar-right" class="column sidebar grid_3">
				<?php print $right; ?>
			</div><!-- /sidebar-right -->
			<?php endif; ?>
		</div><!-- /container -->
		<div class="clear"></div>

		<div id="footer">
			<?php print $footer_message; ?><?php if (!empty($footer)): print $footer; endif; ?>
		</div><!-- /footer -->
	</div><!-- pageInner -->
</div><!-- /page -->
<?php print $scripts; ?>
<?php print $closure; ?>
</body>
</html>
