<?php
$grid = array(
	'left' => 2,
	'middle' => 7,
	'right' => 3,
);
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
        <link href="<?php print $base_path . $directory; ?>/css/profile.css?C" rel="stylesheet" type="text/css" />
    </head>

    <body class="<?php print $body_classes; ?>">
        <div id="page">
            <div id="pageInner">
                <?php if (!empty($wiipod_bar)): ?>
                <div id="wiipod-bar">
                    <div id="wiipod-bar-inner">
                            <?php print $wiipod_bar; ?>
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
                                <?php print $search_box; ?></div>
                            <?php endif; ?>

                    </div>
                    <?php endif; ?>

                </div><!-- /header -->

                <div class="clear"></div>
                <div id="container" class="clear-block container_12">


                    <div id="sidebar-left" class="column sidebar grid_<?=$grid['left']?>">

                        <div id="user-picture" style="height: 200px">
													<?php print theme('imagecache', 'userpic_2c_portrait', $profile->picture ? $profile->picture : 'dummy.jpg'); ?>
                        </div>

                        <?php print $left; ?>

												<?php if(!empty($profile_content)): ?>
												<?php print $profile_content; ?>
												<?php endif; ?>
												<?php if($profile->uid !== $user->uid): ?>
												<?php print l(t('Kontaktieren', NULL, 'de'), 'user/' . $profile->uid . '/contact', array('class' => 'contactbtn')); ?>
												<?php endif; ?>
												
						<?php if($related_groups): ?>
						<h2><?php print phptemplate_owner($profile->profile_firstname); ?> Projekte</h2>
						<?php 
						// Quick fix for the problem, should actually be put into a function with the possibility to set different arguments for each group node type
						foreach($related_groups as $group) {
						  if ($group->type == 'project' || $group->type == 'focusgroup') {
					         print '<div class="group-list-item">' . phptemplate_group_list_item($group) . '</div>';
							}
						}
						?>
						
						
						<?php endif; ?>
                  	</div><!-- /sidebar-left -->


                    <div id="main" class="column">
                        <?php if (!empty($breadcrumb)): ?>
                        <div id="breadcrumb">
                                <?php print $breadcrumb; ?>
                        </div>
                         <?php endif; ?>
                            <?php if (!empty($title)): ?>
                        <h1 id="page-title" class="title">
													<?php if($title == $profile->name): ?>
														<?php print implode(' ', array($profile->profile_title, $profile->profile_firstname, $profile->profile_middlename, $profile->profile_lastname)); ?>
													<?php else: ?>
														<?php print $title; ?>
													<?php endif; ?>
												</h1>

                        <?php endif; ?>
                        <div id="main-squeeze" class="grid_<?=$grid['middle']?>">
                            <?php if (!empty($mission)): ?>
                            <div id="mission">
                                <?php print $mission; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($content_top)): ?>
                            <div id="content-top">
                                    <?php print $content_top; ?>
                            </div><!-- /content-top -->
                            <br class="clear"/>
                            <?php endif; ?>
                            <?php if (!empty($tabs)): ?>
                            <div class="tabs">
                                <?php print $tabs; ?></div>
                            <?php endif; ?>
                            <div id="content">

                                <br class="clear" />
                                <?php if (!empty($help)): print $help; endif; ?>
                                <div id="content-content" class="clear-block">
								                    <?php if (!empty($messages)): print $messages; endif; ?>
                                    <?php print $content; ?>
                                </div><!-- /content-content -->
                                <?php print $feed_icons; ?>
                            </div><!-- /content -->
                        </div><!-- /main-squeeze /main -->
                    </div>
                    <?php if (!empty($right)): ?>
                    <div id="sidebar-right" class="column sidebar grid_<?=$grid['right']?>">
                      	<?php print $right; ?>
                    </div><!-- /sidebar-right -->
                    <?php endif; ?>
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
