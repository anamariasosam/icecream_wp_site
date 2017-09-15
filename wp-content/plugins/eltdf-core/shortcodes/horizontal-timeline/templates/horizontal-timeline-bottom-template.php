<div class="eltdf-horizontal-timeline <?php echo esc_attr($holder_classes); ?>">
	<div class="eltdf-events-content">
	    <ol>
	        <?php echo do_shortcode($content); ?>
	    </ol>
	</div>
	<div class="eltdf-timeline">
	    <div class="eltdf-events-wrapper">
	        <div class="eltdf-events">
	            <ol>
	                <?php foreach($timeline_params as $key=>$value) { ?>
	                    <li><a href="javascript:void(0)" data-date="<?php echo esc_attr($key) ?>"><span class="eltdf-event-text"><?php echo esc_html($value); ?></span><span class="circle-outer"></span></a></li>
	                <?php } ?>
	            </ol>
	            <span class="eltdf-filling-line" aria-hidden="true"></span>
	            <div class="eltdf-dots"></div>
	        </div>
	    </div>
	    <ul class="eltdf-timeline-navigation">
	        <li><a href="#0" class="eltdf-prev inactive"></a></li>
	        <li><a href="#0" class="eltdf-next"></a></li>
	    </ul>
	</div>
</div>