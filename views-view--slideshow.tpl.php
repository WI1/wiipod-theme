<div class="view view-slideshow view-id-slideshow view-display-id-block_1 view-dom-id-2">
	<div class="view-content">
	<div id="views_slideshow_singleframe_main_slideshow-block_1" class="views_slideshow_singleframe_main views_slideshow_main viewsSlideshowSingleFrame-processed">
		<div id="views_slideshow_singleframe_teaser_section_slideshow-block_1" class="views_slideshow_singleframe_teaser_section">
			<?php $i = 0; ?>
			<?php foreach($view->result as $frame): ?>
				<? $image = field_file_load($frame->node_data_field_frontpageimage_field_frontpageimage_fid); ?>
			<div id="views_slideshow_singleframe_div_slideshow-block_1_<?php print $i; ?>" class="views_slideshow_singleframe_slide views_slideshow_slide views-row-<?php print $i+1; ?> views-row-<?php print (($i%2 == 0)?'even':'odd'); ?>" style="background: #fff url(/<?php print $image['filepath']; ?>) 0 0 no-repeat; width: 780px; height: 300px; <?php if($i>0): ?>display:none;<?php endif; ?>">
				<div class="view-content">
					<h2><?php print $frame->node_title; ?></h2>
					<p><?php print substr(strip_tags($frame->node_revisions_body), 0, 600); ?></p>
				</div>
			</div><!--close views_slideshow_singleframe_div_1_<?php print $i; ?>-->
			<?php $i++; ?>
			<?php endforeach; ?>
		</div>
		<!-- <div class="views_slideshow_singleframe_controls views_slideshow_controls" id="views_slideshow_singleframe_controls_1" style="display: block; margin: 0 10px">
			<a href="#" id="views_slideshow_singleframe_prev_slideshow-block_1" class="views_slideshow_singleframe_previous views_slideshow_previous">Vorheriges Thema </a> |
			<a href="#" id="views_slideshow_singleframe_next_slideshow-block_1" class="views_slideshow_singleframe_next views_slideshow_next">Nächstes Thema</a>
		</div> --><br />
	</div>
	</div>
</div>